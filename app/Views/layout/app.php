<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E Store - eCommerce HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
    <link href="/assets/lib/slick/slick.css" rel="stylesheet">
    <link href="/assets/lib/slick/slick-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/lib/easing/easing.min.js"></script>
    <script src="/assets/lib/slick/slick.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>

    <!-- Template Stylesheet -->
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Top bar Start -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-envelope"></i>
                    support@email.com
                </div>
                <div class="col-sm-6">
                    <i class="fa fa-phone-alt"></i>
                    +012-345-6789
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="/" class="nav-item nav-link active">Beranda</a>
                        <?php if (!session('is_login')) : ?>
                            <a href="/auth" class="nav-item nav-link">Login</a>
                            <a href="/auth" class="nav-item nav-link">Register</a>
                        <?php else : ?>
                            <a href="/auth/logout" class="nav-item nav-link">Logout</a>
                        <?php endif; ?>
                        <?php if (session('level') == 'Admin') : ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Manage</a>
                                <div class="dropdown-menu">
                                    <a href="/admin/buku" class="dropdown-item">Buku</a>
                                    <a href="/admin/kategori" class="dropdown-item">Kategori</a>
                                    <a href="/admin/penulis" class="dropdown-item">Penulis</a>
                                    <a href="/admin/penerbit" class="dropdown-item">Penerbit</a>
                                    <a href="/admin/user" class="dropdown-item">User</a>
                                    <a href="#" class="dropdown-item">Order</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="navbar-nav ml-auto">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Akun</a>
                            <div class="dropdown-menu">
                                <?php if (!session('is_login')) : ?>
                                    <a href="/auth" class="nav-item nav-link">Login</a>
                                    <a href="/auth" class="nav-item nav-link">Register</a>
                                <?php else : ?>
                                    <a href="/checkout/view" class="dropdown-item">Order</a>
                                    <a href="/auth/logout" class="dropdown-item">Logout</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="/">
                            <img src="/assets/img/logo-8.png" class="img-fluid" />
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="search">
                        <input type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="user">
                        <a href="/cart" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>(<?php
                                    $cart = $cart ?? null;
                                    if ($cart != null) {
                                        echo $cart->totalItems();
                                    } else {
                                        echo '0';
                                    }
                                    ?>)</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->

    <?= $this->renderSection('content'); ?>

    <!-- Footer Start -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Layanan Pelanggan</h2>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>Jln. Bandung, Bandung</p>
                            <p><i class="fa fa-envelope"></i>bookmart@gmail.com</p>
                            <p><i class="fa fa-phone"></i>(021) 888999777</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Ikuti Kami</h2>
                        <div class="contact-info">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Informasi</h2>
                        <ul>
                            <li><a href="#">Informasi Pengiriman</a></li>
                            <li><a href="#">Cara Belanja di Bookmart</a></li>
                            <li><a href="#">Cara Pembayaran</a></li>
                            <li><a href="#">Cara Pengembalian</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Tentang Kami</h2>
                        <ul>
                            <li><a href="#">Tentang Bookmart</a></li>
                            <li><a href="#">Persyaratan & Ketentuan</a></li>
                            <li><a href="#">Kebijakan Privasi/a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row payment align-items-center">
                <div class="col-md-6">
                    <div class="payment-method">
                        <h2>We Accept:</h2>
                        <img src="/assets/img/payment-method.png" alt="Payment Method" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-security">
                        <h2>Secured By:</h2>
                        <img src="/assets/img/godaddy.svg" alt="Payment Security" />
                        <img src="/assets/img/norton.svg" alt="Payment Security" />
                        <img src="/assets/img/ssl.svg" alt="Payment Security" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                </div>

                <div class="col-md-6 template-by">
                    <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <!-- Template Javascript -->
    <script src="/assets/js/main.js"></script>
</body>

</html>