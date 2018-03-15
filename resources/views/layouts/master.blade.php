<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('layouts.head')

<body class="has-navbar-fixed-top">

@yield ('navi')

    @yield('content')

@include ('layouts.footer')

<script src="../js/app.js"></script>

@yield ('cart')

@yield ('script')

@include ('layouts.scripts')

</body>
</html>