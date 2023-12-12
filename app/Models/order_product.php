<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';

       protected $fillable = [
        'client_name',
        'client_number',
        'client_email',
        'client_city',
        'date_delivery',
        'client_locality',
        'client_adress',
        'payment_way',
        'client_id',
        "client_note"
    ];

      
      public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

}
