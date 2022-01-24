<?php

namespace App\View\Components\Admin\Table;

use Illuminate\View\Component;

class ButtonShowComponent extends Component
{
    public $showLink;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($showLink){
      $this->showLink = $showLink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.table.button-show-component');
    }
}
