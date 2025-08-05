<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleTagRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'article_id' => ['required', 'exists:articles'],
            'tag_id' => ['required', 'exists:tags'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
