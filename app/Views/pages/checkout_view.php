<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
<div class="checkout">
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
                <div class="checkout-inner">
                    <div class="billing-address">
                        <h2>Billing Address</h2>
                        <form action="/checkout/store">
                            <div class="row">
                                <div class="col-md-9">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama" placeholder="First Name">
                                    <input type="hidden" name="total" value="<?= $cart->total() ?>">
                                </div>
                                <div class="col-md-9">
                                    <label>Alamat</label>
                                    <input class="form-control" type="text" name="alamat" placeholder="Address">
                                </div>
                                <div class="col-md-9">
                                    <label>Metode Pengiriman</label>
                                    <select class="custom-select" name="metode_pengiriman">
                                        <option selected value="JNE">JNE</option>
                                        <option value="J&T">J&T</option>
                                        <option value="SiCepat">SiCepat</option>
                                        <option value="Ninja Express">Ninja Express</option>
                                    </select>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout-inner">
                    <div class="checkout-summary">
                        <h1>Cart Total</h1>
                        <?php foreach ($cart->contents() as $item_cart) : ?>
                            <p><?= $item_cart['name'] ?> <span><?= $item_cart['qty'] ?>x</span></p>
                            <p>Rp.<?= $item_cart['price'] ?></p>
                        <?php endforeach; ?>
                        <p class="sub-total">Total<span>Rp.<?= $cart->total() ?></span></p>
                    </div>

                    <div class="checkout-payment">

                        <div class="payment-methods">
                            <h1>Payment Methods</h1>

                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-4" name="payment">
                                    <label class="custom-control-label" for="payment-4">Direct Bank Transfer</label>
                                </div>
                                <div class="payment-content" id="payment-4-show">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-btn">
                            <button type="submit">Place Order</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $.ajax({
        type: "GET",
        crossDomain: true,
        dataType: "jsonp",
        url: "https://api.rajaongkir.com/starter/city",
        // headers: {
        //     "Accept": "application/json",
        //     "key": "49091cfadddbed78ae8eaaf6a7535c33"
        // },
        success: function(data) {
            console.log(data);
        }
    });
</script>
<?= $this->endSection(); ?>