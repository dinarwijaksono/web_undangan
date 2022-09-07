@extends('layouts/main')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <p>List Produk</p>
                <a href="/Product/create" style="text-align: right; display: block; text-decoration: underline;">Buat produk baru</a>

                @if (session('createSuccess'))
                <div class="alert alert-success" style="margin: 10px; padding: 10px;" role="alert"><?= session('createSuccess') ?></div>
                @endif

                @if (session('deleteSuccess'))
                <div class="alert alert-info" style="margin: 10px; padding: 10px;" role="alert"><?= session('deleteSuccess') ?></div>
                @endif

                @if (session('editSuccess'))
                <div class="alert alert-info" style="margin: 10px; padding: 10px;" role="alert"><?= session('editSuccess') ?></div>
                @endif

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10%;">#</th>
                                <th style="width: 15%;">Nama</th>
                                <th style="width: 12%;">Harga</th>
                                <th>Dilihat</th>
                                <th style="width: 15%;">Kategori</th>
                                <th style="width: 25%; text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            @foreach ($listProduct as $product)
                            <tr>
                                <td><?= $i++ . '.' ?></td>
                                <td><?= $product['name'] ?></td>
                                <td><?= 'Rp ' . number_format($product['price']) ?></td>
                                <td><?= number_format($product['see']) ?></td>
                                <td><?= $product['categoryName'] ?></td>
                                <td style="text-align: center;">
                                    <a href="/Demo/<?= $product['link_locate_demo'] ?>" target="black" class="btn btn-primary btn-xs">Lihat demo</a>
                                    <a href="/Product/edit/<?= $product['code'] ?>" class="btn btn-primary btn-xs">Edit</a>
                                    <form action="/Product/delete/<?= $product['code'] ?>" method="post" style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection