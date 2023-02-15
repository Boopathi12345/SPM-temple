<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poosarifamilytree extends Model
{
    use HasFactory;
    protected $table ='poosari_family';
    protected $fillable = ['name','last_name','email','father_name','gender','dob','address','city','state','photo','phone','child_number','active','status','created_by','updated_by'];
}
