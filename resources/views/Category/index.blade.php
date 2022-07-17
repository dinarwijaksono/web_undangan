@extends('layouts/main')

@section('content')

<!-- <div class="row pad-botm">
    <div class="col-md-12">
        <h4 class="header-line">LIST KATEGORI</h4>
    </div>
</div> -->

<div class="row">
    <div class="col-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <p>List Kategori</p>
                <a href="/Category/create" style="text-align: right; display: block; text-decoration: underline;">Buat kategori baru</a>

                @if (session('CreateSuccess'))
                <div class="alert alert-success" style="margin: 10px; padding: 10px;" role="alert"><?= session('CreateSuccess') ?></div>
                @endif

                @if (session('deleteSuccess'))
                <div class="alert alert-info" style="margin: 10px; padding: 10px;" role="alert"><?= session('deleteSuccess') ?></div>
                @endif

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10%;">#</th>
                                <th style="width: 70%;">Nama</th>
                                <th style="width: 20%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            @foreach ($listCategory as $category)
                            <tr>
                                <td><?= $i++ ?>.</td>
                                <td><?= $category->name ?></td>
                                <td>
                                    <form action="/Category/delete/<?= $category->code ?>" method="post" style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                                    </form>
                                    <a href="#" class="btn btn-primary btn-xs">Edit</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection