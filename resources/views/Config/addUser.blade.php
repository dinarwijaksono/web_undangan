@extends('layouts/main')


@section('content')
<div class="row pad-botm">
    <section class="col-md-12">
        <h4 class="header-line">User management</h4>

        <a href="/Config/userManagement" class="btn btn-danger btn-xs">Kembali</a>

    </section>

    <section class="row">
        <div class="col-md-12">

            <div class="panel-body">
                <form method="post" action="/Config/addUser" role="form">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" autocomplete="off" class="form-control" type="text" id="email" placeholder="Email" />
                        <!-- <p class="help-block" style="color: red;">Lorem ipsum dolor sit amet consectetur adipisicing.</p> -->
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" class="form-control" type="password" id="password" placeholder="password" />
                        <!-- <p class="help-block" style="color: red;">Lorem ipsum dolor sit amet consectetur adipisicing.</p> -->
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Password</label>
                        <input name="password_confirmation" class="form-control" type="password" id="password_confirmation" placeholder="konfirmasi password" />
                        <!-- <p class="help-block" style="color: red;">Lorem ipsum dolor sit amet consectetur adipisicing.</p> -->
                    </div>

                    <div style="text-align: right;">
                        <button type="submit" class="btn btn-info">Buat User</button>
                    </div>

                </form>
            </div>

        </div>
    </section>

</div>
@endsection