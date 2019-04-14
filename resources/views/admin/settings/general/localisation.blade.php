<form id="form-localisation" class="" method="POST" enctype="multipart/form-data" action="{{ route('admin.settings') }}">
    @csrf
    <input type="hidden" name="_type" value="localisation">

    <div class="form-group row">
        <label for="dateformat" class="col-sm-2 col-form-label">{{ __('Global Date Format') }}</label>
        <div class="col-sm-10">
            <select id="dateformat" name="dateformat" class="form-control{{ $errors->has('dateformat') ? ' is-invalid' : '' }}">
                <option value="DD/MM/YYYY" {{ old('dateformat',config('settings.localisation.dateformat')) == "DD/MM/YYYY" ? 'selected' : '' }}>DD/MM/YYYY</option>
                <option value="DD-MM-YYYY" {{ old('dateformat',config('settings.localisation.dateformat')) == "DD-MM-YYYY" ? 'selected' : '' }}>DD-MM-YYYY</option>
                <option value="DD.MM.YYYY" {{ old('dateformat',config('settings.localisation.dateformat')) == "DD.MM.YYYY" ? 'selected' : '' }}>DD.MM.YYYY</option>
                <option value="MM/DD/YYYY" {{ old('dateformat',config('settings.localisation.dateformat')) == "MM/DD/YYYY" ? 'selected' : '' }}>MM/DD/YYYY</option>
                <option value="YYYY/MM/DD" {{ old('dateformat',config('settings.localisation.dateformat')) == "YYYY/MM/DD" ? 'selected' : '' }}>YYYY/MM/DD</option>
                <option value="YYYY-MM-DD" {{ old('dateformat',config('settings.localisation.dateformat')) == "YYYY-MM-DD" ? 'selected' : '' }}>YYYY-MM-DD</option>
            </select>
            <small id="dateformat_help" class="form-text text-muted">
                {{ __('Choose numeric display format') }}
            </small>
            @if ($errors->has('dateformat'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('dateformat') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row">
        <label for="client_dateformat" class="col-sm-2 col-form-label">{{ __('Client Date Format') }}</label>
        <div class="col-sm-10">
            <select id="client_dateformat" name="client_dateformat" class="form-control{{ $errors->has('client_dateformat') ? ' is-invalid' : '' }}">
                <option value="" {{ old('client_dateformat',config('settings.localisation.client_dateformat')) == "" ? 'selected' : '' }}>Use Global Date Format</option>
                <option value="full" {{ old('client_dateformat',config('settings.localisation.client_dateformat')) == "full" ? 'selected' : '' }}>1st January 2000</option>
                <option value="shortmonth" {{ old('client_dateformat',config('settings.localisation.client_dateformat'))  == "shortmonth" ? 'selected' : '' }}>1st Jan 2000</option>
                <option value="fullday" {{ old('client_dateformat',config('settings.localisation.client_dateformat')) == "fullday" ? 'selected' : '' }}>Monday, January 1st, 2000</option>
            </select>
            <small id="client_dateformat_help" class="form-text text-muted">
                {{ __('Choose display style for clients (can be text based)') }}
            </small>
            @if ($errors->has('client_dateformat'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('client_dateformat') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row">
        <label for="language" class="col-sm-2 col-form-label">{{ __('Default Language') }}</label>
        <div class="col-sm-10">
            <select id="language" name="language" class="form-control{{ $errors->has('language') ? ' is-invalid' : '' }}">
                <option value="english" {{ old('language',config('settings.localisation.language')) == "english" ? 'selected' : '' }}>English</option>
            </select>
            @if ($errors->has('language'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('language') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2">{{ __('Enable Language Menu') }}</div>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input{{ $errors->has('allowuser_language') ? ' is-invalid' : '' }}" type="checkbox" id="allowuser_language" name="allowuser_language" value="{{ old('allowuser_language', config('settings.localisation.allowuser_language')) == 'Y' ? 'N' : 'Y' }}" {{ old('allowuser_language', config('settings.localisation.allowuser_language')) == 'Y' ? 'checked' : '' }}>
                <label class="form-check-label" for="allowuser_language">
                    <small id="allowuser_language_help" class="form-text text-muted">
                        {{ __('Allow users to change the language of the system') }}
                    </small>
                </label>
                @if ($errors->has('allowuser_language'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('allowuser_language') }}</strong>
                    </span>
                @endif
            </div>
            
        </div>
    </div>

    <div class="form-group row text-center">
        <div class="col-sm-12">
            <button type="submit" name="save" class="btn btn-primary">{{ __('Save Changes') }}</button>
            <button type="reset" name="cancel" class="btn btn-secondary" onclick="location.reload();">{{ __('Cancel Changes') }}</button>
        </div>
    </div>
</form>