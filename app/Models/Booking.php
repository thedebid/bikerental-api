<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table='booking';
    protected $fillable=['bd_id','user_id','from_date','to_date','location'];
}
