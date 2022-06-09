<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title'=>['required','string'],
            'text'=>['required','string'],
            'file_path'=>['nullable','image'],
            'category_id'=>['required','numeric']
        ];
    }
    public function messages()
    {
        return[
            'category_id.numeric'=>'Select a category',
        ];
    }
    public function sanitizedTags()
    {

        return $this->tag?array_map('trim',explode(',',$this->tag)):null;
    }
}
