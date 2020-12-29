<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h2>Edit Penerbit</h2>
                    </div>
                    <div class="card-body">
                        <form action="/admin/penerbit/update/<?= $penerbit['id_penerbit'] ?>" method="POST">
                            <?php echo csrf_field() ?>
                            <div class="form-group">
                                <label for="inputAddress">Nama Penerbit</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama_penerbit')) ? 'is-invalid' : '' ?>" name="nama_penerbit" id="nama_penerbit" value="<?= $penerbit['nama_penerbit'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat_penerbit" class="form-control" rows="5" cols="110"><?= $penerbit['alamat_penerbit'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" id="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" value="<?= $penerbit['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">No. Telp</label>
                                <input type="text" name="telp_penerbit" id="telp_penerbit" class="form-control <?= ($validation->hasError('telp_penerbit')) ? 'is-invalid' : '' ?>" value="<?= $penerbit['telp_penerbit'] ?>">
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
                                <a class="nav-link" href="#"><i class="fa fa-child"></i>Penulis</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-child"></i>Penerbit</a>
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