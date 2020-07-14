@extends('customer.layouts.mainlayout')

    <!-- ? end of header -->

    <!-- ? start of banner -->
    <!-- ? banner carousel -->
    @section('content')
        
    <section class="banner">
      <div id="banner_slider" class="carousel slide" data-ride="carousel">
        <!-- !indicators -->
        <ol class="carousel-indicators">
          <li
            data-target="#banner_slider"
            data-slide-to="0"
            class="active"
          ></li>
         @for($i=1;$i<count($banners);$i++)
         
        <li data-target="#banner_slider" data-slide-to="{{$i}}"></li>
          @endfor
        </ol>
        <!-- !wrapper Slider -->
        <div class="carousel-inner" role="listbox">

         
         @foreach ($banners as $banner)
       
        <div class="carousel-item @if($loop->index==0) active @endif">
            <img
          src="{{url('/images/banners/'.$banner->name)}}"
          alt="{{$banner->name}}"
              width="100%"
            />
            <div class="carousel-caption">
              <h1>  This is Banner </h1>
              <p>this is banner</p>
            </div>
          </div>
        
          @endforeach
        
        </div>
        <!-- !controls or next and pre btns -->
        <a
          class="carousel-control-prev"
          href="#banner_slider"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#banner_slider"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>
    <!-- ? end of banner -->

    <!-- ? start of category -->
    <section class="category container">
      @foreach ($categories as $category)
          
      <div class="category-item box">
        <div class="img-box">
        <img src="{{url('/images/categoryimage/'.$category->image()->first()->name)}}" alt="Clothing" />
        </div>
        <h5>{{$category->category}}</h5>
      </div>
      @endforeach

       <a href="#" class="btn btn-category">View All Categories</a>
    </section>
    <!-- ? end of category -->
    <!-- ? start of male gener category -->
    <section class="gender-category">
      <h3 class="text-center">For Him</h3>
      <hr class="my-2" />

      <div class="owl-carousel owl-theme container">
        <div class="gender-category-item">
          <img src="./static/images/watch.png" alt="" />
          <h5>Watch</h5>
        </div>
        <div class="gender-category-item">
          <img src="./static/images/suit.png" alt="" />
          <h5>Men's Fashion</h5>
        </div>
        <div class="gender-category-item">
          <img src="./static/images/wallet.png" alt="" />
          <h5>Wallet</h5>
        </div>
        <div class="gender-category-item">
          <img src="./static/images/shoe.png" alt="" />
          <h5>Shoes</h5>
        </div>
        <div class="gender-category-item">
          <img src="./static/images/suit.png" alt="" />
          <h5>Men's Fashion</h5>
        </div>
        <div class="gender-category-item">
          <img src="./static/images/shoe.png" alt="" />
          <h5>Shoes</h5>
        </div>
      </div>
    </section>
    <!-- ? end of male gender category -->
    <!-- ? start of female gener category -->
    <section class="gender-category">
      <h3 class="text-center">For Her</h3>
      <hr class="my-2" />

      <div class="owl-carousel owl-theme container">
        <div class="gender-category-item">
          <img src="./static/images/watch.png" alt="" />
          <h5>Watch</h5>
        </div>
        <div class="gender-category-item">
          <img src="./static/images/suit.png" alt="" />
          <h5>Men's Fashion</h5>
        </div>
        <div class="gender-category-item">
          <img src="./static/images/wallet.png" alt="" />
          <h5>Wallet</h5>
        </div>
        <div class="gender-category-item">
          <img src="./static/images/shoe.png" alt="" />
          <h5>Shoes</h5>
        </div>
        <div class="gender-category-item">
          <img src="./static/images/suit.png" alt="" />
          <h5>Men's Fashion</h5>
        </div>
        <div class="gender-category-item">
          <img src="./static/images/shoe.png" alt="" />
          <h5>Shoes</h5>
        </div>
      </div>
    </section>
    <!-- ? end of female gender category -->
    @endsection
   