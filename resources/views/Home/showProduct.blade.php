@extends('layouts/front_main')

@section('content')
<section class="pt-3 ">
    <h3 class="fs-5 mb-2 text-decoration-underline text-center">PRODUK KAMI</h3>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 ">


                <div class="row justify-content-center">

                    @foreach ($listProduct as $product)
                    <div class="border col-sm-12 col-md-4 m-2 border-2 rounded " style="overflow: hidden;  position: relative; width: 300px; height: 300px; ">
                        <div style="background-image: url('/storage/demo_01.png'); background-size: cover; background-position: center; background-repeat: no-repeat; position: absolute; top: 0; bottom: 0; left: 0; right: 0; ">

                            <p class="fs-7 p-0 opacity-75 text-center bg-dark text-light rounded-bottom " style="width: 50%; margin: auto;"><?= $product->product_name ?></p>

                            <div class="container" style="position: absolute; bottom: 5px;">
                                <div class="row justify-content-between align-items-end">
                                    <div class="col-6 d-grid ">
                                        <a href="<?= '/Demo/' . $product->link_locate_demo ?>" class="btn btn-primary btn-sm p-0 fs-8 ">Lihat Demo</a>
                                    </div>

                                    <div class="col-6 d-grid ">
                                        <a href="https://wa.me/62859106979837" target="_black" class="btn btn-primary btn-sm p-0 fs-8">Pesan sekarang</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>


            </div>
        </div>
    </div>
</section>
@endsection