<?php

namespace App\Http\Requests;

use App\Models\Article;
use App\Rules\ImageRequiredIfReplace;
use Closure;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $article_id = $this->route('article');
        $article = Article::findOrFail($article_id);

        return [
            "title"=> [
                'required',
                'string',
                'max:255',
                Rule::unique('articles')->ignore($article),
            ],
            "category"=> "required|string|exists:App\Models\Category,id",
            "tags" => "required|array|min:1",
            "tags.*"=> [
                'integer',
                'exists:App\Models\Tag,id'
            ],
            "image"=> [
                "nullable",
                "image",
                File::image()
                    ->max(1024),
            ],
            "body"=> "required|string|min:100|max:5000",
            "image_edit_action"=> "required|in:replace,keep,delete",
        ];
    }

    function failedValidation(Validator $validator) {
        $articleId = $this->route("article");
        $article = Article::findOrFail($articleId);
        $errors = $validator->errors();

        if ($errors->has("image_edit_action") || $errors->has("image")) {
            throw (new ValidationException($validator))
                    ->errorBag($this->errorBag)
                    ->redirectTo($this->getRedirectUrl());
        }

        if (request()->input("image_edit_action") === "replace"
            && request()->hasFile('image')
        ) 
        {
            $article->clearMediaCollection('pending_article_images');
            $article->addMediaFromRequest('image')->toMediaCollection('pending_article_images'); 
            $article->image_edit_action = 'replace';
            $article->save();
        }

        throw (new ValidationException($validator))
                    ->errorBag($this->errorBag)
                    ->redirectTo($this->getRedirectUrl());
    }

    
}
