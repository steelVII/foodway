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
        <p>All orders made, pending and delivered.</p>
        <h1 class="order_chart">{{$all_orders_count}}</h1>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-flat">
      <div class="panel-heading">Pending Orders</div>
      <div class="panel-body">
        <p>Current pending delivery.</p>
        <h1 class="order_chart">{{$pending_orders}}</h1>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-flat">
      <div class="panel-heading">Delivered Orders</div>
      <div class="panel-body">
        <p>Orders successfully delivered.</p>
        <h1 class="order_chart">{{$delivered_orders}}</h1>
      </div>
    </div>
  </div>
</div>

<h4 class="text-right"><strong>Total Sales Amount:</strong></h4>
<h1 class="text-right">RM {{$order_total}}</h1>
@endsection