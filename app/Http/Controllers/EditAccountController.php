<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;
use \App\Models\editAccount;
use \App\Http\Requests\EditAccountRequest;
/**
 * Description of EditAccountController
 *
 * @author robbe
 */
class EditAccountController extends Controller{
    

    

    public function __construct(editAccount $editAccount)
    {
        $this->middleware('auth');
        $this->editAccount = $editAccount;
        
         
    }
    
    
    public function mainSiteConfig(){
       
        return view("layouts/editAccount");
    }
    
    public function SaveChanges(EditAccountRequest $request)
    {
        $this->editAccount->SaveChanges();
        $validated = $request->validated();
    }
    
    public function DeleteUser()
    {
        $this->editAccount->DeleteUser(1);
    }
    
}
