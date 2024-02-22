<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expedition extends Model
{
    use HasFactory;
    public function products(){
        return $this->belongTo(Product::class);
    }
}
