@extends ('layouts.master')

@section('navi')

<section class="hero is-fullheight homepage-banner">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        @include ('layouts.nav')
    </div>
  
    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
      <div class="container has-text-centered">
          <div class="columns">
              <div class="column is-6 is-offset-3">
                    <h1 class="title is-3 has-text-weight-normal search-title">
                        Select Your Location and Find Restaurants Near You
                    </h1>
              </div>
          </div>
        <div class="columns">
            <div class="column is-6 is-offset-3">

            <form method="POST" action="restaurant_by_place">

                {{ csrf_field() }}

                <div class="field has-addons" style="justify-content:center;">
                    <div class="control select is-medium is-rounded" style="width:60%; position:relative;">
                        <select class="js-example-basic-single" name="places" id="places" style="width:100%; display:none;">
                            @foreach ($cities as $city)
                                <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="control">
                        <button id="home-search" class="button is-medium is-primary">Search</button>
                    </div>
                </div>
            </form>

            </div>
        </div>

      </div>
    </div>
  
    <!-- Hero footer: will stick at the bottom -->

  </section>
    
@endsection

@section('content')

    <section class="section city-bg">
        <div class="container is-fullhd">
            <h4 class="title is-3 has-text-centered">Recommended Places</h4>
            <div class="content is-small">
                <div class="columns">
                    <div class="column is-12">
                        <!-- <div class="tile is-ancestor">
                            <div class="tile is-vertical">
                                <div class="tile is-parent">
                                    <a class="tile is-child box" style="height: 40vmin;">
                                        <p class="title is-4 has-text-centered">Setia Alam</p>
                                    </a>
                                </div>
                                <div class="tile">
                                    <div class="tile is-parent">
                                        <a class="tile is-child box" style="height: 22vmin;">
                                            <p class="title is-4 has-text-centered">Puchong</p>
                                        </a>
                                    </div>
                                    <div class="tile is-parent">
                                        <a class="tile is-child box" style="height: 22vmin;">
                                            <p class="title is-4 has-text-centered">Subang</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="tile is-5 is-vertical is-parent">

                                <a class="tile is-child box">
                                    <p class="title is-4 has-text-centered">Klang</p>
                                </a>

                                <a href="{{ route('home') }}" class="tile is-child box">
                                    <p class="title is-4 has-text-centered">Shah Alam</p>
                                </a>

                            </div>
                        </div> -->

                        <div class="columns recommended">

                            @for ($i = 0; $i < 4; $i++)

                                @php

                                    $random_city = array_pop($random_place);

                                @endphp

                                <div class="column">
                                    <a href="restaurants_{{ $random_city }}" class="tile is-child box">
                                        <p class="title is-4 has-text-centered">{{ $random_city }}</p>
                                    </a>
                                </div>
                                
                            @endfor
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <section class="section mobile-app">
                <div class="container is-fullhd margin-pos">
                    <div class="content">
                        <div class="columns align-items-center">
                            <div class="column is-4 app-title">
                        
                                <h1>Mobile App Coming Soon</h1>
                                <h3>Order food with just a few clicks!</h3>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </section>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@section('script')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>

        $(document).ready(function() {

            $('#places').select2({
                placeholder: 'Select an option',
                width: 'resolve'
            });

            $('.select2.select2-container').hide();

            $('.select2.select2-container').addClass('select');

            setTimeout(function(){ $('.select2.select2-container').fadeIn(150, "linear"); }, 100);
            setTimeout(function(){ $('#home-search').fadeIn(150, "linear"); }, 100);
            setTimeout(function(){ $('.select:not(.is-multiple):after').fadeIn(250, "linear"); }, 200);
            
        });

    </script>
@endsection

