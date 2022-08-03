<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable=['user_id','first_name','last_name','email','company','country','city','zip_code','address1','address2'];
}
