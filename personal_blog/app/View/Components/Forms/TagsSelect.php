<?php

namespace App\View\Components\Forms;

use App\Models\Tag;
use Illuminate\View\Component;
use function _PHPStan_950705577\RingCentral\Psr7\parse_header;

class TagsSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.tags-select',[
            'tags' => Tag::all()
        ]);
    }
}
