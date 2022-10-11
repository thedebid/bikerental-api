<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bikerentalproject8 extends Model
{
    public$timestamps=false;
 use HasFactory;
 protected $table="bikerentalproject8";
 protected $fillable=['user','userdetail','slider','brand','bike details','booking','category'];
}
