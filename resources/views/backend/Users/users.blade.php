@extends ('backend.backendmaster')

@section('title')
<div class="page-head">
        <h2 class="page-head-title">Users</h2>
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
                                            <th>ID</th>
                                            <th>Account Type</th>
                                            <th>Name</th>
                                            <th>Email</th>
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
            ajax: '{!! route('user.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'acc_type', name: 'acc_type' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>

@endsection