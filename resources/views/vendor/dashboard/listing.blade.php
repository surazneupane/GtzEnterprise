
@extends('vendor.layouts.vendordashboard')
@section('pageTitle', 'Vendor Listing | GTZ Online Shop')

@section('content')
    
   
<section class="main">
      <!-- ? search bar -->
      <div class="bar-wrapper">
        <form action="" class="search-wrapper form-inline">
          <div class="form-group">
            <select
              name="search-option"
              id="search-option"
              class="form-control"
            >
              <option value="option-1">option 1</option>
              <option value="option-2">option 2</option>
              <option value="option-3">option 3</option>
              <option value="option-4">option 4</option>
              <option value="option-5">option 5</option>
            </select>
          </div>
          <div class="form-group search-bar">
            <input type="text" name="search" placeholder="Search" />
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
            <li class="view-opt active">All</li>
            <li class="view-opt">Live</li>
            <li class="view-opt"><span>Out-of-Stock</span></li>
            <li class="view-opt">Disabled</li>
          </ul>
          <div class="form-inline sorting">
            <label for="sort">Sort by: </label>
            <select name="sort" id="sort" class="form-control">
              <option value="Newest">Newest</option>
              <option value="Oldest">Oldest</option>
            </select>
          </div>
        </div>
        <div class="listing-table">
          <table class="table">
            <thead>
              <tr>
                <th>
                  <label for="all-check" class="checkbox-container">
                    <input
                      type="checkbox"
                      class="checkbox"
                      name="all-check"
                      id="all-check"
                    />
                    <div class="check-marker"></div>
                  </label>
                </th>
                <th></th>
                <th>Product Information</th>
                <th>Listing Information</th>
                <th></th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              @forEach($products as $product)
              
              <tr>
                <td>
                  <label for="check-1" class="checkbox-container">
                    <input
                      type="checkbox"
                      class="checkbox"
                      name="check-1"
                      id="check-1"
                    />
                    <div class="check-marker"></div>
                  </label>
                </td>
                <td>
                <img src="{{url('images/vendor/'.Auth::id().'/'.$product->images()->first()->name)}}" alt="" />
                </td>
                <td>
                <p class="product-title ellipsis" data-maxlength="10">{{$product->productname}}</p>
                  <p class="product-id">
                    <span class="label-text">SKU Id: </span>{{$product->sku}}
                  </p>
                </td>
                <td>
                  <p>
                    <span class="label-text">Selling Price: </span>{{$product->SP}}
                  </p>
                <p><span class="label-text">MRP: </span>{{$product->MRP}}</p>
                  <p><span class="label-text">Quantity: </span>{{$product->quantity}}</p>
                </td>
                <td>
                  <p>
                    <span class="label-text">Days to Dispatch: </span>{{$product->DTD}} Days
                  </p>
                <p><span class="label-text">Return Accepted: </span>{{$product->returnaccepted}}</p>
                </td>
                <td class="text-center">
                  <button class="btn btn-active btn-secondary">
                   {{$product->status}}
                  </button>
                </td>
                <td class="text-center">
                <form method="POST" action="{{route('product.destroy',$product->id)}}">
                 @csrf
                 @method('DELETE')

                  <input type="submit" value="delete" class="material-icons btn delete"/>
                   </form>
                  <a href="{{route('product.edit',$product->id)}}" class="btn">
                    <span class="material-icons">
                      edit
                    </span>
                  </a>
                 
                
                </td>
              </tr>
            @endforeach

            </tbody>
          </table>
        </div>
      </div>
      <!-- ? end of product listing -->
    </section>
    <script>
      $(".view-opt").click(onClick);

      function onClick(e) {
        let viewOpt = e.target;
        if (e.target.tagName === "SPAN") {
          viewOpt = viewOpt.parentNode;
        }
        const viewOpts = document.querySelectorAll(".view-opt");
        if (!viewOpt.classList[1]) {
          viewOpts.forEach((item) => {
            item.classList.remove("active");
          });
          viewOpt.classList.add("active");
        }
      }
      $('input[name="all-check"]').click(() => {
        if ($('input[name="all-check"]').prop("checked") === true) {
          $('input[name^="check"]').prop("checked", true);
        } else if ($('input[name="all-check"]').prop("checked") === false) {
          $('input[name^="check"]').prop("checked", false);
        }
      });
      $('input[name^="check"]').click((e) => {
        if (
          $(`#${e.target.id}`).prop("checked") === false &&
          $('input[name="all-check"]').prop("checked") === true
        ) {
          $('input[name="all-check"]').prop("checked", false);
        }
      });
    </script>

@endsection