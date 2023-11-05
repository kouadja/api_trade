<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasApiTokens,HasFactory;
    protected $fillable=["admin_name","admin_email", "admin_password"];
    protected $primaryKey = 'admin_id';

    //  public $timestamps = false;
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
