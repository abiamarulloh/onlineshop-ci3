<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/sb-admin-2.min.css">

    <title><?= $title; ?></title>

</head>

<body>


    <table class="table">
        <thead>
            <tr>
                <td colspan="5">ID INVOICE <small class="badge badge-success"><?= $id_invoice; ?></small> </td>
            </tr>
            <tr>
                <td scope="col" colspan="2">
                    <h6 class="font-weight-bold m-0">Penerima : </h6>
                    <small class="m-0 d-block"><?= $get_admin->fullname; ?></small>
                    <small class="m-0 d-block"><?= $get_admin->phone; ?></small>
                    <small class="m-0 d-block"><?= $get_admin->email; ?></small>
                    <small class="m-0 d-block"><?= $get_admin->address; ?></small>
                </td>
                <td></td>
                <td scope="col" colspan="2">
                    <h6 class="m-0 font-weight-bolder">Pengirim : </h6>
                    <?php $total = 0; ?>
                    <?php foreach ($detail_auth_order as $auth) :?>
                    <small class="m-0 d-block"><?= $auth->auth_fullname; ?></small>
                    <small class="m-0 d-block"><?= $auth->auth_phone; ?></small>
                    <small class="m-0 d-block"><?= $auth->auth_email; ?></small>
                    <small class="m-0 d-block"><?= $auth->auth_address; ?></small>
                    <?php endforeach; ?>
                    <hr>

                    <h6 class="m-0 font-weight-bolder">Detail Pembeli : </h6>
                    <?php $total = 0; ?>
                    <?php $invoice_id = 0;  ?>
                    <?php foreach ($detail_invoice as $invoice) :?>
                    <?php $invoice_id = $invoice->id; ?>

                    <small class="m-0 d-block"><?= $invoice->fullname; ?></small>
                    <small class="m-0 d-block"><?= $invoice->address; ?></small>
                    <small class="m-0 d-block"><?= $invoice->phone; ?></small>

                    <?php if( $invoice->status >= 1) : ?>
                        <?php if($invoice->image_payment != null) : ?>
                        <small class="text-white badge badge-success font-weight-bold">Lunas</small>
                        <?php endif; ?>
                    <?php elseif($invoice->status == 0) : ?>
                        <small class="text-white badge badge-danger font-weight-bold">Belum bayar</small>
                    <?php endif; ?>

                    <small class="m-0 d-block"><?= date("D, d M Y H:i:s",  $invoice->date_buyying ); ?></small>
                    <small class="m-0 d-block"><?= date("D, d M Y H:i:s",  $invoice->dateline_buyying ); ?></small>
                    <?php endforeach; ?>
                </td>
            </tr>
        </thead>
        <?php $total = 0; ?>
        <?php foreach ($detail_invoice_order as $order) :?>
        <?php 
            $subtotal = $order->grand_price * $order->grand_qty; 
            $total += $subtotal;   
        ?>
        <tbody>
            <tr>
                <th><small class="font-weight-bold">ID Order</small></th>
                <th><small class="font-weight-bold">Product</small></th>
                <th><small class="font-weight-bold">Jumlah Barang</small></th>
                <th><small class="font-weight-bold">Harga Satuan</small></th>
                <th><small class="font-weight-bold">Sub-Total</small></th>
            </tr>
            <tr>
                <th scope="row"><small class="font-weight-bold"><?= $order->id_product_order; ?></small></th>
                <td> <small class="font-weight-bold"><?= $order->name; ?></small> </td>
                <td><small class="font-weight-bold"><?= $order->grand_qty; ?></small></td>
                <td> <small class="font-weight-bold">Rp<?= number_format($order->grand_price,0,",","."); ?></small> </td>
                <td><small class="font-weight-bold">Rp<?= number_format($total,0,",",".");; ?></small></td>
            </tr>
        </tbody>
        <?php endforeach; ?>
        <tbody>
            <tr class="bg-info text-white font-weight-bolder">
                <td colspan="4">
                    Grand Total
                </td>
                <td>
                    Rp<?= number_format($total, 0, ",","."); ?>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- /.container-fluid -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="<?= base_url(); ?>assets/admin/js/sb-admin-2.min.js"></script>
</body>

</html>



<?php $total = 0; ?>
<?php foreach ($detail_invoice_order as $order) :?>
<?php 
                                    $subtotal = $order->grand_price * $order->grand_qty; 
                                    $total += $subtotal;   
                                ?>
<tbody>
    <tr>
        <th scope="row"><?= $order->id_product_order; ?></th>
        <td><?= $order->name; ?></td>
        <td><?= $order->grand_qty; ?></td>
        <td>Rp<?= number_format($order->grand_price,0,",","."); ?></td>
        <td>Rp<?= number_format($total,0,",",".");; ?></td>
    </tr>
</tbody>
<?php endforeach; ?>
<tbody>
    <tr class="bg-info text-white font-weight-bolder">
        <td colspan="4">
            Grand Total
        </td>
        <td>
            Rp<?= number_format($total, 0, ",","."); ?>
        </td>
    </tr>
</tbody>
</table>
<!-- <a href="<?= base_url(); ?>invoice_admin"  class="btn btn-secondary">Kembali</a>
                        <a href="<?= base_url(); ?>invoice_download_pdf/<?= $invoice_id; ?>"  class="btn btn-secondary float-right"> <i class="fa fa-download"></i> Download</a> -->
</>
</div>
</div>