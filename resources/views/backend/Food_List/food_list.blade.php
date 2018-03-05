@extends ('backend.backendmaster')

@section('title')
    <div class="page-head">
        <h2 class="page-head-title">Food List</h2>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">Food Listings
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
                                            <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Food Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Price</th>
                                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sales Price</th>
                                            @if (Auth::check() && Auth::user()->acc_type == '1')
                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Restaurant</th>
                                            @endif
                                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Category</th>
                                            @if (Auth::check() && Auth::user()->acc_type == '3')
                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Options</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php ($i = 1)
                                        @if (Auth::check() && Auth::user()->acc_type == '1')
                                            @foreach ($food_lists as $list)
                                            <tr class="gradeA odd" role="row">
                                                    <td class="sorting_1">{{ $i++ }}</td>
                                                    <td>{{ $list->food_name }}</td>
                                                    <td>{{ $list->price }}</td>
                                                    <td>{{ $list->sales_price }}</td>
                                                    <td>{{ $list->restaurant_name }}</td>
                                                    <td>{{ $list->food_categories }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            @foreach ($food_lists as $list)
                                            <tr class="gradeA odd" role="row">
                                                    <td class="sorting_1">{{ $i++ }}</td>
                                                    <td>{{ $list->food_name }}</td>
                                                    <td>{{ $list->price }}</td>
                                                    <td>{{ $list->sales_price }}</td>
                                                    <td>{{ $list->food_categories }}</td>
                                                    <td>
                                                        <a href="food_list/{{ $list->id }}" class="btn btn-primary">Edit</a>
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
                                <div class="dataTables_info" id="table1_info" role="status" aria-live="polite"><?php echo "Showing " . $food_lists->firstItem() . " to " . $food_lists->lastItem() . " of " . $food_lists->total() . " entries"; ?></div>
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate">
                                    <?php echo $food_lists->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection