<?php

namespace App\View\Components\Admin\Header;

use Illuminate\View\Component;

class ShowComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
     public function __construct(
       public $name,
       public $pluralName,
       public $title,
       public $indexLink,
       public $createLink,
     ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.header.show-component');
    }
}
