<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'         => ['required'],
            'description'   => ['required'],
            'image'         => ['nullable', 'mimes:png,jpg', 'max:2048'],
            'tags'          => ['required'],
            'category_id'   => ['required'],
        ];
    }
}
