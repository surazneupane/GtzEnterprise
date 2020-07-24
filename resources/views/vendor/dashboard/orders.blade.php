@extends('vendor.layouts.vendordashboard')
@section('pageTitle', 'Vendor Dashboard | GTZ Online Shop')

@section('content')
<section class="main order-listing">
    <div class="container">
      <h5 class="text-center heading">Orders List</h5>
    </div>
    <div class="container">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>s/n</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th >Product Price </th>

            <th>Customer</th>
            <th>Status</th>
            <th>Total Price</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
         @foreach ($orders as $order)
        <?php $product=App\Product::where('id',$order->pivot->product_id)->first()?>
             
          <tr>
          <td>{{$i++}}</td>
            <td class="ellipsis" data-maxlength="80">
              {{$product->productname}}
            </td>
            <td data-name="quantity:">{{$order->pivot->quantity}} pcs</td>
          <td> {{$product->SP}}</td>
          <td data-name="customer:">{{$order->checkoutname}}</td>
          <td data-name="status:">{{$order->pivot->status}}</td>
            <td>{{$order->pivot->total}}</td>
          <td>
              <a href="{{route('viewspecificorder',['orderid'=>$order->id,'productid'=>$product->id])}}" class="btn btn-success"
                >View order</a
              >
              <button class="btn btn-danger">Delete</button>
            </td>
          </tr>
          @endforeach
        
        </tbody>
      </table>
    </div>
  </section>
  @endsection