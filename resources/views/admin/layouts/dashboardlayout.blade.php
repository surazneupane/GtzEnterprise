<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('pageTitle')</title>
    <!-- ? favicon -->
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
    <link rel="stylesheet" href="{{ mix('/css/AdminDashboard.css') }}" />
  </head>
  <body>
    <header>
      <div class="header-left">
        <img
      src="{{url('/images/logo.png')}}"
          class="profile-picture"
          alt=""
        />
        <div class="profile-detail">
          <h5>{{Auth::user()->fname.' '.Auth::user()->lname}} <small>(Admin)</small></h5>
          <small>{{Auth::user()->email}}</small>
        </div>
      </div>
      <div class="header-right">
        <span class="material-icons notification">
          notifications_none
          <sup></sup>
        </span>

      <a href="{{route('adminlogout')}}" class="btn btn-danger btn-logout">
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
          <li class="{{Request::is('admin/dashboard') ? 'active':' '}}">
          <a href="{{route('admindashboard')}}" class="nav-item btn">
              <span class="material-icons">
                dashboard
              </span>
              <span class="nav-text">Dashboard</span>
            </a>
          </li>

          <li class="{{Request::is('admin/users') ? 'active':' '}}">
          <a href="{{route('adminusers')}}" class="nav-item btn">
              <span class="material-icons">
                people
              </span>
              <span class="nav-text">Users</span>
            </a>
          </li>
          <li class="{{Request::is('admin/categories') ? 'active':' '}}">
          <a href="{{route('admincategory')}}" class="nav-item btn">
              <span class="material-icons">
                book
              </span>
              <span class="nav-text">Category</span>
            </a>
          </li>
          <li class="{{Request::is('admin/banner') ? 'active':' '}}">
            <a href="{{route('adminbanner')}}" class="nav-item btn">
                <span class="material-icons">
                  book
                </span>
                <span class="nav-text">Banners</span>
              </a>
            </li>
          <li>
            <a href="#" class="nav-item btn">
              <span class="material-icons">
                account_circle
              </span>
              <span class="nav-text">Products</span>
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
</body>
</html>