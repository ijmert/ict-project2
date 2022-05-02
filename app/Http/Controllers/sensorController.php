<?php

namespace App\Http\Controllers;
use core\controller;
/**
 * Description of sensorController
 *
 * @author Maarten Vanhengel
 */
class sensorController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function siteConfig(){
        
    }
    public function showEditSensor(){
        $this->siteConfig();
         $content = $this->view->fetch('editSensorView');
         $this->view->assign('content', $content);
         $this->view->display('layouts/main');
    }
}
