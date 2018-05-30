@extends ('backend.backendmaster')

@section('title')
  <div class="page-head">
  <h2 class="page-head-title">Edit Location</h2>
  </div>
@endsection

@section('content')

<div class="row">
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading panel-heading-divider">
          {{ $state }}
        </div>
        <div class="panel-body">

          <form method="POST" action="{{ $state }}/add_city">

            {{ csrf_field() }}
            
            <div class="form-group">
              <div class="input-group xs-mb-15">
                <input type="text" name="city" parsley-trigger="change" required="" placeholder="Enter City Name" autocomplete="off"
                    class="form-control">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary">Add Location</button>
                </span>
              </div>
            </div>

          </form>

          <div id="list2" class="dd">
              @if( !$cities->isEmpty() || $cities->first() )
                <table id="table1" class="table table-striped table-hover table-fw-widget dataTable no-footer"
                  role="grid" aria-describedby="table1_info">
                  <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="table1"
                            rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                            style="width: 253px;">City</th>
                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1"
                            colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 231px;">Options</th> 
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cities as $city)
                        <tr class="gradeA odd" role="row">
                            <td>{{ $city->city_name }}</td>
                            <td>
                                @if ($city->is_available === 1)
                                <input class="is_available" type="checkbox" data-id="{{ $city->id }}" checked data-toggle="toggle" data-size="small">
                                @else
                                <input class="is_available" type="checkbox" data-id="{{ $city->id }}" data-toggle="toggle" data-size="small">
                                @endif
                                <a href="delete/city/{{ $city->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              @else 
                  <div class="text-center">
                      <h4>There are currently no cities avalable.</h4>
                  </div>
              @endif
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection

@section('page-script')

<script>

    $('.is_available').change(function() {

        var city_id = $(this).data('id');

        //alert(id);

        var url = 'city/is_available';

        if (url) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: url,
                data: {
                id : city_id,
                },
                success: function(result){
                    $.gritter.add({
                        // (string | mandatory) the heading of the notification
                        title: 'Setting Saved',
                        // (string | mandatory) the text inside the notification
                        text: 'This will fade out after a certain amount of time.',
                        // (bool | optional) if you want it to fade out on its own or just sit there
                        sticky: false, 
                        // (int | optional) the time you want it to be alive for before fading out (milliseconds)
                        time: 2000,
                        // (string | optional) the class name you want to apply directly to the notification for custom styling
                        class_name: 'gritter-item-wrapper color success'
                    });
                }
            });
        }

    });

</script>
    
@endsection