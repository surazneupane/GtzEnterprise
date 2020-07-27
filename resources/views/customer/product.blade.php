@extends('customer.layouts.mainlayout')
@section('content')
    
    <!-- ? end of header -->
    <div class="directory container">
      <a href="#">Home</a> / <a href="#">Category</a> /
      <a href="#">Sub-category</a> / <a href="#">Product-Name</a>
    </div>

    <!-- ? product section -->
    <section class="product container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-sm-12 image-box container-fluid">
          <img
            src="{{url('/images/vendor/'.$productToView->user_id.'/'.$productToView->images()->first()->name)}}"
            alt=""
            id="productImage"
            class="main-image"
          />
          <div class="image-selection" id="gallery">
            @foreach ($productToView->images()->get() as $image)
                
            <div class="image-item">
              <a
                href="#"
                class="elevatezoom-gallery active-image"
                data-update=""
                data-image="{{url('/images/vendor/'.$productToView->user_id.'/'.$image->name)}}"
                data-zoom-image="{{url('/images/vendor/'.$productToView->user_id.'/'.$image->name)}}"
              >
                <img src="{{url('/images/vendor/'.$productToView->user_id.'/'.$image->name)}}" alt="" class="img-opt" />
              </a>
            </div>
            @endforeach

         
         
          
          </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 product-detail">
          <!-- TODO product detail and style -->
          <h3 class="product-name">
          {{$productToView->productname}}
          </h3>

          <?php $owner=$productToView->user()->first(); ?>

          <p>by <a href="#">{{$owner->fname.' '.$owner->lname}}</a></p>
          <p class="rating">
            <span class="material-icons">
              star star star star_half star_outline
            </span>
            no rating
          </p>
          <div class="buttons-div">
          <a id="btnAddToCart" href="{{route('addtocart',$productToView->id)}}" class="btn btn-success">Add to Cart</a>
           <a href="{{route('checkout', ["id"=>$productToView->id])}}" class="btn btn-success">Buy Now</a>
            <span class="material-icons favorite">
              favorite
            </span>
          </div>
          <hr />
          <p class="product-state">In Stock</p>
          <div class="product-highlight">
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim,
              sequi architecto. Nihil omnis voluptates doloribus quas quam
              molestiae quia eius.
            </p>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim,
              sequi architecto. Nihil omnis voluptates doloribus quas quam
              molestiae quia eius.
            </p>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim,
              sequi architecto. Nihil omnis voluptates doloribus quas quam
              molestiae quia eius.
            </p>
          </div>
        </div>
        <div class="col-12">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil fugit
          praesentium architecto eius facere qui voluptates adipisci beatae hic,
          aperiam cumque inventore optio sint ullam, possimus in. Quisquam,
          optio fugit.
        </div>
      </div>
    </section>
    <!-- ? end of product section -->
    
    @endsection
