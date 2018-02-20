@extends ('backend.backendmaster')

@section('content')
    
    <h2>Add Restaurant</h2>

    <div class="col-sm-6">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
              <div class="panel-heading panel-heading-divider">Registration Form<span class="panel-subtitle">Register a new Restaurant service</span></div>
              <div class="panel-body">
                <form action="#" data-parsley-validate="" novalidate="">
                  <div class="form-group">
                    <label>Restaurant Name</label>
                    <input type="text" name="nick" parsley-trigger="change" required="" placeholder="Enter user name" autocomplete="off" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" parsley-trigger="change" required="" placeholder="Enter email" autocomplete="off" class="form-control">
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

@endsection