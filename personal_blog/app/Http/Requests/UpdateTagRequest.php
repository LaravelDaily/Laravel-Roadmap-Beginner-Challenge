<?php

namespace App\Http\Requests;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTagRequest extends FormRequest
{
    // get model name
    private $model = Tag::class;

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
        $rules =  $this->model::$rules;

        $rules['title'] [] = Rule::unique('tags')->ignore($this->tag->id);

        return $rules;
    }

    public function messages(){
        $messages = $this->model::$messages;
        $messages[] = [
            'title.unique' => __('this title is taken before'),
        ];

        return $messages;
    }
}
