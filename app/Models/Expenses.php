<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;
    protected $table ='expenses';
    protected $fillable = ['description','name','date','amount','created_by','updated_by'];
}
