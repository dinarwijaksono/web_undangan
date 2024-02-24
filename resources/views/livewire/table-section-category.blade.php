<section class="box">
    <div class="box-header">
        <h3>Daftar kategori section</h3>

        {{-- <div class="block my-3 border border-red-500 bg-red-100 text-red-500 py-1 px-2 italic text-[14px]">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
        </div> --}}
    </div>

    <div class="box-body h-72 overflow-scroll">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Dibuat</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @php $i = 1; @endphp
                @foreach ($theListSectionCategory as $key)
                    <tr>
                        <td class="text-center">{{ $i++ }} </td>
                        <td>{{ $key->name }}</td>
                        <td class="text-center">{{ date('d M Y', $key->created_at / 1000) }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm w-full">Hapus</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
</section>
