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
        //$id = auth()->user()->id;
        $id = 1;
        $data['sensorData'] = sensor::where('users_id', 1)->get();
        for($i=0; $i<count($data['sensorData']);$i++){
          $data['value'][$i] = $this->getLastValue($data['sensorData'][$i]['topic']);  
           $data['value'][$i] = 10;
        }
      //  $data['value'] = 10;
        $name = User::where('id', 2)->get();
        $preName = explode(' ', $name[0]['name'])[0];
        $postName = explode(' ', $name[0]['name'])[1];
        $data['initials'] = substr($preName, 0, 1);
        $data['initials'] .= substr($postName, 0, 1);
        return $data;
    }
    public function mainSiteConfig(){
        $data = $this->siteConfig();
        $id = auth()->user()->id;
        return view("layouts/mainTableView" , ['data'=>$data], ['initials'=>$id] );
        
      /*  $data = sensor::where('users_id', 2)->get();
        return view("layouts/test", ['test'=>$data]); */
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
            
             $data = $this->siteCOnfig();
            return view("layouts/mainTableView" , ['data'=>$data['sensorData']], ['initials'=>$data['initials']]);
         }
    }
    public function showAddSensor(){

        return view("layouts/addSensorView"); 
        
    }
    public function insertform(){
        $data = $this->siteCOnfig();
        return view("layouts/mainTableView" , ['data'=>$data['sensorData']], ['initials'=>$data['initials']]);
    }
        
    public function addSensor(Request $request){
        if (isset($_POST['AnnuleerButton'])){
            $data = $this->siteCOnfig();
        return view("layouts/mainTableView" , ['data'=>$data['sensorData']], ['initials'=>$data['initials']]);
        }
        
        $topic = $request->input('topic');
        $type = $request->input('type');
        $unit = $request->input('unit');
        $min = $request->input('min');
        $max = $request->input('max');
        $data=array("topic"=>$topic,"type"=>$type,"unit"=>$unit,"min"=>$min,"max"=>$max, "users_id"=>1);
        DB::table('sensors')->insert($data);  
        
        $data = $this->siteCOnfig();
            return view("layouts/mainTableView" , ['data'=>$data['sensorData']], ['initials'=>$data['initials']]);
    }          
    
    public function deleteSensor(Request $request) {
        $id = $request->input('deleteSensorButton');
        DB::table('sensors')->where('id', $id)->delete();
    }
    
    public function getLastValue($topic){
        
        $var = Sensor_last_measurement::where('topic', $topic)->get();
        
        return $var[0]['LastMeasurement'];
    }
    
}
