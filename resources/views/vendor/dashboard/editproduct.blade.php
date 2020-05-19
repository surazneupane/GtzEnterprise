@extends('vendor.layouts.vendordashboard')
@section('pageTitle', 'Vendor Edit Product | GTZ Online Shop')

    @section('content')  

<section class="main container add-product-section">
    <h3 class="text-center">
      Edit Product
    </h3>
    <form action="#" method="post" name="addNewProductForm" class="row form">
      <div class="heading col-12">What You're Selling</div>
      <p class="error-msg col-12"></p>
      <div class="form-group col-12 row">
        <label for="productName" class="col-sm-3">
          Product Name: <span class="required">*</span>
        </label>
        <input
          type="text"
          name="productName"
          id="productName"
          class="form-control col-sm-9"
    value="{{$product->productname}}"
          />
      </div>
      <div class="form-group col-12 row">
        <label for="category" class="col-sm-3">
          Product Category: <span class="required">*</span>
        </label>
        <select name="category" id="category" class="custom-select col-sm-9">
        <option value="{{$product->category_id}}">{{$product->category()->first()->category}}</option>
      @foreach($allCategory as $category)
            @if($category->id!=$product->category_id)
        <option value="{{$category->id}}">{{$category->category}}</option>
       @endif
        @endforeach
        </select>
      </div>

      <div class="form-group col-12 row">
        <label for="brand" class="col-sm-3">Brand:</label>
        <input
          type="text"
          name="brand"
          id="brand"
          value="{{$product->brand}}"
          class="form-control col-sm-9"
        />
      </div>

      <div class="form-group col-12 row">
        <label for="model" class="col-sm-3">Model:</label>
        <input
          type="text"
          name="model"
          id="model"
      value="{{$product->model}}"
          class="form-control col-sm-9"
        />
      </div>
      <div class="heading col-12">Basic Information</div>
      <div class="form-group col-12 row">
        <label for="productImages" class="col-sm-3"
          >Upload Product: <span class="required">*</span></label
        >
        <input
          type="file"
          name="productImages"
          id="productImages"
          class="form-control-file col-sm-9"
          multiple
          accept=".jpg,.jpeg,.png"
        />
      </div>
      <div class="form-group col-12 row">
        <label for="sku" class="col-sm-3"
          >SKU: <span class="required">*</span></label
        >
        <input
          type="text"
          name="sku"
          id="sku"
      value="{{$product->sku}}"
          class="form-control col-sm-9"
        />
      </div>
      <div class="form-group col-12">
        <label for="highlight" class="mb-2"
          >Product Highlight: <span class="required">*</span></label
        >
      <textarea name="highlight" id="highlight"  cols="" rows="">{{$product->highlights}}</textarea>
      </div>
      <div class="form-group col-12">
        <label for="description" class="mb-2"
          >Product Description: <span class="required">*</span></label
        >
        <textarea name="description" id="description" cols="" rows="">
   {{$product->description}}     </textarea>
      </div>
      <div class="form-group col-12 row">
        <label for="dimensionType" class="col-sm-3">Product Dimenion</label>
        <select
          name="dimensionType"
          id="dimensionType"
          class="custom-select col-sm-2 mr-1"
        >

      <option value="{{$product->dimunit}}">{{$product->dimunit}}</option>
    @foreach ($dimunit as $unit)
    @if($product->dimunit!=$unit)
        <option value="{{$unit}}">{{$unit}}</option>
        @endif
      @endforeach

   


</select>


<input
          type="number"
          name="length"
          id="length"
          class="form-control col-sm-2 mx-1 dimension-input"
          placeholder="Length"
value="{{$dim[0]}}"
          min="0"
          
        />
        <input
          type="number"
          name="breadth"
          id="breadth"
          class="form-control col-sm-2 mx-1 dimension-input"
          placeholder="Breadth"
