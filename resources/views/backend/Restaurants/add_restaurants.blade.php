@extends ('backend.backendmaster')

@section('title')
  <div class="page-head">
      <h2 class="page-head-title">Add Restaurant</h2>
  </div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
              <div class="panel-heading panel-heading-divider">New Restaurant<span class="panel-subtitle">Add a new Restaurant</span></div>
              <div class="panel-body">
                <form method="POST" action="/admin/restaurants" data-parsley-validate="" novalidate="" enctype="multipart/form-data">

                    {{ csrf_field() }}

                  <div class="form-group">
                    <label>Restaurant Name</label>
                    <input type="text" name="restaurant_name" parsley-trigger="change" required="" placeholder="Enter Restaurant Name" autocomplete="off" class="form-control">
                  </div>
                  <div class="row">
                  <div class="form-group col-sm-6">
                    <label>Email address</label>
                    <input type="email" name="email" parsley-trigger="change" required="" placeholder="Enter email" autocomplete="off" class="form-control">
                  </div>
                  <div class="form-group col-sm-6">
                      <label>Phone Number</label>
                      <input type="tel" name="phone_number" parsley-trigger="change" required="" placeholder="Enter Phone Number" autocomplete="off" class="form-control">
                  </div>
                </div>
                  <div class="form-group">
                      <label>Food Categories Served</label>
                      <select class="form-control js-example-basic-multiple" name="food_categories[]" id="cat_served" multiple="multiple">

                        @foreach ($food_cats as $cat)
                            <option value="{{ $cat->category_name}}">{{ $cat->category_name}}</option>
                        @endforeach

                      </select>
                    </div>
                  <div class="form-group">
                      <label class="control-label">Restaurant Image</label>         
                      <input type="file" name="restaurantimage" accept="image/*" multiple="multiple" onchange="loadFile(event)">
                      <div class="row">
                          <div class="col-sm-12"><h5>Preview</h5></div>
                          <div class="col-sm-6">
                              <img id="preview"/>
                          </div>
                      </div>
                  </div>
                  <p class="text-right">
                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('page-script')
    <script>
        var loadFile = function(event) {
          var reader = new FileReader();
          reader.onload = function(){
            var output = document.getElementById('preview');
            output.src = reader.result;
          };
          reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection