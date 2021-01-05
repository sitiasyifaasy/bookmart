<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Konfirmasi Order #<?= $order['invoice'] ?>
                </div>
                <div class="card-body">
                    <form action="/checkout/statuspembayaran" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="">Transaksi</label>
                            <input type="text" name="invoice" class="form-control" value="<?= $order['invoice'] ?>" readonly>
                            <input type="hidden" name="id_order" class="form-control" value="<?= $order['id_order'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Dari Rekening a/n</label>
                            <input type="text" name="atas_nama" value="" class="form-control <?= ($validation->hasError('atas_nama')) ? 'is-invalid' : '' ?>" id="">
                            <div class="invalid-feedback">
                                <?= $validation->getError('atas_nama') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">No Rekening</label>
                            <input type="numeric" name="no_rekening" value="" class="form-control <?= ($validation->hasError('no_rekening')) ? 'is-invalid' : '' ?>" id="">
                            <div class="invalid-feedback">
                                <?= $validation->getError('no_rekening') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nominal</label>
                            <input type="number" name="nominal" class="form-control <?= ($validation->hasError('nominal')) ? 'is-invalid' : '' ?>" value="">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nominal') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" cols="30" rows="10" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?>"> </textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('keterangan') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Bukti Transfer</label>
                            <div class="custom-file">
                                <input type="file" name="bukti_pembayaran" id="image" class="custom-file-input <?= ($validation->hasError('bukti_pembayaran')) ? 'is-invalid' : '' ?>">
                                <label class=" custom-file-label" for="image">Choose File</label>
                            </div>
                            <div class="invalid-feedback">
                                <?= $validation->getError('bukti_pembayaran') ?>
                            </div>
                        </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>