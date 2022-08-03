<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Brand extends Model
{
    use HasSlug;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('brand_name')
            ->saveSlugsTo('slug');
    }

    protected $fillable=['brand_name','brand_image','slug'];

    public function products()
    {
        return $this->hasMany(Product::class,'brand_id');
    }
}
