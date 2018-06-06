<script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="/assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
<script src="/assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
<script src="/assets/js/main.js" type="text/javascript"></script>
<script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function(){
      //initialize the javascript
      App.init();
      App.formElements();
  });
</script>

<script>

document.addEventListener('DOMContentLoaded', function () {

// Get all "navbar-burger" elements
var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

// Check if there are any navbar burgers
if ($navbarBurgers.length > 0) {

  // Add a click event on each of them
  $navbarBurgers.forEach(function ($el) {
    $el.addEventListener('click', function () {

      // Get the target from the "data-target" attribute
      var target = $el.dataset.target;
      var $target = document.getElementById(target);

      // Toggle the class on both the "navbar-burger" and the "navbar-menu"
      $el.classList.toggle('is-active');
      $target.classList.toggle('is-active');

    });
  });
}

});

</script>

@if (Request::is('/'))

    <script>

    $('nav').addClass('null');

    $(window).scroll(function(){
        if ($(window).scrollTop() >= 85) {
            $('nav').addClass('fixed-header');
            $('nav').removeClass('null');
        }
        else {
            $('nav').removeClass('fixed-header');
            $('nav').addClass('null');
        }
    });

    </script>

@else

<script>

    var navPos = $('nav').offset().top;

    $(window).scroll(function(){ 

        if ( $(window).scrollTop() >= navPos ) {
            $('nav').addClass('fixed-header');
            $('nav').addClass('is-fixed-top');
        }
        else {
            $('nav').removeClass('fixed-header');
            $('nav').removeClass('is-fixed-top');
        }
    });

    </script>
    
@endif