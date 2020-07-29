
@extends('customer.layouts.mainlayout')
@section('content')
    
    <!-- ? end of header -->
    <!-- ? view peoducts section -->
    <section class="view-products">
      <div class="filter">
      <form method="POST" action="{{route('filtercategorypro')}}">
          @csrf

        <p>Filter Product</p>
        <p>Choose Category</p>
        <select name="category" id="category" class="form-control">
         @foreach ($categories as $category)
             
        <option value="{{$category->id}}">{{$category->category}}</option>
          @endforeach
         
        </select>
        <p>Price Range</p>
        <label for="minimum">Minimum Price</label>
        <input
          type="text"
          name="minimum"
          id="minimum"
          placeholder="10000"
          value="0"
          class="form-control my-2"
        />
        <label for="maximum">Maximum Price</label>
        <input
          type="text"
          name="maximum"
          id="maximum"
          value="1000000"
          placeholder="1000000"
          class="form-control my-2"
        />

        <label for="">Choose Product Type</label><br />
        <input type="radio" id="brand-new" name="type" value="brandNew" />
        <label for="brand-new">Brand New</label><br />
        <input type="radio" id="second-hand" name="type" value="secondHand" />
        <label for="second-hand">Second Hand</label><br />
        <input type="radio" id="both" name="type" value="Both" />
        <label for="both">Both</label>

        <input
          type="submit"
          value="Filter"
          class="btn btn-success form-control"
        />
        </form>
      </div>

      <div class="products">
        <div class="sorting">
          sort by:
          <select name="" id="">
            <option value="">newest</option>
            <option value="">Oldest</option>
            <option value="">Lowest Price</option>
            <option value="">Highest Price</option>
          </select>
        </div>
        <div class="product-listing">
         
        
         
         @foreach($productWithCategory as $product)
          <div class="product-card">
          
          <a href="{{route('viewspecificpro',$product->id)}}" >

            <div class="img-box">

              <img
                src="{{url('/images/vendor/'.$product->user_id.'/'.$product->images()->first()->name)}}"
                alt=""
                class="product-image"
              />
            </div>
          </a>
            <div class="product-detail">
              <strong>{{$product->productname}}</strong>
            <p>Price: <span class="selling-price">{{$product->SP}}</span></p>
            <p>Mrp: <span class="mrp">{{$product->MRP}}</span> <span>35%</span></p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- ? end of view products section -->
    <!-- ? footer section -->

 

@endsection
 