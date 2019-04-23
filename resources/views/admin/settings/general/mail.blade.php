<form id="form-mail" class="" method="POST" enctype="multipart/form-data" action="{{ route('admin.settings') }}">
    @csrf
    <input type="hidden" name="_type" value="mail">

    <div class="form-group row">
        <label for="mailtype" class="col-sm-2 col-form-label">{{ __('Mail Type') }}</label>
        <div class="col-sm-10">
            <select id="mailtype" name="mailtype" class="form-control{{ $errors->has('mailtype') ? ' is-invalid' : '' }}">
                <option value="mail" {{ old('mailtype', config('settings.mail.mailtype')) == "mail" ? 'selected' : '' }}>PHP's Mail()</option>
                <option value="smtp" {{ old('mailtype', config('settings.mail.mailtype')) == "smtp" ? 'selected' : '' }}>SMTP</option>
            </select>
            @if ($errors->has('mailtype'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mailtype') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row smtp_div {{ config('settings.mail.mailtype') == "mail" ? 'd-none' : '' }}">
        <label for="smtp_port" class="col-sm-2 col-form-label">{{ __('SMTP Port') }}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control{{ $errors->has('smtp_port') ? ' is-invalid' : '' }}" id="smtp_port" name="smtp_port" placeholder="{{ __('SMTP Port') }}" value="{{ old('smtp_port', config('settings.mail.smtp_port')) }}">
            <small id="smtp_port_help" class="form-text text-muted">
                {{ __('The port your mail server uses') }}
            </small>
            @if ($errors->has('smtp_port'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('smtp_port') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row smtp_div {{ config('settings.mail.mailtype') == "mail" ? 'd-none' : '' }}">
        <label for="smtp_host" class="col-sm-2 col-form-label">{{ __('SMTP Host') }}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control{{ $errors->has('smtp_host') ? ' is-invalid' : '' }}" id="smtp_host" name="smtp_host" placeholder="{{ __('SMTP Host') }}" value="{{ old('smtp_host', config('settings.mail.smtp_host')) }}">
            @if ($errors->has('smtp_host'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('smtp_host') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row smtp_div {{ config('settings.mail.mailtype') == "mail" ? 'd-none' : '' }}">
        <label for="smtp_username" class="col-sm-2 col-form-label">{{ __('SMTP Username') }}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control{{ $errors->has('smtp_username') ? ' is-invalid' : '' }}" id="smtp_username" name="smtp_username" placeholder="{{ __('SMTP Username') }}" value="{{ old('smtp_username', config('settings.mail.smtp_username')) }}">
            @if ($errors->has('smtp_username'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('smtp_username') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row smtp_div {{ config('settings.mail.mailtype') == "mail" ? 'd-none' : '' }}">
        <label for="smtp_password" class="col-sm-2 col-form-label">{{ __('SMTP Password') }}</label>
        <div class="col-sm-10">
            <input type="password" class="form-control{{ $errors->has('smtp_password') ? ' is-invalid' : '' }}" id="smtp_password" name="smtp_password" placeholder="{{ __('SMTP Password') }}" value="{{ old('smtp_password',config('settings.mail.smtp_password')) }}">
            @if ($errors->has('smtp_password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('smtp_password') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row smtp_div {{ config('settings.mail.mailtype') == "mail" ? 'd-none' : '' }}">
        <label for="smtp_ssl_type" class="col-sm-2 col-form-label">{{ __('SMTP SSL Type') }}</label>
        <div class="col-sm-10">
            <div class="custom-control custom-radio">
                <input type="radio" id="smtp_ssl_type_none" name="smtp_ssl_type" value="null" class="custom-control-input{{ $errors->has('smtp_ssl_type') ? ' is-invalid' : '' }}" {{ old('smtp_ssl_type', config('settings.mail.smtp_ssl_type')) == 'null' ? 'checked' : '' }}>
                <label class="custom-control-label" for="smtp_ssl_type_none">None</label>
            </div>

            <div class="custom-control custom-radio">
                <input type="radio" id="smtp_ssl_type_ssl" name="smtp_ssl_type" value="ssl" class="custom-control-input{{ $errors->has('smtp_ssl_type') ? ' is-invalid' : '' }}" {{ old('smtp_ssl_type', config('settings.mail.smtp_ssl_type')) == 'ssl' ? 'checked' : '' }}>
                <label class="custom-control-label" for="smtp_ssl_type_ssl">SSL</label>
            </div>

            <div class="custom-control custom-radio">
                <input type="radio" id="smtp_ssl_type_tls" name="smtp_ssl_type" value="tls" class="custom-control-input{{ $errors->has('smtp_ssl_type') ? ' is-invalid' : '' }}" {{ old('smtp_ssl_type', config('settings.mail.smtp_ssl_type')) == 'tls' ? 'checked' : '' }}>
                <label class="custom-control-label" for="smtp_ssl_type_tls">TLS</label> 
                @if ($errors->has('smtp_ssl_type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('smtp_ssl_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="signature" class="col-sm-2 col-form-label">{{ __('Global Email Signature') }}</label>
        <div class="col-sm-10">
            <textarea class="form-control{{ $errors->has('signature') ? ' is-invalid' : '' }}" id="signature" name="signature" rows="3">{{ old('signature', config('settings.mail.signature')) }}</textarea>
            @if ($errors->has('signature'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('signature') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row">
        <label for="from_name" class="col-sm-2 col-form-label">{{ __('System Emails From Name') }}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control{{ $errors->has('from_name') ? ' is-invalid' : '' }}" id="from_name" name="from_name" placeholder="{{ __('System Emails From Name') }}" value="{{ old('from_name', config('settings.mail.from_name')) }}">
            @if ($errors->has('from_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('from_name') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row">
        <label for="from_email" class="col-sm-2 col-form-label">{{ __('System Emails From Email') }}</label>
        <div class="col-sm-10">
            <input type="email" class="form-control{{ $errors->has('from_email') ? ' is-invalid' : '' }}" id="from_email" name="from_email" placeholder="{{ __('System Emails From Email') }}" value="{{ old('from_email', config('settings.mail.from_email')) }}">
            @if ($errors->has('from_email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('from_email') }}</strong>
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

@push('scripts-b')

<script>
$(function(){
    $('#mailtype').change(function() {
        $(".smtp_div").toggleClass('d-none');
    });
});
</script>    

@endpush
