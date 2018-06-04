@extends ('layouts.master')

@section('navi')

    @include ('layouts.nav')
    
@endsection

@section('content')

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
        <h1 class="title">
            Checkout
        </h1>
        </div>
    </div>
</section>

<section class="section">
    <div class="container is-fullhd">

        <form method="POST" action="/checkout_gateway/{{$res_name}}/{{$id}}" class="form columns is-variable is-8">

            {{ csrf_field() }}

            <div class="column is-7">
            @if (Auth::check())

                <checkout-form :info="{{ $user }}"></checkout-form>
            @else 

                <checkout-form info=""></checkout-form>

            @endif

            </div>

            <div class="column box">
                    <div class="content">

                            <h3 class="title is-4 has-text-weight-semibold">{{$res_name}}</h3>

                            <table class="table is-striped">
                                <thead>
                                    <tr>
                                    <th style="width:50%;">Dish</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($items as $item)
                                        <tr>
                                            <td>{{$item['name']}} x {{$item['quantity']}}</td>
                                            <td>RM{{$item['price']}}</td>
                                            <td>RM{{ number_format((float)$item['price'] * $item['quantity'], 2, '.', '')}}</td>
                                        </tr>

                                        @endforeach
                                </tbody>
                            </table>

                            @php $test = json_encode($items); @endphp

                            <input type="hidden" name="order_item" value="{{$test}}">

                            <hr>

                            <div class="columns is-mobile">
                                <div class="column is-7">

                                    <h4>Subtotal:</h4>

                                </div>
                                
                                <div class="column has-text-right">

                                    <h4>RM{{$subtotal}}</h4>

                                </div>
                            </div>

                            <!-- <div class="columns is-mobile">
                                <div class="column is-7">

                                    <h4>GST(6%):</h4>

                                </div>
                                
                                <div class="column has-text-right">

                                    <h4>RM{{--$gst--}}</h4>

                                </div>
                            </div> -->

                            <div class="columns is-mobile">
                                <div class="column is-7">

                                    <h4 class="has-text-weight-bold">Total:</h4>

                                </div>
                                
                                <div class="column has-text-right">

                                    <h4>RM{{$total}}</h4>
                                    <input type="hidden" name="order_total" value="{{$total}}">

                                </div>
                            </div>

                            <div class="control has-text-right">
                                <button class="button is-primary is-medium">Submit</button>
                            </div>
                
                    </div>
            </div>

        </form>

    </div>
</section>

@endsection