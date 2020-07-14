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
            src="./static/images/laptop.jpg"
            alt=""
            id="productImage"
            class="main-image"
          />
          <div class="image-selection" id="gallery">
            <div class="image-item">
              <a
                href="#"
                class="elevatezoom-gallery active-image"
                data-update=""
                data-image="./static/images/laptop.jpg"
                data-zoom-image="./static/images/laptop.jpg"
              >
                <img src="./static/images/laptop.jpg" alt="" class="img-opt" />
              </a>
            </div>
            <div class="image-item">
              <a
                href="#"
                class="elevatezoom-gallery"
                data-update=""
                data-image="./static/images/laptop1.png"
                data-zoom-image="./static/images/laptop1.png"
              >
                <img src="./static/images/laptop1.png" alt="" class="img-opt" />
              </a>
            </div>
            <div class="image-item">
              <a
                href="#"
                class="elevatezoom-gallery"
                data-update=""
                data-image="./static/images/laptop2.jpg"
                data-zoom-image="./static/images/laptop2.jpg"
              >
                <img src="./static/images/laptop2.jpg" alt="" class="img-opt" />
              </a>
            </div>
            <div class="image-item">
              <a
                href="#"
                class="elevatezoom-gallery slide-content"
                data-update=""
                data-image="./static/images/laptop3.jpg"
                data-zoom-image="./static/images/laptop3.jpg"
              >
                <img src="./static/images/laptop3.jpg" alt="" class="img-opt" />
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 product-detail">
          <!-- TODO product detail and style -->
          <h3 class="product-name">
            Lenovo Flex 14 2-in-1 Convertible Laptop, 14 Inch FHD Touchscreen
            Display, AMD Ryzen 5 3500U Processor, 12GB DDR4 RAM, 256GB NVMe SSD,
            Windows 10, 81SS000DUS, Black, Pen Included 4.4 out of 5 stars 1,439
          </h3>
          <p>by <a href="#">Seller-name</a></p>
          <p class="rating">
            <span class="material-icons">
              star star star star_half star_outline
            </span>
            no rating
          </p>
          <div class="buttons-div">
            <button class="btn btn-success">Add to Cart</button>
            <button class="btn btn-success">Buy Now</button>
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
