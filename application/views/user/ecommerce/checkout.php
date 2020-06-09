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

    .container {
        font-family: 'Muli', sans-serif;
        font-weight: 600;
    }

    /* .form-custom input,
    .form-custom select {
        background-color: #b2bec3;
    } */
    </style>
</head>

<body>





    <div class="container card-produk my-5">



        <div class="row">
            <div class="col-md-12">

                <h3 class="text-center">Form Pembayaran </h3>
                <?php if($user->fullname == null || $user->phone == null || $user->address == null) : ?>
                    <p class="lead text-danger text-center"> <a href="<?= base_url(); ?>member" class="btn btn-danger">Lengkapi Profile</a> dulu untuk melakukan proses CheckOut </p>
                <?php else : ?>
                    <p class="lead text-success text-center">Profile Sudah Lengkap, Silahkan Lengkapi Form untuk melakukan CheckOut</p>
                <?php endif; ?>
                <hr>
                <form method="post" action="" class="form-custom">
                    <input type="text" name="auth_id" hidden readonly value="<?= $user->id; ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fullname">Nama Lengkap</label>
                            <input type="text"
                                class="form-control <?php if(form_error('fullname')) {echo "is-invalid";}  ?>"
                                name="fullname" id="fullname"  placeholder="( Lengkapi Nama Lengkap dihalaman Profile mu !)" value="<?= $user->fullname; ?>" autocomplete="off" readonly>
                                <?php if(form_error('fullname')) : ?>
                                    <div class="invalid-feedback">
                                        <?= form_error("fullname"); ?>
                                    </div>
                                <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">No Telepon</label>
                            <input type="text"
                                class="form-control <?php if(form_error('phone')) {echo "is-invalid";} ?>" name="phone"
                                id="phone" value="<?= $user->phone; ?>" readonly  placeholder="( Lengkapi No Telepon dihalaman Profile mu !)" autocomplete="off">
                            <?php if(form_error('phone')) : ?>
                            <div class="invalid-feedback">
                                <?= form_error("phone"); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat lengkap</label>
                        <textarea name="address" class="form-control <?php if(form_error('address')) {echo "is-invalid";} ?>" id="address" cols="30" rows="3" placeholder="( Lengkapi alamat lengkap dihalaman profile mu ! )" readonly><?= $user->address; ?></textarea>
                        <?php if(form_error('address')) : ?>
                            <div class="invalid-feedback">
                                <?= form_error("address"); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Pengirim -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="province_sender">Dikirim dari provinsi ? </label>
                            <?php foreach ($provinsi->rajaongkir->results as $prov) : ?>
                                <?php if($prov->province_id == $sender->province ) : ?>
                                <input type="text" readonly id="province_sender" class="form-control" name="province_sender"
                                    value="<?= $prov->province; ?>">

                                <input type="text" hidden readonly id="province_sender" class="form-control" name="province_sender"
                                    value="<?= $prov->province_id; ?>">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city_sender_">Dikirim dari Kota ? </label>
                            <?php foreach ($city->rajaongkir->results as $city_api) : ?>
                                <?php if($city_api->city_id == $sender->city ) : ?>
                                    <input type="text" readonly id="city_sender_" class="form-control" name="city_sender" value="<?= $city_api->type . " " . $city_api->city_name; ?>">

                                    <input type="text" readonly id="city_sender" class="form-control" hidden name="city_sender" value="<?= $city_api->city_id; ?>">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="province_receiver">Provinsi Tujuan Pengiriman barang</label>
                            <select class="form-control <?php if(form_error('province_receiver')) {echo "is-invalid";} ?>" id="province_receiver" name="province_receiver">
                                <option value="0">Pilih Provinsi</option>

                                <?php foreach ($provinsi->rajaongkir->results as $prov) : ?>
                                <option value="<?= $prov->province_id; ?>" <?= set_select('province_receiver', $prov->province_id); ?>>
                                    <?= $prov->province; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <?php if(form_error('province_receiver')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("province_receiver"); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city_receiver">Kota Tujuan Pengiriman barang</label>
                            <select class="form-control <?php if(form_error('city_receiver')) {echo "is-invalid";} ?>" name="city_receiver" id="city_receiver">
                                <option value="0">Pilih provinsi tujuan dulu</option>
                            </select>
                            <?php if(form_error('city_receiver')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("city_receiver"); ?>
                                </div>
                            <?php endif; ?>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="weight">Berat Product keseluruhan ? </label>

                            <?php $weight_item = []; ?>
                            <?php foreach ($this->cart->contents() as $item) : ?>
                            <?php 
                                    $weight_item[] =  $item['weight'] *  $item['qty'];
                                    $weight_total = array_sum($weight_item);
                                ?>
                            <?php endforeach; ?>
                            <input type="text" readonly class="form-control" name="weight" value="<?php echo $weight_total . " gram"; ?>">
                            <input type="text" hidden id="weight" readonly class="form-control" name="weight" value="<?php echo $weight_total; ?>">
                        </div>


                        <div class="form-group col-md-3">
                            <label for="ekspedisi">Jasa Pengiriman</label>
                            <select class="form-control <?php if(form_error('ekspedisi')) {echo "is-invalid";} ?>" name="ekspedisi" id="ekspedisi">
                                <option value="0">Pilih kota tujuan dulu</option>
                            </select>
                            <?php if(form_error('ekspedisi')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("ekspedisi"); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sub_ekspedisi">Jenis Service Pengiriman</label>
                            <select class="form-control <?php if(form_error('sub_ekspedisi')) {echo "is-invalid";} ?>" name="sub_ekspedisi" id="sub_ekspedisi">
                                <option value="0">Pilih jenis pengiriman dulu</option>
                            </select>
                            <?php if(form_error('sub_ekspedisi')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("sub_ekspedisi"); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-row my-5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body bg-primary text-white">
                                    <div id='price'>
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
                                    </div> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn float-left btn-primary">Selesai</button>
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
    $(document).ready(function() {
        $("#province_receiver").change(function() {

            fetch("<?= base_url('ecommerce_checkout_city/'); ?>" + this.value, {
                    method: "GET",
                })
                .then((response) => response.text())
                .then((data) => {
                    document.getElementById("city_receiver").innerHTML = data;
                })
        })


        // EKSPEDISI
        $("#ekspedisi").change(function() {
            let city_sender = $("#city_sender").val();
            let city_receiver = $("#city_receiver").val();
            let ekspedisi = $("#ekspedisi").val();
            let weight = $("#weight").val();

            // let data =  & 'name='+ name;
            $.ajax({
                url: "<?= base_url(); ?>ecommerce_checkout_form_finnaly_ekspedisi",
                type: "POST",
                data: {
                    city_sender: city_sender,
                    city_receiver: city_receiver,
                    ekspedisi: ekspedisi,
                    weight: weight
                },
                success: function(data){
                    // console.log(data)
                    $("#sub_ekspedisi").html(data)
                    
                }
                
            })
           
        })

        //  City Receiver di pilih dulu maka baru muncul Ekspedisi
        $("#city_receiver").change(function() {

            $.ajax({
                url: "<?= base_url(); ?>ecommerce_checkout_form_finnaly_city_receiver",
                type: "POST",
                success: function(data){
                    // console.log(data)
                    $("#ekspedisi").html(data)
                }
                
            })
           
           
        })


        // Sub ekspedisi
        $("#sub_ekspedisi").change(function() {
            let city_sender = $("#city_sender").val();
            let city_receiver = $("#city_receiver").val();
            let ekspedisi = $("#ekspedisi").val();
            let weight = $("#weight").val();
            let sub_ekspedisi = $("#sub_ekspedisi").val();


            // let data =  & 'name='+ name;
            $.ajax({
                url: "<?= base_url(); ?>ecommerce_checkout_form_finnaly_sub_ekspedisi",
                type: "POST",
                data: {
                    city_sender: city_sender,
                    city_receiver: city_receiver,
                    ekspedisi: ekspedisi,
                    weight: weight,
                    sub_ekspedisi: sub_ekspedisi,

                },
                success: function(data){
                    // console.log(data)
                    $("#price").html(data)
                    
                }
                
            })
           
           
        })


        // CEK FORM 
            
        // address 
        let address = $("#address")
        if(!address.val()){
            address.addClass("is-invalid");
        }else{
            address.addClass("is-valid");
        }

        let fullname = $("#fullname")
        if(!fullname.val()){
            fullname.addClass("is-invalid");
        }else{
            fullname.addClass("is-valid");
        }

        let phone = $("#phone")
        if(!phone.val()){
            phone.addClass("is-invalid");
        }else{
            phone.addClass("is-valid");
        }






    })
    </script>
</body>

</html>