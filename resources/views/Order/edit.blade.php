@extends('layouts/cms_main')

@section('content')
<div class="row">
    <section class="col-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>EDIT PESANAN</h3>
            </div>

            @if (session('updateFailed'))
            <div class="alert alert-danger" style="margin: 10px; padding: 10px;" role="alert"><?= session('updateFailed') ?></div>
            @endif

            @if (session('updateSuccess'))
            <div class="alert alert-success" style="margin: 10px; padding: 10px;" role="alert"><?= session('updateSuccess') ?></div>
            @endif

            <div class="panel-body">
                <form action="/Order/edit/<?= $order->code ?>" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="order_from">Pemesan</label>
                        <input class="form-control" type="text" name="order_from" id="order_from" value="<?= $order->order_from ?>" placeholder="pemesan" />
                        @error('order_from')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="link_name">Name link</label>
                        <input class="form-control" type="text" name="link_name" id="link_name" value="<?= $order->link_locate ?>" placeholder="nama link" />
                        @error('link_name')
                        <p class="help-block" style="color: red;"><?= $message ?></p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="expired">Expired</label>
                        <input class="form-control" type="date" name="expired" value="<?= date('Y-m-d', $order->expired / 1000) ?>" id="expired" />
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
                                <button type="submit" class="btn btn-block btn-primary btn-block">Edit</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
</div>
@endsection