@extends ('backend.backendmaster')

@section('title')
    Update/Edit User
@endsection

@section('content')
<div class="row">
<div class="col-sm-6">
        <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-body">
<form method="POST" action="{{ $user->id }}" data-parsley-validate="" novalidate="">
        {{ csrf_field() }}

        {{ method_field('PATCH') }}
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" parsley-trigger="change" required="" value="{{ $user->name }}" placeholder="Username" autocomplete="off" class="form-control"  readonly>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" parsley-trigger="change" required="" value="{{ $user->email}}" placeholder="Enter Email" autocomplete="off"
            class="form-control">
    </div>
    <p class="text-right">
        <button type="submit" class="btn btn-space btn-primary">Submit</button>
    </p>
</form>
        </div>
    </div>
</div>
</div>
@endsection