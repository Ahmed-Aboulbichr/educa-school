<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //Facture
    protected $fillable = [
        "name",
        "is_free",
        "order_price",
        "deliveryMen_price",
        "deliveryMen_has_max_seller",
        "deliveryMen_stars",
        "deliveryMen_profile_verified",
        "seller_has_max_deliveryMens",
        "seller_look_max_month",
    ];
}
