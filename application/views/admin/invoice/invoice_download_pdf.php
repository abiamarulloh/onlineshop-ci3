<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title><?= $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Muli&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Muli', sans-serif !important;
    }
    </style>

</head>

<body>

    <table class="table">
        <tr>
            <td colspan="2">
                <button class="btn btn-primary">ID INVOICE <small
                        class="badge badge-light"><?= $id_invoice; ?></small></button>
            </td>
        </tr>

        <!-- Pemiliki dan Pembeli -->
        <tr>
            <td>
                <h6>
                    <i class="fas fa-fw fa-building"></i> <?= $admin->web_name; ?>
                </h6>
                <!-- CEO -->
                <h6 class="m-0">
                    <i class="fas fa-fw fa-user"></i> <?= $admin->ceo; ?>
                </h6>

                <p class="m-0">
                    <!-- Phone -->
                    <a href="https://wa.me/<?= $admin->phone; ?>" class="d-block">
                        <i class="fab fa-fw fa-whatsapp"></i> <?= $admin->phone; ?>
                    </a>

                    <!-- Email -->
                    <a href="mailto:<?= $admin->email; ?>" class="d-block">
                        <i class="fas fa-fw fa-envelope-open"></i> <?= $admin->email; ?>
                    </a>

                    <!-- Address -->
                    <small class="text-lowercase">
                        <i class="fas fa-fw fa-map"></i>
                        <?= $admin->address ?>
                    </small>

                </p>
                <hr>
                <?php foreach ($bank_payment as $bank) :?>
                <h6> <i class="fas fa-fw fa-money-check-alt"></i>
                    <?= $bank->bank_name . " <br> " . $bank->on_behalf_of_the . " - " . $bank->account_number; ?>
                </h6>
                <?php endforeach; ?>

                </div>
            </td>
            <td>
                <!-- Pembeli -->
                <!-- Fullname -->
                <h6 class="m-0">
                    <i class="fas fa-fw fa-user"></i> <?= $list_invoice_by_id->fullname; ?>
                </h6>

                <p class="m-0">
                    <!-- Phone -->
                    <a href="https://wa.me/<?= $list_invoice_by_id->phone; ?>" class="d-block">
                        <i class="fab fa-fw fa-whatsapp"></i> <?= $list_invoice_by_id->phone; ?>
                    </a>

                    <!-- Email -->
                    <a href="mailto:<?= $list_invoice_by_id->email; ?>" class="d-block">
                        <i class="fas fa-fw fa-envelope-open"></i> <?= $list_invoice_by_id->email; ?>
                    </a>

                    <!-- Address -->
                    <small class="text-lowercase">
                        <i class="fas fa-fw fa-map"></i>
                        <?= $list_invoice_by_id->address ?>
                    </small>
                </p>
            </td>
        </tr>

        <!-- Judul Detail Product -->
        <tr>
            <td colspan="2">
                <h5> Detail Pembelian</h5>
            </td>
        </tr>

        <!-- Detail Product  -->
        <?php $total = 0; ?>
        <?php foreach($orders_by_invoice as $order) : ?>
        <?php 
            $subtotal = $order->grand_qty * $order->grand_price; 
            $total += $subtotal; 
        ?>
        <tr>
            <td>
                <img src="assets/admin/img/ecommerce/<?= $order->product_image ?>" width="100px">
            </td>
            <td>

                Nama Product : <?= $order->product_name; ?> <br>
                Jumlah : <?= $order->grand_qty; ?> <br>
                Harga Satuan : Rp<?= number_format( $order->grand_price,0,",","."); ?> <br>

                Subtotal : Rp<?= number_format( $subtotal,0,",","."); ?>
            </td>
        </tr>
        <?php endforeach; ?>


        <tr>
            <td colspan="2">
                <div class="my-2">
                    <h5> Harga Pembelian Product : </h5>
                    <span>Rp<?= number_format( $total,0,",","."); ?></span>
                </div>
                <div>
                    <h5> Harga Ongkos Kirim :</h5>

                    <table>
                        <tr>
                            <td>
                                <span class="font-weight-bold">Dari : <br></span>
                                <?php foreach($invoice_rajaongkir->rajaongkir->origin_details as $key => $origin) : ?>
                                <?php if($key == "province") : ?>
                                <?= $origin; ?> <br>
                                <?php elseif($key == "type") : ?>
                                <?= $origin; ?>
                                <?php elseif($key == "city_name"): ?>
                                <?= $origin; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <span class="font-weight-bold">Menuju : <br></span>
                                <?php foreach($invoice_rajaongkir->rajaongkir->destination_details as $key => $destination) : ?>
                                <?php if($key == "province") : ?>
                                <?= $destination; ?> <br>
                                <?php elseif($key == "type") : ?>
                                <?= $destination; ?>
                                <?php elseif($key == "city_name"): ?>
                                <?= $destination; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    </table>

                    <?php $total_ongkir = 0; ?>
                    <?php foreach($invoice_rajaongkir->rajaongkir->results as $rajaongkir)  : ?>
                    <!-- Cek Jika jne == jne -->
                    <?php
                if($rajaongkir->code == $invoice_sub_ekspedisi->ekspedisi){

                    foreach($rajaongkir->costs as $costs) {
                        // Jika OKE == OKE
                        if($costs->service == $invoice_sub_ekspedisi->sub_ekspedisi) {
                        ?>

                    <span class="text-uppercase">
                        <?= $invoice_sub_ekspedisi->ekspedisi . " - " . $costs->service; ?>
                    </span>
                    <?php foreach($costs->cost as $cost) : ?>
                    <?php $total_ongkir += $cost->value; ?>
                    Rp<?= number_format( $cost->value,0,",","."); ?>
                    <?php endforeach; ?>

                    <?php }
                                                            
                                                            }

                                                         
                                                        }
                                                   ?>
                    <?php endforeach; ?>

                </div>

            </td>
        </tr>

        <tr>
            <td colspan="2" class="bg-primary">
                <p class="text-white font-weight-bold py-2">
                    Total Harga yang harus dibayarkan :
                    Rp<?= number_format($total + $total_ongkir,0,",","."); ?>
                </p>
            </td>
        </tr>
    </table>

    <div class="text-center">
        <small>Di unduh pada <?= date("d-m-Y", time()); ?> <br> <a
                href="https://wagimansupply.com">wagimansupply.com</a></small>
    </div>








    <!-- Optional JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

</body>

</html>