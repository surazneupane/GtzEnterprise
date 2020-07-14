
@extends('admin.layouts.dashboardlayout')
@section('pageTitle', 'Admin Dashboard Users| GTZ Online Shop')

@section('content')
    <section class="main text-justify">
      <div class="container">
        <h3 class="text-center">Manage Users</h3>
        <div class="row">
          <table class="col-12 table table-striped">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>No. of Products</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $sn=1;?>
             @foreach ($users as $vendor)
             @if ($vendor->hasRole('Vendor'))
                 
              <tr>
              <td data-name="S/N">{{$sn++}}</td>
                <td data-name="Name">{{$vendor->fname.' '.$vendor->lname}}</td>
                <td data-name="Email">{{$vendor->email}}</td>
              <td data-name="Contant">{{$vendor->mobileNumber}}</td>
              <td data-name="No. of Products">{{count($vendor->products()->get())}}</td>
                <td>
                  <a href="#" class="btn-delete">
                    <span class="material-icons">
                      delete
                    </span>
                  </a>
                </td>
              </tr>
              @endif
              @endforeach
             
            </tbody>
          </table>
        </div>
      </div>
    </section>
 @endsection