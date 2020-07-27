<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProductCategory;
use App\User;
use App\Image;
use App\Order;

class AdminController extends Controller
{


    public function index()
    {

        return view('admin.dashboard');
    }

    public function showUsers()
    {
        $users=User::all();
        return view('admin.users',compact('users'));

    }

    public function showCategory()
    {
        $categories=Productcategory::getAllCategories()->paginate(4);
        return view('admin.category',compact('categories'));
    }
    
    public function showBanner()
    {
        $banners=Auth::user()->images()->get();
        return view('admin.banner',compact('banners'));
    }

    public function addBanner(Request $request)
    {
        $files=$request->file('images');
        $defaultStatus='Active';
         foreach ($files as $file) {
            $fileName = microtime() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/banners/'), $fileName);
         Auth::user()->images()->create(['name' => $fileName,'status'=> $defaultStatus]);

        }
        return redirect()->back()->with('message', 'Banners Added Sucessfully');

        

    }
    public function editBannerStats(Request $request)
    {
        $bannerToEdit=Auth::user()->images()->findOrFail($request['id']);
        if($bannerToEdit->status=='Active')
        {
            $bannerToEdit->status='InActive';

        }
        else{

            $bannerToEdit->status='Active';
        }
        
       $bannerToEdit->update();
       return redirect()->back()->with('message', 'Banner Changed Sucessfully');

    }

    public function deleteBanner(Request $request)
    {
     $bannerToDelete=  Auth::user()->images()->findOrFail($request['id']);
   if (file_exists(public_path('images/banners/'.$bannerToDelete->name))) {
        unlink((public_path('images/banners/' .$bannerToDelete->name)));
      }
      $bannerToDelete->delete();
     return redirect()->back()->with('error', 'Banner Deleted Sucessfully');



    }
    public function addCategory(Request $request)
    {
       
        $createdCategory=ProductCategory::create(['category'=>$request['category']]);
        $image=$request->file('image');
        $fileName = microtime() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images/categoryimage/'), $fileName);
        $createdCategory->image()->create(['name' => $fileName]);
        return redirect()->back()->with('message', 'Category Added Sucessfully');
    }
    public function deleteCategory(Request $request)
    {
       $categoryToDelete= ProductCategory::findOrFail($request['id']);
       $imageTodelete=$categoryToDelete->image()->first();
        if (file_exists(public_path('images/categoryimage/'.$imageTodelete['name']))) {
           
            unlink((public_path('images/categoryimage/'.$imageTodelete['name'])));
          }
         $categoryToDelete->image()->delete();
          $categoryToDelete->delete();
        return redirect()->back()->with('error', 'Category Deleted Sucessfully');


    }
    public function editCategory(Request $request)
    {

        $updateCategory=ProductCategory::findOrFail($request['id']);
         $updateCategory->update(['category'=>$request['category']]);
        return redirect()->back()->with('message', 'Category Updated Sucessfully');

    }

    public function viewOrders()
    {   
        $orders=Order::all()->sortByDesc('id');

        return view('admin.vieworders',compact('orders'));
    }

    public function viewOrder($id)
    {
        $specificOrder=Order::findOrFail($id);
        return view('admin.vieworder',compact('specificOrder'));

    }

    public function completeOrder($id)
    {
        $completedOrder=Order::findOrfail($id);
        $completedOrder->orderstatus="Completed";
        $completedOrder->update();
        return redirect()->back();
    
    }
    public function adminLogout()
    {
        Auth::logout();
        return redirect('/vendor/signin');


    }
    //
}
