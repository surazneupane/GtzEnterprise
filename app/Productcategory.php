<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productcategory extends Model
{
    //

    protected $fillable =['category'];



    public static function getAllCategories()
    {
        return Productcategory::orderBy('category')->paginate(4);

    }

    public function products()
    {

        return $this->hasMany('App\Product','category_id');
    }

    public function image()
    {
        return $this->morphOne('App\Image','imageable');

        
    }
}

