@extends ('backend.login_register_page')

@section('login_logout_head')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                <div class="row text-center m-b-15">
                        <img src="/assets/img/logo.png" width="50%" alt="">
                </div>
            <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                <span class="login100-form-title p-b-33">
                    Register
                </span>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input id="name" type="text" class="form-control input100" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif

                <div class="wrap-input100 rs1 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input id="email" type="email" class="form-control input100" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                 @endif

                <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                    <input id="password" type="password" class="form-control input100" name="password" placeholder="Password" required>
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                 @endif

                <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                    <input id="password-confirm" type="password" class="form-control input100" name="password_confirmation" placeholder="Confirm Password" required>
                </div>

                <!-- <div class="container-login100-form-btn m-t-20">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="apply-vendor" value="application"> Apply as Vendor
                        </label>
                    </div>
                </div> -->

                <div class="container-login100-form-btn m-t-20">
                    <button class="login100-form-btn">
                        Register
                    </button>
                </div>

                <div class="text-center p-t-30 p-b-10">
                    <a href="{{ url('/') }}" class="txt2 hov1">
                        Back To Homepage
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
