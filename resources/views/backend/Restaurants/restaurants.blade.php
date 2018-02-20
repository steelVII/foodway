@extends ('backend.backendmaster') 

@section('content') 

<h2>Restaurants</h2>

    @for ($i = 1; $i <= 5; $i++) 
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-flat">
                    <div class="panel-cover-image">
                        <img src="/assets/img/gallery/food1.jpeg" alt="">
                    </div>
                    <div class="panel-heading">Restaurant</div>
                    <div class="panel-body">
                        <p>Quisque gravida aliquam diam at cursus, quisque laoreet ac lectus a rhoncusac tempus odio.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-cover-image">
                        <img src="/assets/img/gallery/food2.jpeg" alt="">
                    </div>
                    <div class="panel-heading">
                        <div class="tools"><span class="icon s7-upload"></span><span class="icon s7-edit"></span><span class="icon s7-close"></span></div>
                        <span class="title">Restaurant</span>
                    </div>
                    <div class="panel-body">
                        <p>Quisque gravida aliquam diam at cursus, quisque laoreet ac lectus a rhoncusac tempus odio.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-border">
                    <div class="panel-cover-image">
                        <img src="/assets/img/gallery/food3.jpeg" alt="">
                    </div>
                    <div class="panel-heading"><span class="title">Restaurant</span></div>
                    <div class="panel-body">
                        <p>Quisque gravida aliquam diam at cursus, quisque laoreet ac lectus a rhoncusac tempus odio.</p>
                    </div>
                </div>
            </div>
        </div>
    @endfor
@endsection