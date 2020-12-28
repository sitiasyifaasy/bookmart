<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h2>Edit Kategori</h2>
                    </div>
                    <div class="card-body">
                        <form action="/admin/kategori/update/<?= $kategori['id_kategori'] ?>" method="POST">
                            <?php echo csrf_field() ?>
                            <div class="form-group">
                                <label for="inputAddress">Nama Kategori</label>
                                <input type="text" class="form-control" name="nama_kategori" id="nama_buku" value="<?= $kategori['nama_kategori'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="6"><?= $kategori['deskripsi'] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Side Bar Start -->
            <div class="col-lg-3 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Manage</h2>
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-female"></i>Buku</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-child"></i>Kategori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Order</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Side Bar End -->
        </div>
    </div>
</div>
<!-- Product Detail End -->
<?= $this->endSection() ?>