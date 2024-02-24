<section class="box">

    <div class="box-header">
        <h3>Buat Kategori section</h3>

        @if (session()->has('create-section-category-success'))
            <div class="block my-3 border border-green-500 bg-green-100 text-green-500 py-1 px-2 italic text-[14px]">
                <p>{{ session()->get('create-section-category-success') }}</p>
            </div>
        @endif

    </div>

    <div class="box-body h-72">

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" wire:model="name" id="nama" placeholder="Nama" autocomplete="off">
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group flex justify-end">
            <button type="button" wire:click="doCreateSectionCategory" class="btn btn-success">Buat Kategori section
            </button>
        </div>

    </div>

</section>
