<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class ArticleRequest extends FormRequest
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
        // Request::isMethod('post');
        return [
            'image'         => 'nullable|mimes:jpg,bmp,png',
            'title'         => 'required|string|max:255',
            'content'       => 'required|string|max:1500',
            'category'      => 'required|string|exists:categories,id',
            'tags'          => 'required|array'
        ];
    }
}
