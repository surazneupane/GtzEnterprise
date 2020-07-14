<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('pageTitle')</title>
    <!-- ? favicon -->
   
<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
  <script src="{{url('/js/productForm.js')}}"></script>

   
    <link
      rel="shortcut icon"
      type="image/png"
      href="{{url('/images/logo.png')}}"
    />
    <!--? bootstrap css link -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />

    <!--? bootstrap js -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>

    <!--? material icons link  -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <!-- ? custom css for dashboard -->
    <link rel="stylesheet" href="{{ mix('/css/VendorDashboard.css') }}" />
  </head>
  <body>
    <header>
      <div class="header-left">
        <img
      src="{{url('/images/vendor/profile_picture.png')}}"
          class="profile-picture"
          alt=""
        />
        <div class="profile-detail">
        <h5>{{Auth::user()->fname.' '.Auth::user()->lname}}</h5>
        <small>{{Auth::user()->email}}</small>
        </div>
      </div>
      <div class="header-right">
        <span class="material-icons notification">
          notifications_none
          <sup></sup>
        </span>
      <a href="{{route('vendorlogout')}}" class="btn btn-danger btn-logout">
          <span class="logout-text">Logout</span>
          <span class="material-icons">
            exit_to_app
          </span>
        </a>
      </div>
    </header>
    <aside>
      <nav>
        <div class="btn-toggle-menu">
          <span class="material-icons">
            menu
          </span>
          <img
        src="{{url('/images/logo.png')}}"
            class="logo"
            alt="GTZ logo"
          />
        </div>
        <ul class="nav-links">
        <li class="{{Request::is('vendor/dashboard') ? 'active':' '}}">
          <a href="{{route('vendordashboard')}}" class="nav-item btn">
              <span class="material-icons">
                dashboard
              </span>
              <span class="nav-text">Dashboard</span>
            </a>
          </li>
          <li class="{{Request::is('vendor/product') ? 'active' : '' }}">
          <a href="{{route('product.index')}}" class="nav-item btn">
              <span class="material-icons">
                shop
              </span>
              <span class="nav-text">Listing</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-item btn">
              <span class="material-icons">
                book
              </span>
              <span class="nav-text">Orders</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-item btn">
              <span class="material-icons">
                account_circle
              </span>
              <span class="nav-text">Profile</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-item btn">
              <span class="material-icons">
                card_giftcard
              </span>
              <span class="nav-text">Coupons</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
@yield('content')


<script src="{{url('/js/vendordashboard.js')}}"></script>
<script>
  //? ckeditor5
  const ckeditor = (id) => {
    ClassicEditor.create(document.querySelector(`#${id} `)).catch(
      (error) => {
        console.error(error);
      }
    );
  };
  ckeditor("highlight");
  ckeditor("description");
</script>
</body>
</html>
