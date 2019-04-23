<form id="form-security" class="" method="POST" enctype="multipart/form-data" action="{{ route('admin.settings') }}">
    @csrf
    <input type="hidden" name="_type" value="security">

    <div class="form-group row">
        <div class="col-sm-2">{{ __('Email Verification') }}</div>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input{{ $errors->has('email_verification') ? ' is-invalid' : '' }}" type="checkbox" id="email_verification" name="email_verification" value="{{ old('email_verification', config('settings.security.email_verification')) == 'Y' ? 'N' : 'Y' }}" {{ old('email_verification', config('settings.security.email_verification')) == 'Y' ? 'checked' : '' }}>
                <label class="form-check-label" for="email_verification">
                    <small id="email_verification_help" class="form-text text-muted">
                        {{ __('Request users to confirm their email address on signup or change of email address') }}
                    </small>
                </label>
                @if ($errors->has('email_verification'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email_verification') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2">{{ __('Captcha Form Protection') }}</div>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input{{ $errors->has('enable_captcha_form') ? ' is-invalid' : '' }}" type="checkbox" id="enable_captcha_form" name="enable_captcha_form" value="{{ old('enable_captcha_form', config('settings.security.enable_captcha_form')) == 'Y' ? 'N' : 'Y' }}" {{ old('enable_captcha_form', config('settings.security.enable_captcha_form')) == 'Y' ? 'checked' : '' }}>
                <label class="form-check-label" for="enable_captcha_form">
                    <small id="enable_captcha_form_help" class="form-text text-muted">
                        {{ __('Tick to enable - code shown to ensure human submission') }}
                    </small>
                </label>
                @if ($errors->has('enable_captcha_form'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('enable_captcha_form') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="captcha_type" class="col-sm-2 col-form-label">{{ __('Captcha Type') }}</label>
        <div class="col-sm-10">
            <div class="custom-control custom-control-inline custom-radio">
                <input type="radio" id="captcha_type_default" name="captcha_type" value="default" class="captcha_type custom-control-input{{ $errors->has('captcha_type') ? ' is-invalid' : '' }}" {{ old('captcha_type', config('settings.security.captcha_type')) == 'default' ? 'checked' : '' }}>
                <label class="custom-control-label" for="captcha_type_default">Default</label>
            </div>

            <div class="custom-control custom-control-inline custom-radio">
                <input type="radio" id="captcha_type_invisible_recaptcha" name="captcha_type" value="invisible_recaptcha" class="captcha_type custom-control-input{{ $errors->has('captcha_type') ? ' is-invalid' : '' }}" {{ old('captcha_type', config('settings.security.captcha_type')) == 'invisible_recaptcha' ? 'checked' : '' }}>
                <label class="custom-control-label" for="captcha_type_invisible_recaptcha">Invisible reCAPTCHA</label>
                @if ($errors->has('captcha_type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('captcha_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group row invisible-reCAPTCHA_div {{ config('settings.security.captcha_type') == 'default' ? 'd-none' : '' }}">
        <label for="recaptcha_sitekey" class="col-sm-2 col-form-label">{{ __('Invisible reCAPTCHA Site Key') }}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control{{ $errors->has('recaptcha_sitekey') ? ' is-invalid' : '' }}" id="recaptcha_sitekey" name="recaptcha_sitekey" value="{{ old('recaptcha_sitekey', config('settings.security.recaptcha_sitekey')) }}">
            <small id="recaptcha_sitekey_help" class="form-text text-muted">
                {{ __('You need to register for reCAPTCHA @ ') }} <a href="https://www.google.com/recaptcha/admin" target="_blank">https://www.google.com/recaptcha/admin</a>
            </small>
            @if ($errors->has('recaptcha_sitekey'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('recaptcha_sitekey') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row invisible-reCAPTCHA_div {{ config('settings.security.captcha_type') == 'default' ? 'd-none' : '' }}">
        <label for="recaptcha_secretkey" class="col-sm-2 col-form-label">{{ __('Invisible reCAPTCHA Secret Key') }}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control{{ $errors->has('recaptcha_secretkey') ? ' is-invalid' : '' }}" id="recaptcha_secretkey" name="recaptcha_secretkey" value="{{ old('recaptcha_secretkey', config('settings.security.recaptcha_secretkey')) }}">
            @if ($errors->has('recaptcha_secretkey'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('recaptcha_secretkey') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row invisible-reCAPTCHA_div {{ config('settings.security.captcha_type') == 'default' ? 'd-none' : '' }}">
        <label for="hide_invisible_captcha_badge" class="col-sm-2 col-form-label">{{ __('Invisible reCAPTCHA Badge') }}</label>
        <div class="col-sm-10">
            <div class="custom-control custom-control-inline custom-radio">
                <input type="radio" id="hide_invisible_captcha_badge_yes" name="hide_invisible_captcha_badge" value="Y" class="custom-control-input{{ $errors->has('hide_invisible_captcha_badge') ? ' is-invalid' : '' }}" {{ old('hide_invisible_captcha_badge', config('settings.security.hide_invisible_captcha_badge')) == 'Y' ? 'checked' : '' }}>
                <label class="custom-control-label" for="hide_invisible_captcha_badge_yes">Yes</label>
            </div>

            <div class="custom-control custom-control-inline custom-radio">
                <input type="radio" id="hide_invisible_captcha_badge_no" name="hide_invisible_captcha_badge" value="N" class="custom-control-input{{ $errors->has('hide_invisible_captcha_badge') ? ' is-invalid' : '' }}" {{ old('hide_invisible_captcha_badge', config('settings.security.hide_invisible_captcha_badge')) == 'N' ? 'checked' : '' }}>
                <label class="custom-control-label" for="hide_invisible_captcha_badge_no">No</label>
                @if ($errors->has('hide_invisible_captcha_badge'))
                    <span class="invalid-feedback" role="alert">
                        <strong>&nbsp;{{ $errors->first('hide_invisible_captcha_badge') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group row invisible-reCAPTCHA_div {{ config('settings.security.captcha_type') == 'default' ? 'd-none' : '' }}">
        <label for="invisible_recaptcha_badge_style" class="col-sm-2 col-form-label">{{ __('Invisible reCAPTCHA Badge Style') }}</label>
        <div class="col-sm-10">
            <select id="invisible_recaptcha_badge_style" name="invisible_recaptcha_badge_style" class="form-control{{ $errors->has('invisible_recaptcha_badge_style') ? ' is-invalid' : '' }}">
                <option value="bottomright" {{ old('invisible_recaptcha_badge_style', config('settings.security.invisible_recaptcha_badge_style')) == "bottomright" ? 'selected' : '' }}>Bottom Right</option>
                <option value="bottomleft" {{ old('invisible_recaptcha_badge_style', config('settings.security.invisible_recaptcha_badge_style')) == "bottomleft" ? 'selected' : '' }}>Bottom Left</option>
                <option value="inline" {{ old('invisible_recaptcha_badge_style', config('settings.security.invisible_recaptcha_badge_style')) == "inline" ? 'selected' : '' }}>Inline</option>
            </select>
            @if ($errors->has('invisible_recaptcha_badge_style'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('invisible_recaptcha_badge_style') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row">
        <label for="invalid_login_ban_count" class="col-sm-2 col-form-label">{{ __('Allowed Failed Admin Login Attempts') }}</label>
        <div class="col-sm-10">
            <input type="number" min="1" class="form-control{{ $errors->has('invalid_login_ban_count') ? ' is-invalid' : '' }}" id="invalid_login_ban_count" name="invalid_login_ban_count" value="{{ old('invalid_login_ban_count', config('settings.security.invalid_login_ban_count')) }}">
            @if ($errors->has('invalid_login_ban_count'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('invalid_login_ban_count') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row">
        <label for="admin_login_lockout" class="col-sm-2 col-form-label">{{ __('Admin Login Lockout Time') }}</label>
        <div class="col-sm-10">
            <input type="number" min="1" class="form-control{{ $errors->has('admin_login_lockout') ? ' is-invalid' : '' }}" id="admin_login_lockout" name="admin_login_lockout" value="{{ old('admin_login_lockout', config('settings.security.admin_login_lockout')) }}">
            <small id="disable_admin_pw_reset_help" class="form-text text-muted">
                {{ __('In Minutes') }}
            </small>
            @if ($errors->has('admin_login_lockout'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('admin_login_lockout') }}</strong>
                </span>
            @endif                                              
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2">{{ __('Disable Admin Password Reset') }}</div>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input{{ $errors->has('disable_admin_pw_reset') ? ' is-invalid' : '' }}" type="checkbox" id="disable_admin_pw_reset" name="disable_admin_pw_reset" value="{{ old('disable_admin_pw_reset', config('settings.security.disable_admin_pw_reset')) == 'Y' ? 'N' : 'Y' }}" {{ old('disable_admin_pw_reset', config('settings.security.disable_admin_pw_reset')) == 'Y' ? 'checked' : '' }}>
                <label class="form-check-label" for="disable_admin_pw_reset">
                    <small id="disable_admin_pw_reset_help" class="form-text text-muted">
                        {{ __('Tick this box to disable the forgotten password feature on the admin login page') }}
                    </small>
                </label>
                @if ($errors->has('disable_admin_pw_reset'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('disable_admin_pw_reset') }}</strong>
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

@push('scripts-b')

<script>
$(function(){
    $('.captcha_type').click(function() {
        $(".invisible-reCAPTCHA_div").toggleClass('d-none');
    });
});
</script>

@endpush
