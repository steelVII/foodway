@extends ('backend.backendmaster')

@section('title')
    Add New Food
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading panel-heading-divider">New Item<span class="panel-subtitle">Register a new item</span></div>
            <div class="panel-body">
                <form method="POST" action="add_list" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Food Name</label>
                        <input type="text" name="food-list-item" parsley-trigger="change" required="" placeholder="Enter Food Name" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Restaurant</label>
                        <select class="form-control" name="restaurant" id="restaurant_item">
  
                          @foreach ($restaurants as $restaurant)
                              <option value="{{ $restaurant->restaurant_name}}">{{ $restaurant->restaurant_name}}</option>
                          @endforeach
  
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Food Category</label>
                        <select class="form-control js-example-basic-multiple" name="food_categories[]" id="cat_served" multiple="multiple">
  
                          @foreach ($food_cats as $cat)
                              <option value="{{ $cat->category_name}}">{{ $cat->category_name}}</option>
                          @endforeach
  
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Food Image</label>
                        <input type="file" name="foodimage" accept="image/*" onchange="loadFile(event)">
                        <div class="row">
                            <div class="col-sm-12"><h5>Preview</h5></div>
                            <div class="col-sm-8">
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