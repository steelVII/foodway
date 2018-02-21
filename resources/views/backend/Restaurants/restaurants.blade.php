@extends ('backend.backendmaster') 

@section('title')
    Restaurants
@endsection

@section('content') 
    <div class="row">
        @foreach ($restaurants as $restaurant)
            <div class="col-md-4">
                <div class="panel panel-flat">
                    <div class="panel-cover-image">
                        <img src="{{ asset('storage/'.$restaurant->restaurant_image) }}" alt="">
                    </div>
                    <div class="panel-heading">{{ $restaurant->restaurant_name }}</div>
                    <div class="panel-body">
                        <p>{{ $restaurant->food_categories }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection