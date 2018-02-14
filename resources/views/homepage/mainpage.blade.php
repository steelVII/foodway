@extends ('layouts.master') 

@section('content')

    <div class="container-fluid">
        <div class="homepage-banner">
            <div class="container">
                <h1 class="banner-title">Search Restaurants Near Your Location</h1>
                <img src="http://azexo.com/foodpicky/wp-content/uploads/2016/09/steps.png" alt="steps">
            </div>
        </div>
    </div>

    <section class="container-fluid find-out-more">

        <div class="row align-items-center">
            <div class="col-md-4 offset-md-8">

                <h1>Enjoy our hot value meals with free delivery fee!</h1>

            </div>
        </div>

    </section>

    <section class="container-fluid order-step">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image"
                    width="140" height="140">
                <h2>Choose a restaurant</h2>
                <p>Select a restaurant.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-md-4">
                <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image"
                    width="140" height="140">
                <h2>Choose a Tasty Dish</h2>
                <p>Select which dish you wish to order.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-md-4">
                <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image"
                    width="140" height="140">
                <h2>Delivery</h2>
                <p>Get your food delivered! And enjoy your meal!</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
            </div>
            <!-- /.col-lg-4 -->
        </div>
    </section>

    <section class="container-fluid mobile-app">
            <div class="row align-items-center">
                <div class="col-md-4 offset-md-8">
            
                    <h1>Mobile App Coming Soon</h1>
            
                </div>
            </div>
    </section>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection

