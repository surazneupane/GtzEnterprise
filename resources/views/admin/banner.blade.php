
@extends('admin.layouts.dashboardlayout')
@section('pageTitle', 'Admin Dashboard Banner | GTZ Online Shop')

@section('content')
    <section class="main text-justify">
      <div class="container">
        <h3 class="text-center">Manage Banner</h3>
        @include('admin.layouts.message')
        <div class="form">
        <form action="{{route('addbanner')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="image" class="font-weight-bold"
                >Upload Banner:
              </label>
              <input
                type="file"
                name="images[]"
                id="image"
                multiple
                accept="image/jpeg, image/png"
                class="form-control-file"
                required
              />
              <input type="submit" value="Upload" class="my-3" />
            </div>
          </form>
        </div>
            
        <div class="banners">
        @foreach ($banners as $banner)

          <div class="banner-item">
          <img src="{{url('/images/banners/'.$banner->name)}}" alt="{{$banner->name}}" />
            <div
              class="action my-2 d-flex justify-content-center align-items-center"
            >
          <a href="{{route('changebannerstat',$banner->id)}}"  class="btn btn-info m-1">{{$banner->status}}</a>
          <a href="{{route('deletebanner',$banner->id)}}" class="btn btn-danger btn-delete m-1">Delete</a>
            </div>
          </div>
      @endforeach
        
      </div>

    </section>
@endsection
