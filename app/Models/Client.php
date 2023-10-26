<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    public function products(){
        return $this->hasMany(Product::class);
    }
        public function orders(){
        return $this->hasMany(Order::class);
    }
    
}
