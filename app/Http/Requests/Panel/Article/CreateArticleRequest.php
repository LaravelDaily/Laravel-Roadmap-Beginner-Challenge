<?php

namespace App\Http\Requests\Panel\Article;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
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
        return [
            'title' => ['required', 'string', 'max:255'],
            'img' => ['required' , 'image'],
            'category_id' => ['required'],
            'tags' => ['required' , 'array'],
            'content' => ['required', 'string'],
        ];
    }
}
