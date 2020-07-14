
@extends('vendor.layouts.loginandreg')
@section('pageTitle', 'Signup | GTZ Online Shop')
@section('formId','register')

    @section('content')
      <form
action="{{route('vendorsignup')}}"
        method="POST"
        class="register-form"
        id="register-form"
        name="register-form"
      >
      @csrf
        <h3 class="text-center">Register with Us</h3>
       @include('admin.layouts.message')

        <div id="error"></div>
        <div class="row">
          <div class="form-group col-md-4">
            <label for="fname">First Name: </label>
            <input
              type="text"
              name="fname"
              id="fname"
              placeholder="* required"
              class="form-control"
              required
            />
          </div>
          <div class="form-group col-md-4">
            <label for="lname">Middle Name: </label>
            <input
              type="text"
              placeholder="optional"
              name="mname"
              id="mname"
              class="form-control"
            />
          </div>
          <div class="form-group col-md-4">
            <label for="lname">Last Name: </label>
            <input
              type="text"
              placeholder="* required"
              name="lname"
              id="lname"
              class="form-control"
              required
            />
          </div>
          {{-- <div class="col-md-12 form-group">
            <label for="username">Username: </label>
            <input
              placeholder="* required"
              type="text"
              name="username"
              id="username"
              class="form-control"
              minlength="5"
              required
            />
@error('username')
    <strong style="color: red">{{$message}}</strong>
@enderror

          </div> --}}

          <div class="col-md-12 form-group">
            <label for="email">Email: </label>
            <input
              type="email"
              placeholder="* required"
              name="email"
              id="email"
              class="form-control"
              required
            />
           
          </div>
          <div class="col-md-6 form-group">
            <label for="password">Password: </label>
            <input
              type="password"
              name="password"
              id="password"
              placeholder="* required"
              class="form-control"
              required
            />
          </div>
          <div class="col-md-6 form-group">
            <label for="re-password">Confirm Password: </label>
            <input
              type="password"
              name="re-password"
              id="re-password"
              placeholder="* required"
              class="form-control"
              required
            />
          </div>
          <div class="col-md-12 form-group">
            <label for="mobileNumber">Mobile No. :</label>
            <input
              type="text"
              name="mobileNumber"
              placeholder="* required"
              id="mobileNumber"
              class="form-control"
              maxlength="10"
              required
            />
            @error('mobileNumber')
               <strong style="color: red"> {{$message}}</strong>
            @enderror
          </div>
        </div>
        <input
          type="submit"
          value="Register"
          id="register-btn"
          class="btn btn-success btn-register"
        />
      </form>
      <div class="my-5">
      <a href="/" class="btn btn-warning">Back To HomePage</a>
      <a href="/vendor/signin" class="btn btn-primary m-auto">Login</a>
      </div>
    </div>
@endsection
    <!-- ? custom script for login -->
</html>
