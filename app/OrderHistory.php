<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $fillable = [
        'action',
        'text',
        'color',
        'comment',
        'order_id',
        'seller_id',
        'deliveryMen_id',
        'collection_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

    public function deliveryMen()
    {
        return $this->belongsTo(User::class, 'deliveryMen_id', 'id');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'deliveryMen_id', 'id');
    }
}
