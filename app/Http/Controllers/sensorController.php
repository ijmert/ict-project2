<?php

namespace App\Http\Controllers;
use core\controller;
/**
 * Description of sensorController
 *
 * @author Maarten Vanhengel
 */
class sensorController {
    
    public function siteConfig(){
        
    }
    public function showEditSensor(){
       // $this->siteConfig();
       return view('layouts/editSensorView');
    }
}
