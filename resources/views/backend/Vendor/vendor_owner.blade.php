@extends ('backend.backendmaster')

@section('title')
<div class="page-head">
    <h2 class="page-head-title">Dashboard</h2>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="panel panel-flat">
      <div class="panel-heading">All Orders</div>
      <div class="panel-body">
        <p>Quisque gravida aliquam diam at cursus, quisque laoreet ac lectus a rhoncusac tempus odio.</p>
        <h1>{{$all_orders_count}}</h1>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-flat">
      <div class="panel-heading">Pending Orders</div>
      <div class="panel-body">
        <p>Quisque gravida aliquam diam at cursus, quisque laoreet ac lectus a rhoncusac tempus odio.</p>
        <h1>{{$pending_orders}}</h1>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-flat">
      <div class="panel-heading">Delivered Orders</div>
      <div class="panel-body">
        <p>Quisque gravida aliquam diam at cursus, quisque laoreet ac lectus a rhoncusac tempus odio.</p>
        <h1>{{$delivered_orders}}</h1>
      </div>
    </div>
  </div>
</div>

<h4 class="text-right"><strong>Total Sales Amount:</strong></h4>
<h1 class="text-right">RM {{$order_total}}</h1>
@endsection