<?php

namespace App\Http\Livewire;

use App\Services\Section_service;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class ListSection extends Component
{
    public $listSectonCategory;

    protected $sectionService;

    public $boxTableCategorySection = false;

    protected $listeners = [
        'close-table-section' => 'doClickBoxTableCategorySection',
    ];

    public function booted()
    {
        $this->sectionService = App::make(Section_service::class);

        $this->listSectonCategory = $this->sectionService->getTheListCategory();
    }

    public function doClickBoxTableCategorySection()
    {
        $this->boxTableCategorySection = !$this->boxTableCategorySection;
    }

    public function render()
    {
        return view('livewire.list-section');
    }
}
