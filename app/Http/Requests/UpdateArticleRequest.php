<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_text' => ['string'],
            'image' => ['image'],
            'category_id' => ['exists:categories,id']
        ];
    }

    protected function prepareForValidation(): void
    {
    $this->merge([
        'category_id' => intval($this->category_id),
    ]);
}

}
