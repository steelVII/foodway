@extends ('backend.backendmaster') 

@section('title')
    {{$restaurant->restaurant_name}}
@endsection

@section('content') 
    <div class="row">
            <div class="col-md-12">
                <div class="panel panel-flat">
                    <div class="single-restaurant panel-cover-image">
                        <img src="{{ asset('storage/'.$restaurant->restaurant_image) }}" alt="">
                    </div>
                    <div class="panel-heading">{{ $restaurant->restaurant_name }}</div>
                    <div class="panel-body">
                        <p>{{ $restaurant->food_categories }}</p>
                        @if (Auth::check() && Auth::user()->acc_type == '3')
                            <a href="{{ route('edit_restaurant') }}" class="btn btn-success">Edit Restaurant</a>
                        @endif
                    </div>
                </div>
            </div>
    </div>

    <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">Menu
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
                                                    <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Food Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php ($i = 1)
                                            @foreach ($menu as $menuitem)
                                                <tr class="gradeA odd" role="row">
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $menuitem->food_name }}</td>
                                                    <td>{{ $menuitem->food_categories }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row be-datatable-footer">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="table1_info" role="status" aria-live="polite"><?php echo "Showing " . $menu->firstItem() . " to " . $menu->lastItem() . " of " . $menu->total() . " entries"; ?></div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate">
                                        <?php echo $menu->render(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection