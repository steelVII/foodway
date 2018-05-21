@extends ('backend.backendmaster') 

@section('title')
    <div class="page-head">
        <h2 class="page-head-title">Restaurants</h2>
    </div>
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
                        <p>

                            @php 

                                if( !empty($restaurant->food_categories) || $restaurant->food_categories != null ) {
                                
                                    $restaurant_cat = json_decode($restaurant->food_categories);

                                    usort($restaurant_cat, function($a, $b) { //Sort the array using a user defined function
                                        return $a->order < $b->order ? -1 : 1; //Compare the scores
                                    });

                                    foreach ($restaurant_cat as $item) {

                                        if ( $item === end($restaurant_cat)) {
                                            echo $item->name;
                                        }
                                        else {
                                            echo $item->name.',';
                                        }

                                    }

                                }

                            @endphp

                        </p>

                    </div>
                    <div class="text-right" style="padding:0 12px 12px;">
                        <a href="restaurant/{{ $restaurant->id }}" class="btn btn-space btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection