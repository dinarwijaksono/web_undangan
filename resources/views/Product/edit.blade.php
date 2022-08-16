@extends('layouts/main')

@section('content')
<div class="row">
    <section class="col-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>EDIT PRODUK</h3>
            </div>

            <div class="panel-body">
                <form action="/Product/edit/<?= $code ?>" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Nama kategori" value="<?= $product['name'] ?>" />
                        @error('name')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="category" class="form-control">
                            <option>Pilih kategori</option>
                            @foreach ($listCategory as $category )
                            <?php if ($category['id'] == $product['category_id']) : ?>
                                <option value="<?= $category['id'] ?>" selected><?= $category['name'] ?></option>
                            <?php else : ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endif ?>
                            @endforeach
                        </select>
                        @error('category')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="container-fluid">
                            <div class="col-sm-2 col-sm-offset-8">
                                <a href="/Category" class="btn btn-block btn-danger btn-block">Batal</a>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-block btn-primary btn-block">Buat kategori</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
</div>
@endsection