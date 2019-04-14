<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSignInIntegrations extends FormRequest
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
        return [
            'facebook_signin' => 'in:Y,N',
            'fb_app_id' => 'required_with:facebook_signin|nullable|string',
            'fb_app_secret' => 'required_with:facebook_signin|nullable|string', 
            'google_signin' => 'in:Y,N',
            'google_client_id' => 'required_with:google_signin|nullable|string',
            'google_client_secret' => 'required_with:google_signin|nullable|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fb_app_id.required_with' => 'Facebook App ID is required',
            'fb_app_secret.required_with' => 'Facebook App Secret is required',
            'google_client_id.required_with' => 'Google Client ID is required',
            'google_client_secret.required_with' => 'Google Client Secret is required',
        ];
    }
}
