<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensorController extends Controller
{
     public function showEditSensor(){
       // $this->siteConfig();
       return view('layouts/editSensorView');
    }
    public function editSensor(){
         if (isset($_POST['AnnuleerBtn'])){
             return view('layouts/editSensorView');
         }
    }
}
