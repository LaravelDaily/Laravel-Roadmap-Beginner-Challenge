<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    // get model name
    private $model = Article::class;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = $this->model::$rules;

        $rules ['category_id'] = ['required'];
        $rules ['tag_id'] = ['required', 'array'];

        return $rules;
    }

    public function messages()
    {
        $messages = $this->model::$messages;
        $messages ['category_id.required'] = __('Category is required');

        $messages ['tag_id.required'] = __('Tag is required');
        return $messages;
    }
}
