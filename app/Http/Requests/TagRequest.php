<?php

namespace App\Http\Requests;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
        if($this->method() == 'PUT'){
            $nameRule = 'required|string|max:255|unique:tags,name,'.$this->tag->id;
            $slugRule = 'required|string|max:255|unique:tags,slug,'.$this->tag->id;
        }

        return [
            'name' => $nameRule ?? 'required|string|max:255|unique:tags',
            'slug' => $slugRule ?? 'required|string|max:255|unique:tags',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Tag::createSlug($this->name, $this->tag->id ?? 0),
        ]);
    }
}
