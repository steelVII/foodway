<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('layouts.head')

<body class="has-navbar-fixed-top">

@include ('layouts.nav')

    @yield('content')

@include ('layouts.footer')

<script src="./js/app.js"></script>  

@include ('layouts.scripts')

</body>
</html>