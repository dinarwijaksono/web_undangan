@extends('layouts/main')


@section('content')
<div class="row pad-botm">
    <section class="col-md-12">
        <h4 class="header-line">User management</h4>
    </section>

    <section class="row">
        <div class="col-md-12">

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
                                <tr>
                                    <td style="text-align: center;"><?= $i++ ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td style="text-align: center;">
                                        <a href="#" class="btn btn-primary btn-xs">Ubah password</a>
                                        <a href="#" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr>
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