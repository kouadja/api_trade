<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Basket;
use App\Models\Client;
use App\Models\Expedition;
use App\Models\Sub_category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model

{
  protected $fillable = ["product_name","product_desciption","product_price","product_nbs","product_images","category_id"];
    use HasFactory;
    public function baskets()
    {
        return $this->belongTo(Basket::class);
    }
    public function stocks()
    {
        return $this->belongTo(Stock::class);
    }
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    public function Expeditions()
    {
        return $this->belongTo(Expedition::class);
    }
    public function sub_categorys()
    {
        return $this->belongTo(Sub_category::class);
    }
}
