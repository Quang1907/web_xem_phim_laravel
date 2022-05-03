<?php

namespace App\Http\Requests\Genre;

use Illuminate\Foundation\Http\FormRequest;

class StoreGenreRequest extends FormRequest
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
            'title' => 'required|unique:genres|max:255',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui long nhap ten the loai',
            'title.unique' => 'The loai truyen da ton tai',
            'description' => 'Vui long nhap mo ta',
        ];
    }
}
