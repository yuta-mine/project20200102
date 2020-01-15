<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class ProfileRequest extends FormRequest
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

        // ここでprofile編集時の入力データのチェックをやってる maru

        $myEmail = Auth::user()->email;
 
        return [
            'name' => 'required|string|max:255',
            'email' => [Rule::unique('users', 'email')->whereNot('email', $myEmail)],
            'email' => 'required|string|email|max:255',
        ];
    }
}
