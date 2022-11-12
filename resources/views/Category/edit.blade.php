@extends('layouts/cms_main')

@section('content')
<div class="row">
    <section class="col-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>EDIT KATEGORI</h3>
            </div>

            @if (session('editFailed'))
            <div class="alert alert-warning" style="margin: 10px; padding: 10px;" role="alert"><?= session('editFailed') ?></div>
            @endif

            <div class="panel-body">
                <form action="/Category/edit/<?= $category->code ?>" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Nama kategori" value="<?= $category->name ?>" />
                        @error('name')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="container-fluid">
                            <div class="col-sm-2 col-sm-offset-8">
                                <a href="/Category" class="btn btn-block btn-danger btn-block">Batal</a>
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