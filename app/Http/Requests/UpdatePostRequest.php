<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'title' => ['required', 'max:255'],
            'body' => ['required', 'max:255'],
            'slug' =>
                [
                    'required',
                    Rule::unique('posts', 'slug')->ignore($this->route('post')),
                    'alpha_dash'
                ],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'tags' => ['required'],
            'image' => ['nullable', 'image'],
        ];
    }
}
