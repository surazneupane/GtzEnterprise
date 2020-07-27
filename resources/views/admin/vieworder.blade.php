@extends('admin.layouts.dashboardlayout')
@section('pageTitle', 'Admin Dashboard Category | GTZ Online Shop')

@section('content')
<section class="main order-listing">
    <div class="container">
      <h4 class="text-center heading">Orders List</h4>
    </div>
    <div class="container">

        <div class="customer-info">
            <h5>Customer Information</h5>
<div style="margin: 0 20px;" >
                <p ><strong>Name: </strong>{{$specificOrder->checkoutname}}</p>
            <p ><strong>Phone no.: </strong>{{$specificOrder->checkoutphone}}</p>
            <p ><strong>Region: </strong>{{$specificOrder->checkoutregion}}</p>
            <p ><strong>City: </strong>{{$specificOrder->checkoutcity}}</p>
            <p ><strong>Address: </strong>{{$specificOrder->checkoutaddress}}</p>
            <p ><strong>Shipping Cost: </strong> Rs.150</p>
</div>
        </div>

      <table class="table table-hover customer_order">
        <thead>
          <tr>
            <th>s/n</th>
          <th>Vendor Id</th>
            <th>Vendor Name</th>
            <th>Phone no.</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Quantity</th>
            <th>Status</th>`
            <th>Total Amount</th>
          </tr>
        </thead>
        <tbody>
           <?php 
            $sn=1;
            
            ?>     
       
       @foreach ($specificOrder->products()->get() as $product)
           <?php $vendor=App\User::find($product->user_id); ?>
           
       <tr>
       <td>{{$sn++}}</td>
       <td data-name="Vendor Id">{{$product->user_id}}</td>
       <td data-name="Vendor Name">{{$vendor->fname.' '.$vendor->lname}}</td>
       <td data-name="Phone No.">{{$vendor->mobileNumber}}</td>
       <td data-name="Product Name">{{$product->productname}}</td>
       <td> <img src="{{url('/images/vendor/'.$vendor->id.'/'.$product->images()->first()->name)}}" alt="" width=100 height=100></td>
       <td data-name="Quantity">{{$product->pivot->quantity}}</td>
       <td data-name="status"> {{$product->pivot->status}}</td>
       <td data-name="Total Amounts">{{$product->pivot->total}}</td>

        </tr>
        @endforeach

        
        </tbody>
      </table>
    </div>
  </section>



@endsection
