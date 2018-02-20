@extends ('backend.backendmaster')

@section('title')
    Add Restaurant
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
              <div class="panel-heading panel-heading-divider">Registration Form<span class="panel-subtitle">Register a new Restaurant service</span></div>
              <div class="panel-body">
                <form method="POST" action="/admin/restaurants" data-parsley-validate="" novalidate="">

                    {{ csrf_field() }}

                  <div class="form-group">
                    <label>Restaurant Name</label>
                    <input type="text" name="restaurant_name" parsley-trigger="change" required="" placeholder="Enter Restaurant Name" autocomplete="off" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" parsley-trigger="change" required="" placeholder="Enter email" autocomplete="off" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Phone Number</label>
                      <input type="tel" name="phone_number" parsley-trigger="change" required="" placeholder="Enter Phone Number" autocomplete="off" class="form-control">
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
                        <label class="col-sm-6 control-label">Custom Button File Input</label>
                        <div class="col-sm-6">
                          <input type="file" name="file-2" id="file-2" data-multiple-caption="{count} files selected" multiple="" class="inputfile">
                          <label for="file-2" class="btn-primary"> <i class="mdi mdi-upload"></i><span>Browse files...</span></label>
                        </div>
                  </div>
                  <p class="text-right">
                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                    <button class="btn btn-space btn-default">Cancel</button>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection