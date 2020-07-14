@extends('admin.layouts.dashboardlayout')
@section('pageTitle', 'Admin Dashboard Category | GTZ Online Shop')

@section('content')
    <section class="main text-justify">
      <div class="container">
        <h3 class="text-center">
          Manage Product Category
        </h3>
        <div class="row categories">
          <div class="col-12">
            <button
              class="btn btn-add"
              data-toggle="modal"
              data-target="#addCategoryModal"
            >
              <span class="add">+</span>New
            </button>
        @include('admin.layouts.message')

          </div>

          <div class="category-listing col-12">
            <table class="table table-striped">
              <thead>
                    
                <tr>
                  <th>s/n</th>
                  <th>Category Name</th>
                  <th>Registered Products</th>
                  <th>Category Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php $sn=1; @endphp
                @foreach ($categories as $category)

                <tr>
                  <td data-name="s/n:">{{$sn++}}</td>
                  <td data-name="Category Name:">{{$category->category}}</td>
                <td data-name="Products">{{count($category->products()->get())}}</td>
        
                <td><img src="{{url('/images/categoryimage/'.$category->image()->first()->name)}}"> </td>
                  <td>
                    <a href="" class="btn-edit"
                    data-category='{{$category->category}}'
                    data-route='{{route('editcategory', $category->id)}}'
                      ><span class="material-icons">edit</span></a
                    >
                  <a href="{{route('deletecategory',$category->id)}}" class="btn-delete"
                      ><span class="material-icons">delete</span></a
                    >
                  </td>
                </tr>
                @endforeach
               
              </tbody>
            </table>
          
          </div>
          
        </div>
      
      </div>
    
    
     
    

      <!-- ? add category modal -->
      <div class="modal fade" tabindex="-1" role="dialog" id="addCategoryModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <!-- ? add category form -->
          <form action="{{route('addcategory')}}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="modal-header">
                <h5 class="modal-title">Category</h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="category">Category</label>
                  <input
                    type="text"
                    name="category"
                    id="category"
                    class="form-control"
                    required
                  />
                  <label for="image" class="font-weight-bold"
                  >Default Category Image:
                </label>
                <input
                  type="file"
                  name="image"
                  id="image"
                  accept="image/jpeg, image/png"
                  class="form-control-file"
                  required
                />
                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Submit" />

                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Close
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      
      <!-- ? edit category modal -->
      <div class="modal fade" tabindex="-1" role="dialog" id="editCategoryModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <!-- ? add category form -->
          <form action="" class="form" method="POST" id="editmodalform">
            @csrf
              <div class="modal-header">
                <h5 class="modal-title">Category</h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="category">Category</label>
                  <input
                    type="text"
                    name="category"
                    id="category"
                    class="form-control"
                    required
                  />
                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Submit" />

                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Close
                </button>
              </div>
            </form>
          </div>
        </div>
        
      </div>
      <div class="pagination-div ">
        
        {{$categories->onEachSide(5)->links('pagination.bootstrap-4')}}
           </div>
    </section>
 
   
    <script>
      $(".btn-edit").on("click", function (event) {
        event.preventDefault();
        $(".modal-title").text("Edit Category");
        $("input[type='text']").val(event.target.parentElement.getAttribute("data-category"));
        console.log(event.target.parentElement.getAttribute("data-route"));
        $("#editmodalform").attr("action", event.target.parentElement.getAttribute("data-route"));
        $("input[type='submit']").val("Update");
        $("#editCategoryModal").modal();
      });

      $(".btn-add").on("click", function (event) {
        event.preventDefault();
        $(".modal-title").text("Add Category");
        $("#category").val("");
        $("input[type='submit']").val("Add");
        $("#addCategoryModal").modal();
      });
      $(".btn-delete").on("click", (e) => {
        if (!confirm("Do you want to delete")) {
          e.preventDefault();
        }
      });
    </script>
   @endsection
  