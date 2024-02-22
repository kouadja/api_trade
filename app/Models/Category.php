<?php

namespace App\Models;

use App\Models\Sub_category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    public function sub_categorys(){
        return $this->hasMany(Sub_category::class);
    }
}
