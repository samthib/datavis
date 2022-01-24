<?php

namespace App\View\Components\Admin\Table;

use Illuminate\View\Component;

class ButtonEditComponent extends Component
{
    public $editLink;

    /**
     * Create a new component instance.
     *
     * @return void
     */
     public function __construct($editLink){
       $this->editLink = $editLink;
     }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.table.button-edit-component');
    }
}
