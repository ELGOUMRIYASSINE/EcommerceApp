<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;

class Category extends Model
{
    public function products(){
        return hasMany(Product::class);
    }
}
