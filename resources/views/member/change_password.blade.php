@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Password</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('account.changepassword') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        @if ($errors->has('g-recaptcha-response'))
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <input type="hidden" class="form-control is-invalid">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            </div>
                        </div>
                        @endif
                        
                        @if (config('settings.security.enable_captcha_form') == 'Y')
                            @if (config('settings.security.captcha_type') == 'invisible_recaptcha')
                                @recaptcha    

                                @if ($errors->has('g-recaptcha-response'))
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <input type="hidden" class="form-control is-invalid">
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                @endif
                            @else
                            <div class="form-group row">
                                <div class="col-md-3 offset-md-4">
                                    {{ captcha_img('math') }}
                                </div>
                                <div class="col-md-3">
                                    <input id="captcha" type="text" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" name="captcha" required>
                                    @if ($errors->has('captcha'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('captcha') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @endif 
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
