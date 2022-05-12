<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class editAccount extends Model
{
    use HasFactory;
    
    public function SaveChanges()
    {

        return true;
    }
    
    public function DeleteUser($id)
    {
        
        $this->getById($id)->delete();
        return true;
    
    }
    
    public function getById($id) {
        return $this->findById($id);
    }
    
}

