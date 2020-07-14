<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Productcategory;


class CustomerController extends Controller
{
    public function index()
    {
        $banners=Image::all()->where('imageable_type','App\User')->where('status','Active');
        $categories=Productcategory::getAllCategories();
        return view('customer.homepage',compact('banners','categories'));

    }
}
