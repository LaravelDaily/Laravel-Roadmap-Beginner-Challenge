<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Tag;

class CreateArticleRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        $tagIds = Tag::selectRaw("concat('tag',id) as tag_number")->addSelect('id')->get();
        $tagIdsWithPrefix = $tagIds->pluck('tag_number')->toArray();
        $tagIdsFormatted = $tagIds->pluck('id')->implode(',');
        $rules = array_fill_keys($tagIdsWithPrefix, ['nullable','integer','min:1','in:[,' . $tagIdsFormatted . ',]']);
        $rules['category_id'] = ['required','integer','min:1','exists:categories,id'];
        $rules['title'] = ['required','string'];
        $rules['fulltext'] = ['required','string'];
        $rules['image'] = ['nullable','image'];
        return $rules;
    }
    /*
        This generates an array whose tag-related key/value pairs are:
        'tag#' => ['nullable','integer','min:1','in:[all_tag_ids_list]']
        Where # is the tag id#, and the primary key of the table tags. 
        # also matches the value of the checkbox field from the blade template.
        Each key 'tag#' matches the name field of the checkbox from the blade template.
        There will be one such rule for each tag (*not* for each checked tag).
    */
}