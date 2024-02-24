@extends('layouts/main')

@section('content')
    <div class="flex">
        <div class="basis-6/12">
            @livewire('form-create-section-category')
        </div>

        <div class="basis-6/12">
            @livewire('table-section-category')
        </div>

    </div>
@endsection
