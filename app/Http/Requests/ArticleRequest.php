<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
     * @return array
     */
    public function rules()
    {
        if($this->method() == 'PUT'){
            $slugRule = 'required|string|max:255|unique:articles,slug,'.$this->article->id;
        }

        return [
            'title' => 'required|string|max:255',
            'slug' => $slugRule ?? 'required|string|max:255|unique:articles',
            'excerpt' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_id' => 'required|array|exists:tags,id',
//            'tag_id.*' => 'integer',
            'thumbnail' => 'mimes:jpeg,jpg,png,bmp|dimensions:max_width=700,max_height=300',
            'user_id' => 'required',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Article::createSlug($this->title, $this->article->id ?? 0),
            'user_id' => Auth::user()->id,
        ]);
    }
}
