<?php

namespace App\Http\Requests\Admin;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category' => [
                'required',
                'numeric',
                'exists:categories,id',
                'regex:/^[0-9]*$/',
            ],
            'image' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png',
                'min:1',
                'max: 2000',
            ],
            'title' => [
                'required',
                'regex:/^[a-zA-Z ,\']+[0-9]*$/',
                'min:2',
                'max:200',
            ],
            'slug' => [
                'required',
                'regex:/^[\/a-zA-Z ,\', -]+[0-9]*$/',
                'min:2',
                'max:200',
            ],
            'content' => [
                'required',
                'string',
                'min:2'
            ],
            'tag.*' => [
                'nullable',
                'numeric',
                'exists:tags,id',
            ]
        ];
    }

    public function messages()
    {
        return [
            'image.max' => 'The image field must not be greater than 2MB.'
        ];
    }
}
