<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table='cl_settings';
    protected $fillable=['title','site_description','about','objective','mission','vision','twitter_link','googleplus_link','instagram_link','facebook_link','contact_no','address','website','email','google_map'];
}
