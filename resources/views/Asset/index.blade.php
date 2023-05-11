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

                            <tr>
                                <td>d</td>
                                <td>
                                    <a href="/Category/edit/" class="btn btn-primary btn-xs">Edit</a>
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