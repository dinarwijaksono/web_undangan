<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Buat undangan</title>

    <!-- Bootstrap core CSS -->
    <link href="/asset_2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/asset_2/css/fontawesome.css">
    <link rel="stylesheet" href="/asset_2/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="/asset_2/css/owl.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <h2>Buat <em>undangan</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/Home/listProduct">Produk kami</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="">Tentang Kami</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="">Kontak kami</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01">
                <div class="text-content">
                    <h4>penawaran terbaik</h4>
                    <h3 class="text-white">DAPATKAN PRODUK TERBAIK</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
        <div class="container">
            <section class="row">
                <section class="col-md-12">
                    <div class="section-heading">
                        <h2>Produk Kami</h2>
                    </div>
                </section>

                <section class="col-md-12">
                    <div class="row">

                        @foreach ($listProduct as $product)
                        <div class="col-md-4">
                            <div class="product-item">
                                <a href="#"><img src="/asset_2/images/product_02.jpg" alt=""></a>
                                <div class="down-content">
                                    <h4><?= $product->name ?></h4>
                                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                                    <a href=""><span>Lihat demo</span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </section>

            </section>

        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright &copy; 2022 Buatundangan.epizy.com

                            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="/asset_2/vendor/jquery/jquery.min.js"></script>
    <script src="/asset_2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="/asset_2/js/custom.js"></script>
    <script src="/asset_2/js/owl.js"></script>
    <script src="/asset_2/js/slick.js"></script>
    <script src="/asset_2/js/isotope.js"></script>
    <script src="/asset_2/js/accordions.js"></script>


    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>


</body>

</html>