<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'banner' => 'required|mimes:png,jpg,jpeg,webp',
            'type' => 'required',
            'title' => 'required',
            'starting_price' => 'required',
            'btn_url' => 'required|url',
            'serial'=> 'required',
        ];
    }
}
