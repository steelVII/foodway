@extends ('backend.backendmaster')

@section('title')
  <div class="page-head">
      <h2 class="page-head-title">Add/New Menu</h2>
  </div>
@endsection

@section('content')

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading panel-heading-divider">Add/New Category<span class="panel-subtitle">Register a new category (If menu already exists, this will add the new categories to the current one)</span></div>
            <div class="panel-body">
                <form method="POST" action="{{ $restaurant_id }}/food_categories/add_category">
                        {{ csrf_field() }}
                    <div id="new_menu" class="form-group">
                        <label>Menu Category</label>
                        <div class="input-container">
                            <input type="text" name="food_category[0][name]" parsley-trigger="change" required="" placeholder="Enter Category Name" autocomplete="off" class="form-control new-cat">
                        </div>
                    </div>
                    <a id="addInput" class="btn btn-space btn-success">Add Category</a>
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

    var i = 1;

    $('#addInput').click(function() {

        var input = "<div class='input-container input-group'>" +
        "<input type='text' name='food_category[" + i + "][name]' parsley-trigger='change' placeholder='Enter Category Name' autocomplete='off' class='form-control new-cat' required>" +
        "<span class='remove input-group-btn'>" +
        "<a href='#' class='btn btn-danger'>Remove</a>" + 
        "</span></div>";

        $('#new_menu').append(input);

        i++;

    });

    $(document).on('click','.remove', function() {

        $(this).parent().remove();

    });


</script>

@endsection