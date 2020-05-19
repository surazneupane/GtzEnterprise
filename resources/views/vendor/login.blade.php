@extends('vendor.layouts.loginandreg')
@section('pageTitle', 'Login | GTZ Online Shop')
@section('formId','login')
    @section('content')
      <div class="">
      <a href="/" class="btn btn-warning">Back To HomePage</a>
      <a href="/vendor/signup" class="btn btn-primary m-auto">Register</a>
      </div>
    <form action="{{route('vendorlogin')}}" method="POST" class="form login-form">
      <h3 class="text-center">Login with Us</h3>
      @if(session()->has('message'))
      <div class="text-center alert alert-success" >
        <strong>
        {{session()->get('message')}}
        </strong>
      </div>
      @endif
      @if(session()->has('ErrorMessage'))
      <div class="text-center alert alert-danger" >
        <strong>
        {{session()->get('ErrorMessage')}}
        </strong>
      </div>
      @endif
      
      <div class="form-group">
      @csrf
        
          <label for="email">Email: </label>
          <input
            type="text"
            name="email"
            id="email"
            placeholder="Enter Email"
            class="form-control"
            required
          />
        </div>
        <div class="form-group">
          <label for="password">password: </label>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Enter Password"
            class="form-control"
            required
          />
        </div>
 
        <input type="submit" value="Login" class="btn btn-success btn-login" />
      </form>
    </div>
    @endsection
    <!-- ? custom script for login -->
</html>
