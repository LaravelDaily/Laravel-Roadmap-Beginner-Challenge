<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(Route $route)
    {
        // dd($route->getActionMethod());
        return [
            'image' => [Rule::when($route->getActionMethod() == 'store', [
                'required', 'image', 'mimes:png,jpg,jpeg', Rule::dimensions()->ratio(16 / 9)
            ])],
            'title' => ['required', 'min:3'],
            'body' => ['required', 'min:3'],
            'category_id' => ['required', 'integer'],
            'tags' => ['required', 'array'],
            'tags.*' => ['required', 'integer']
        ];
    }
}
