    
    @extends('vendor.layouts.vendordashboard')
    @section('pageTitle', 'Vendor Add Product | GTZ Online Shop')
    
        @section('content')  
    <section class="main container add-product-section">
      <h3 class="text-center">
        Add New Product
      </h3>
  
@include('vendor.layouts.message');

    <form action="{{route('product.store')}}" method="post" name="addNewProductForm" class="row form" enctype="multipart/form-data">
      @csrf
      <div class="heading col-12">What You're Selling</div>
      <p class="error-msg col-12"></p>
     <div class="form-group col-12 row">
          <label for="productName" class="col-sm-3">
            Product Name: <span class="required">*</span>
          </label>
          <input type="text" name="productName" id="productName" class="form-control col-sm-9" />
        </div>
        <div class="form-group col-12 row">
          <label for="category" class="col-sm-3">
            Product Category: <span class="required">*</span>
          </label>
          <select name="category" id="category" class="custom-select col-sm-9">
            <option value="0">Select Product Category</option>
          @foreach($categories as $category) 
          <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-12 row">
          <label for="brand" class="col-sm-3">Brand:</label>
          <input
            type="text"
            name="brand"
            id="brand"
            class="form-control col-sm-9"
          />
        </div>

        <div class="form-group col-12 row">
          <label for="model" class="col-sm-3">Model:</label>
          <input
            type="text"
            name="model"
            id="model"
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
            name="images[]"
            id="productImages"
            class="form-control-file col-sm-9"
            multiple
            accept=".jpg,.jpeg,.png"
            required
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
            class="form-control col-sm-9"
          />
        </div>
        <div class="form-group col-12">
          <label for="highlight" class="mb-2"
            >Product Highlight: <span class="required">*</span></label
          >
          <textarea name="highlight" id="highlight" cols="" rows=""></textarea>
        </div>
        <div class="form-group col-12">
          <label for="description" class="mb-2"
            >Product Description: <span class="required">*</span></label
          >
          <textarea
            name="description"
            id="description"
            cols=""
            rows=""
          ></textarea>
        </div>
        <div class="form-group col-12 row">
          <label for="dimensionType" class="col-sm-3">Product Dimenion</label>
          <select
            name="dimensionType"
            id="dimensionType"
            class="custom-select col-sm-2 mr-1"
          >
            <option value="">Select Dimension scale</option>
            <option value="mm">mm</option>
            <option value="cm">cm</option>
            <option value="in">inch</option>
            <option value="ft">ft</option>
          </select>
          <input
            type="number"
            name="length"
            id="length"
            class="form-control col-sm-2 mx-1 dimension-input"
            placeholder="Lenght"
            min="0"
            disabled
          />
          <input
            type="number"
            name="breadth"
            id="breadth"
            class="form-control col-sm-2 mx-1 dimension-input"
            placeholder="Breadth"
            min="0"
            disabled
          />
          <input
            type="number"
            name="height"
            id="height"
            class="form-control col-sm-2 ml-1 dimension-input"
            placeholder="Height"
            min="0"
            disabled
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
            <option value="" selected>Select Quantity Type</option>
            <option value="Pcs">Pcs</option>
            <option value="Kg">Kg</option>
          </select>
          <input
            type="number"
            name="quantity"
            id="quantity"
            class="form-control col-sm-2 ml-2"
            min="0"
            placeholder="Quantity"
            disabled
          />
        </div>
        <div class="form-group col-12 row">
          <label for="status" class="col-sm-3">
            Product Status: <span class="required">*</span>
          </label>
          <select name="status" id="status" class="custom-select col-sm-3">
            <option value="" selected>Select One</option>
            <option value="Active">Active</option>
            <option value="InActive">In-Active</option>
          </select>
        </div>
        <div class="form-group col-12 row">
          <label for="mrp" class="col-sm-3">MRP</label>
          <input
            type="number"
            name="mrp"
            id="mrp"
            min="0"
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
            <option value="0" selected>Select One</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
          <input
            type="number"
            name="returnDays"
            id="returnDays"
            placeholder="Days"
            min="0"
            class="form-control col-sm-1 ml-2"
            disabled
          />
        </div>
        <div class="col-12 my-2 text-center">
          <input type="submit" value="Save Draft" name="needDraft" class="btn btn-secondary my-1 mx-1"/>
          <input
          name="needAdmin"
            type="submit"
            value="Submit"
            class="btn btn-success my-1 mx-1"
          />
          <input type="reset" value="Reset" class="btn btn-warning my-1 mx-1" />
        </div>
      </form>
    </section>

    
@endsection