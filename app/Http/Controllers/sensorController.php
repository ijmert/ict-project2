<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensorController extends Controller
{
     public function showEditSensor(){
       // $this->siteConfig();
            //haal content uit database
         $sensorData['id']= 124;
         $sensorData['Topic'] = "topic";
         $sensorData['Naam'] = "sensor1";
         $sensorData['Maximum'] = "50";
         $sensorData['Minimum'] = "0";
         $sensorData['Eenheid'] = "meter";
         
         
        return view("layouts/editSensorView", ['sensorData'=>$sensorData]);
    }
    public function editSensor(){
         if (isset($_POST['AnnuleerBtn'])){
             return view('layouts/main');
         } else {
             $sensorData['id']= $_POST['sensorTopic'];
            $sensorData['Topic'] = "topic";
            $sensorData['Naam'] = "sensor1";
            $sensorData['Maximum'] = "50";
            $sensorData['Minimum'] = "0";
            $sensorData['Eenheid'] = "meter";
            return view('layouts/main');
         }
    }
}
