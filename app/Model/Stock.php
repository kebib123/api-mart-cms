<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function size(){
        return $this->belongsTo(Size::class,'size_id');
    }

    public function colors()
    {
        return $this->belongsTo(Color::class,'color_id');
    }
}
