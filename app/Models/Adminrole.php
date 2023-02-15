<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adminrole extends Model
{

    protected $table ='role';
    protected $fillable = ['name','permission','active']; 
}