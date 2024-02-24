<?php

namespace App\Http\Livewire;

use App\Services\Section_service;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class TableSectionCategory extends Component
{
    public $theListSectionCategory;

    public $listeners = [
        'create-section-category' => 'boot'
    ];

    protected $sectionService;

    public function boot()
    {
        $this->sectionService = App::make(Section_service::class);

        $this->theListSectionCategory = $this->sectionService->getTheListCategory();
    }

    public function render()
    {
        return view('livewire.table-section-category');
    }
}
