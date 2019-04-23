@extends('layouts.admin.app')

@section('title', __('Settings'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('General Settings') }}</h6>
                    </div>
    
                    <div class="card-header py-3">

                        @if ($errors->has('_type'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $errors->first('_type') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @include('admin.settings.general.tab')
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                @include('admin.settings.general.app')
                            </div>
                            <div class="tab-pane fade" id="localisation" role="tabpanel" aria-labelledby="localisation-tab">
                                @include('admin.settings.general.localisation')
                            </div>
                            <div class="tab-pane fade" id="mail" role="tabpanel" aria-labelledby="mail-tab">
                                @include('admin.settings.general.mail')
                            </div>
                            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                                @include('admin.settings.general.security')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
<!-- /.container-fluid -->

@endsection

@push('scripts-b')

<script>
$(function() {
    $('a[data-toggle="tab"]').on('click', function(e) {
        window.localStorage.setItem('activeTab', $(e.target).attr('href'));
    });

    var activeTab = window.localStorage.getItem('activeTab');
    
    if (activeTab) {
        $('#myTab a[href="' + activeTab + '"]').tab('show');
        window.localStorage.removeItem("activeTab");
    }
});    
</script>

@endpush
