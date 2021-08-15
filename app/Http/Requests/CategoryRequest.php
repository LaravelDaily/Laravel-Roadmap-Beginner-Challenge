<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            $nameRule = 'required|string|max:255|unique:categories,name,'.$this->category->id;
            $slugRule = 'required|string|max:255|unique:categories,slug,'.$this->category->id;
        }

        return [
            'name' => $nameRule ?? 'required|string|max:255|unique:categories',
            'slug' => $slugRule ?? 'required|string|max:255|unique:categories',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Category::createSlug($this->name, $this->category->id ?? 0),
        ]);
    }
}
