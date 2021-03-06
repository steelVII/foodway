@extends ('layouts.master')

@section('navi')

    @include ('layouts.nav')
    
@endsection

@section('content')

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
        <h1 class="title">
            Restaurants
        </h1>
        <h2 class="subtitle">
            Your Experience Starts Here
        </h2>
        </div>
    </div>
</section>

<section class="section">
    <div class="container is-fullhd">

         @if (!$restaurants->isEmpty())
            <div class="columns is-multiline" v-cloak>
                @foreach ($restaurants as $restaurant)

                    <div class="column is-3">
                        <a href="/restaurant/{{$restaurant->restaurant_name}}">
                            <div class="card">
                                    <div class="card-image">
                                        <div class="image res-logo" style="background-image: url({{ asset('storage/'.$restaurant->restaurant_logo) }})"></div>
                                    </div>
                                    <div class="card-content">
                                        <div class="media">
                                            <div class="media-content">
                                                <p class="title is-5">{{ $restaurant->restaurant_name }}</p>
                                            </div>
                                        </div>
                                        <div class="content">
                    
                                        </div>
                                    </div>
                                </div>
                        </a>
                    </div>
                    
                @endforeach

            </div>

        @else 

        <section class="hero is-medium is-transparent">
            <div class="hero-body">
                <div class="container">
                    <h3 class="subtitle has-text-centered">
                        We currently do not have any restaurant in your selected area. Please check back again soon for updates in this area.
                    </h3>
                </div>
            </div>
        </section>

        @endif

    </div>
</section>
    
@endsection         
