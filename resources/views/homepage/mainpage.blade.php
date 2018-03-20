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
                        Enter your postcode to find local restaurants and takeaways
                    </h1>
              </div>
          </div>
        <div class="columns">
            <div class="column is-6 is-offset-3">

            <form action="">
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input class="input is-medium" type="text" placeholder="Search Restaurants">
                    </div>
                    <div class="control is-expanded">
                            <a class="button is-medium is-primary" style="width:100%;">
                              Search
                            </a>
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

    <!-- <section class="section find-out-more">
        
        <div class="container is-fullhd">

            <div class="content">

                <div class="columns align-items-center">
                    <div class="column is-4 is-offset-8">

                        <h1>Enjoy our hot value meals with free delivery fee!</h1>

                    </div>
                </div>

            </div>

        </div>

    </section> -->

    <section class="section city-bg">
        <div class="container is-fullhd">
                <h4 class="title is-3 has-text-centered">Recommended Places</h4>
            <div class="content is-small">
                <div class="columns">
                    <div class="column is-8 is-offset-2">
                <div class="tile is-ancestor">
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

    <!-- <section class="section order-step">
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
    </section> -->

@endsection

@section('footer')
    @include('layouts.footer')
@endsection

