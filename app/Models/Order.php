<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    public function clients(){
        return $this->belongTo(Client::class);
    }
    public function admins(){
        return $this->belongTo(Admin::class);
    }
}
