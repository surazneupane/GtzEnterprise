@extends('admin.layouts.dashboardlayout')
@section('pageTitle', 'Admin Dashboard | GTZ Online Shop')

@section('content')
    
<section class="main text-justify">
      <div class="container">
        <h3 class="text-center">Admin Dashboard</h3>
        <div class="row">
          <div class="col-lg-4 col-md-6 my-2">
            <div class="card">
              <h4>Users</h4>
              <p>Total Users: <span class="value">1200</span></p>
              <p>Active Users: <span class="value">120</span></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-2">
            <div class="card">
              <h4>Products</h4>
              <p>Total Products: <span class="value">1200</span></p>
              <p>Recent New Products: <span class="value">120</span></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-2">
            <div class="card">
              <h4>Sales</h4>
              <p>Total Sales: <span class="value">Rs.100000</span></p>
              <p>Average Sales(per day): <span class="value">Rs.1000</span></p>
            </div>
          </div>
        </div>
      </div>
    </section>
  
@endsection
