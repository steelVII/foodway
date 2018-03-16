<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('layouts.head')

<body class="has-navbar-fixed-top">

    <div id="app">

@yield ('navi')

    @yield('content')

@include ('layouts.footer')

    </div>

<script src="../js/app.js"></script>

@yield ('cart')

@yield ('script')

@include ('layouts.scripts')

</body>
</html>