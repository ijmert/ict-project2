<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\SensorModel;

class SensorController extends Controller
{
    private SensorModel $sensorData ;

    public function mainSiteConfig(){
        $sensor['id']= 127;
        $sensor['naam']= "maarten";
        
        $data[1] = $sensor;
        $data[0] = $sensor;
        //$data[] = "maarten";    //$data[] = sensormodel->getSensorsFromAcount($user_id);
        //$data[] = "maarten";
        return view("layouts/mainTableView" , ['data'=>$data]);
    }
    public function mainSiteConfigButtons(){
        if (isset($_POST['btnAanpassen'])){
            //content ophalen
            
         $sensorData['id']= 124;
         $sensorData['Topic'] = "topic";
         $sensorData['Naam'] = "sensor1";
         $sensorData['Maximum'] = "50";
         $sensorData['Minimum'] = "0";
         $sensorData['Eenheid'] = "meter";
         
         
        return view("layouts/editSensorView", ['sensorData'=>$sensorData]);
        }
        
    }
    public function showEditSensor(){
        if (isset($_POST['EditSensorButton'])) {
         
         $sensorData['Id']= $_POST['EditSensorButton'];
            //data opzoeken van deze ID
         
         $sensorData['Topic'] = $_POST['EditSensorButton'];
         $sensorData['Naam'] = "sensor1";
         $sensorData['Maximum'] = "50";
         $sensorData['Minimum'] = "0";
         $sensorData['Eenheid'] = "meter";
         
         
        return view("layouts/editSensorView", ['sensorData'=>$sensorData]);   
        }

    }
    
    public function editSensor(){
         if (isset($_POST['AnnuleerBtn'])){
             $data[]="";
             return view("layouts/mainTableView" , ['data'=>$data]);
         } else {
            $sensorData['Id']= $_POST['EditButon'];
            
            $sensorData['Topic'] = $_POST['sensorTopic'];
            $sensorData['Naam'] = $_POST['sensorTopic'];
            $sensorData['Maximum'] = $_POST['sensorTopic'];
            $sensorData['Minimum'] = $_POST['sensorTopic'];
            $sensorData['Eenheid'] = $_POST['sensorTopic'];
            
            //invoegen in database
            
            
             $data[]="";
             return view("layouts/mainTableView" , ['data'=>$data]);
         }
    }
    
    public function showAddSensor(){
        if (isset($_POST['AddSensorButton'])) {

        return view("layouts/addSensorView");   
        }
        
    }
    public function insertform(){
        return view("layouts/mainTableView" , ['data'=>$data]);
    }
        
    public function addSensor(Request $request){
        if (isset($_POST['AnnuleerButton'])){
            return view("layouts/mainTableView" , ['data'=>$data]);
        }
        
        $topic = $request->input('topic');
        $type = $request->input('type');
        $unit = $request->input('unit');
        $min = $request->input('min');
        $max = $request->input('max');
        $users_id = auth()->user()->id;
        $data=array("topic"=>$topic,"type"=>$type,"unit"=>$unit,"min"=>$min,"max"=>$max, "users_id"=>$users_id);
        DB::table('sensors')->insert($data);              
    }          
    
    public function deleteSensor() {
        if (isset($_POST['deleteSensorButton'])){
            $id = $_POST['deleteSensorButton'];
          //  $this->sensorData->removeSensor($id);
            
            $data[]="";
             return view("layouts/mainTableView" , ['data'=>$data]);
         } 
    }
    
}
