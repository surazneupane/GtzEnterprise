<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{config('app.name')}}</title>

    <!--? bootstrap css link -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--? custom css  -->
    <link rel="stylesheet" href="{{ mix('/css/landingpagestyle.css') }}" />
  </head>
  <body>
    <header>
      <img src="{{url('images/logo.png')}}" alt="GTZ">
    <h1 class="text-center">{{config('app.name')}}</h1>
    </header>
    <section class="box-wrapper">
      <div class="boxes">
        <div class="box" id="btn1">
          <h3>Online Shop</h3>
        </div>
        <div class="box" id="btn2">
          <h3>Document Bid/Tender Notice</h3>
        </div>
        <div class="box" id="btn3">
          <h3>Sell with GTZ</h3>
        </div>
      </div>
    </section>
    <footer>
      //footer section
    </footer>
    <script>
      document.querySelector('#btn1').addEventListener('click', function () {
        window.location.href = '#link';
      });
      document.querySelector('#btn2').addEventListener('click', function () {
        window.location.href = '#link';
      });
      document.querySelector('#btn3').addEventListener('click', function () {
        window.location.href = '/vendor/signin';
      });
    </script>
  </body>
</html>
