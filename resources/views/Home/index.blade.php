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
        <!-- <div class="banner-item-02">
                <div class="text-content">
                    <h4>Flash Deals</h4>
                    <h2>Get your best products</h2>
                </div>
            </div>
            <div class="banner-item-03">
                <div class="text-content">
                    <h4>Last Minute</h4>
                    <h2>Grab last minute deals</h2>
                </div>
            </div> -->
    </div>
</div>
<!-- Banner Ends Here -->

<div class="latest-products">
    <div class="container">
        <section class="row">
            <section class="col-md-12">
                <div class="section-heading">
                    <h2>Produk Kami</h2>
                    <a href="products.html">Lihat semua produk kami <i class="fa fa-angle-right"></i></a>
                </div>
            </section>

            <div class="col-md-4">
                <div class="product-item">
                    <a href="#"><img src="/asset_2/images/product_01.jpg" alt=""></a>
                    <div class="down-content">
                        <a href="#">
                            <h4>Tittle goes here</h4>
                        </a>
                        <h6>$25.75</h6>
                        <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Reviews (24)</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-item">
                    <a href="#"><img src="/asset_2/images/product_02.jpg" alt=""></a>
                    <div class="down-content">
                        <a href="#">
                            <h4>Tittle goes here</h4>
                        </a>
                        <h6>$30.25</h6>
                        <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Reviews (21)</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-item">
                    <a href="#"><img src="/asset_2/images/product_03.jpg" alt=""></a>
                    <div class="down-content">
                        <a href="#">
                            <h4>Tittle goes here</h4>
                        </a>
                        <h6>$20.45</h6>
                        <p>Sixteen Clothing is free CSS template provided by TemplateMo.</p>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Reviews (36)</span>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<div class="best-features">
    <div class="container">
        <section class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Tentang Buat undangan</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="left-content">
                    <!-- <h4>Looking for the best products?</h4> -->
                    <p>Buat undangan adalah sebuah platform membuat web digital, murah dengan berbagai macam contoh desain.</p>
                    <p>Keunggulan buat undangan</p>
                    <ul class="featured-list">
                        <li><a href="#">Beragam desain yang bisa di pilih</a></li>
                        <li><a href="#">Refisi sampai puas</a></li>
                    </ul>
                    <a href="about.html" class="filled-button">Baca lebih lengkap</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-image">
                    <img src="assets/images/feature-image.jpg" alt="">
                </div>
            </div>
        </section>
    </div>
</div>


<!-- <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="filled-button">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection