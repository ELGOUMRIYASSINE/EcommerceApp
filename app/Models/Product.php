<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Product extends Model
{
    public function Category(){

        return $this->belongsTo(Category::class);
    }

    // public function cart(){
    //     return $this->belongsToMany(Category::class);
    // }
}
