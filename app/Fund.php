<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    //La caisse
    protected $fillable = [
        'seller_id',
        'deliveryMen_id',
        'order_id',
   ];
}