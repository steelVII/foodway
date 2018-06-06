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

<script>

Vue.component('link-restaurant', {

template: `

    <a class="navbar-item" v-on:click="goUrl()">
        <i class="fas fa-shopping-basket"></i>
        <div style="display:inline-block;">
            <div class="badge">@{{quantity}}</div>
        </div>
    </a>

`,

computed: {

    goUrl: function() {

        var url = sessionStorage.getItem('resURL');

        if(url == null || url == undefined) {

            return false;

        }
        
        window.location.replace(url);

    },

    quantity: function() {

        let quantity = 0;

        var rowSet = JSON.parse(sessionStorage.getItem('rows'));

        if(rowSet == null || rowSet == undefined) {

            return 0;

        }

        for(var index = 0; index < rowSet.length; index++) {

        quantity += rowSet[index].quantity;

        }

        return quantity;

    }

}

});

Vue.component('badge-quantity',{

props: ['badge'],
template: `
   
    <div>
        <div class="badge">@{{quantity}}</div>
    </div>

`,

computed: {

    quantity: function() {

        let quantity = 0;

        for(var index = 0; index < this.badge.length; index++) {

        quantity += this.badge[index].quantity;

        }

        return quantity;

    }

}

});

</script>

@if (!Request::is('restaurant/*'))

    @if (session('clear_status'))

        <script>
                sessionStorage.removeItem('currentID');
                sessionStorage.removeItem('resURL');
                sessionStorage.removeItem('rows');
        </script>

    @endif

    <script>

        new Vue ({
    
            el: '#app',
    
        });
        
    </script>

@else

@yield ('cart')

@endif

@yield ('script')

@include ('layouts.scripts')

</body>
</html>