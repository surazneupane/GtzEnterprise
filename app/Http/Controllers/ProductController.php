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
                $products = Auth::user()->products()->orderBy('id', 'desc')->paginate(4);
       return $this->loadListing($products);
    }
    public function loadListing($products)
    {
        $categories=Productcategory::getAllCategories()->get();
       
        return view('vendor.dashboard.listing', compact('products','categories'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $categories = Productcategory::getAllCategories()->get();
      return view('vendor.dashboard.addproduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product = $this->createProduct($request, $product);
        $insertedProduct = Auth::user()->products()->save($product);
        if ($files = $request->file('images')) {
            $this->saveImage($files, $insertedProduct);
        }
        return redirect()->back()->with('message', 'Product Uploaded Sucessfully');
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


        return "WOrking On It Soon";
        // $product=Auth::user()->products()->findOrFail($id);
        // $allCategory=Productcategory::orderBy('category')->get();
        // $dimunit=['mm','cm','inch','ft'];
        // $quantityunit=['Pcs','Kg'];
        // $dim= explode(",",$product->productdim);



        // return view('vendor.dashboard.editproduct',compact('product','allCategory','dimunit','quantityunit','dim'));
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


        $product = Auth::user()->products()->findOrFail($id);
        $images = $product->images()->get();
    $this->deleteImages($images);
        $product->delete();

        return redirect()->back()->with('error', 'Product Deleted Sucessfully');
    }
protected function deleteImages($images)
{

    foreach ($images as $image) {
        if (file_exists(public_path('images/vendor/' . Auth::id()) . '/' . $image->name)); {

            unlink((public_path('images/vendor/' . Auth::id()) . '/' . $image->name));
            $image->delete();
        }
    }
return;
}

    protected function createProduct(Request $request, Product $product)
    {

        $productdim = implode(",", [$request['length'], $request['breadth'], $request['height']]);
        $product->productname = $request['productName'];
        $product->brand = $request['brand'];
        $product->model = $request['model'];
        $product->sku = $request['sku'];
        $product->highlights = $request['highlight'];
        $product->description = $request['description'];
        $product->productdim = $productdim;
        $product->dimunit = $request['dimensionType'];
        $product->quantity = $request['quantity'];
        $product->quantityunit = $request['quantityType'];
        $product->MRP = $request['mrp'];
        $product->SP = $request['sp'];
        $product->returnaccepted = $request['returnAccept'];
        $product->returndays = $request['returnDays'];
        $product->DTD = $request['DTD'];
        $product->category_id = $request['category'];
        return $product;
    }

    protected function saveImage($files, $insertedProduct)
    {
        foreach ($files as $file) {
            $fileName = microtime() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/vendor/' . Auth::id()), $fileName);
            $insertedProduct->images()->create(['name' => $fileName]);
        }
        return;
    }

    public function makeLiveOrInactive($id)
    {
        $productToChange=Auth::User()->products()->findOrFail($id);

        if($productToChange->status=="inActive")
        {
        $productToChange->status="Live";}
        else
        {

        $productToChange->status="inActive";
        }
        $productToChange->save();

    }

    public function searchProduct(Request $request)
    {
        
        $searchReults=Product::search();
        echo "Under Construction";
        // echo $searchReults;
    }
}
