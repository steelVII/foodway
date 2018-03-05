@extends ('backend.backendmaster')

@section('title')
    <div class="page-head">
        <h2 class="page-head-title">Edit Food</h2>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading panel-heading-divider">Edit Item<span class="panel-subtitle">Edit item</span></div>
            <div class="panel-body">
            <form method="POST" action="{{ $foodlist->id }}" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                        
                        {{ csrf_field() }}

                        {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label>Food Name</label>
                    <input type="text" name="food-list-item" parsley-trigger="change" required="" value="{{ $foodlist->food_name }}" placeholder="Enter Food Name" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <div class="input-group xs-mb-15">
                            <span class="input-group-addon">RM</span>
                            <input type="number" name="price" value="{{ $foodlist->price }}" min="1.00" max="200.00" step="any" class="form-control" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Sales Price (If no promotion, just leave it empty)</label>
                        <div class="input-group xs-mb-15">
                            <span class="input-group-addon">RM</span>
                            <input type="number" name="salesprice" value="{{ $foodlist->sales_price }}" min="1.00" max="200.00" step="any" class="form-control" autocomplete="off" required="">
                        </div>
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
                                <img id="preview" src="{{ asset('storage/foods/'. $foodlist->food_image) }}" />
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