<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function mainSiteConfig(){
        $data[] = "maarten";
        $data[] = "maarten";
         return view("layouts/mainTableView" , ['data'=>$data]);
    }
    public function mainSiteConfigButtons(){
        if (isset($_POST['btnAanpassen'])){
             return view('layouts/main');
        }
    }
    public function showEditSensor(){
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
            $sensorData['id']= $_POST['submitBtn'];
            $sensorData['Topic'] = $_POST['sensorTopic'];
            $sensorData['Naam'] = $_POST['sensorTopic'];
            $sensorData['Maximum'] = $_POST['sensorTopic'];
            $sensorData['Minimum'] = $_POST['sensorTopic'];
            $sensorData['Eenheid'] = $_POST['sensorTopic'];
            
            //invoegen in database
            
            return view('layouts/main');
         }
    }
    
}
