<?php

namespace App\Http\Requests;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
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
        $rules = $this->model::$rules;

        return $rules;
    }

    public function messages()
    {
        $messages = $this->model::$messages;

        return $messages;
    }
}
