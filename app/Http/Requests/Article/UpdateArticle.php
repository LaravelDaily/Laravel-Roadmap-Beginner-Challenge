<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticle extends FormRequest
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
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tag' => 'required|array',
            'tag.*' => 'exists:tags,id',
        ];
    }
}
