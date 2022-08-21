@extends('layouts/main')


@section('content')
<div class="row pad-botm">
    <section class="col-md-12">
        <h4 class="header-line">User management</h4>
    </section>

    <section class="row">
        <div class="col-md-12">

            @if (session('createSuccess'))
            <div class="alert alert-warning">
                <strong>INFO :</strong>
                <?= session('createSuccess') ?>
            </div>
            @endif

            @if (session('deleteSuccess'))
            <div class="alert alert-danger">
                <strong>INFO :</strong>
                <?= session('deleteSuccess') ?>
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    LIST USER
                    <a href="/Config/addUser" style="display: block; text-align: right;">Tambah user baru</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10%; text-align: center;">#</th>
                                    <th style="width: 60%;">Email</th>
                                    <th style="width: 30%;"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 1; ?>
                                @foreach ($listUser as $user)
                                <?php if ($user['email'] == 'admin@gmail.com') : ?>
                                    <tr <?= $user->email == auth()->user()->email ? "class='warning'" : "" ?>>
                                        <td style="text-align: center;"><?= $i++ ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td style="text-align: center;">
                                            <a href="#" class="btn btn-primary btn-xs">Ubah password</a>
                                            <a class="btn btn-danger btn-xs" style="opacity: 0.5;">Hapus</a>
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <tr <?= $user->email == auth()->user()->email ? "class='warning'" : "" ?>>
                                        <td style="text-align: center;"><?= $i++ ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td style="text-align: center;">
                                            <a href="#" class="btn btn-primary btn-xs">Ubah password</a>
                                            <form action="/Config/deleteUser/<?= $user['id'] ?>" method="post" style="display: inline">
                                                @csrf
                                                @method('delete')
                                                <button <?= $user->email == auth()->user()->email ? "class='btn btn-danger btn-xs' style='opacity: 0.5;'" : "type='submit' class='btn btn-danger btn-xs'" ?>>Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif ?>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
@endsection