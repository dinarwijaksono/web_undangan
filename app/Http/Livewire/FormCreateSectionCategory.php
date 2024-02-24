<?php

namespace App\Http\Livewire;

use App\Services\Section_service;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class FormCreateSectionCategory extends Component
{
    public $name;

    protected $sectionService;

    public $rules = [
        'name' => 'required|min:4'
    ];

    public function booted()
    {
        $this->sectionService = App::make(Section_service::class);
    }

    public function doCreateSectionCategory()
    {
        $this->validate();

        try {
            Log::info('do create section category success', [
                'user_id' => auth()->user()->id,
                'email' => auth()->user()->email,
                'class' => 'FormCreateSectionCategory'
            ]);

            $this->sectionService->createCategory($this->name);

            session()->flash('create-section-category-success', "kategori section berhasil dibuat.");

            $this->name = "";

            $this->emitTo('table-section-category', 'create-section-category');
        } catch (\Throwable $th) {
            Log::error('do create section category failed', [
                'user_id' => auth()->user()->id,
                'email' => auth()->user()->email,
                'class' => 'FormCreateSectionCategory',
                'message_error' => $th->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.form-create-section-category');
    }
}
