<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table='UserDetail';
    protected $fillable=['user_image','user_name','user_phone','user_address','user_gender','u_id','status','user_emergency_contact','user_emergency_name','doc_type','doc_front','doc_back'];
}
