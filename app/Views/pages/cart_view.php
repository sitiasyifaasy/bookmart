<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="col-md-12">
                    <div class="alert alert-success  alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('pesanerror')) : ?>
                <div class="col-md-12">
                    <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesanerror') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Buku</th>
                                    <th>Harga</th>
                                    <th>Kuantitas</th>
                                    <th>Sub Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php foreach ($cart->contents() as $item_cart) : ?>
                                    <tr>
                                        <td>
                                            <div class="img">
                                                <a href="#"><img src="/buku/<?= $item_cart['options']['cover'] ?>" alt="Image"></a>
                                                <p><?= $item_cart['name'] ?></p>
                                            </div>
                                        </td>
                                        <td>Rp.<?= $item_cart['price'] ?></td>
                                        <td>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                <form action="/cart/update/<?= $item_cart['rowid'] ?>" method="post">
                                                    <input type="text" name="qty" value="<?= $item_cart['qty'] ?>">
                                                    <?= csrf_field() ?>
                                                    <br>
                                                    <button type="submit"><i class="fa fa-check"></i></button>
                                                </form>

                                            </div>
                                        </td>
                                        <td>Rp.<?= $item_cart['subtotal'] ?></td>
                                        <td>
                                            <form action="/cart/remove/<?= $item_cart['rowid'] ?>" method="post">
                                                <?= csrf_field() ?>
                                                <button type="submit"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php if ($cart->contents() == []) : ?>
                            <p class="text-center mt-3">Keranjang Kosong</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                    <p>Total<span>Rp.<?= $cart->total() ?></span></p>
                                </div>
                                <div class="cart-btn">
                                    <button>
                                        <a href="/checkout">Checkout</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>