@extends('vendor.layouts.vendordashboard')
@section('pageTitle', 'Vendor Dashboard | GTZ Online Shop')

@section('content')

    <section class="main container">
      <div class="row">
        <div class="col-12 text-center">
          <h3>Order Detail</h3>
        </div>
        <div class="col-12 row">
          <div class="col-md-3">
            <p>Product Id:</p>
          </div>
          <div class="col-md-9">
          <p class="product-id">{{$productOrder->id}}</p>
          </div>
          <div class="col-md-3">
            <p>Product Name :</p>
          </div>
          <div class="col-md-9">
            <p class="product-name">
            {{$productOrder->productname}}
            </p>
          </div>

          <div class="col-md-3">
            <p>SKU:</p>
          </div>
          <div class="col-md-9">
            <p class="quantity">{{$productOrder->sku}}</p>
          </div>
          <div class="col-md-3">
            <p>Quantity</p>
          </div>
          <div class="col-md-9">
            <p class="quantity">{{$productOrder->pivot->quantity}} pcs</p>
          </div>
          <div class="col-md-3">
            <p>Customer Id:</p>
          </div>
          <div class="col-md-9">
            <p class="customer-id">{{$orderSpecific->buyer_id}}</p>
          </div>
          <div class="col-md-3">
            <p>Customer Name</p>
          </div>
          <div class="col-md-9">
          <p class="customer-name">{{$orderSpecific->checkoutname}}</p>
          </div>
          <div class="col-md-3">
            <p>Price</p>
          </div>
          <div class="col-md-9">
            <p>Rs. {{$productOrder->SP}} per pcs</p>
          </div>
          <div class="col-md-3">
            <p>Total Price:</p>
          </div>
          <div class="col-md-9">
          <p class="total-price">Rs {{$productOrder->pivot->total}}</p>
          </div>
          <div class="col-md-3">
            <p>Order Status:</p>
          </div>
          <div class="col-md-9">
            <p class="order-status">{{$productOrder->pivot->status}}</p>
          </div>
          <div class="col-12">
            <a href="{{route('RTS',['btn'=>'ofs','orderid'=>$orderSpecific->id,'productid'=>$productOrder->id])}}" class="btn btn-warning  
               @if ($productOrder->pivot->status=="RTS")
              disabled
          @endif"
            
              >Out of stock</a>
            <a href="{{route('RTS',['btn'=>'rts','orderid'=>$orderSpecific->id,'productid'=>$productOrder->id])}}" class="btn btn-success
              @if ($productOrder->pivot->status=="RTS")
              disabled
          @endif">Ready to Pickup</a>
          </div>
        </div>
      </div>
    </section>
@endsection