<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'name' => 'required|regex:/^[a-zA-Z ,\']+[0-9]*$/|unique:categories,name|min:2|max:200',
        ];
    }

    public function messages():array
    {
        return [
            'name.regex' => 'Please enter the category name in a valid format.',
            'name.unique' => 'The same category name exists.',
        ];
    }
}
