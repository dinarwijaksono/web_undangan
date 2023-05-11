@extends('layouts/cms_main')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <p>List Asset</p>
                <a href="/Asset/addAsset" style="text-align: right; display: block; text-decoration: underline;">Tambah asset</a>

                @if (session('CreateSuccess'))
                <div class="alert alert-success" style="margin: 10px; padding: 10px;" role="alert"><?= session('CreateSuccess') ?></div>
                @endif

                @if (session('deleteAssetSuccess'))
                <div class="alert alert-info" style="margin: 10px; padding: 10px;" role="alert"><?= session('deleteAssetSuccess') ?></div>
                @endif

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10%; text-align: center;">No</th>
                                <th style="width: 40%;">Nama</th>
                                <th style="width: 20%; text-align: center;">Type</th>
                                <th style="width: 20%; text-align: center;">Dibuat</th>
                                <th style="width: 10%; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            <?php foreach ($assetList as $asset) : ?>
                                <tr>
                                    <td style="text-align: center;"><?= $i++ ?></td>
                                    <td><?= $asset->name ?></td>
                                    <td style="text-align: center;"><?= $asset->type ?></td>
                                    <td><?= date('h:i, d M Y', $asset->created_at / 1000) ?></td>
                                    <td style="text-align: center;">
                                        <form action="/Asset/delete/<?= $asset->id ?>" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-xs">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection