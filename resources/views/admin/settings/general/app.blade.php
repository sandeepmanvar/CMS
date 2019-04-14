<form id="form-general" class="" method="POST" enctype="multipart/form-data" action="{{ route('admin.settings') }}">
    @csrf
    <input type="hidden" name="_type" value="general">
    <div class="form-group row">
        <label for="company_name" class="col-sm-2 col-form-label">{{ __('Company Name') }}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" id="company_name" name="company_name" placeholder="{{ __('Company Name') }}" value="{{ old('company_name', config('settings.general.company_name')) }}">
            <small id="company_name_help" class="form-text text-muted">
                {{ __('Your company name as you want it to appear throughout the system') }}
            </small>
            @if ($errors->has('company_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('company_name') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row">
        <label for="email_address" class="col-sm-2 col-form-label">{{ __('Email Address') }}</label>
        <div class="col-sm-10">
            <input type="email" class="form-control{{ $errors->has('email_address') ? ' is-invalid' : '' }}" id="email_address" name="email_address" placeholder="{{ __('Email Address') }}" value="{{ old('email_address',config('settings.general.email_address')) }}">
            <small id="email_address_help" class="form-text text-muted">
                {{ __('The default sender address used for emails sent by system') }}
            </small>
            @if ($errors->has('email_address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email_address') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2">{{ __('Maintenance Mode') }}</div>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input{{ $errors->has('maintenance_mode') ? ' is-invalid' : '' }}" type="checkbox" id="maintenance_mode" name="maintenance_mode" value="{{ old('maintenance_mode',config('settings.general.maintenance_mode')) == 'Y' ? 'N' : 'Y' }}" {{ old('maintenance_mode',config('settings.general.maintenance_mode')) == 'Y' ? 'checked' : '' }}>
                <label class="form-check-label" for="maintenance_mode">
                    <small id="maintenance_mode_help" class="form-text text-muted">
                        {{ __('Tick to enable - prevents client area access when enabled') }}
                    </small>
                </label>
                @if ($errors->has('maintenance_mode'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('maintenance_mode') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2">{{ __('Maintenance Mode Message') }}</div>
        <div class="col-sm-10">
            <textarea class="form-control{{ $errors->has('maintenance_mode_message') ? ' is-invalid' : '' }}" id="maintenance_mode_message" name="maintenance_mode_message" rows="3">{{ old('maintenance_mode_message',config('settings.general.maintenance_mode_message')) }}</textarea>
            @if ($errors->has('maintenance_mode_message'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('maintenance_mode_message') }}</strong>
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