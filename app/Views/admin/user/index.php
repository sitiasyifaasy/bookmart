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
                        <h2>Daftar User</h2>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No. Telp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Level</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user as $k) : ?>
                                    <tr>
                                        <td><?= $k['id_user'] ?></td>
                                        <td><?= $k['nama_user'] ?></td>
                                        <td><?= $k['email_user'] ?></td>
                                        <td><?= $k['telp_user'] ?></td>
                                        <td><?= $k['jns_kelamin'] ?></td>
                                        <td><?= $k['level'] ?></td>
                                        <td><?= $k['created_at'] ?></td>
                                        <td><?= $k['updated_at'] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="/admin/user/delete/<?= $k['id_user']; ?>" method="POST">
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
                                <a class="nav-link" href="#"><i class="fa fa-child"></i>User</a>
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
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<!-- Product Detail End -->
<?= $this->endSection(); ?>