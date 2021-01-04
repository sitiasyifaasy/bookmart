<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<!-- Main Slider Start -->
<div class="header">
    <div class="container-fluid">
        <div class="row">
        <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="col-md-12">
                    <div class="alert alert-success  alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('pesanerror')) : ?>
                <div class="col-md-12">
                    <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesanerror') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-3">
                <nav class="navbar bg-light">
                    <ul class="navbar-nav">
                    <?php foreach ($kategori as $k): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/kategori/<?php echo $k['slug'] ?>"><i class="fa fa-home"></i><?php echo $k['nama_kategori']?></a>
                        </li>
                    <?php endforeach ?>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="header-slider normal-slider">
                <?php foreach ($buku as $b): ?>
                    <div class="header-slider-item">
                        <img src="/buku/<?php echo $b['cover'] ?>" alt="Slider Image" class="img-fluid" />
                        <div class="header-slider-caption">
                            <p><?php echo $b['nama_buku'] ?></p>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Slider End -->


<!-- Feature Start-->
<div class="feature">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fab fa-cc-mastercard"></i>
                    <h2>Pembayaran Aman</h2>
                    <p>
                        Pembayaran terjamin aman
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-truck"></i>
                    <h2>Pengiriman Luas</h2>
                    <p>
                        Dapat dikirim ke berbagai daerah
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-sync-alt"></i>
                    <h2>Retur Barang 20 Hari</h2>
                    <p>
                        Pengembalian barang 20 hari sejak barang diterima
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-comments"></i>
                    <h2>Bantuan 24/7</h2>
                    <p>
                        Bantuan setiap saat
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End-->


<!-- Call to Action Start -->
<div class="call-to-action">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>Hubungi Kami</h1>
            </div>
            <div class="col-md-6">
                <a href="tel:021888999777">(021) 888999777</a>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->

<!-- Recent Product Start -->
<div class="recent-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>Recent Product</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">
        <?php foreach ($recent as $r): ?>
            <div class="col-lg-3">
                <div class="product-item">
                    <div class="product-title">
                        <a href="#"><?php echo $r['nama_buku'] ?></a>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="product-image">
                        <a href="product-detail.html">
                            <img src="/buku/<?php echo $r['cover'] ?> " alt="Product Image">
                        </a>
                        <div class="product-action">
                            <a href="/bukucontroller/keranjang/<?php echo $r['id_buku'] ?>"><i class="fa fa-cart-plus"></i></a>
                            <a href="#"><i class="fa fa-heart"></i></a>
                            <a href="/buku/<?php echo $r['slug'] ?>"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="product-price">
                        <h3><span>rp</span><?php echo $r['harga'] ?></h3>
                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Recent Product End -->

<?= $this->endSection(); ?>