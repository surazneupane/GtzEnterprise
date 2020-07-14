
@extends('customer.layouts.mainlayout')
@section('content')
    
    <!-- ? end of header -->
    <!-- ? view peoducts section -->
    <section class="view-products">
      <div class="filter">
        <p>Filter Product</p>
        <p>Choose Category</p>
        <select name="category" id="category" class="form-control">
          <option value="">category 1</option>
          <option value="">category 2</option>
          <option value="">category 3</option>
          <option value="">category 4</option>
          <option value="">category 5</option>
          <option value="">category 6</option>
          <option value="">category 7</option>
          <option value="">category 8</option>
          <option value="">category 9</option>
          <option value="">category 10</option>
        </select>
        <p>Price Range</p>
        <label for="minimum">Minimum Price</label>
        <input
          type="text"
          name="minimum"
          id="minimum"
          placeholder="10000"
          class="form-control my-2"
        />
        <label for="maximum">Maximum Price</label>
        <input
          type="text"
          name="maximum"
          id="maximum"
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
          <div class="product-card">
            <div class="img-box">
              <img src="./static/images/op8.jpg" alt="" class="product-image" />
            </div>
            <div class="product-detail">
              <strong>Oneplus 8 Pro Vip Edition</strong>
              <p>Price: <span class="selling-price">Rs.35000</span></p>
              <p>Mrp: <span class="mrp">Rs.45000</span> <span>35%</span></p>
            </div>
          </div>
          <div class="product-card">
            <div class="img-box">
              <img
                src="./static/images/shoe.png"
                alt=""
                class="product-image"
              />
            </div>
            <div class="product-detail">
              <strong>Oneplus 8 Pro Vip Edition</strong>
              <p>Price: <span class="selling-price">Rs.35000</span></p>
              <p>Mrp: <span class="mrp">Rs.45000</span> <span>35%</span></p>
            </div>
          </div>
          <div class="product-card">
            <div class="img-box">
              <img
                src="./static/images/clothing.png"
                alt=""
                class="product-image"
              />
            </div>
            <div class="product-detail">
              <strong>Oneplus 8 Pro Vip Edition</strong>
              <p>Price: <span class="selling-price">Rs.35000</span></p>
              <p>Mrp: <span class="mrp">Rs.45000</span> <span>35%</span></p>
            </div>
          </div>
          <div class="product-card">
            <div class="img-box">
              <img
                src="./static/images/iphone.jpg"
                alt=""
                class="product-image"
              />
            </div>
            <div class="product-detail">
              <strong>Oneplus 8 Pro Vip Edition</strong>
              <p>Price: <span class="selling-price">Rs.35000</span></p>
              <p>Mrp: <span class="mrp">Rs.45000</span> <span>35%</span></p>
            </div>
          </div>
          <div class="product-card">
            <div class="img-box">
              <img
                src="./static/images/suit.jpg"
                alt=""
                class="product-image"
              />
            </div>
            <div class="product-detail">
              <strong>Oneplus 8 Pro Vip Edition</strong>
              <p>Price: <span class="selling-price">Rs.35000</span></p>
              <p>Mrp: <span class="mrp">Rs.45000</span> <span>35%</span></p>
            </div>
          </div>
          <div class="product-card">
            <div class="img-box">
              <img src="./static/images/cpu.png" alt="" class="product-image" />
            </div>
            <div class="product-detail">
              <strong>Oneplus 8 Pro Vip Edition</strong>
              <p>Price: <span class="selling-price">Rs.35000</span></p>
              <p>Mrp: <span class="mrp">Rs.45000</span> <span>35%</span></p>
            </div>
          </div>
          <div class="product-card">
            <div class="img-box">
              <img
                src="./static/images/laptop.jpg"
                alt=""
                class="product-image"
              />
            </div>
            <div class="product-detail">
              <strong>Oneplus 8 Pro Vip Edition</strong>
              <p>Price: <span class="selling-price">Rs.35000</span></p>
              <p>Mrp: <span class="mrp">Rs.45000</span> <span>35%</span></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ? end of view products section -->
    <!-- ? footer section -->
@endsection
 