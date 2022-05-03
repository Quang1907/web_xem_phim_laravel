<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|unique:countries,title,' . request()->id,
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui long nhap ten danh muc',
            'title.unique' => 'Danh muc truyen da ton tai',
            'description' => 'Vui long nhap mo ta',
        ];
    }
}
