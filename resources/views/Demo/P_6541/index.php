<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>website undangan</title>
    <link href="/asset_product/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- my css -->
    <link rel="stylesheet" href="/Demo/product_1/css/fonts.css">
    <link rel="stylesheet" href="/Demo/product_1/css/style.css">
</head>

<body>

    <!-- cover -->
    <section class="cover" style="display: block;">
        <div>
            <img src="/Demo/product_1/asset/cover 1.png" alt="foto cover">
        </div>

        <div>
            <h1>Putra & Putri</h1>
            <p>- Minggu, 10 Januari 2025 -</p>
        </div>

        <div>
            <p>Kepada Bapak/Ibu/Saudara/i</p>
            <h2>Dinar Wijaksono</h2>
            <p>Mohon maaf apabila ada kesalahan <br> pada penulisan nama /gelar</p>
        </div>

        <div>
            <Button id="buka" type="button">Buka Undangan</Button>
        </div>

    </section>
    <!-- end cover -->


    <!-- isi -->
    <section class="isi" style="display: none;">
        <div style="background-image: url('/Demo/product_1/asset/foto 1.png');">
            <P>The Wedding of</P>
            <p>Putra & Putri</p>
            <p>Minggu, 10 Januari 2025</p>
        </div>

    </section>
    <!-- end isi -->



    <script src="/Demo/product_1/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <script>
        let buka = document.getElementById('buka');
        let cover = document.getElementsByClassName('cover')[0];
        let isi = document.getElementsByClassName('isi')[0];

        buka.addEventListener('click', function() {

            cover.style.display = 'none';
            isi.style.display = 'block'

        });
    </script>

</body>

</html>