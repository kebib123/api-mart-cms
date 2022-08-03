<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
   protected $fillable=['name','country_id'];

   public function countries()
   {
       return $this->belongsTo('App\Model\Country','country_id');
   }
}
