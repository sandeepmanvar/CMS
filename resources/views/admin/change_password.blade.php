@extends('layouts.admin.app')

@section('title', __('Admin Change Password'))

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Change Password') }}</h6>
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

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form id="update-admin-change-password" class="" method="POST" enctype="multipart/form-data" action="{{ route('admin.change_password') }}">
                            @csrf
                            <input type="hidden" name="_type" value="change_password">
                            <div class="form-group row">
                                    <div class="col-sm-2">{{ __('Current Password') }}</div>
                                    <div class="col-sm-10">
                                        <input class="form-control{{ $errors->has('cpassword') ? ' is-invalid' : '' }}" type="password" id="cpassword" name="cpassword" value="{{ old('cpassword') }}">
                                        @if ($errors->has('cpassword'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cpassword') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <div class="col-sm-2">{{ __('New Password') }}</div>
                                    <div class="col-sm-10">
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" id="password" name="password" value="{{ old('password') }}">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <div class="col-sm-2">{{ __('Confirm Password') }}</div>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" id="conf_password" name="password_confirmation" value="{{ old('password') }}">
                                    </div>
                                </div>
    
                                <div class="form-group row text-right">
                                    <div class="col-sm-12">
                                        <button type="submit" name="save" class="btn btn-primary">{{ __('Update') }}</button>
                                        <button type="reset" name="cancel" class="btn btn-secondary" onclick="location.reload();">{{ __('Cancel') }}</button>
                                    </div>
                                </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection