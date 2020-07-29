<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GTZ Online Shop</title>

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

    <!-- ? Animate css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
    />

    <!-- ? Owl Carousel css and js -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"

    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    />
    

    <!-- ? jquery script-->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

    <!-- ? wow.js -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script> -->

    <!--? custom css  -->
    <link rel="stylesheet" href="{{ mix('/css/home.css') }}" />
   
  </head>
  <body>
    <header class="container-fluid">
      <div class="dropdown">
        <button
          class="btn"
          type="button"
          id="dropdowncategory"
          data-toggle="dropdown"
        >
          <span class="material-icons menu">menu</span>
        </button>
        <!-- ? menu of category -->
        <ul class="dropdown-menu" aria-labelled-by="dropdowncategory">
          <li><a href="#" class="category-name btn">Category #1</a></li>
          <li><a href="#" class="category-name btn">Category #2</a></li>
          <li><a href="#" class="category-name btn">Category #3</a></li>
          <li><a href="#" class="category-name btn">Category #4</a></li>
          <li><a href="#" class="category-name btn">Category #5</a></li>
          <li><a href="#" class="category-name btn">Category #6</a></li>
        </ul>
      </div>
    <img src="{{url('images/logo.png')}}" alt="" class="logo" />

      <!-- ? search box -->
      <div class="search-box">
        <!-- <form action="#"> -->
        <form action="{{route('search')}}" method="GET">
          <input type="search" name="search" placeholder="Search..." id="search" />
        <button class="btn">
          <span class="material-icons search-icon">
            search
          </span>
        </button>
        </form>
        <!-- </form> -->
      </div>

      <button class="btn">
        <span class="material-icons favorite-icon">
          favorite
        </span>
        <sup class="">12</sup>
      </button>
    <a href="{{route('checkout')}}" class="btn">
        <span class="material-icons shopping-cart-icon">
          shopping_cart
        </span>
      <sup id="cartItems" class="">
        @if(session()->get('cart'))
        {{sizeof(session()->get('cart'))}}
        @else
        0
        @endif
      </sup>
      </a>
      <ul class="nav-links">
        <li class="nav-item"><a href="#" class="btn">FAQ</a></li>
    
    @if(!(Auth::user())||!(Auth::user()->hasRole('Customer')))

        <li class="nav-item"><a href="{{route('fblogin')}}" class="btn">Login</a></li>
    @endif
        <li class="nav-item"><a href="#" class="btn">Sell</a></li>
          @if(Auth::user())
       @if(Auth::user()->hasRole('Customer'))
       
        <li class="nav-item">
          <div class="dropdown">
            <button
              class="btn dropdown-toggle"
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
             {{Auth::user()->fname.' '.Auth::user()->lname}}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item btn" href="{{route('logoutcust')}}">Logout</a>
            </div>
          </div>
        </li>
        @endif
        @endif
      </ul>
      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </header>
@yield('content')


    <footer class="footer bg-light">
        <div class="container">
          <div class="row text-center">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <h3>Get to know us</h3>
              <ul>
                <li>Careers</li>
                <li>Blog</li>
                <li>About Us</li>
                <li>Help Center</li>
                <li>Complain</li>
                <li>Delivery</li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <h3>Payment Methods</h3>
              <ul>
                <li>Careers</li>
                <li>Blog</li>
                <li>About Us</li>
                <li>Help Center</li>
                <li>Complain</li>
                <li>Delivery</li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <h3>Delivery</h3>
              <ul>
                <li>Careers</li>
                <li>Blog</li>
                <li>About Us</li>
                <li>Help Center</li>
                <li>Complain</li>
                <li>Delivery</li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <h3>Social Network</h3>
              <ul>
                <li>Careers</li>
                <li>Blog</li>
                <li>About Us</li>
                <li>Help Center</li>
                <li>Complain</li>
                <li>Delivery</li>
              </ul>
            </div>
          </div>
        </div>
      </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        
    <script src="{{url('js/script.js')}}"></script>
    <script>
      home();
      </script>
    </body>
  </html>
  
