<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeDetails extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table='bikedetails';
    protected $fillable=['brand_id','bike_name','bd_catid','brand_name','bd_image','mileage','price','year','cc','weight'];

}
