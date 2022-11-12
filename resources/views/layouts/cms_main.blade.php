<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Web undangan</title>

    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="/asset_cms/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="/asset_cms/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="/asset_cms/css/style.css" rel="stylesheet" />

</head>

<body>
    <!-- MENU SECTION START-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="/Dashboard">DASHBOARD</a></li>
                            <li><a href="/Category">KATEGORI</a></li>
                            <li><a href="/Product">PRODUK</a></li>
                            <li><a href="/Order">PESANAN</a></li>
                            <li>
                                <a class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">SETTING <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/Config/userManagement">User management</a></li>
                                    <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="#">EXAMPLE LINK</a></li> -->
                                </ul>
                            </li>
                            <li>
                                <a>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button class="btn-link">LOGOUT</button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->

    <div class="content-wrapper">
        <main class="container">

            @yield('content')

        </main>
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