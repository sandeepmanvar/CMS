@extends('layouts.admin.app')

@section('title', __('Settings Signin Integrations'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Signin Integrations') }}</h6>
                    </div>
    
                    <div class="card-header py-3">

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form id="signing-integrations" class="" method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.signin') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-2">{{ __('Facebook') }}</div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input{{ $errors->has('fb_signin') ? ' is-invalid' : '' }}" type="checkbox" id="fb_signin" name="facebook_signin" value="{{  old('facebook_signin',config('settings.signin.facebook_signin')) == 'Y' ? 'N' : 'Y' }}" {{ old('facebook_signin',config('settings.signin.facebook_signin')) == 'Y' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="fb_signin">
                                            <small id="fb_signin_help" class="form-text text-muted">
                                                {{ __('Tick to enable - sign in with facebook account') }}
                                            </small>
                                        </label>
                                        @if ($errors->has('fb_signin'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('fb_signin') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row fb_signin_div {{ config('settings.signin.facebook_signin') == 'N' && old('facebook_signin') != 'Y' ? 'd-none' : '' }}">
                                <div class="col-sm-2 col-form-label">{{ __('App ID') }}</div>
                                <div class="col-sm-10">
                                    <input class="form-control{{ $errors->has('fb_app_id') ? ' is-invalid' : '' }}" type="text" id="fb_app_id" name="fb_app_id" value="{{ old('fb_app_id',config('settings.signin.fb_app_id')) }}">
                                    @if ($errors->has('fb_app_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('fb_app_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row fb_signin_div {{ config('settings.signin.facebook_signin') == 'N' && old('facebook_signin') != 'Y' ? 'd-none' : '' }}">
                                <div class="col-sm-2 col-form-label">{{ __('App Secret') }}</div>
                                <div class="col-sm-10">
                                    <input class="form-control{{ $errors->has('fb_app_secret') ? ' is-invalid' : '' }}" type="text" id="fb_app_secret" name="fb_app_secret" value="{{ old('fb_app_secret',config('settings.signin.fb_app_secret')) }}">
                                    @if ($errors->has('fb_app_secret'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('fb_app_secret') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">{{ __('Google') }}</div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input{{ $errors->has('google_signin') ? ' is-invalid' : '' }}" type="checkbox" id="google_signin" name="google_signin" value="{{ old('google_signin',config('settings.signin.google_signin')) == 'Y' ? 'N' : 'Y' }}" {{ old('google_signin',config('settings.signin.google_signin')) == 'Y' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="google_signin">
                                            <small id="google_signin_help" class="form-text text-muted">
                                                {{ __('Tick to enable - sign in with google account') }}
                                            </small>
                                        </label>
                                        @if ($errors->has('google_signin'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('google_signin') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row google_signin_div {{ config('settings.signin.google_signin') == 'N' && old('google_signin') != 'Y' ? 'd-none' : '' }}">
                                <div class="col-sm-2 col-form-label">{{ __('Client ID') }}</div>
                                <div class="col-sm-10">
                                    <input class="form-control{{ $errors->has('google_client_id') ? ' is-invalid' : '' }}" type="text" id="google_client_id" name="google_client_id" value="{{ old('google_client_id',config('settings.signin.google_client_id')) }}">
                                    @if ($errors->has('google_client_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('google_client_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row google_signin_div {{ config('settings.signin.google_signin') == 'N' && old('google_signin') != 'Y' ? 'd-none' : '' }}">
                                <div class="col-sm-2 col-form-label">{{ __('Client Secret') }}</div>
                                <div class="col-sm-10">
                                    <input class="form-control{{ $errors->has('google_client_secret') ? ' is-invalid' : '' }}" type="text" id="google_client_secret" name="google_client_secret" value="{{ old('google_client_secret', config('settings.signin.google_client_secret')) }}">
                                    @if ($errors->has('google_client_secret'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('google_client_secret') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        
                            <div class="form-group row text-center">
                                <div class="col-sm-12">
                                    <button type="submit" name="save" class="btn btn-primary">{{ __('Save Changes') }}</button>
                                    <button type="reset" name="cancel" class="btn btn-secondary" onclick="location.reload();">{{ __('Cancel Changes') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</div>
<!-- /.container-fluid -->

@endsection

@section('page-specific-scripts-bottom')

<script>
$(function() {
    $('#fb_signin').change(function(){
        if($(this).prop('checked') == true) {
            $('.fb_signin_div').removeClass('d-none');
        } else {
            $('.fb_signin_div').addClass('d-none');
        }
    });

    $('#google_signin').change(function(){
        if($(this).prop('checked') == true) {
            $('.google_signin_div').removeClass('d-none');
        } else {
            $('.google_signin_div').addClass('d-none');
        }
    });
});    
</script>

@endsection