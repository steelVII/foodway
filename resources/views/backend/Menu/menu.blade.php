@extends ('backend.backendmaster')

@section('title')
  <div class="page-head">
      <h2 class="page-head-title">Menu</h2>
  </div>
@endsection

@section('content')

<div class="row">
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading panel-heading-divider">Menu Order<span class="panel-subtitle">Drag &amp; drop hierarchical list to change the order of the menu (Order is from Top to Bottom)</span></div>
      <div class="panel-body">
        <div id="list2" class="dd">
            @if( !empty($restaurant_category) || $restaurant_category != null )
                <ol class="dd-list menu-holder"> 
                    @foreach ($restaurant_category as $cat)
                    <li data-id="{{ $cat->id }}" data-order="{{ $cat->order }}" class="dd-item dd3-item"><button data-action="collapse" type="button">Collapse</button><button data-action="expand" type="button" style="display: none;">Expand</button>
                        <div class="dd-handle dd3-handle my-handle"></div>
                        <div class="dd3-content">{{ $cat->name }}</div>
                    </li>
                    @endforeach
                </ol>
            @else 
                <div class="text-center">
                    <h4>There are currently no category available.</h4>
                </div>
            @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('page-script')

<script>

    $(".menu-holder").each(function(i, el) {

    var sortable = Sortable.create(el,{ 

        dataIdAttr: 'data-id',
        handle: '.my-handle',

        onSort: function (e) {

            var items = e.to.children;
            var order = [];
            var ids = [];

            for (var i = 0; i < items.length; i++) {
                order.push($(items[i]).data('order'));
                ids.push($(items[i]).data('id'));
            }

            var url = 'menu_sort/sort';

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
                    orders : order,
                    id : ids,
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

@endsection