<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'name',
        'description',
        'recieved',
        'seller_id',
        'deliveryMen_id',
    ];

    public function products(){
        return $this->belongsTo(Product::class);
    }

    public function seller(){
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

    public function deliveryMen(){
        return $this->belongsTo(User::class, 'deliveryMen_id', 'id');
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
