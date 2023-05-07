@extends('layouts/cms_main')

@section('content')
<div class="row">
    <section class="col-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>EDIT PRODUK</h3>

            </div>

            @if (session('editSuccess'))
            <div class="alert alert-info" style="margin: 10px; padding: 10px;" role="alert"><?= session('editSuccess') ?></div>
            @endif

            @if (session('editFailed'))
            <div class="alert alert-danger" style="margin: 10px; padding: 10px;" role="alert"><?= session('editFailed') ?></div>
            @endif

            <div class="panel-body">
                <form action="/Product/edit/<?= $product['code'] ?>" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Nama kategori" value="<?= $product['name'] ?>" />
                        @error('name')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input class="form-control" type="text" name="price" id="price" placeholder="Harga produk" value="<?= $product['price'] ?>" />
                        @error('price')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="category_id" class="form-control">
                            <option>Pilih kategori</option>
                            @foreach ($listCategory as $category )
                            <?php if ($category->id == $product['category_id']) : ?>
                                <option value="<?= $category->id ?>" selected><?= $category->name ?></option>
                            <?php else : ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                            <?php endif ?>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Body</label>
                        <textarea name="body" class="form-control" rows="3"><?= $product['body'] ?></textarea>
                        @error('body')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="container-fluid">
                            <div class="col-sm-2 col-sm-offset-8">
                                <a href="/Product" class="btn btn-block btn-danger btn-block">Batal</a>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-block btn-primary btn-block">Edit kategori</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
</div>
@endsection