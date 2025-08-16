<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    // get model name
    private $model = Category::class;

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

//        $rules->merge = [
//            0 => ['unique:categories']
//        ];

        $rules['title'][] = 'unique:categories';
        return $rules;
    }

    /**
     * @return array|void
     */
    public function messages()
    {
        $messages = $this->model::$messages;
        $messages [] = [
            'title.unique' => __('this title is taken before')
        ];
        return $messages;
    }
}
