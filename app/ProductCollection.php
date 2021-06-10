<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCollection extends Model
{
    protected $fillable = [
        'products_id','collections_id','quantity'
   ];
}
