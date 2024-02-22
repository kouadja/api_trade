<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Basket extends Model
{
    use HasFactory;
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
