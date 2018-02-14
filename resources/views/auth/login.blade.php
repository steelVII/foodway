@extends ('backend.backendmaster')

@section('content')
<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <span class="login100-form-title p-b-33">
                        Account Login
                    </span>
    
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
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
    
                     <div class="container-login100-form-btn m-t-20">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                        </div>
    
                    <div class="container-login100-form-btn m-t-20">
                        <button class="login100-form-btn">
                            Sign in
                        </button>
                    </div>
    
                    <div class="text-center p-t-45 p-b-4">
                        <span class="txt1">
                            Forgot
                        </span>
    
                        <a href="{{ route('password.request') }}" class="txt2 hov1">
                            Password?
                        </a>
                    </div>
    
                    <div class="text-center">
                        <span class="txt1">
                            Create an account?
                        </span>
    
                        <a href="{{ route('register') }}" class="txt2 hov1">
                            Sign up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection