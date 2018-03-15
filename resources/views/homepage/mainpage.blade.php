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
        <h1 class="title">
            Search Restaurants Near Your Location
        </h1>
        <h2 class="subtitle">
            Subtitle
        </h2>
      </div>
    </div>
  
    <!-- Hero footer: will stick at the bottom -->

  </section>
    
@endsection

@section('content')

    <section class="section find-out-more">
        
        <div class="container is-fullhd">

            <div class="content">

                <div class="columns align-items-center">
                    <div class="column is-4 is-offset-8">

                        <h1>Enjoy our hot value meals with free delivery fee!</h1>

                    </div>
                </div>

            </div>

        </div>

    </section>

    <section class="section">
        <div class="container is-fullhd">
            <div class="content">
                <div class="columns">
                    <div class="column is-3">
                        <div class="box">
                            <h2>Test</h2>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="box">
                            <h2>Test</h2>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="box">
                            <h2>Test</h2>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="box">
                            <h2>Test</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section order-step">
        <div class="container">
            <div class="content">
                <div class="align-items-center columns">
                    <div class="column">
                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image"
                            width="140" height="140">
                        <h2>Choose a restaurant</h2>
                        <p>Select a restaurant.</p>
                        <p><a class="button is-primary is-outlined" href="#" role="button">View details »</a></p>
                    </div>
                    <div class="column">
                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image"
                            width="140" height="140">
                        <h2>Choose a Tasty Dish</h2>
                        <p>Select which dish you wish to order.</p>
                        <p><a class="button is-primary is-outlined" href="#" role="button">View details »</a></p>
                    </div>
                    <div class="column">
                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image"
                            width="140" height="140">
                        <h2>Delivery</h2>
                        <p>Get your food delivered! And enjoy your meal!</p>
                        <p><a class="button is-primary is-outlined" href="#" role="button">View details »</a></p>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <section class="section mobile-app">
        <div class="container is-fullhd">
            <div class="content">
                <div class="columns align-items-center">
                    <div class="column is-4 is-offset-8">
                
                        <h1>Mobile App Coming Soon</h1>
                
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection

