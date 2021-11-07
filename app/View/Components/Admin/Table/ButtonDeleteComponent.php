<?php

namespace App\View\Components\Admin\Table;

use Illuminate\View\Component;

class ButtonDeleteComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
      public $key
    ){}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.table.button-delete-component');
    }
}