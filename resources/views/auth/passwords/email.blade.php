@extends('backend.backendmaster')

@section('content')
<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                <form class="login100-form validate-form" method="POST" action="{{ route('password.email')  }}">
                        {{ csrf_field() }}
                    <span class="login100-form-title p-b-33">
                        Reset Password
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
        
                    <div class="container-login100-form-btn m-t-20">
                        <button class="login100-form-btn">
                            Send Password Reset Link
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