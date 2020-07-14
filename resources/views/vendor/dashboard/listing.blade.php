@extends('vendor.layouts.vendordashboard')
@section('pageTitle', 'Vendor Listing | GTZ Online Shop')
@section('content')
  <section class="main">
  <!-- ? search bar -->
  <div class="bar-wrapper">
  <form action="{{route('productsearch')}}"  method="GET" class="search-wrapper form-inline">
    @csrf
      <div class="form-group">
        <select
          name="category-id"
          id="search-option"
          class="form-control"
        >
        @forEach($categories as $category)
      <option value="{{$category->id}}">{{$category->category}}</option>
         @endforeach
        </select>
      </div>
      &nbsp;
      <div class="form-group search-bar">
        <input type="search" name="search" placeholder="Search" required/>
        <button type="submit" class="btn btn-search">
          <span class="material-icons">
            search
          </span>
        </button>
      </div>
    </form>
    <a href="{{route('product.create')}}" class="btn btn-add-product">
      <span class="material-icons">
        add
      </span>
      Product
    </a>
  </div>

@include('vendor.layouts.message')

  <!-- ? product Listing -->
  <div class="products-listing">
    <div class="products-view">
      <ul class="product-view-opts">
        <li class="view-opt active" data-table="all">All ({{count($products)}})</li>
      <li class="view-opt" data-table="live">Live ({{$products->where('status','Live')->count()}}) </li>
        <li class="view-opt" data-table="outOfStock">
          Out-of-Stock ({{$products->where('quantity','<','1')->count()}})
        </li>
        <li class="view-opt" data-table="inActive">In-Active ({{$products->where('status','inActive')->count()}})</li>
      </ul>
    </div>
    <div class="listing-table">
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Product Information</th>
            <th>Listing Information</th>
            <th></th>
            <th>Active </th>
            <th></th>
          </tr>
        </thead>

        @forEach($products as $product)
        <tbody id="all">
          <tr>
            <td>
            <img src="{{url('/images/vendor/'.Auth::id().'/'.$product->images()->first()->name)}}" alt="" />
            </td>
            <td>
              <p class="product-title ellipsis" data-maxlength="80">
               {{$product->productname}}
              </p>
              <p class="product-id">
                <span class="label-text">Sku Id: </span>{{$product->sku}}
              </p>
            </td>
            <td>
              <p>
              <span class="label-text">Selling Price: </span>Rs. {{$product->SP}}
              </p>
            <p><span class="label-text">MRP: </span>Rs. {{$product->MRP}}</p>
            <p><span class="label-text">Quantity: </span>{{$product->quantity}} {{$product->quantityunit}}</p>
            </td>
            <td>
              <p>
                <span class="label-text">Days to Dispatch: </span>{{$product->DTD}} day
              </p>
            <p><span class="label-text">Return Accepted: </span>{{$product->returnaccepted}}</p>
            </td>
            <td class="text-center">
              <div>
                <label class="switch">
                  <input
                    type="checkbox"
                    class="activeCheck"
                data-href="{{route('productstatus',$product->id)}}"
                @if($product->status=="Live")
                checked
                @endif
                  />
                  <span class="slider round"></span>
                </label>

              </div>
            </td>
            <td class="text-center">
              <div>
              <form action="{{route('product.destroy',$product->id)}}" method="POST">
               @csrf
                @method('DELETE')  
               
                <input
                    type="submit"
                    value="delete"
                    class="material-icons btn delete"
                  />
                </form>
              <a href="{{route('product.edit',$product->id)}}" class="btn">
                  <span class="material-icons">
                    edit
                  </span>
                </a>
              </div>
              <!-- <span class="material-icons">
                more_vert
              </span> -->
            </td>
          </tr>
        </tbody>
        @if($product->status=='Live')
        <tbody id="live">
          <tr>
            <td>
            <img src="{{url('/images/vendor/'.Auth::id().'/'.$product->images()->first()->name)}}" alt="" />
            </td>
            <td>
              <p class="product-title ellipsis" data-maxlength="80">
               {{$product->productname}}
              </p>
              <p class="product-id">
                <span class="label-text">Sku Id: </span>{{$product->sku}}
              </p>
            </td>
            <td>
              <p>
              <span class="label-text">Selling Price: </span>Rs. {{$product->SP}}
              </p>
            <p><span class="label-text">MRP: </span>Rs. {{$product->MRP}}</p>
            <p><span class="label-text">Quantity: </span>{{$product->quantity}} {{$product->quantityunit}}</p>
            </td>
            <td>
              <p>
                <span class="label-text">Days to Dispatch: </span>{{$product->DTD}} day
              </p>
            <p><span class="label-text">Return Accepted: </span>{{$product->returnaccepted}}</p>
            </td>
            <td class="text-center">
              <div>
                <label class="switch">
                  <input
                    type="checkbox"
                    class="activeCheck"
                data-href="{{route('productstatus',$product->id)}}"
                    checked
                  />
                  <span class="slider round"></span>
                </label>
              </div>
            </td>
            <td class="text-center">
              <div>
              <form action="{{route('product.destroy',$product->id)}}" method="POST">
               @csrf
                @method('DELETE')  
               
                <input
                    type="submit"
                    value="delete"
                    class="material-icons btn delete"
                  />
                </form>
              <a href="{{route('product.edit',$product->id)}}" class="btn">
                  <span class="material-icons">
                    edit
                  </span>
                </a>
              </div>
              <!-- <span class="material-icons">
                more_vert
              </span> -->
            </td>
          </tr>
        </tbody>
        @endif

          @if($product->quantity<1)
          <tbody id="outOfStock">
            <tr>
              <td>
              <img src="{{url('/images/vendor/'.Auth::id().'/'.$product->images()->first()->name)}}" alt="" />
              </td>
              <td>
                <p class="product-title ellipsis" data-maxlength="80">
                 {{$product->productname}}
                </p>
                <p class="product-id">
                  <span class="label-text">Sku Id: </span>{{$product->sku}}
                </p>
              </td>
              <td>
                <p>
                <span class="label-text">Selling Price: </span>Rs. {{$product->SP}}
                </p>
              <p><span class="label-text">MRP: </span>Rs. {{$product->MRP}}</p>
              <p><span class="label-text">Quantity: </span><span class="alert-danger">Out of Stock</span></p>
              </td>
              <td>
                <p>
                  <span class="label-text">Days to Dispatch: </span>{{$product->DTD}} day
                </p>
              <p><span class="label-text">Return Accepted: </span>{{$product->returnaccepted}}</p>
              </td>
              <td class="text-center">
                <div>
                  <label class="switch">
                    <input
                      type="checkbox"
                      class="activeCheck"
                  data-href="{{route('productstatus',$product->id)}}"
                  @if($product->status=="Live")
                  checked
                  @endif
                    />
                    <span class="slider round"></span>
                  </label>
                </div>
              </td>
              <td class="text-center">
                <div>
                <form action="{{route('product.destroy',$product->id)}}" method="POST">
                 @csrf
                  @method('DELETE')  
                 
                  <input
                      type="submit"
                      value="delete"
                      class="material-icons btn delete"
                    />
                  </form>
                <a href="{{route('product.edit',$product->id)}}" class="btn">
                    <span class="material-icons">
                      edit
                    </span>
                  </a>
                </div>
                <!-- <span class="material-icons">
                  more_vert
                </span> -->
              </td>
            </tr>
          </tbody>
         
@endif
@if($product->status=='inActive')
        <tbody id="inActive">
          <tr>
            <td>
            <img src="{{url('/images/vendor/'.Auth::id().'/'.$product->images()->first()->name)}}" alt="" />
            </td>
            <td>
              <p class="product-title ellipsis" data-maxlength="80">
               {{$product->productname}}
              </p>
              <p class="product-id">
                <span class="label-text">Sku Id: </span>{{$product->sku}}
              </p>
            </td>
            <td>
              <p>
              <span class="label-text">Selling Price: </span>Rs. {{$product->SP}}
              </p>
            <p><span class="label-text">MRP: </span>Rs. {{$product->MRP}}</p>
            <p><span class="label-text">Quantity: </span>{{$product->quantity}} {{$product->quantityunit}}</p>
            </td>
            <td>
              <p>
                <span class="label-text">Days to Dispatch: </span>{{$product->DTD}} day
              </p>
            <p><span class="label-text">Return Accepted: </span>{{$product->returnaccepted}}</p>
            </td>
            <td class="text-center">
              <div>
                <label class="switch">
                  <input
                    type="checkbox"
                    class="activeCheck"
                data-href="{{route('productstatus',$product->id)}}"
                  />
                  <span class="slider round"></span>
                </label>
              </div>
            </td>
            <td class="text-center">
              <div>
              <form action="{{route('product.destroy',$product->id)}}" method="POST">
               @csrf
                @method('DELETE')  
               
                <input
                    type="submit"
                    value="delete"
                    class="material-icons btn delete"
                  />
                </form>
              <a href="{{route('product.edit',$product->id)}}" class="btn">
                  <span class="material-icons">
                    edit
                  </span>
                </a>
              </div>
              <!-- <span class="material-icons">
                more_vert
              </span> -->
            </td>
          </tr>
        </tbody>
        @endif
        @endforeach
        

      </table>
    </div>
  </div>



      <div class="pagination-div ">
        
   {{$products->onEachSide(5)->links('pagination.bootstrap-4')}}
      </div>
   
    
  <!-- ? end of product listing -->
</section>
<script>
  $(".view-opt").click(onClick);

  //Change table
  function onClick(e) {
    let viewOpt = e.target;

    const viewOpts = document.querySelectorAll(".view-opt");
    const tbody = document.querySelectorAll("tbody");
    if (!viewOpt.classList[1]) {
      viewOpts.forEach((item) => {
        item.classList.remove("active");
      });
      tbody.forEach((item) => {
        item.style.display = "none";
        if (item.id === viewOpt.getAttribute("data-table")) {
          item.style.display = "table-row-group";
        }
      });
      console.log(viewOpt.getAttribute("data-table"));
      viewOpt.classList.add("active");
    }
  }
  $(".activeCheck").click((e) => {
    var activeCheck = new XMLHttpRequest();
    activeCheck.open("GET", e.target.getAttribute("data-href"), true);

    activeCheck.send();
  });
</script>

@endsection