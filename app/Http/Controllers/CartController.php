<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class CartController extends Controller
{
    
    public function addToCart(Request $request)
    {
        $productToBuy=Product::findOrFail($request['id']);
            $cart=session()->get('cart');
            //if cart doesnot exists on session
                         if(!$cart)
                            {
               $cart=[
                   $request['id'],
                    ];  
                 }

                    //if cart already exits
                    else{

                        array_push($cart,$request['id']);

                    }
   
                    session()->put('cart',$cart);
                 return sizeof($cart);
   
                }

                public function checkOut()
                {
                    $getCart=session()->get('cart');
                    if(!$getCart)
                    {
                        return redirect()->back();
                    }
                    $ocuurancesProduct=array_count_values($getCart);
                   $productsToBuy=array();
                   $subTotal=0;
                    foreach($ocuurancesProduct as $productId => $quantity)
                    {
                       $product=Product::findOrFail($productId);
                       $product->quantity=$quantity;
                        $product->totalAmount=$quantity*$product->SP;
                        $subTotal=$product->totalAmount+$subTotal;
                       array_push($productsToBuy,$product);
                       
                    }
                    session()->put('productsToBuy',$productsToBuy);
                   return view('customer.checkout',compact('subTotal'));
                }

                public function placeOrder(Request $request)
                {
                  $order=new Order;
                  $order->checkoutname=$request['name'];
                  $order->checkoutphone=$request['phone'];
                  $order->checkoutregion=$request['region'];
                  $order->checkoutcity=$request['city'];
                  $order->checkoutaddress=$request['address'];
                  //default pending intial phase
                  $order->orderstatus="pending";
                  $order->buyer_id=Auth::user()->id;
                 foreach($productsToBuy=session()->get('productsToBuy') as $product)
                 {
                  $order->save();
                  $order->products()->attach($product->id,['quantity'=>$product->quantity,'status'=>'pending','vendor_id'=>$product->user_id,'total'=>$product->quantity*$product->SP]);
                
                }
                 $request->session()->forget('cart');
                 $request->session()->forget('productsToBuy');

                 echo "Thank you";


                }


}
