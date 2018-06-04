@extends ('backend.backendmaster')

@section('title')
    <div class="page-head">
        <h2 class="page-head-title">All Orders</h2>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">All Orders
                    <div class="tools dropdown"><a href="#" type="button" data-toggle="dropdown" class="dropdown-toggle"><span class="icon mdi mdi-more-vert"></span></a>
                        <ul role="menu" class="dropdown-menu pull-right">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row be-datatable-header">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="table1_length"><label>Show <select name="table1_length" aria-controls="table1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
                            </div>
                            <div class="col-sm-6">
                                <div id="table1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="table1"></label></div>
                            </div>
                        </div>
                        <div class="row be-datatable-body">
                            <div class="col-sm-12">
                                <table id="table1" class="table table-striped table-hover table-fw-widget dataTable no-footer"
                                    role="grid" aria-describedby="table1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Order ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Ordered From</th>
                                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Total</th>
                                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Order Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php ($i = 1)
                                        @if (Auth::check() && Auth::user()->acc_type == '1')
                                            @foreach ($order as $list)
                                            <tr class="gradeA odd" role="row">
                                                <td>#{{ $list->order_id }}</td>
                                                <td>{{ $list->restaurant_name }}</td>
                                                <td>{{ $list->total }}</td>
                                                <td>{{ $list->order_status }}</td>
                                                <td>
                                                    <a href="{{ route('admin_view_order_details', $list->id) }}" class="btn btn-primary">Edit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            @foreach ($order as $list)
                                            <tr class="gradeA odd" role="row">
                                                <td>#{{ $list->order_id }}</td>
                                                <td>{{ $list->restaurant_name }}</td>
                                                <td>{{ $list->total }}</td>
                                                <td>{{ $list->order_status }}</td>
                                                <td>
                                                    <a href="{{ route('view_order_details', $list->id) }}" class="btn btn-primary">Edit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row be-datatable-footer">
                            <div class="col-sm-5">
                                <div class="dataTables_info" id="table1_info" role="status" aria-live="polite"><?php echo "Showing " . $order->firstItem() . " to " . $order->lastItem() . " of " . $order->total() . " entries"; ?></div>
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate">
                                    <?php echo $order->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')

<script>

    $('.is_available').change(function() {

        var dish_id = $(this).data('id');

        //alert(id);

        var url = 'food_list/is_available';

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
                id : dish_id,
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