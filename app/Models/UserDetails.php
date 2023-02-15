<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $table ='users';
    protected $fillable = ['name','last_name','email','password','father_name','gender','user_type','dob','role','address','city','state','photo','active','status','created_by','updated_by']; 
}

