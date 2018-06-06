@extends ('backend.backendmaster')

@section('title')
    <div class="page-head">
        <h2 class="page-head-title">Food Categories</h2>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">Food Categories</div>
                <div class="panel-body">
                    <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row be-datatable-body">
                            <div class="col-sm-12">
                                <table class="table table-striped" id="bookings-table">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')

<script type="text/javascript">
    $(function() {
        $('#bookings-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! route('menu.data') !!}',
            columns: [
                { data: 'category_name', name: 'category_name' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            "initComplete": function(settings, json) {
                $('.is_available').bootstrapToggle();
            },
            "drawCallback": function(){
                $('.is_available').bootstrapToggle();
            }
        });
    });
</script>

<script>

    $( "table" ).delegate( "input", "change", function() {

        var category_id = $(this).data('id');

        //alert(id);

        var url = 'food_categories/is_available';

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
                id : category_id,
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