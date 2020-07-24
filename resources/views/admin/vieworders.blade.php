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
            <th>Customer Name</th>
            <th>Phone no.</th>
            <th>Status</th>
            <th>Total Amount</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <td>1</td>
            <td data-name="Customer Name">Mary Doe</td>
            <td data-name="Phone No.">12 pcs</td>
          <td data-name="status"> Pending</td>
            <td data-name="Total Amount">qweq23</td>
          <td>
              <a href="#" class="btn btn-success"
                >View order</a
              >
            </td>
          </tr>
        
        </tbody>
      </table>
    </div>
  </section>



@endsection
