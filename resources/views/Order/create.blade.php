@extends('layouts/cms_main')

@section('content')
<div class="row">
    <section class="col-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>TAMBAH PESANAN</h3>
            </div>

            @if (session('createFailed'))
            <div class="alert alert-danger" style="margin: 10px; padding: 10px;" role="alert"><?= session('createFailed') ?></div>
            @endif

            <div class="panel-body">
                <form action="/Order/create" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="order_from">Pemesan</label>
                        <input class="form-control" type="text" name="order_from" id="order_from" placeholder="pemesan" />
                        @error('order_from')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="link_name">Name link</label>
                        <input class="form-control" type="text" name="link_name" id="link_name" placeholder="nama link" />
                        @error('link_name')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="expired">Expired</label>
                        <input class="form-control" type="date" name="expired" id="expired" />
                        @error('expired')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="container-fluid">
                            <div class="col-sm-2 col-sm-offset-8">
                                <a href="/Order" class="btn btn-block btn-danger btn-block">Batal</a>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-block btn-primary btn-block">Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
</div>
@endsection