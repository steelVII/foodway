@extends ('backend.backendmaster')

@section('content')
<div class="main-content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">Food Categories
                        <div class="tools dropdown"><span class="icon mdi mdi-download"></span><a href="#" type="button" data-toggle="dropdown" class="dropdown-toggle"><span class="icon mdi mdi-more-vert"></span></a>
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
                                                    style="width: 205px;">Rendering engine</th>
                                                <th class="sorting" tabindex="0" aria-controls="table1"
                                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                                    style="width: 253px;">Browser</th>
                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1"
                                                    colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 231px;">Platform(s)</th>
                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1"
                                                    colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 173px;">Engine version</th>
                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 130px;">CSS grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 1.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row be-datatable-footer">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled" id="table1_previous">
                                                <a href="#" aria-controls="table1" data-dt-idx="0" tabindex="0">Previous</a>
                                            </li>
                                            <li class="paginate_button active">
                                                <a href="#" aria-controls="table1" data-dt-idx="1" tabindex="0">1</a>
                                            </li>
                                            <li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="2" tabindex="0">2</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="3" tabindex="0">3</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="4" tabindex="0">4</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="5" tabindex="0">5</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="6" tabindex="0">6</a></li>
                                            <li class="paginate_button next"
                                                id="table1_next"><a href="#" aria-controls="table1" data-dt-idx="7" tabindex="0">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection