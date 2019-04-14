<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreGeneralSettings extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            '_type' => 'required|in:general,localisation,mail,security'
        ];

        switch ($this->input('_type')) {
            case 'general':
                $rules += [
                    'company_name' => 'required|string|max:40',
                    'email_address' => 'required|email',
                    'maintenance_mode' => 'in:Y,N',
                    'maintenance_mode_message' => 'required|string',
                ];
                break;
            case 'localisation':
                $rules += [
                    'dateformat' => 'required|string',
                    'language' => 'required|string',
                    'allowuser_language' => 'in:Y,N',
                ];
                break;
            case 'mail': 
                $rules += [
                    'mailtype' => 'required',
                    'smtp_port' => 'required_if:mailtype,smtp|nullable|numeric',
                    'smtp_host' => 'required_if:mailtype,smtp|nullable|string',
                    'smtp_username' => 'required_if:mailtype,smtp|nullable|string',
                    'smtp_password' => 'required_if:mailtype,smtp|nullable',
                    'smtp_ssl_type' => 'required_if:mailtype,smtp|in:null,ssl,tls',
                    'signature' => 'nullable',
                    'from_name' => 'nullable|string|max:20',
                    'from_email' => 'nullable|email'
                ];
                break;
            case 'security': 
                $rules += [
                    'email_verification' => 'in:Y,N',
                    'enable_captcha_form' => 'in:Y,N',
                    'captcha_type' => 'required|in:default,invisible_recaptcha',
                    'recaptcha_sitekey' => 'required_if:captcha_type,invisible_recaptcha|nullable|string',
                    'recaptcha_secretkey' => 'required_if:captcha_type,invisible_recaptcha|nullable|string',
                    'hide_invisible_captcha_badge' => 'required_if:captcha_type,invisible_recaptcha|in:Y,N',
                    'invisible_recaptcha_badge_style' => 'required_if:captcha_type,invisible_recaptcha|in:bottomright,bottomleft,inline',
                    'invalid_login_ban_count' => 'required|numeric|min:1',
                    'admin_login_lockout' => 'required|numeric|min:1',
                    'disable_admin_pw_reset' => 'in:Y,N',
                ];
                break;
        }
        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            '_type.required' => 'Invalid request',
            '_type.in' => 'Invalid request'
        ];
    }
}
