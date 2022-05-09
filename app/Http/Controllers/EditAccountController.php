<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;

/**
 * Description of EditAccountController
 *
 * @author robbe
 */
class EditAccountController extends Controller{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
}
