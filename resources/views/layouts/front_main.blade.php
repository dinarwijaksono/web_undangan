<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat undangan web</title>
    <link rel="stylesheet" href="/asset_product/bootstrap_5_2_2/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fs-3" href="/"><b>BUAT <span class="text-danger">UNDANGAN</span></b></a>

            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->

            <!-- <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div> -->
        </div>
    </nav>

    <main class="p-1" style="min-height: 1200px;">

        @yield('content')

    </main>

    <footer class="bg-dark m-0 p-2">
        <p class="text-white m-0 text-center" style="font-size: 14px;">dinarwijaksono11@gmail.com</p>
    </footer>

    <script src="/asset_product/bootstrap_5_2_2/js/bootstrap.bundle.min.js"></script>
</body>

</html>