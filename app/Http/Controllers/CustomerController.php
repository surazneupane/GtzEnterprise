<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Productcategory;
use Illuminate\Support\Facades\Auth;
use App\Product;


class CustomerController extends Controller
{
    
    public function index()
    {
        $banners=Image::all()->where('imageable_type','App\User')->where('status','Active');
        $categories=Productcategory::getAllCategories()->get();
        $products=Product::all()->where('status','Live')->take(10);
         return view('customer.homepage',compact('banners','categories','products'));

    }

    public function viewCategoryProducts(Request $request)
    {
        $categories=Productcategory::getAllCategories()->get();
     
            if($request->method()=="POST"){

                $choosedCategory=ProductCategory::findOrFail($request['category']);
                $productWithCategory=$choosedCategory->products()->where('status','Live')->
                    where('SP','>=',$request['minimum'])->where('SP','<=',$request['maximum'])->get();
           
             }
                else{
        $choosedCategory=ProductCategory::findOrFail($request['id']);
        $productWithCategory=$choosedCategory->products()->where('status','Live')->get();
                }

        return view('customer.viewproducts',compact('productWithCategory','categories'));   

    }
    public function viewSpecificProduct(Request $request)
    {
        $productToView=Product::findOrFail($request['id']);
        return view('customer.product',compact('productToView'));
    }


    public function search(Request $request)
    {
        $searchedProducts=Product::search($request['search'])->get();
        dd($searchedProducts);

    }
   
    public function logoutCustomer()
    {
        Auth::logout();
        session()->flush();
        return redirect(route("onlineshop"));
    }

}
