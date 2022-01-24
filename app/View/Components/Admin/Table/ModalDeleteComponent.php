<?php

namespace App\View\Components\Admin\Table;

use Illuminate\View\Component;

class ModalDeleteComponent extends Component
{
    public $key;
    public $name;
    public $destroyLink;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
     public function __construct($key, $name, $destroyLink) {
         $this->key = $key;
         $this->name = $name;
         $this->destroyLink = $destroyLink;
      }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.table.modal-delete-component');
    }
}
