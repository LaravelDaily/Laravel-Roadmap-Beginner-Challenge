<?php

namespace App\Rules;

use App\Models\Tag;
use Illuminate\Contracts\Validation\Rule;

class TagExistsRule implements Rule
{
    private $currentTag;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $tags = explode(',', $value);
        foreach ($tags as $tag) {
            if (Tag::where('name', $tag)->count() == 0) {
                $this->currentTag = $tag;
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return  'There is no "' . $this->currentTag . '" tag. Please select a tag that exists.';
    }
}
