<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Productcategory;
class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

$products=Auth::user()->products()->get();
 return view('vendor.dashboard.listing',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Productcategory::orderBy('category')->get();
        return view('vendor.dashboard.addproduct',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

$requireAdminApproval='NoDraft';
 if($request['needAdmin']!=null)
 {

   $requireAdminApproval='Yes';
 }




$productdim=implode(",",[$request['length'],$request['breadth'],$request['height']]);
$product=new Product;
$product->requireapproval=$requireAdminApproval;
$product->category_id=$request['category'];
$insertedProduct= Auth::user()->products()->save($product);


if($files=$request->file('images'))
{

foreach($files as $file)
{
 $fileName=microtime().'_'.$file->getClientOriginalName();
$file->move(public_path('images/vendor/'.Auth::id()),$fileName);
$insertedProduct->images()->create(['name'=>$fileName]);  
}


}

return redirect()->back()->with('message','Product Uploaded Sucessfully');

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
  {


        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $product=Auth::user()->products()->findOrFail($id);
        $allCategory=Productcategory::orderBy('category')->get();
        $dimunit=['mm','cm','inch','ft'];
        $quantityunit=['Pcs','Kg'];
        $dim= explode(",",$product->productdim);


        
        return view('vendor.dashboard.editproduct',compact('product','allCategory','dimunit','quantityunit','dim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Auth::user()->products()->findOrFail($id);
        $images=$product->images()->get();        
        foreach($images as $image)
        {
            if(file_exists(public_path('images/vendor/'.Auth::id()).'/'.$image->name));
            {

                unlink((public_path('images/vendor/'.Auth::id()).'/'.$image->name));
                $image->delete();
               
            }

        }
        $product->delete();

        return redirect()->back()->with('message','Product Deleted Sucessfully');

    }




  
 

}
