<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminProfile extends FormRequest
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
            '_type' => 'required|in:update_profile,change_password'
        ];

        switch ($this->input('_type')) {
            case 'update_profile':
                $rules += [
                    'name' => 'required|string|max:20',
                    'lastname' => 'required|string|max:20',
                    'email' => 'required|email',
                ];
                break;
            case 'change_password':
                $rules += [
                    'cpassword' => 'required',
                    'password' => 'required|confirmed|min:6',
                ];
                break;
        }
        return $rules;
    }
}
