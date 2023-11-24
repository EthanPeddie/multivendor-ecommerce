<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array

    {

        return [
            //
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$this->user()->id,
            'phone' =>  'nullable',
            'address' => 'nullable',
            'photo' => 'required|sometimes|mimes:png,jpg,jpeg',
            // 'old_password' => 'required',
            // 'password' => 'required|confirmed'
        ];
    }
}