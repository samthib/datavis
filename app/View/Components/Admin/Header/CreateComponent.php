<?php

namespace App\View\Components\Admin\Header;

use Illuminate\View\Component;

class CreateComponent extends Component
{
    public $pluralName;
    public $title;
    public $indexLink;

    /**
     * Create a new component instance.
     *
     * @return void
     */
     public function __construct($pluralName, $title, $indexLink) {
       $this->pluralName = $pluralName;
       $this->title = $title;
       $this->indexLink = $indexLink;
     }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.header.create-component');
    }
}
