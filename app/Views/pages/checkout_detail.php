<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card my-3">
                <div class="card-header">
                    Detail Order #<?= $order['invoice'] ?>
                    <?php if ($order['status_order'] == 'Menunggu') : ?>
                        <span class="badge badge-pill badge-warning">Menunggu</span>
                    <?php endif; ?>
                    <?php if ($order['status_order'] == 'Diproses') : ?>
                        <span class="badge badge-pill badge-info">Diproses</span>
                    <?php endif; ?>
                    <?php if ($order['status_order'] == 'Selesai') : ?>
                        <span class="badge badge-pill badge-success">Selesai</span>
                    <?php endif; ?>
                    <?php if ($order['status_order'] == 'Cancel') : ?>
                        <span class="badge badge-pill badge-danger">Cancel</span>
                    <?php endif; ?>

                </div>
                <div class="card-body">
                    <p>Tanggal : <?= str_replace('-', '/', date("d-m-Y", strtotime($order['tgl_order']))) ?> </p>
                    <p>Nama Penerima : <?= $order['nama'] ?> </p>
                    <p>Alamat Penerima : <?= $order['alamat'] ?> </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order_detail as $row) : ?>
                                <tr>
                                    <td>
                                        <p><img src="<?= ($row['cover']) ? "/buku/" . $row['cover'] : 'http://placehold.co/50x50' ?> " height="50" width="50">
                                        </p>
                                    </td>
                                    <td class="text-center">Rp<?= number_format($row['harga'], 0, ',', '.') ?></td>
                                    <td class="text-center"><?= $row['qty'] ?></td>
                                    <td class="text-center">Rp<?= number_format($row['subtotal'], 0, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3"><strong>Total : </strong></td>
                                <td class="text-center"><strong> Rp<?= number_format(array_sum(array_column($order_detail, 'subtotal')), 0, ',', '.') ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php if ($order['status_order'] == 'Menunggu') : ?>
                    <div class="card-footer">
                        <a href="/checkout/konfirmasi/<?= $order['id_order'] ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
                        <a href="/checkout/statuscancel/<?= $order['id_order'] ?>" class="btn btn-danger">Cancel Order</a>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (isset($order_confirm)) : ?>
                <div class="row mt-3">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Bukti Transfer
                            </div>
                            <div class="card-body">
                                <p>Dari Rekening : <?= $order_confirm['no_rekening'] ?></p>
                                <p>Atas Nama : <?= $order_confirm['atas_nama'] ?></p>
                                <p>Nominal : Rp<?= number_format($order_confirm['nominal'], 0, ',', '.') ?></p>
                                <p>Keterangan : <?= $order_confirm['keterangan'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <img src="/konfirmasi/<?= $order_confirm['bukti_pembayaran'] ?>" height="300">
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>