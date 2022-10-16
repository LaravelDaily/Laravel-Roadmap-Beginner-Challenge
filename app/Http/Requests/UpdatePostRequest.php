<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            //
            'title'     => 'required',
            'image'     => 'nullable|mimes:png,jpg,jpeg|image|dimensions:max_width=1000,max_height=1000',
            'post'      => 'required',
            'category'  => 'required|integer|exists:categories,id',
            'tags'      => 'required'
        ];
    }
}
