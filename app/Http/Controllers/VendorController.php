<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Product;

class VendorController extends Controller
{
    //


    public function index()
    {


        return view('vendor.dashboard.dashboard');
    }


    public function viewOrders()
    {
        
        $products=Auth::user()->products()->get();
       $orders=array();
      foreach($products as $product)
      {
          foreach($product->orders()->orderBy('id','desc')->get() as $order)
          {
            array_push($orders,$order);

          }
      }
    return view('vendor.dashboard.orders',compact('orders'));        
    }
   
    public function showOrder($orderid,$productid)
    {

        $orderSpecific=Order::findOrFail($orderid);
        $productOrder=$orderSpecific->products()->where('product_id',$productid)->first();
         return view('vendor.dashboard.vieworder',compact('orderSpecific','productOrder'));
    }

    public function orderStatus($btn,$orderid,$productid)
    {
        $orderStatus;
        
        $orderSpecific=Order::findOrFail($orderid);
        $productOrder=$orderSpecific->products()->where('product_id',$productid)->first();
       
        if($btn=="rts")
        $productOrder->pivot->status="RTS";
        else
        $productOrder->pivot->status="OFS";
        $productOrder->pivot->save();


        foreach($orderSpecific->products()->get() as $product)
        {
            if($product->pivot->status=="RTS")
                 {
            $orderStatus="RTS";
                 }
            else{
                 $orderStatus="pending";
                 break;
              }
                }
                
                $orderSpecific->orderstatus=$orderStatus;
                $orderSpecific->update();
        
        
            return redirect(route('vieworders'));
        

    }

  
    public function logoutVendor()
    {
        Auth::logout();
        return redirect('/vendor/signin');
    }
}
