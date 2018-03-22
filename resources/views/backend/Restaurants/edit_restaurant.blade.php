@extends ('backend.backendmaster')

@section('title')
  <div class="page-head">
      <h2 class="page-head-title">Edit Restaurant</h2>
  </div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
              <div class="panel-heading panel-heading-divider">Edit Restaurant<span class="panel-subtitle">Edit Restaurant Profile</span></div>
              <div class="panel-body">
                <form method="POST" action="edit/{{ $restaurant->id }}" data-parsley-validate="" novalidate="" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    {{ method_field('PATCH') }}

                  <div class="form-group">
                    <label>Restaurant Name</label>
                  <input type="text" name="restaurant_name" parsley-trigger="change" required="" value="{{ $restaurant->restaurant_name }}" placeholder="Enter Restaurant Name" autocomplete="off" class="form-control">
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label>Email address</label>
                    <input type="email" name="email" parsley-trigger="change" required="" value="{{ $restaurant->email }}" placeholder="Enter email" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Phone Number</label>
                        <input type="tel" name="phone_number" parsley-trigger="change" required="" value="{{ $restaurant->phone_num }}" placeholder="Enter Your Phone Number" autocomplete="off" class="form-control">
                    </div>
                  </div>
                  <div class="row">
                      <div class="form-group col-sm-4">
                          <label>State</label>
                          <select class="form-control js-example-basic-multiple" name="state" id="state">
                              <option value="0">Select State</option>
                            @foreach ($locations as $states)
                                <option value="{{$states->state}}">{{$states->state}}</option>
                            @endforeach
    
                          </select>
                      </div>
                      <div class="form-group col-sm-4">
                          <label>City</label>
                          <select class="form-control js-example-basic-multiple" name="city" id="city">
    
                          </select>
                      </div>
                      <div class="form-group col-sm-4">
                          <label>Postcode</label>
                          <input type="text" name="postcode" parsley-trigger="change" required="" value="{{ $restaurant->postcode }}" placeholder="Enter Postcode" autocomplete="off" class="form-control">
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-12">
                      <label>Address</label>
                    <textarea name="address" parsley-trigger="change" required="" placeholder="Enter Address" autocomplete="off" class="form-control">{{ $restaurant->address }}</textarea>
                    </div>
                  </div>
                  <div class="row">
                      <div class="form-group clockpicker col-sm-6">
                        <label>Opening Time</label>
                      <input type="time" name="opening" value="{{ $restaurant->opening_hours }}" parsley-trigger="change" required="" autocomplete="off" class="form-control">
                      </div>
                      <div class="form-group clockpicker col-sm-6">
                          <label>Closing Time</label>
                          <input type="time" name="closing" value="{{ $restaurant->closing_hours }}" parsley-trigger="change" required="" autocomplete="off" class="form-control">
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
                    <div class="row">
                      <div class="form-group col-sm-6">
                          <label class="control-label">Restaurant Logo</label>         
                          <input type="file" name="restaurantlogo" accept="image/*" onchange="loadFileLogo(event)">
                          <div class="row">
                              <div class="col-sm-12"><h5>Preview Logo</h5></div>
                              <div class="col-sm-4">
                              <img id="previewlogo" src="{{ asset('storage/'.$restaurant->restaurant_logo) }}"/>
                              </div>
                          </div>
                      </div>
                      <div class="form-group col-sm-6">
                          <label class="control-label">Restaurant Image</label>         
                          <input type="file" name="restaurantimage" accept="image/*" onchange="loadFile(event)">
                          <div class="row">
                              <div class="col-sm-12"><h5>Preview</h5></div>
                              <div class="col-sm-8">
                              <img id="preview" src="{{ asset('storage/'.$restaurant->restaurant_image) }}"/>
                              </div>
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
<script src="/assets/js/bootstrap-clockpicker.min.js" type="text/javascript"></script>
    <script>
        var loadFile = function(event) {
          var reader = new FileReader();
          reader.onload = function(){
            var output = document.getElementById('preview');
            output.src = reader.result;
          };
          reader.readAsDataURL(event.target.files[0]);
        };

        var loadFileLogo = function(event) {
          var reader = new FileReader();
          reader.onload = function(){
            var output = document.getElementById('previewlogo');
            output.src = reader.result;
          };
          reader.readAsDataURL(event.target.files[0]);
        };

        $('.clockpicker').clockpicker({
            default: '12:00',
            placement: 'bottom',
            align: 'left',
            donetext: 'Done',
            autoclose: 'true'
        });

        $('#city').prop('disabled', true);

        $('#state').on('select2:select', function (e) {
          var data = e.params.data;
    
          var state = $(this).val();

          var url = 'cities';

            if(state === "0") {

            $('#city').empty();
            $('#city').prop('disabled', true);

            }

            else {

                if (url) {

                  $.ajaxSetup({ 

                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } 

                  });

                  $.ajax({
                            method: "POST",
                            url: url,
                            data: {
                            state: state,
                            },
                            success: function(result){

                              var city = JSON.parse(result);

                              $('#city').empty();

                              $('#city').select2({ data: city['city'] });

                              $('#city').prop('disabled', false);

                            }
                  });

                }

            }
});

    </script>
@endsection