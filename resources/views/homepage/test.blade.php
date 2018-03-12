@extends ('layouts.master')

@section('content')

<div id="app" class="container">
    
        <section>
                <b-dropdown>
                        <button class="button is-primary" slot="trigger">
                            <span>Click me!</span>
                            <b-icon icon="menu-down"></b-icon>
                        </button>
            
                        <b-dropdown-item>Action</b-dropdown-item>
                        <b-dropdown-item>Another action</b-dropdown-item>
                        <b-dropdown-item>Something else</b-dropdown-item>
                    </b-dropdown>
        </section>
    
    </div>
                
    
@endsection
                