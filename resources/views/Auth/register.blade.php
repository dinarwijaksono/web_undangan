<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>web undangan</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="/asset_cms/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="/asset_cms/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="/asset_cms/css/style.css" rel="stylesheet" />

</head>

<body>

    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">

            <div class="col-sm-6 col-sm-offset-3 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        Register
                    </div>
                    <div class="panel-body">

                        @if (session('registerSuccess'))
                        <div class="alert alert-success" role="alert"><?= session('registerSuccess') ?></div>
                        @endif

                        @if (session('registerFailed'))
                        <div class="alert alert-danger" role="alert"><?= session('registerFailed') ?></div>
                        @endif

                        <form method="post" action="/Register" role="form">
                            @csrf
                            <div class="form-group">
                                <label>Register Code</label>
                                <input class="form-control" name="register_code" type="text" placeholder="Register code" value="{{ old('register_code') }}" />
                                @error('register_code')
                                <p class="help-block" style="color: red;"><?= $message ?></p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" type="text" placeholder="Email" value="{{ old('email') }}" />
                                @error('email')
                                <p class="help-block" style="color: red;"><?= $message ?></p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password" placeholder="password" />
                                @error('password')
                                <p class="help-block" style="color: red;"><?= $message ?></p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Konfirmasi password</label>
                                <input class="form-control" name="password_confirmation" type="password" placeholder="konfirmasi password" />
                                @error('password_confirmation')
                                <p class="help-block" style="color: red;"><?= $message ?></p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-info btn-block">Login</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2022 Yourdomain.com |<a href="" target="_blank"> Designed and Develop by : @dinarwijaksono11</a>
                </div>

            </div>
        </div>
    </section>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="/asset_cms/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="/asset_cms/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="/asset_cms/js/custom.js"></script>
</body>

</html>