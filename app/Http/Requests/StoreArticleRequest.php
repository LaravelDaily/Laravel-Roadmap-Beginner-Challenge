<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreArticleRequest extends FormRequest
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
            "title"=> "required|string|max:255|unique:App\Models\Article",
            "category"=> "required|string|exists:App\Models\Category,id",
            "tags" => "required|array|min:1",
            "tags.*"=> "integer|exists:App\Models\Tag,id",
            "image"=> [
                "nullable",
                "image",
                File::image()
                    ->max(1024)
            ],
            "body"=> "required|string|min:100|max:5000",
        ];
    }
}