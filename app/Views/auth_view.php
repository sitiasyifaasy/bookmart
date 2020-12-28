<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="register-form">
                    <form action="/auth/register" method="POST">
                        <?php echo csrf_field() ?>
                        <h3>REGISTER</h3>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nama Lengkap</label>
                                <input class="form-control  <?= ($validation->hasError('nama_user')) ? 'is-invalid' : '' ?>" type="text" placeholder="Nama Lengkap" name="nama_user">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_user') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Jenis Kelamin</label>
                                <select class="form-control <?= ($validation->hasError('jns_kelamin')) ? 'is-invalid' : '' ?>" name="jns_kelamin">
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jns_kelamin') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input class="form-control <?= ($validation->hasError('email_user')) ? 'is-invalid' : '' ?>" type="text" placeholder="E-mail" name="email_user">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email_user') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>No. Telepon</label>
                                <input class="form-control <?= ($validation->hasError('telp_user')) ? 'is-invalid' : '' ?>" type="text" placeholder="No. Telepon" name="telp_user">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email_user') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" type="password" placeholder="Password" name="password">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email_user') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Konfirmasi Password</label>
                                <input class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" type="password" placeholder="Konfirmasi Password" name="konfirmasi_password">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('konfirmasi_password') ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login-form">
                    <form action="/auth/login" method="POST">
                        <?php echo csrf_field() ?>
                        <h3>LOGIN</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="E-mail" name="email_user">
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input class="form-control" type="password" placeholder="Password" name="password">
                            </div>
                            <div class="col-md-12">
                                <button class="btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->
<?= $this->endSection() ?>