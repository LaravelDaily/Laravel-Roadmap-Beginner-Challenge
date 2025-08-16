<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextArea extends Component
{
    public $name;
    public $id;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = 'select', $id = null, $value = null)
    {
        $this->value = $value;
        $this->name = $name;
        $this->id = $id ?? $name; // Use name as id if not provided
    }

    public function render(): View|Closure|string
    {
        return view('components.text-area');
    }
}
