@extends ('backend.backendmaster')

@section('title')
    Add Category
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading panel-heading-divider">New Category<span class="panel-subtitle">Register a new category</span></div>
            <div class="panel-body">
                <form method="POST" action="add_category" data-parsley-validate="" novalidate="">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="food-category" parsley-trigger="change" required="" placeholder="Enter Category Name" autocomplete="off" class="form-control">
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