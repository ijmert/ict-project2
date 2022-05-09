<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorModel;
use App\Models\sensor;

use \App\Http\Requests\editSensorRequest;


class SensorController extends Controller
{
    private SensorModel $sensorData ;
    public function __construct() {
        $this->middleware('auth');
        $this->sensorData = new SensorModel;
    }
    public function mainSiteConfig(){
      $userId= auth()->user()->id;
       $data = sensor::where('users_id', '$userID')->get();
        //$data[] = "maarten";    //data[] = sensormodel->getSensorsFromAcount($user_id);
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
    public function showEditSensor(request $request){
       
         $id = $request->input('EditSensorButton');
            //data opzoeken van deze ID
       $data = sensor::where('users_id', '0' AND 'id', $id)->get();
         
        return view("layouts/editSensorView", ['sensorData'=>$data]);   
        

    }
    public function editSensor(editSensorRequest $request){
        $topic = $request->input('topic');
        $naam = $request->input('naam');
        $max= $request->input('max');
        $min= $request->input('min');
        $type= $request->input('type');
        $unit= $request->input('unit');
        $id = $request->input('id');
        
        DB::update('update sensors set topic = ?, type = ?, unit =?, min =?, max =? where id = ?',[$topic, $naam, $max, $min, $type, $unit,$id]);
        
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
