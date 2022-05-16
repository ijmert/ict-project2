<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use \App\Models\editAccount;
use \App\Http\Requests\EditAccountRequest;
use Illuminate\Http\Request;
use App\Models\sensor;
Use App\Models\Sensor_last_measurement;
use DB;
use App\Models\User;
/**
 * Description of EditAccountController
 *
 * @author robbe
 */
class EditAccountController extends Controller{




    public function __construct(editAccount $editAccount)
    {
        $this->middleware('auth');
        $this->editAccount = $editAccount;


    }

    public function siteConfig() {
        $id = auth()->user()->id;


        $SensorData = sensor::where('users_id', $id)->get();
        $data['sensorData'] = $SensorData;
        for($i=0; $i<count($SensorData);$i++){
           $data['value'][$i] = $this->getLastValue($SensorData[$i]['topic']);
        }
        $name = User::where('id', $id)->get();
        $preName = explode(' ', $name[0]['name'])[0];
        $postName = explode(' ', $name[0]['name'])[1];
        $data['initials'] = substr($preName, 0, 1);
        $data['initials'] .= substr($postName, 0, 1);
        return $data;
    }
    public function getInitials(){
        $id = auth()->user()->id;
        $name = User::where('id', $id)->get();
        $preName = explode(' ', $name[0]['name'])[0];
        $postName = explode(' ', $name[0]['name'])[1];
        $initials = substr($preName, 0, 1);
        $initials .= substr($postName, 0, 1);
        return $initials;
    }


    public function mainSiteConfig(){


        $id = auth()->user()->id;
        $userData = User::where('id', $id)->first();
        $initials = $this->getInitials();
        //nog password decrypten
        //$userData['password'] = $userData['password'];
        $userData['firstName'] = explode(' ', $userData['name'])[0];
        $userData['lastName'] = explode(' ', $userData['name'])[1];

        return view("layouts/editAccount", ['userData' => $userData], ['initials'=>$initials]);

    }

    public function EditAccount(Request $request)
    {
        if (isset($_POST['AnnuleerBtn']))
        {
            $data = $this->siteConfig();
            $initials = $this->getInitials();
            return view("layouts/mainTableView" , ['data'=>$data], ['initials'=>$initials] );
        }
        else if (isset($_POST['deleteSensorButton']))
        {
            $id = auth()->user()->id;
            $userInfo = User::where('id', $id)->first();
            $oldpass = request()->input('oldpass');
            if(Hash:: check ($oldpass, $userInfo['password']))
            {
                $id = auth()->user()->id;

                DB::table('users')->where('id', $id)->delete();
                
                
                return view("welcome");
            }
            else
            {
                echo "<script>alert('wachtwoord is fout!');</script>";
                return $this->mainSiteConfig();
            }
           

        }
        else
        {
            $validatedData = $request->validate([
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'oldpass' => ['required', 'string', 'min:8']
            ]);
            $id = auth()->user()->id;
            $firstName = request()->input('firstName');
            $lastName = request()->input('lastName');
            $email = request()->input('email');
            $password = request()->input('password');
            $oldpass = request()->input('oldpass');
            $confPassword = request()->input('confPassword');
            $userInfo = User::where('id', $id)->first();
            
            $name = trim($firstName);
            $name .= " ";
            $name .= trim($lastName);

            if(Hash:: check ($oldpass, $userInfo['password'])){

                if($password != ""){
                    $request->validate([
                        'password' => ['min:8'],
                        'confPassword' => ['min:8'],
                    ]);
                    if ($password == $confPassword){
                        DB::table('users')
                            ->where ('id', $id)
                            ->update(['name' => $name, 'email' => $email,'password' => Hash::make($password)]);
                    }
                    else{
                        echo "<script>alert('nieuw wachtwoord is niet gelijk aan elkaar!');</script>";
                        return $this->mainSiteConfig();
                    }
                    
                }else{
                    DB::table('users')
                        ->where ('id', $id)
                        ->update(['name' => $name, 'email' => $email]);
                }
                $data = $this->siteConfig();
                $initials = $this->getInitials();
                return view("layouts/mainTableView" , ['data'=>$data], ['initials'=>$initials] );


            }else{
                echo "<script>alert('wachtwoord is fout!');</script>";
                return $this->mainSiteConfig();
            }

        }
    }
    public function getLastValue($topic){

        $var = Sensor_last_measurement::where('topic', $topic)->get();

        if (isset($var[0])) {
        return $var[0]['LastMeasurement'];
        }
        else{
            return null;
        }


   //     return 30.1;
    }

    
    
    
}
