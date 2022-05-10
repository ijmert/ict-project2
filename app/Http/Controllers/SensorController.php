<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
Use App\Models\sensor;
Use App\Models\User;
Use App\Models\Sensor_last_measurement;

class SensorController extends Controller
{
    public function siteConfig() {  
        $id = auth()->user()->id;
        //$id = 2;
        $SensorData = sensor::where('users_id', $id)->get();
        $data['sensorData'] = $SensorData;
        for($i=0; $i<count($SensorData);$i++){
          //$data['value'][$i] = $this->getLastValue($SensorData[$i]['topic']);  
           $data['value'][$i] = $this->getLastValue($SensorData[$i]['topic']);
        }  
       // $data['value'] = 10;
        $name = User::where('id', 2)->get();
        $preName = explode(' ', $name[0]['name'])[0];
        $postName = explode(' ', $name[0]['name'])[1];
        $data['initials'] = substr($preName, 0, 1);
        $data['initials'] .= substr($postName, 0, 1);
     /*   $data['sensor'] = $SensorData;*/
        return $data;
    }
    public function mainSiteConfig(){
        $data = $this->siteConfig();
       $id = auth()->user()->id;
        return view("layouts/mainTableView" , ['data'=>$data], ['initials'=>$id] );
    }
    public function showEditSensor(Request $request){
        if (isset($_POST['EditSensorButton'])) {
         
         $id= $request->input('EditSensorButton');
            //data opzoeken van deze ID
         $sensorData = sensor::where('id', $id)->first();
         
         
        return view("layouts/editSensorView", ['sensorData'=>$sensorData]);   
        }

    }
    
    public function editSensor(Request $request){
        
         if (isset($_POST['AnnuleerBtn'])){
              $data = $this->siteCOnfig();
            return view("layouts/mainTableView" , ['data'=>$data['sensorData']], ['initials'=>$data['initials']]);
         } else {
             $id =$_POST['EditButon']; // $request->input('EditButon');
             $topic = $request->input('sensorTopic');
             $max = $request->input('sensorMax');
             $min = $request->input('sensorMin');
             $unit = $request->input('sensorUnit');
             $type = $request->input('sensorType');
             
            
            //invoegen in database
            $affected = DB::table('sensors')
                        ->where('id', $id)
                        ->update(['topic' => $topic, 'type' => $type, 'unit' => $unit, 'min'=>$min, 'max'=>$max, ]);
            
            $SensorData = $this->siteConfig();
        $id = auth()->user()->id;
        return view("layouts/mainTableView" , ['data'=>$SensorData], ['initials'=>$id] );
         }
    }
    public function showAddSensor(){

        return view("layouts/addSensorView"); 
        
    }
    public function insertform(){
        $SensorData = $this->siteConfig();
        $id = auth()->user()->id;
        return view("layouts/mainTableView" , ['data'=>$SensorData], ['initials'=>$id] );
    }
        
    public function addSensor(Request $request){
        if (isset($_POST['AnnuleerButton'])){
        $data = $this->siteConfig();
       $id = auth()->user()->id;
        return view("layouts/mainTableView" , ['data'=>$data], ['initials'=>$id] );
        }
        
        $topic = $request->input('topic');
        $type = $request->input('type');
        $unit = $request->input('unit');
        $min = $request->input('min');
        $max = $request->input('max');
        $user_id = auth()->user()->id;
        $data=array("topic"=>$topic,"type"=>$type,"unit"=>$unit,"min"=>$min,"max"=>$max, "users_id"=>$user_id);
        DB::table('sensors')->insert($data);  
        
        $SensorData = $this->siteConfig();
        $id = auth()->user()->id;
        return view("layouts/mainTableView" , ['data'=>$SensorData], ['initials'=>$id] );
    }          
    
    public function deleteSensor(Request $request) {
        $id = $request->input('deleteSensorButton');
        DB::table('sensors')->where('id', $id)->delete();
    }
    
    public function getLastValue($topic){
        
      /*  $var = Sensor_last_measurement::where('topic', $topic)->get();
        if (isset($var)) {
        return $var[0]['LastMeasurement'];
        }
        else{
            return 0;
        }
    } */
        
        return 30.1;
    }
    
}
