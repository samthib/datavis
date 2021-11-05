<?php

namespace App\View\Components\Admin\Header;

use Illuminate\View\Component;

class IndexComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct(
        public $name,
        public $pluralName,
        public $createLink,
      ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.header.index-component');
    }
}
