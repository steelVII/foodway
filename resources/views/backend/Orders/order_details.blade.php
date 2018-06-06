@extends ('backend.backendmaster') 
@section('title')
<div class="page-head">
    <h2 class="page-head-title">Order #{{ $order_details->order_id }}</h2>
</div>
@endsection
 
@section('content')
<div class="row">
    <div class="col-sm-9">
        <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading panel-heading-divider">
                Order Details
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel-body">
                        <h4>Status: {{ $order_details->order_status }}</h4>
                        <h4>Payment Method: {{ $order_details->payment_method }}</h4>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel-body">
                        <h4>Delivery Time: {{ $order_details->delivery_time }}</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel-body">
                        <h4><strong>Shipping Details</strong></h4>
                        <h4>{{ $order_details->shipping_name }}</h4>
                        <h4>{{ $order_details->shipping_phone_number }}</h4>
                        <h4>{{ $order_details->shipping_email }}</h4>
                        <h4>{{ $order_details->shipping_address }}</h4>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="panel-body">
                        <h4><strong>Billing Details</strong></h4>
                        <h4>{{ $order_details->billing_name }}</h4>
                        <h4>{{ $order_details->billing_phone_number }}</h4>
                        <h4>{{ $order_details->billing_email }}</h4>
                        <h4>{{ $order_details->billing_address }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
                <div class="panel-heading">Ordered Dishes</div>
                <div class="panel-body">
                  <table class="table table-condensed table-hover table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Dish</th>
                        <th class="number">Price</th>
                        <th class="number">Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php $dish_items = json_decode($order_details->dish_items ); @endphp
                        @foreach ($dish_items as $item)
                            <tr>
                                <td>{{ $item->name }} x {{ $item->quantity }}</td>
                                <td class="number">{{ $item->price }}</td>
                                <td class="number">
                                    @php                                    
                                        $calc = $item->price * $item->quantity;
                                        $subtotal = number_format((float)$calc, 2, '.', '');
                                        echo $subtotal;
                                    @endphp
                                </td>
                            </tr>
                        @endforeach
                       <tr>
                            <td></td>
                            <td class="number"><h4>Total</h4></td>
                            <td class="number"><h4>{{$order_details->total}}</h4></td>
                       </tr>
                    </tbody>
                  </table>
                </div>
              </div>
    </div>
    @if ($order_details->order_status === "Pending")
        <div class="col-sm-3">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">
                    Options
                </div>
                <div class="panel-body">
                    <p class="xs-mt-5 xs-mb-5 full-button-width">
                        @if(Auth::check() && Auth::user()->acc_type == '1')
                            <a class="btn btn-space btn-success" href="{{ route('set_delivered',$order_details->id) }}">Set to Delivered</a>
                        @else
                            <a class="btn btn-space btn-success" href="{{ route('vendor_set_delivered',$order_details->id) }}">Set to Delivered</a>
                        @endif
                        <!--<a class="btn btn-space btn-danger">Delete</a>-->
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection