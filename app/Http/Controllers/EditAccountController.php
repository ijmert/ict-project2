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
    
    
    public function mainSiteConfig(){
       
        
        
        $id = auth()->user()->id;
        $userData = User::where('id', $id)->first();
        
        //nog password decrypten
        //$userData['password'] = $userData['password'];
        
        return view("layouts/editAccount", ['userData' => $userData]);
        
    }
    
    public function EditAccount(Request $request)
    {
        if (isset($_POST['AnnuleerBtn']))
        {
            $sensorData = $this->siteConfig();
            
            //$id = auth()->user()->id;
            return view("layouts/mainTableView", ['data' => $sensorData]);
        }
        else
        {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                //'password' => 'required', 
                'oldpass' => 'required',
            ]);
            $id = auth()->user()->id;
            $name = request()->input('name');
            $email = request()->input('email');
            $password = request()->input('password');
            $oldpass= request()->input('oldpass');
            
            $userInfo = User::where('id', $id)->first();
            
            
            
            if($userInfo['password'] == Hash::make($oldpass)){
                
                if($password != ""){
                    DB::table('users')
                        ->where ('id', $id)
                        ->update(['name' => $name, 'email' => $email,'password' => $password ]);
                }else{
                    DB::table('users')
                        ->where ('id', $id)
                        ->update(['name' => $name, 'email' => $email]);
                }
                    
                
                
                
            }else{
                var_dump($userInfo);
                die;
                
            }
            //nog password decrypten
            //$password = $password;
        
            
            
            
            $sensorData = $this->siteConfig();
            
            
            return view("layouts/mainTableView", ['data' => $sensorData]);
        }
    }
    
    public function DeleteUser()
    {
        $this->editAccount->DeleteUser(1);
    }
    
}
