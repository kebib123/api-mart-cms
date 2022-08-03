<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
}
