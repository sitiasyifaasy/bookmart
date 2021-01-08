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
                        <h2>Alamat Pengiriman</h2>
                        <p>Dikirim dari Kota Bandung</p>
                        <form action="/checkout/store">
                            <div class="row">
                                <div class="col-md-9">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama" placeholder="First Name">
                                    <input type="hidden" name="total" value="<?= $cart->total() ?>">
                                    <input type="hidden" name="ongkir" value="">
                                </div>
                                <div class="col-md-9">
                                    <label>Alamat</label>
                                    <input class="form-control" type="text" name="alamat" placeholder="Address">
                                </div>
                                <div class="col-md-9">
                                    <label for="kota">Pilih Kabupaten/Kota</label>
                                    <select class="form-control" id="kota">
                                        <option>Pilih Kabupaten/kota</option>
                                    </select>
                                </div>
                                <div class="col-md-9 mt-3">
                                    <label>Metode Pengiriman</label>
                                    <select class="form-control" name="metode_pengiriman">
                                        <option selected value="JNE">JNE</option>
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <label>Paket</label>
                                    <select class="form-control" id="paket">
                                        <option selected>Pilih Paket</option>
                                    </select>
                                </div>
                                <div class="col-md-9">
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
                        <p class="ongkir">Ongkir
                            <span></span>
                        </p>
                        <p class="sub-total">Total<span></span></p>
                    </div>

                    <div class="checkout-payment">
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
    $(document).ready(function() {
        $('#kota').select2();
        $.ajax({
            url: "<?= site_url('checkout/get_kota') ?>",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var results = data["rajaongkir"]["results"];
                for (var i = 0; i < results.length; i++) {
                    $("#kota").append($('<option>', {
                        value: results[i]["city_id"],
                        text: results[i]['type'] + ' ' + results[i]['city_name']
                    }));
                }
            },
        });
        let etd = null
        $("#kota").on('change', function() {
            let id_city = $(this).val();
            console.log("ID City : ");
            $.ajax({
                url: "<?= site_url('checkout/get_cost') ?>",
                type: 'GET',
                data: {
                    'origin': 21,
                    'destination': id_city,
                    'weight': 1000,
                    'courier': 'jne'
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data.rajaongkir.results[0].costs);
                    let results = data.rajaongkir.results[0].costs;
                    for (var i = 0; i < results.length; i++) {
                        $("#paket").append($('<option>', {
                            value: results[i].cost[0].value,
                            text: results[i].service + " - Rp." + results[i].cost[0].value + " - Estimasi  " + results[i].cost[0].etd
                        }));
                    }
                },
            });
        })
        $("#paket").on('change', function() {
            let value = $(this).val();
            let total = parseInt(<?= $cart->total() ?>) + parseInt(value)

            $(".ongkir span").append("Rp." + value)
            $(".sub-total span").append("Rp." + total)
            $("input[name='total']").val(total)
            $("input[name='ongkir']").val(value)
        });



    });
</script>
<?= $this->endSection(); ?>