<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    protected $table = 'cl_banner';
    protected $fillable = ['title','caption','content','slug','link','picture','status'];
}
