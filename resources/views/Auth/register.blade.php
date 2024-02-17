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

    @livewireStyles
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
                        @livewire('form-register')
                    </div>

                    <div class="panel-footer">
                        <p class="text-center"><a href="/Login">Sudah punya akun.</a></p>
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
                    &copy; 2022 Yourdomain.com |<a href="" target="_blank"> Designed and Develop by :
                        @dinarwijaksono11</a>
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

    @livewireScripts
</body>

</html>
