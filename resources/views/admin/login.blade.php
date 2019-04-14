@extends('layouts.admin.login') 

@section('title', __('Login'))

@section('content')

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Welcome Back!') }}</h1>
                                </div>
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <form class="user" method="POST" action="{{ route('admin.login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="username" type="text" class="form-control form-control-user{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" aria-describedby="usernameHelp" placeholder="{{ __('Username') }}" required autofocus> 
                                      @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span> 
                                      @endif
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required> 
                                      @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> 
                                      @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" {{ old( 'remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customCheck">{{ __('Remember Me') }}</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Login') }}
                                    </button>
                                </form>
                                @if (config('settings.security.disable_admin_pw_reset') == 'N')
                                <hr>
                                <div class="text-center">
                                    @if (Route::has('admin.password.request'))
                                    <a class="small" href="{{ route('admin.password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> 
                                 	@endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection