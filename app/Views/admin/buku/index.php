<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success  alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('pesan') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="card-header card-header-primary">
                        <h2>Daftar Buku</h2>
                        <a href="/admin/buku/create" class="btn btn-primary">Tambah Buku</a>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Halaman</th>
                                    <th>Tanggal Terbit</th>
                                    <th>Format</th>
                                    <th>Cover</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($buku as $k) : ?>
                                    <tr>
                                        <td><?= $k['id_buku'] ?></td>
                                        <td><?= $k['nama_buku'] ?></td>
                                        <td><?= $k['harga'] ?></td>
                                        <td><?= $k['stok'] ?></td>
                                        <td><?= $k['halaman'] ?></td>
                                        <td><?= $k['tgl_terbit'] ?></td>
                                        <td><?= $k['format'] ?></td>
                                        <td>
                                            <?php if ($k['cover'] == NULL) : ?>
                                                Tidak ada gambar
                                            <?php else : ?>
                                                <img src="/buku/<?= $k['cover'] ?>" alt="cover buku" style="width: 50px">
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $k['nama_penulis'] ?></td>
                                        <td><?= $k['nama_penerbit'] ?></td>
                                        <td><?= $k['nama_kategori'] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <span class="mr-1">
                                                    <a href="/admin/buku/edit/<?= $k['id_buku'] ?>" class="btn btn-sm"><i class="fas fa-edit"></i></a>
                                                </span>
                                                <form action="/admin/buku/delete/<?= $k['id_buku']; ?>" method="POST">
                                                    <?= csrf_field() ?>
                                                    <span>
                                                        <button type="submit" class="btn btn-sm"><i class="fas fa-trash-alt"></i></button>
                                                    </span>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true
        });
    });
</script>
<!-- Product Detail End -->
<?= $this->endSection(); ?>