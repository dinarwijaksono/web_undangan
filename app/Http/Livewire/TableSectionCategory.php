<?php

namespace App\Http\Livewire;

use App\Services\Section_service;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class TableSectionCategory extends Component
{
    public $theListSectionCategory;
    public $category_name;

    public $listeners = [
        'cerate-category-section' => 'boot'
    ];

    public $rules = [
        'category_name' => 'required|min:4'
    ];

    protected $sectionService;

    public function boot()
    {
        $this->sectionService = App::make(Section_service::class);

        $this->theListSectionCategory = $this->sectionService->getTheListCategory();
    }

    public function doCreateCategorySection()
    {
        $this->validate();

        try {
            $this->sectionService->createCategory($this->category_name);

            Log::info('do create caetgory section success', [
                "id" => auth()->user()->id,
                "email" => auth()->user()->email,
                'class' => "TableSectionCategory",
            ]);

            $this->category_name = "";
            $this->emit('cerate-category-section');
        } catch (\Throwable $th) {
            Log::error('do create caetgory section failed', [
                "id" => auth()->user()->id,
                "email" => auth()->user()->email,
                'class' => "TableSectionCategory",
                'message_error' => $th->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.table-section-category');
    }
}
