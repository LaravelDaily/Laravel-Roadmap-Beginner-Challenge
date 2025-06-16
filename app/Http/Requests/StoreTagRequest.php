<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
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
            "name"=> "required|unique:App\Models\Tag|max:255",
            "tag_color"=> [
                "required",
                "regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/",
                "unique:App\Models\Tag"
            ]
        ];
    }

    public function failedValidation(Validator $validator){
        session()->flash("form","tag.create");
    }
}
