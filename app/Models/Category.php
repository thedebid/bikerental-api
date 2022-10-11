<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table='Category';
    protected $fillable=['cat_id','cat_name','cat_image','status'];

}
