<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    use HasApiTokens, HasFactory,Notifiable;
    protected $fillable=["client_name","client_last_name","client_email","client_password"];
    protected $primaryKey = 'client_id';
    public function products(){
        return $this->hasMany(Product::class);
    }
        public function orders(){
        return $this->hasMany(Order::class);
    }

}
