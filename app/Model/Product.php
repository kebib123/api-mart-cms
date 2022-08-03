<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug;

//    protected $dates = ['deleted_at'];


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('product_name')
            ->saveSlugsTo('slug');
    }

    public function descriptions()
    {
        return $this->hasMany('App\Model\Description','product_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Model\Category','product_categories');
    }

    public function brands()
    {
        return $this->belongsTo('App\Model\Brand','brand_id');
    }

    public function stocks(){
        return $this->hasMany(Stock::class,'product_id');
    }

    public function colorstocks()
    {
        // return $this->belongsToMany('App\Model\Color','color_stocks')->withPivot(['stock','id']);
        return $this->belongsToMany('App\Model\Color','color_stocks');
    }

    public function seo(){
        return $this->hasOne(Seo::class,'product_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }
    public function get_main_image($id){

        $main_image="";
        $product= Product::findOrFail($id);
        $images = $product->images;
        foreach ($images as $image){
            if($image->is_main == 1){
                $main_image = $image->image;
            }
        }
        return $main_image;
    }

    public function orderDetails(){
       return $this->hasMany(OrderDetail::class,'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class,'product_id');
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class,'product_id');
    }

}
