@extends ('backend.backendmaster') 
@section('title')
<div class="page-head">
    <h2 class="page-head-title">Add New Vendor</h2>
</div>
@endsection
 
@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading panel-heading-divider">
                New Vendor
                <span class="panel-subtitle">
                    Register a new Vendor. They will also use this details as their login detail. Restaurant will be created according to Vendor Username.
                </span>
            </div>
            <div class="panel-body">
                <form method="POST" action="makevendor" data-parsley-validate="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Vendor Username</label>
                        <input type="text" name="vendor_username" parsley-trigger="change" required="" placeholder="Enter Username" autocomplete="off"
                            class="form-control">
                    </div>
                    <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="vendor_email"  class="form-control" placeholder="Enter Email" autocomplete="off" required="">
                        </div>
                    <div class="form-group">
                        <label for="description">Password</label>
                        <input type="password" name="vendor_password" parsley-trigger="change" required="" placeholder="Enter Password" autocomplete="off"
                        class="form-control">
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