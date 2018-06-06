@extends ('backend.backendmaster')

@section('title')
    <div class="page-head">
        <h2 class="page-head-title">Completed Orders</h2>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">Completed Orders</div>
                <div class="panel-body">
                    <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row be-datatable-body">
                            <div class="col-sm-12">
                                <table class="table table-striped" id="bookings-table">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            @if(Auth::check() && Auth::user()->acc_type == '1')
                                            <th>Ordered From</th>
                                            @endif
                                            <th>Total</th>
                                            <th>Payment Method</th>
                                            <th>Order Status</th>
                                            <th>Date</th>
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

@if(Auth::check() && Auth::user()->acc_type == '1')

<script type="text/javascript">
    $(function() {
        $('#bookings-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! route('admin_completed_orders.data') !!}',
            columns: [
                { data: 'order_id', name: 'order_id' },
                { data: 'restaurant_name', name: 'restaurant_name' },
                { data: 'total', name: 'total' },
                { data: 'payment_method', name: 'payment_method' },
                { data: 'order_status', name: 'order_status' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>

@else 

<script type="text/javascript">
    $(function() {
        $('#bookings-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! route('completed_orders.data') !!}',
            columns: [
                { data: 'order_id', name: 'order_id' },
                { data: 'total', name: 'total' },
                { data: 'payment_method', name: 'payment_method' },
                { data: 'order_status', name: 'order_status' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>

@endif
    
@endsection