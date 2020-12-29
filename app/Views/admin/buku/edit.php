<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h2>Edit Buku</h2>
                    </div>
                    <div class="card-body">
                        <form action="/admin/buku/update/<?= $buku['id_buku'] ?>" method="POST">
                            <?php echo csrf_field() ?>
                            <div class="form-group">
                                <label for="inputAddress">Nama Buku</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama_buku')) ? 'is-invalid' : '' ?>" name="nama_buku" id="nama_buku" value="<?= $buku['nama_buku'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : '' ?>" value="<?= $buku['harga'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="text" name="stok" id="stok" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : '' ?>" value="<?= $buku['stok'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Halaman</label>
                                <input type="text" name="halaman" id="halaman" class="form-control <?= ($validation->hasError('halaman')) ? 'is-invalid' : '' ?>" value="<?= $buku['halaman'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Terbit</label>
                                <input type="text" name="tgl_terbit" id="tgl_terbit" class="form-control <?= ($validation->hasError('tgl_terbit')) ? 'is-invalid' : '' ?>" value="<?= $buku['tgl_terbit'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Format</label>
                                <input type="text" name="format" id="format" class="form-control <?= ($validation->hasError('format')) ? 'is-invalid' : '' ?>" value="<?= $buku['format'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Cover</label>
                                <input type="text" name="cover" id="cover" class="form-control <?= ($validation->hasError('cover')) ? 'is-invalid' : '' ?>" value="<?= $buku['cover'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Penulis</label>
                                <select class="form-control" name="id_penulis" id="id_penulis">
                                    <?php foreach ($penulis as $p) : ?>
                                        <option value="<?php echo $p['id_penulis'] ?>"><?php echo $p['nama_penulis'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- <input type="text" name="id_penulis" id="id_penulis" class="form-control <?= ($validation->hasError('id_penulis')) ? 'is-invalid' : '' ?>" value="<?= $buku['id_penulis'] ?>"> -->
                            </div>
                            <div class="form-group">
                                <label for="">Penerbit</label>
                                <select class="form-control" name="id_penerbit" id="id_penerbit">
                                    <?php foreach ($penerbit as $p) : ?>
                                        <option value="<?php echo $p['id_penerbit'] ?>"><?php echo $p['nama_penerbit'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- <input type="text" name="id_penerbit" id="id_penerbit" class="form-control <?= ($validation->hasError('id_penerbit')) ? 'is-invalid' : '' ?>" value="<?= $buku['id_penerbit'] ?>"> -->
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select class="form-control" name="id_kategori" id="id_kategori">
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?php echo $k['id_kategori'] ?>"><?php echo $k['nama_kategori'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- <input type="text" name="id_kategori" id="id_kategori" class="form-control <?= ($validation->hasError('id_kategori')) ? 'is-invalid' : '' ?>" value="<?= $buku['id_kategori'] ?>"> -->
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