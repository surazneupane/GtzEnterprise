<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    

    protected $searchable=['productname','category_id','brand','model','sku',];


protected $fillable=['productname','brand','model','sku',
'highlights','description','productdim','quantity','MRP','SP','status'
,'returnaccepted','DTD','requireapproval','category_id','dimunit','quantityunit'];
public function images()
{

    return $this->morphMany('App\Image','imageable');
}


public function category()
{

    return $this->belongsTo('App\Productcategory');
}


}
