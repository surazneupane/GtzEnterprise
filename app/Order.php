<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

   protected $fillable=['buyer_id','checkoutname','checkoutphone','checkoutregion','checkoutcity','checkoutaddress'];
    public function products()
    {

        return $this->belongsToMany('App\Product')->withPivot('product_id','vendor_id','order_id','quantity','status','total');
    }
}
