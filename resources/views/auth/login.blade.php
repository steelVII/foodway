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
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <span class="login100-form-title p-b-33">
                        Login
                    </span>
    
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input id="email" type="email" class="form-control input100" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>
    
                    @if ($errors->has('email'))
                    <div class="form-group">
                        <span class="help-block alert alert-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    </div>
                     @endif
    
                    <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                        <input id="password" type="password" class="form-control input100" name="password" placeholder="Password" required>
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>
    
                    @if ($errors->has('password'))
                    <div class="form-group">
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    </div>
                     @endif
    
                     <!-- <div class="container-login100-form-btn m-t-20">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                    </div> -->
    
                    <div class="container-login100-form-btn m-t-20">
                        <button class="login100-form-btn">
                            Sign in
                        </button>
                        <!--<a href="{{url('/facebook-redirect')}}" class="btn btn-primary">Login with Facebook</a>-->
                    </div>
    
                    <!--<div class="text-center">
                        <span class="txt1">
                            Create an account?
                        </span>
    
                        <a href="{{ route('register') }}" class="txt2 hov1">
                            Sign up
                        </a>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
@endsection