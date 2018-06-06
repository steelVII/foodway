@extends ('backend.backendmaster')

@section('title')
<div class="page-head">
        <h2 class="page-head-title">Vendors</h2>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">All Users</div>
                <div class="panel-body">
                    <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row be-datatable-body">
                            <div class="col-sm-12">
                                <table class="table table-striped" id="bookings-table">
                                    <thead>
                                        <tr>
                                            <th>Vendor ID</th>
                                            <th>Vendor Name</th>
                                            <th>User ID</th>
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
            ajax: '{!! route('vendor.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'vendor_name', name: 'vendor_name' },
                { data: 'user_id', name: 'user_id' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>

@endsection