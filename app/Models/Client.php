<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Basket;
use App\Models\Product;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasApiTokens, HasFactory;
    protected $fillable=["client_name","client_number","client_email","client_password"];
    protected $primaryKey = 'client_id';
  
        public function orders(){
        return $this->hasMany(Order::class);
    }
        public function basket(){
            return $this->hasOne(Basket::class);
        }
}
