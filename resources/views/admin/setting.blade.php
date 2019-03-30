@extends('layouts.admin.app')

@section('title', __('Settings'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Settings') }}</h6>
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

                        @include('admin.settings-tab')
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                @include('admin.settings-general')
                            </div>
                            <div class="tab-pane fade" id="localisation" role="tabpanel" aria-labelledby="localisation-tab">
                                {{-- @include('admin.settings-localisation') --}}
                            </div>
                            <div class="tab-pane fade" id="mail" role="tabpanel" aria-labelledby="mail-tab">
                                {{-- @include('admin.settings-mail') --}}
                            </div>
                            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                                {{-- @include('admin.settings-security') --}}
                            </div>
                            <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                                {{-- @include('admin.settings-other') --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
<!-- /.container-fluid -->

@endsection
