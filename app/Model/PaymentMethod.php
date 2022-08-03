<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable=['name','image','status'];
}
