<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectInput extends Component
{
    public $options;
    public $selected;
    public $name;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options = [], $selected = null, $name = 'select', $id = null)
    {
        $this->options = $options;
        $this->selected = $selected;
        $this->name = $name;
        $this->id = $id ?? $name; // Use name as id if not provided
    }

    public function render(): View|Closure|string
    {
        return view('components.select-input');
    }
}
