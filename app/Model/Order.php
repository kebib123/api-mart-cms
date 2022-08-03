<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id','subtotal','tax','discount','grand_total','status','order_track','shipping_id'];

    public function shippings()
    {
        return $this->belongsTo('App\Model\Shipping','shipping_id');
    }
    public function details()
    {
        return $this->hasMany(OrderDetail::class,'order_id');
    }
    public function addresses()
    {
        return $this->hasMany(OrderAddress::class,'order_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
