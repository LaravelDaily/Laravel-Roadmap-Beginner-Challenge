<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'category_id' => ['sometimes', 'nullable', 'numeric', 'exists:categories,id'],
            'tag_id' => ['sometimes', 'array'],
            'tag_id.*' => ['exists:tags,id'],
            'full_text' => ['required', 'string', 'max:1000'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'resized_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
