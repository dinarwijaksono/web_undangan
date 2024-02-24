<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ComponentAside extends Component
{
    public $buttom = false;

    public $listeners = [
        'do-click-togle-menu' => 'doClickTogle'
    ];

    public function doClickTogle()
    {
        $this->buttom = !$this->buttom;
    }

    public function render()
    {
        return view('livewire.component-aside');
    }
}
