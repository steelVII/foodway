@extends ('layouts.master')

@section('navi')

    @include ('layouts.nav')
    
@endsection

@section('content')

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
        <h1 class="title">
            Dashboard
        </h1>
        </div>
    </div>
</section>

<section class="section">
    <div class="container is-fullhd">

        <div class="columns">
            <div class="column is-one-fifth">

                <aside class="menu">
                    <p class="menu-label">
                      General
                    </p>
                    <ul class="menu-list">
                      <li><a>Dashboard</a></li>
                    </ul>
                  </aside>

            </div>
            <div class="column">

                <h2 class="title is-3">Hello, {{$user->name}}</h2>

                <div class="columns">
                    <div class="column">
                        <h2 class="subtitle is-5">User Details</h2>
                        <p><i class="fas fa-phone"></i> {{$user->phone_number}}</p>
                        <p><i class="fas fa-envelope"></i> {{$user->email}}</p>
                    </div>
                    <div class="column">
                        <h2 class="subtitle is-5">Address</h2>
                        <p><i class="fas fa-map-marker"></i> {{$user->address}}</p>
                    </div>
                </div>

                <hr>
                <br>

                <h2 class="title is-4">Orders</h2>
                <ul>
                    <li>Click on the arrows for detailed view</li>
                    <li>Click on table header to sort by selected column.</li>
                </ul>

                <br>

                <table-info :order-info="{{ $orders }}"></table-info>

            </div>
          </div>          

    </div>
</section>

@endsection