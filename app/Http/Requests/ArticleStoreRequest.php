<?php

namespace App\Http\Requests;

use App\Rules\TagExistsRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleStoreRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'category_id' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'max:2048', Rule::dimensions()->minWidth(100)->minHeight(100)->maxWidth(3000)->maxHeight(3000)],
            'tags' => ['required', 'string', new TagExistsRule],
            'body' => ['required', 'string', 'min:5']
        ];
    }
}
