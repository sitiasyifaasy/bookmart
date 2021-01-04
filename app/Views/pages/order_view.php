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
                        <h2>Daftar Order</h2>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Atas Nama</th>
                                    <th>Tanggal Order</th>
                                    <th>Status Order</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($order as $o) : ?>
                                    <tr>
                                        <td><?= $o['invoice'] ?></td>
                                        <td><?= $o['nama'] ?></td>
                                        <td><?= $o['tgl_order'] ?></td>
                                        <td><?= $o['status_order'] ?></td>
                                        <td><?= $o['total'] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <span class="mr-1">
                                                    <a href="/checkout/<?= $o['id_order'] ?>" class="btn btn-sm"><i class="fas fa-eye"></i></a>
                                                </span>
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