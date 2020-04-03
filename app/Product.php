<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{


    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }


}
