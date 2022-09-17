@extends('layouts/main')

@section('content')

<section class="row pad-botm">
    <div class="col-md-12">
        <h4 class="header-line"><?= $product['name'] ?></h4>
    </div>
</section>

<section class="row">

    <div class="col-md-6">
        <p style="margin: 0; padding: 0;">Kategori : <?= $product['category_name'] ?></p>
        <p style="margin: 0; padding: 0;">Harga : <?= 'Rp. ' . number_format($product['price']) ?></p>
        <p style="margin: 0; padding: 0;">Link demo : <?= $product['link_locate_demo'] ?></p>
        <p style="margin: 0; padding: 0;">Dilihat : <?= number_format($product['see_count']) ?></p>
        <p style="margin: 0; padding: 0;">Dibuat : <?= date(' H:i, d-M-Y', $product['created_at'] / 1000) ?></p>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Gambar produk
            </div>
            <div>
                <div style="float: left; width: 20%;">
                    <img src="assets/img/user.gif" alt="gambar" style="border: 1px solid red;" />
                    <br>
                    <a href="">Hapus</a>
                </div>
                <div style="float: left; width: 20%;">
                    <img src="assets/img/user.gif" alt="gambar" style="border: 1px solid red;" />
                    <br>
                    <a href="">Hapus</a>
                </div>
                <div style="float: left; width: 20%;">
                    <img src="assets/img/user.gif" alt="gambar" style="border: 1px solid red;" />
                    <br>
                    <a href="">Hapus</a>
                </div>
                <div style="float: left; width: 20%;">
                    <img src="assets/img/user.gif" alt="gambar" style="border: 1px solid red;" />
                    <br>
                    <a href="">Hapus</a>
                </div>
                <div style="float: left; width: 20%;">
                    <img src="assets/img/user.gif" alt="gambar" style="border: 1px solid red;" />
                    <br>
                    <a href="">Hapus</a>
                </div>

                <div style="clear: left;"></div>

            </div>
            <div style="padding: 5px;">
                <button class="btn btn-info">Tambah gambar</button>
            </div>
        </div>
    </div>

</section>
@endsection