@extends('layouts/cms_main')

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


            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 5%;">NO</th>
                                <th style="text-align: center; width: 25%;">Nama</th>
                                <th style="text-align: center; width: 10%;">Harga</th>
                                <th style="text-align: center; width: 10%;">Dilihat</th>
                                <th style="text-align: center; width: 10%;">Kategori</th>
                                <th style="text-align: center; width: 20%;">Dibuat</th>
                                <th style="text-align: center; width: 20%; text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            @foreach ($listProduct as $product)
                            <tr>
                                <td style="text-align: center;"><?= $i++ . '.' ?></td>
                                <td><a href="/Product/show/<?= $product->code ?>"><?= $product->name ?></a></td>
                                <td style="text-align: right;"><?= 'Rp ' . number_format($product->price) ?></td>
                                <td style="text-align: center;"><?= number_format($product->total_views) ?></td>
                                <td style="text-align: center;"><?= $product->category_name ?></td>
                                <td style="text-align: center;"><?= date('h:s, d M Y', $product->created_at / 1000) ?></td>
                                <td style="text-align: center;">
                                    <a href="/showDemoProduct/<?= $product->link_locate_demo ?>" target="on" class="btn btn-primary btn-xs">Lihat demo</a>
                                    <a href="/Product/edit/<?= $product->code ?>" class="btn btn-primary btn-xs">Edit</a>
                                    <form action="/Product/delete/<?= $product->code ?>" method="post" style="display: inline;">
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