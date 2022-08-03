<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $fillable=['first_name','last_name','email','phone','company','country','city','zip_code','address1','address2','order_id'];

}
