<?php

namespace App\Http\Requests\Movie;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'title' => 'required|max:255|unique:movies',
            'description' => 'required',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui long nhap ten phim',
            'title.unique' => 'Ten phim da ton tai',
            'description.required' => 'Vui long nhap mo ta',
            'image.required' => 'Ban chua tai len hinh anh dai dien',
        ];
    }
}
