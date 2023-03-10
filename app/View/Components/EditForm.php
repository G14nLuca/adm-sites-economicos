<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditForm extends Component
{
    public $fields;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fields)
    {
        $this->fields = $fields;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.about-section.edit-form');
    }
}
