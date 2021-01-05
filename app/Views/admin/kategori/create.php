<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h2>Tambah Kategori</h2>
                    </div>
                    <div class="card-body">
                        <form action="/admin/kategori/store" method="POST">
                            <?php echo csrf_field() ?>
                            <div class="form-group">
                                <label for="inputAddress">Nama Kategori</label>
                                <input type="text" class="form-control  <?= ($validation->hasError('nama_kategori')) ? 'is-invalid' : '' ?>" name="nama_kategori" id="nama_buku" placeholder="Nama Kategori">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_kategori') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : '' ?>" cols="30" rows="6"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('deskripsi') ?>
                                </div>
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
                                <a class="nav-link" href="#"> Buku</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Kategori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Penulis</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Penerbit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Order</a>
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