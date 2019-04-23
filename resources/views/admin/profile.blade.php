@extends('layouts.admin.app')

@section('title', __('Admin Profile'))

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('My Profile') }}</h6>
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

                        <form id="update-admin-profile" class="" method="POST" enctype="multipart/form-data" action="{{ route('admin.profile') }}">
                            @csrf
                            <input type="hidden" name="_type" value="update_profile">
                            <div class="form-group row">
                                    <div class="col-sm-2">{{ __('First Name') }}</div>
                                    <div class="col-sm-10">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ old('name', $user->name) }}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <div class="col-sm-2">{{ __('Last Name') }}</div>
                                    <div class="col-sm-10">
                                        <input class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" type="text" id="lastname" name="lastname" value="{{ old('lastname', $user->lastname) }}">
                                        @if ($errors->has('lastname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <div class="col-sm-2">{{ __('Email') }}</div>
                                    <div class="col-sm-10">
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
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