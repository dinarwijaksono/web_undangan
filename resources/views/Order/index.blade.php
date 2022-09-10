@extends('layouts/main')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <p>List Kategori</p>

                <a href="/Order/create" style="text-align: right; display: block; text-decoration: underline;">Tambah pesanan</a>

                @if (session('createSuccess'))
                <div class="alert alert-success" style="margin: 10px; padding: 10px;" role="alert"><?= session('createSuccess') ?></div>
                @endif

                @if (session('deleteSuccess'))
                <div class="alert alert-info" style="margin: 10px; padding: 10px;" role="alert"><?= session('deleteSuccess') ?></div>
                @endif

                @if (session('editSuccess'))
                <div class="alert alert-info" style="margin: 10px; padding: 10px;" role="alert"><?= session('editSuccess') ?></div>
                @endif

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10%;">#</th>
                                <th style="width: 40%;">Nama</th>
                                <th style="width: 25%;">Expired</th>
                                <th style="width: 25%; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            <tr>
                                <td><?= $i++ ?>.</td>
                                <td>pesanan dari</td>
                                <td>Expired</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-xs">Lihat Demo</a>
                                    <a href="" class="btn btn-primary btn-xs">Edit</a>
                                    <form action="/Order/delete/" method="post" style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection