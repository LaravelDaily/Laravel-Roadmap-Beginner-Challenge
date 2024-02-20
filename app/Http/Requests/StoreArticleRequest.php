<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_text' => ['required','string'],
            'image' => ['required', 'image'],
            'category_id' => ['require', 'exists:categories,id']
        ];
    }

    protected function prepareForValidation(): void
    {
    $this->merge([
        'category_id' => intval($this->category_id),
    ]);
}

}
