<div class="fixed top-0 left-0 right-0 flex justify-center shadow">

    <button type="button" wire:click="$emitTo('list-section', 'close-table-section')"
        class="absolute top-20 right-5 bg-red-500 p-1 text-[14px] rounded text-white h-9 w-9">X</button>

    <section class="box mt-20 border border-sky-500 w-11/12 bg-white p-2">

        <div class="box-header">
            <h3 class="text-[20px] font-bold text-center mb-4">Daftar kategori section</h3>
        </div>

        <div class="box-body max-h-60 overflow-scroll">
            <table class="w-full text-[13px]">
                <thead>
                    <tr class="bg-yellow-100">
                        <th>Nama</th>
                        <th>Dibuat</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($theListSectionCategory as $key)
                        <tr class="even:bg-slate-100">
                            <td>{{ $key->name }}</td>
                            <td class="text-center">{{ date('d M Y', $key->created_at / 1000) }}</td>
                            <td class="flex ">
                                <button class="bg-red-500 rounded text-[12px] p-1 text-white w-full">Hapus</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>

        <div class="box-footer mt-3">
            <div class="mb-2">
                <label for="name" class="block">Nama kategori</label>
                <input type="text" wire:model="category_name"
                    class="w-full border border-sky-500 py-1 px-2 ring-0 outline-none " placeholder="nama">
                @error('category_name')
                    <p class="text-[12px] text-red-500 italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="buttom" wire:click="doCreateCategorySection"
                    class="bg-sky-500 py-1 px-4 text-[13px] rounded text-white">Buat</button>
            </div>

        </div>

    </section>
</div>
