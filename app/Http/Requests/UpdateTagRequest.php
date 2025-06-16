<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTagRequest extends FormRequest
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
        $currentTagId = substr(url()->current(), -1);

        return [
            "name"=> [
                "required",
                "max:255",
                Rule::unique("tags")->ignore($currentTagId),
            ],
            "tag_color"=> [
                "required",
                "regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/",
                Rule::unique("tags")->ignore($currentTagId),
            ]
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){
        session()->flash("form","tag.edit");
        $currentTagId = substr(url()->current(), -1);
        session()->flash("current-tag-id", $currentTagId);
    }
}
