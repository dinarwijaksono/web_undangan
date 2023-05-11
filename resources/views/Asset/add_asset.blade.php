@extends('layouts/cms_main')

@section('content')
<div class="row">
    <section class="col-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>TAMBAH ASSET</h3>
            </div>

            <div class="panel-body">

                @if (session('addAssetError'))
                <div class="alert alert-danger" style="margin: 10px; padding: 10px;" role="alert"><?= session('addAssetError') ?></div>
                @endif

                @if (session('addAssetSuccess'))
                <div class="alert alert-success" style="margin: 10px; padding: 10px;" role="alert"><?= session('addAssetSuccess') ?></div>
                @endif

                <form action="/Asset/addAsset" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Nama asset" autocomplete="off" />
                        @error('name')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <section class="form-group">
                        <label>Pilih jenis asset</label>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="fileType" id="optionsRadios1" value="image" checked="">Gambar
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class=" radio">
                                        <label>
                                            <input type="radio" name="fileType" id="optionsRadios1" value="css">css
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" radio">
                                        <label>
                                            <input type="radio" name="fileType" id="optionsRadios1" value="javascript">javascript
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                    <div class="form-group">
                        <label>Pilih file</label>
                        <input class="form-control" type="file" name="file" />
                        @error('file')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror('file')
                    </div>

                    <div class="row">
                        <div class="container-fluid">
                            <div class="col-sm-2 col-sm-offset-8">
                                <a href="/Asset" class="btn btn-block btn-danger btn-block">Batal</a>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-block btn-primary btn-block">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
</div>
@endsection