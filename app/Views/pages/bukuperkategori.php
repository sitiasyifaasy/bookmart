<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<div class="product-view">
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
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-view-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-search">
                                        <input type="email" value="Search">
                                        <button><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php foreach ($buku as $b) : ?>
                        <div class="col-md-4">
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="#"><?= $b['nama_buku'] ?></a>
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
                                        <img src="/buku/<?= $b['cover'] ?>" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="/bukucontroller/keranjang/<?php echo $b['id_buku'] ?>"><i class="fa fa-cart-plus"></i></a>
                                        <a href="/buku/<?php echo $b['slug'] ?>"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3><span>Rp.</span><?= $b['harga'] ?></h3>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination Start -->
                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Pagination Start -->
            </div>

            <!-- Side Bar Start -->
            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Category</h2>
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <?php foreach ($kategori as $k) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/kategori/<?= $k['slug'] ?>"><i class="fa fa-home"></i><?= $k['nama_kategori'] ?></a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Side Bar End -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>