@extends('layouts/cms_main')

@section('content')
<div class="row">
    <section class="col-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>BUAT PRODUK</h3>
            </div>

            <div class="panel-body">
                <form action="/Product/create" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Nama kategori" />
                        @error('name')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input class="form-control" type="text" name="price" id="price" placeholder="Harga produk" />
                        @error('price')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="category_id" class="form-control">
                            <option value="">Pilih kategori</option>
                            @foreach ($listCategory as $category )
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>


                    <section class="form-group">
                        <label>Pilih asset (css)</label>

                        <div class="row">

                            <div class="col-sm-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="" />Asset/javascript.css
                                    </label>
                                </div>
                            </div>

                        </div>
                    </section>

                    <section class="form-group">
                        <label>Pilih asset (javascript)</label>

                        <div class="row">

                            <div class="col-sm-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="" />Asset/javascript.css
                                    </label>
                                </div>
                            </div>

                        </div>
                    </section>

                    <section class="form-group">
                        <label>Css internal</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </section>

                    <section class="form-group">
                        <label>Body</label>
                        <textarea name="body" class="form-control" rows="5"></textarea>
                        @error('body')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </section>

                    <section class="form-group">
                        <label>Javascript internal</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </section>

                    <div class="row">
                        <div class="container-fluid">
                            <div class="col-sm-2 col-sm-offset-8">
                                <a href="/Product" class="btn btn-block btn-danger btn-block">Batal</a>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-block btn-primary btn-block">Buat Produk</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
</div>
@endsection