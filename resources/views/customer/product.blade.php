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
    

       <script
      type="text/javascript"
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.rawgit.com/jquery/jquery-mousewheel/3.1.12/jquery.mousewheel.js"
    ></script>
  
    <script
      type="text/javascript"
      src="https://cdn.rawgit.com/igorlino/fancybox-plus/1.3.6/src/jquery.fancybox-plus.js"
    ></script>
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.rawgit.com/igorlino/fancybox-plus/1.3.6/css/jquery.fancybox-plus.css"
      media="screen"
    />
    <script
      type="text/javascript"
      src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.17/src/jquery.ez-plus.js"
    ></script>
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.17/css/jquery.ez-plus.css"
      media="screen"
    />
    <script src="{{url('js/cart.js')}}"></script>

    <script>

      $(document).ready(function () {
        $("#productImage").ezPlus({
          // zoomType: "inner",
          cursor: "crosshair",
          scrollZoom: true,
          galleryActiveClass: "active-image",
          // imageCrossfade: true,
          // zoomWindowWidth: 400,
          // zoomWindowHeight: 300,
          // tint: true,
          // tintColour: "#F90",
          // tintOpacity: 0.5,
          easing: true,
          responsive: true,
          gallery: "gallery",
        });
        //pass the images to Fancybox
        $("#productImage").bind("click", function (e) {
          var ez = $("#productImage").data("ezPlus");
          $.fancyboxPlus(ez.getGalleryList());
          return false;
        });
      });
    </script>

    @endsection
