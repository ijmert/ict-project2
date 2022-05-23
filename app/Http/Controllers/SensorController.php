<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
Use App\Models\sensor;
Use App\Models\User;
Use App\Models\Sensor_last_measurement;
use App\Http\Requests\editSensorRequest;

class SensorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function siteConfig() {
        $id = auth()->user()->id;   //id ophalen
        $data['sensorData'] = sensor::where('users_id', $id)->get(); //sensors van gebruiker ophalen
        for($i=0; $i<count($data['sensorData']);$i++){
           $data['value'][$i] = $this->getLastValue($data['sensorData'][$i]['topic']);  //van alle sensoren de waarden ophalen
           $data['percent'][$i] = $this->getPercent($data['value'][$i], $data['sensorData'][$i]['max'], $data['sensorData'][$i]['min']); //percentage berekenen
           $data["color"][$i] = $this->getColor($data['percent'][$i]);  //kleur ophalen
        }
        return $data;
    }
    public function getInitials(){
        $id = auth()->user()->id;
        $name = User::where('id', $id)->get();
        $preName = explode(' ', $name[0]['name'])[0];
        $postName = explode(' ', $name[0]['name'])[1];
        $initials = substr($preName, 0, 1);
        $initials .= substr($postName, 0, 1);
        $initials = strtoupper($initials);
        return $initials;
    }

    public function mainSiteConfig(){
        $data = $this->siteConfig();
        $initials = $this->getInitials();
        return view("layouts/mainTableView" , ['data'=>$data], ['initials'=>$initials] );
    }

                    ////Sensor Aanpassen////

    public function showEditSensor(Request $request){
        if (isset($_POST['EditSensorButton']))
        {
            $id= $request->input('EditSensorButton');
            //data opzoeken van deze ID
            $sensorData = sensor::where('id', $id)->first();
            $sensorData['initials'] = $this->getInitials();
            $topics = $this->getAllTopics();
            return view("layouts/editSensorView", ['sensorData'=>$sensorData], ['topics'=>$topics]);
        }
        else
        {
            $data = $this->siteConfig();
            $initials = $this->getInitials();
            return view("layouts/mainTableView" , ['data'=>$data], ['initials'=>$initials] );
        }
    }

    public function editSensor(Request $request){

        if (isset($_POST['EditButon'])){
           $validatedData = $request->validate([
               'topic' => 'required|exists:sensor_last_measurements',
               'max' => 'required|integer',
               'min' => 'required|integer',
               'unit' => 'required',
               'type'=> 'required'
           ]);

           $id =$_POST['EditButon']; // $request->input('EditButon');
           $topic = $request->input('topic');
           $max = $request->input('max');
           $min = $request->input('min');
           $unit = $request->input('unit');
           $type = $request->input('type');

           //invoegen in database
           $affected = DB::table('sensors')
                       ->where('id', $id)
                       ->update(['topic' => $topic, 'type' => $type, 'unit' => $unit, 'min'=>$min, 'max'=>$max ]);

                       $data = $this->siteConfig();
                       $initials = $this->getInitials();
                       return view("layouts/mainTableView" , ['data'=>$data], ['initials'=>$initials] );
        }
        else
        {
            $data = $this->siteConfig();
        $initials = $this->getInitials();
        return view("layouts/mainTableView" , ['data'=>$data], ['initials'=>$initials] );
        }
    }

                ////Sensor Toevoegen////

    public function showAddSensor(){
        $initials = $this->getInitials();
        $topics = $this->getAllTopics();
        return view("layouts/addSensorView", ['initials'=>$initials], ['topics'=>$topics]);

    }

    public function addSensor(Request $request){
        if (isset($_POST['AnnuleerButton']))
        {
            $data = $this->siteConfig();
        $initials = $this->getInitials();
        return view("layouts/mainTableView" , ['data'=>$data], ['initials'=>$initials] );
        }

        $validatedData = $request->validate
        ([
            'topic' => 'required|exists:sensor_last_measurements',
            'max' => 'required|integer',
            'min' => 'required|integer',
            'unit' => 'required',
            'type'=> 'required'
        ]);

        $topic = $request->input('topic');
        $type = $request->input('type');
        $unit = $request->input('unit');
        $min = $request->input('min');
        $max = $request->input('max');
        $user_id = auth()->user()->id;
        $data=array("topic"=>$topic,"type"=>$type,"unit"=>$unit,"min"=>$min,"max"=>$max, "users_id"=>$user_id);
        DB::table('sensors')->insert($data);

        $data = $this->siteConfig();
        $initials = $this->getInitials();
        return view("layouts/mainTableView" , ['data'=>$data], ['initials'=>$initials] );
    }

                ////Sensor Verwijderen////

    public function deleteSensor(Request $request) {
        $id = $request->input('deleteSensorButton');
        DB::table('sensors')->where('id', $id)->delete();

        $data = $this->siteConfig();
        $initials = $this->getInitials();
        return view("layouts/mainTableView" , ['data'=>$data], ['initials'=>$initials] );
    }

    public function getLastValue($topic){

        $var = Sensor_last_measurement::where('topic', $topic)->get();

        if (isset($var[0])) {
        return $var[0]['LastMeasurement'];
        }
        else{
            return null;
        }
    }

    public function getAllTopics(){
        $topics = Sensor_last_measurement::all();
        return $topics;
        //return view("layouts/test" , ['data'=>$topics]);
    }
    public function getColor($percent){
        if($percent <25){
            $color = "red";
        }
        else if($percent <50){
            $color = "orange";
        }
        else if($percent <75){
            $color = "yellow";
        }
        else{
            $color = "green";
        }
        return $color;
    }
    public function getPercent($value, $max , $min){
        if($value > $max){
            $percent = 100;
        }
        else if($value < $min){
            $percent = 0;
        }
        else if($max == $min){
            $percent =0;
        }else{
            $interval = $max- $min;
            $step = 100 / $interval;
            $percent = ($value -$min ) * $step ;
        }
        return $percent;

    }
}
