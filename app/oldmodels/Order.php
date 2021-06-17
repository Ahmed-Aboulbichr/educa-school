<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'quantity',
        'price',
        'commission',
        'clientName',
        'clientPhone',
        'clientAddress',
        'sellersComment',
        'deliveryMenComment',
        'orderState_id',
        'seller_id',
        'deliveryMen_id',
        'collection_id',
    ];

    public function orderState(){
        return $this->belongsTo(OrderState::class, 'orderState_id', 'id');
    }

    public function histories(){
        return $this->hasMany(OrderHistory::class);
    }

    public function seller(){
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

    public function deliveryMen(){
        return $this->belongsTo(User::class, 'deliveryMen_id', 'id');
    }

    public function collection(){
        return $this->belongsTo(Collection::class, 'collection_id', 'id');
    }

}
