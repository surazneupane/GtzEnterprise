@extends('customer.layouts.mainlayout')
@section('content')

    <!-- ? end of header -->
    <!-- ? view peoducts section -->
    <section class="checkout">
    <form action="{{route('placeorder')}}" method="POST">
          @csrf
        <div class="checkout-wrapper">
          <div class="row">
            <div class="col-md-12 col-lg-7">
              <div class="p-5 delivery-details">
                <h4>Delivery information</h4>
                <div class="form-group">
                  <label for="name">Full name</label>
                  <input
                value="{{Auth::user()->fname.' '.Auth::user()->lname}}"
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    placeholder="Enter yout first and last name"
                    required
                    minlength="5"
                  />
                </div>
                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input
                value="{{Auth::user()->mobileNumber}}"
                    type="Number"
                    class="form-control"
                    name="phone"
                    required
                    placeholder="Please enter your phone number"
                    minlength="10"
                    maxlength="10"
                  />
                </div>

                <div class="form-group">
                  <label for="region">Region</label>
                  <input
                    type="text"
                    name="region"
                    required
                    id="region"
                    class="form-control"
                    placeholder="Enter your region"
                    
                  />
                </div>
                <div class="form-group">
                  <label for="city">City</label>
                  <input
                    type="text"
                    name="city"
                    required
                    id="city"
                    class="form-control"
                    placeholder="Enter your city"
                  />
                </div>

                <div class="form-group">
                  <label for="address">Address</label>
                  <input
                    type="text"
                    name="address"
                    required
                    id="address"
                    class="form-control"
                    placeholder="For Example: House# 123, Street# 123, ABC Road"
                  />
                </div>
              </div>
              <div class="p-5 checkout-products">
                <div class="text-white bg-info p-1 mb-4">
                  <div class="text-center">
                    Total items: 
                  </div>
                </div>
                <table>
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th class="text-center">Price</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-center">Total</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       @foreach ($productsToBuy=session()->get('productsToBuy') as $product)
                           
                    
                            
                      <td width="300" class="d-flex align-items-center">
                        <img
                          src="{{url('/images/vendor/'.$product->user_id.'/'.$product->images()->first()->name)}}"
                          alt=""
                          width="70"
                          height="70"
                          class="p-1"
                        />
                        <strong class="ellipsis" data-maxLength="25"
                      >{{$product->productname}}</strong
                        >
                      </td>
                      <td class="px-4">
                 Rs.  {{$product->SP}}
                      </td>
                      <td class="px-4">
                        Qty: {{$product->quantity}}
                      </td>
                      <td>Rs. {{$product->totalAmount}}  </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-lg-5 col-md-12 mt-5">
              <div class="payment">
                <h4>Order Summary</h4>
                <div
                  class="d-flex justify-content-between align-items-center mt-4"
                >
                  <p>Sub Total ( items)</p>
              <strong>{{$subTotal}}</strong>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <p>Shipping Fee</p>

                  <?php
                  //as if we are using inside valley concept it can be changed or can be made dynamic later on
                  $shippingFee=150
                  ?>

                  <strong>Rs. {{$shippingFee}} </strong>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <p>Total Amount</p>
                <strong class="text-danger">Rs.{{$shippingFee+$subTotal}}</strong>
                </div>
                <div class="d-flex">
                  <input
                    type="submit"
                    value="Place Your Order"
                    class="btn btn-info form-control"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    @endsection

    <!-- ? end of view products section -->
    <!-- ? footer section -->
  