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
                <div class="panel-heading">Food Categories
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
                                            <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1"
                                                aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 25%;">#</th>
                                            <th class="sorting" tabindex="0" aria-controls="table1"
                                                rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 75%;">Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($food_cat as $cat)
                                        <tr class="gradeA odd" role="row">
                                                <td class="sorting_1">{{ $cat->id }}</td>
                                                <td>{{ $cat->category_name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row be-datatable-footer">
                            <div class="col-sm-5">
                                <div class="dataTables_info" id="table1_info" role="status" aria-live="polite"><?php echo "Showing " . $food_cat->firstItem() . " to " . $food_cat->lastItem() . " of " . $food_cat->total() . " entries"; ?></div>
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate">
                                    <?php echo $food_cat->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection