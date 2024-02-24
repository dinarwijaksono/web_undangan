<section>

    @if ($boxTableCategorySection)
        @livewire('table-section-category')
    @endif


    <div class="flex p-2 gap-1">
        <div class="basis-10/12">
            <select id="section_category" class="w-full p-2 text-[16px] h-10">

                <option>-- Pilih Kategori --</option>

                @foreach ($listSectonCategory as $key)
                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="basis-2/12">
            <button type="button" wire:click="doClickBoxTableCategorySection"
                class="bg-sky-300 p-2 w-full text-[16px] h-10">+</button>
        </div>
    </div>

    <div class="flex p-2">

        <button class="bg-sky-500 p-2 w-full">Tambah
            Section</button>

    </div>

</section>
