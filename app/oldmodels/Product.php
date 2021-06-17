<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'size',
        'price',
        'gender',
        'color',
        'description',
        'seller_id'
    ];

    public function collections(){
        return $this->belongsToMany(Collection::class);
    }

    public function seller(){
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }
}
