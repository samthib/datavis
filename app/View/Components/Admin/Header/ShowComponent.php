<?php

namespace App\View\Components\Admin\Header;

use Illuminate\View\Component;

class ShowComponent extends Component
{
      public $name;
      public $pluralName;
      public $title;
      public $indexLink;
      public $createLink;
    /**
     * Create a new component instance.
     *
     * @return void
     */
     public function __construct($name,$pluralName,$title,$indexLink,$createLink) {
       $this->name = $name;
       $this->pluralName = $pluralName;
       $this->title = $title;
       $this->indexLink = $indexLink;
       $this->createLink = $createLink;
     }

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
