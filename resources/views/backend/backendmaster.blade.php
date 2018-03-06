<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts & Styles -->
    <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/assets/lib/bootstrap-slider/css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.6.1/Sortable.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/lib/jquery.gritter/css/jquery.gritter.css">
    <script src="/assets/lib/jquery.gritter/js/jquery.gritter.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/admin-style.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/bootstrap-clockpicker.min.css" type="text/css">
</head>
<body>
    <div id="app">

        @include ('backend.nav-backend')

            <div class="be-left-sidebar">

                @include ('backend.sidebar-menu')

            </div>

	        <div class="be-content">
                
                @yield('title')
                
                <div class="main-content container-fluid">
                    @yield('content')
                </div>
            </div>

    </div>

    <!-- Scripts -->

    @include ('layouts.scripts')
    @yield ('page-script')
    <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });

            $(".testo").each(function(i, el) {

            var sortable = Sortable.create(el,{ 
                dataIdAttr: 'data-id',
                handle: '.my-handle',

                onSort: function (e) {
        var items = e.to.children;
        var result = [];
        var ids = [];
        for (var i = 0; i < items.length; i++) {
            result.push($(items[i]).data('pos'));
            ids.push($(items[i]).data('id'));
        }
        var cat = e.item.getAttribute('data-cat');
        var url = 'food_list/sort';
                    if (url) {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            method: "POST",
                            url: url,
                            data: {
                            position: result,
                            category: cat,
                            ids: ids
                            },
                            success: function(result){
                                $.gritter.add({
	// (string | mandatory) the heading of the notification
	title: 'Sorting Saved',
	// (string | mandatory) the text inside the notification
	text: 'This will fade out after a certain amount of time.',
	// (bool | optional) if you want it to fade out on its own or just sit there
	sticky: false, 
	// (int | optional) the time you want it to be alive for before fading out (milliseconds)
	time: 2000,
	// (string | optional) the class name you want to apply directly to the notification for custom styling
	class_name: 'gritter-item-wrapper color success'
});
                            }
                        });
                    }
    }

            });

    });

    </script>
    
</body>
</html>
