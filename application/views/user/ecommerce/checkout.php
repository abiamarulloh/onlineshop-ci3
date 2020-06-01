<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url(); ?>assets/user/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url(); ?>assets/user/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url(); ?>assets/user/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/user/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="<?= base_url(); ?>assets/user/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="<?= base_url(); ?>assets/user/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="<?= base_url(); ?>assets/user/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="<?= base_url(); ?>assets/user/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?= base_url(); ?>assets/user/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?= base_url(); ?>assets/user/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?= base_url(); ?>assets/user/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="<?= base_url(); ?>assets/user/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?= base_url(); ?>assets/user/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">


    <!-- CSS Custome -->
    <link rel="stylesheet" href="<?= base_url("assets/user/css/style.css") ?>">

    <!-- Lightbox -->
    <link href="<?= base_url(); ?>assets/user/css/lightbox.min.css" rel="stylesheet" />


    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/css/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/css/owl/owl.theme.default.min.css">

    <title><?= $title; ?></title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Muli:wght@600&display=swap');

    .container{
        font-family: 'Muli', sans-serif;
        font-weight: 600;
    }

    </style>
</head>

<body>




    <div class="container card-produk my-5">



        <div class="row">
            <div class="col-md-12">

                <div class="btn btn-lg btn-block btn-success">
                    <?php 
                    $grand_total = 0;
                    if($cart = $this->cart->contents()) {

                        // Looping
                        foreach($cart as $item) {
                            $grand_total += $item['subtotal'];
                        }

                        echo "Total belanja anda " . "Rp" . number_format($grand_total, 0, ",", "."); 

                    }
                ?>
                </div> <br><br>

                <h3 class="text-center">Proses Pembayaran</h3>
                <hr>
                <form method="post" action="">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fullname">Nama Lengkap</label>
                            <input type="text"
                                class="form-control <?php if(form_error('fullname')) {echo "is-invalid";} ?>"
                                name="fullname" id="fullname" placeholder="Nama Lengkap">
                            <?php if(form_error('fullname')) : ?>
                            <div class="invalid-feedback">
                                <?= form_error("fullname"); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">No Telepon</label>
                            <input type="text" class="form-control  <?php if(form_error('phone')) {echo "is-invalid";} ?>"
                                name="phone" id="phone" placeholder="No Telepon">
                            <?php if(form_error('phone')) : ?>
                            <div class="invalid-feedback">
                                <?= form_error("phone"); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat lengkap</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Alamat lengkap">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="province">Provinsi Tujuan Pengiriman barang</label>
                            <select class="form-control" id="province">
                                <option value="0">Pilih Provinsi</option>
                                <?php foreach ($provinsi->rajaongkir->results as $prov) : ?>
                                    <option value="<?= $prov->province_id; ?>">
                                        <?= $prov->province; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city">Kota Tujuan Pengiriman barang</label>
                            <select class="form-control" id="city">
                                <option>Pilih Kota</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="kurir">Jasa Pengiriman</label>
                            <select multiple class="form-control" name="kurir" id="kurir">
                                <option>JNE</option>
                                <option>JNT</option>
                                <option>NINJA EXPRESS</option>
                                <option>POS INDONESIA</option>
                                <option>GOJEK</option>
                                <option>GRAB</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>





<script>

    $(document).ready(function(){
        $("#province").change(function() {

            fetch("<?= base_url('ecommerce_checkout_city/'); ?>"+this.value, {
                method: "GET",
            })
            .then((response) => response.text())
            .then((data) => {
                document.getElementById("city").innerHTML = data;
            })
            
        })
    })

</script>
</body>
</html>