value="{{$dim[1]}}"
          min="0"
         
        />
        <input
          type="number"
          name="height"
          id="height"
          class="form-control col-sm-2 ml-1 dimension-input"
          placeholder="Height"
value="{{$dim[2]}}"
          min="0"
        />
      </div>

    

      <div class="form-group col-12 row">
        <label for="quantityType" class="col-sm-3">
          Quantity:
        </label>
        <select
          name="quantityType"
          id="quantityType"
          class="custom-select col-sm-2"
        >
    <option value="{{$product->quantityunit}}" selected>{{$product->quantityunit}}</option>
    @foreach($quantityunit as $unit)
    @if ($product->quantityunit!=$unit)
        
      <option value="{{$unit}}">{{$unit}}</option>
@endif
      @endforeach
        </select>
        <input
          type="number"
          name="quantity"
          id="quantity"
          class="form-control col-sm-2 ml-2"
          min="0"
          value="{{$product->quantity}}"
          placeholder="Quantity"
          
        />
      </div>
      <div class="form-group col-12 row">
        <label for="status" class="col-sm-3">
          Product Status: <span class="required">*</span>
        </label>
        <select name="status" id="status" class="custom-select col-sm-3">
        <option value="{{$product->status}}" selected>{{$product->status}}</option>
          @if($product->status!="Active")
        <option value="Active">Active</option>
        @endif
        @if($product->status!="InActive")  
        <option value="InActive">In-Active</option>
    @endif    
    </select>
      </div>
      <div class="form-group col-12 row">
        <label for="mrp" class="col-sm-3">MRP</label>
        <input
          type="number"
          name="mrp"
          id="mrp"
          min="0"
          value="{{$product->MRP}}"
          class="form-control col-sm-3"
          placeholder="MRP"
        />
        <label for="sp" class="col-sm-3"
          >Selling Price: <span class="required">*</span></label
        >
        <input
          type="number"
          name="sp"
          id="sp"
          min="0"
          value="{{$product->SP}}"
          class="form-control col-sm-3"
          placeholder="Selling Price"
        />
      </div>
      <div class="form-group col-12 row">
        <label for="DTD" class="col-sm-3">
          Days to Dispatch: <span class="required">*</span>
        </label>
        <input
          type="number"
          name="DTD"
          id="DTD"
          min="0"
          value="{{$product->DTD}}"
          class="form-control col-sm-3"
          placeholder="Days to dispatch"
        />
        <label for="returnAccept" class="col-sm-3">
          Return Accepted: <span class="required">*</span>
        </label>
        <select
          name="returnAccept"
          id="returnAccept"
          class="custom-select col-sm-1"
        >
    <option value="{{$product->returnaccepted}}" selected>{{$product->returnaccepted}}</option>
    @if($product->returnaccepted!="yes")     
    <option value="yes">Yes</option>
    @endif
@if($product->returnaccepted!="no")
    <option value="no">No</option>
    @endif
        </select>
        <input
          type="number"
          name="returnDays"
          id="returnDays"
          placeholder="Days"
          min="0"
          value="{{$product->returndays}}"
          class="form-control col-sm-1 ml-2"
        />
      </div>
      <div class="col-12 my-2 text-center">
        <input
          type="submit"
          value="Update"
          class="btn btn-success my-1 mx-1"
        />
        <input type="reset" value="Reset" class="btn btn-warning my-1 mx-1" />
      </div>
    </form>

    <div class="manage-product-image my-4">
      <h5 class="text-center">Product Images</h5>
    @foreach($product->images()->get() as $image)
     
      <div class="col-12 product-image-div">
      
        <div>

        <img src="{{url('images/vendor/'.Auth::id().'/'.$image->name)}}" alt="" />
          <form action="#">
            <input
              type="submit"
              value="delete"
              class="btn delete material-icons "
            />
          </form>
      
        </div>
      
     
    </div>
    @endforeach


    </div>
  </section>

  @endsection