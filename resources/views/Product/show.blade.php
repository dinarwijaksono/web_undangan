@extends('layouts/cms_main')

@section('content')

<section class="row pad-botm">
    <div class="col-md-12">
        <h4 class="header-line"><?= $product->name ?></h4>
    </div>

    <div class="col-md-12">
        @error('image')
        <div class="alert alert-danger" style="margin: 10px; padding: 10px;" role="alert"><?= $message ?></div>
        @endError

        @if (session('uploadFailed'))
        <div class="alert alert-danger" style="margin: 10px; padding: 10px;" role="alert"><?= session('uploadFailed') ?></div>
        @endif

        @if (session('uploadSuccess'))
        <div class="alert alert-success" style="margin: 10px; padding: 10px;" role="alert"><?= session('uploadSuccess') ?></div>
        @endif

    </div>
</section>

<div class="container">
    <section class="row">

        <div style="padding: 5px;">
            <a href="/Product" class="btn btn-sm btn-link text-danger">Kembali</a>
        </div>

        <div class="col-md-6">
            <p style="margin: 0; padding: 0;">Kategori : <?= $product->category_name ?> </p>
            <p style="margin: 0; padding: 0;">Harga : <?= number_format($product->price) ?></p>
            <p style="margin: 0; padding: 0;">Link demo : <?= $product->link_locate_demo ?></p>
            <p style="margin: 0; padding: 0;">Dilihat : <?= number_format($product->whoSeeDemo->count()) ?> </p>
            <p style="margin: 0; padding: 0;">Dibuat : <?= date('h:i, d M Y', $product->created_at / 1000) ?></p>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Gambar thumb product
                </div>
                <div class="container">
                    <section class="row" style="overflow-x: scroll;">

                        <div class="col-sm-3">
                            <img src="/storage/demo_01.png" alt="Gambar" style="width: 100%;">
                        </div>

                    </section>
                </div> <!-- container -->

                <div style="padding: 5px;">
                    <form action="<?= '/Product/uploadTumb/' . $product->code ?>" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image">

                        <button type="submit" class="btn btn-sm btn-info">Ganti gambar</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div> <!-- container -->
@endsection