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
                        <h2>Detail Order</h2>
                    </div>
                    <div class="card-body">
                        <p>Invoice : <?= $order['invoice'] ?> </p>
                        <p>Tanggal Order : <?= $order['tgl_order'] ?> </p>
                        <p>Atas Nama : <?= $order['nama'] ?> </p>
                        <p>Alamat : <?= $order['alamat'] ?> </p>
                        <p>Metode Pengiriman : <?= $order['metode_pengiriman'] ?> </p>
                        <p>Total : <?= $order['total'] ?> </p>

                        <form action="/admin/order/updatestatus/<?= $order['id_order']?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status_order" class="form-control">
                                    <option value="Menunggu" <?php if($order['status_order'] == "Menunggu") : ?> selected <?php endif; ?> >Menunggu</option>
                                    <option value="Diproses" <?php if($order['status_order'] == "Diproses") : ?> selected <?php endif; ?>>Diproses</option>
                                    <option value="Dalam Pengiriman" <?php if($order['status_order'] == "Dalam Pengiriman") : ?> selected <?php endif; ?>>Dalam Pengiriman</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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