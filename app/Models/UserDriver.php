<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDriver extends Model
{
    use HasFactory;
    protected $fillable = ["email","password"] ;
    protected $primaryKey = "driver_id";
}
