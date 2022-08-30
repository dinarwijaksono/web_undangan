@extends('layouts/frontLayout')

@section('content')
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
                                <a target="black" href="/Demo/<?= $product->link->locate ?>"><span>Lihat demo</span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </section>

        </section>

    </div>
</div>
@endsection