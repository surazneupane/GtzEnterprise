@extends('admin.layouts.dashboardlayout')
@section('pageTitle', 'Admin Dashboard Category | GTZ Online Shop')

@section('content')
<section class="main order-listing">
    <div class="container">
      <h5 class="text-center heading">Orders List</h5>
    </div>
    <div class="container">
      <table class="table table-hover customer_order">
        <thead>
          <tr>
            <th>s/n</th>
            <th>Order Id</th>
            <th>Customer Name</th>
            <th>Phone no.</th>
            <th>Status</th>
            <th>Total Amount</th>
            <th></th>
          </tr>
        </thead>
    <?php
    $sn=1; 
    $total=0;
    
    ?>
        <tbody>
            @foreach ($orders as $order)
                
          <tr>
          <td>{{$sn++}}</td>
          <td>{{$order->id}}</td>
          <td data-name="Customer Name">{{$order->checkoutname}}</td>
          <td data-name="Phone No.">{{$order->checkoutphone}}</td>
          <td data-name="status"> {{$order->orderstatus}}</td>
         @foreach ($order->products()->get() as $orderTotal)
             <?php $total=$total+$orderTotal->pivot->total ?>
         @endforeach
          
             <td data-name="Total Amounts">{{$total}}</td>

          <td>
          <a href="{{route('adminvieworder',$order->id)}}" class="btn btn-success"
                >View order</a
              >
          <a href="{{route('ordercompleted',$order->id)}}" class="btn btn-info   @if ($order->orderstatus=="Completed")
            disabled
        @endif ">Complete</a>
            </td>
          </tr>
          @endforeach

        
        </tbody>
      </table>
    </div>
  </section>



@endsection
