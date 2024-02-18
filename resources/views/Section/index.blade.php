@extends('layouts/main')

@section('content')
    <div class="flex">
        <div class="basis-6/12">
            @livewire('form-create-section-category')
        </div>

        <div class="basis-6/12">
            <section class="box">
                <div class="box-header">
                    <h3>Daftar kategori section</h3>

                    <div class="block my-3 border border-red-500 bg-red-100 text-red-500 py-1 px-2 italic text-[14px]">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                    </div>
                </div>

                <div class="box-body">
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
                            @for ($i = 0; $i < 10; $i++)
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Kategories</td>
                                    <td class="text-center">14 Januari 2024</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm w-full">Hapus</button>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>

                    </table>
                </div>
            </section>
        </div>

    </div>
@endsection
