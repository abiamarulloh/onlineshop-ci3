<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Detail Invoice <small class="btn btn-success">No Invoice : <?= $id_invoice; ?></small></h3>
                    <hr>
                    <div class="table-responsive-md table-responsive-sm">

                     <!-- Detail AKUN Pemesan -->
                     <table class="table table-striped table-borderless mb-5">
                        <thead>
                            <tr class="text-uppercase">
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Pemilik Akun</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tanggal Bergabung</th>
                            </tr>
                        </thead>
                        <?php $total = 0; ?>
                        <?php foreach ($detail_auth_order as $auth) :?>
                            <tbody>
                                <tr>
                                    <th><img src="<?= base_url(); ?>assets/user/images/profile/<?= $auth->auth_image; ?>" alt="" class="w-25 img-fluid img-thumbnail" /></th>
                                    <th scope="row"><?= $auth->auth_fullname; ?></th>
                                    <td><?= $auth->auth_phone; ?></td>
                                    <td><?= $auth->auth_email; ?></td>
                                    <td><?=  date("d M Y" , $auth->auth_created_date); ?></td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>


                    <!-- Detail Pemesan -->
                    <table class="table table-striped table-borderless mb-5">
                        <thead>
                            <tr class="text-uppercase">
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Tanggal Batas Pembayaran</th>
                            </tr>
                        </thead>
                        <?php $total = 0; ?>
                        <?php $invoice_id = 0;  ?>
                        <?php foreach ($detail_invoice as $invoice) :?>
                        <?php $invoice_id = $invoice->id; ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $invoice->fullname; ?></th>
                                    <td><?= $invoice->address; ?></td>
                                    <td><?= $invoice->phone; ?></td>
                                    <td> 
                                    <?php if( $invoice->status == 0) : ?>
                                            <small class="text-white badge badge-warning font-weight-bold">belum dibayar</small>
                                    <?php elseif( $invoice->status == 1) : ?>
                                            <small class="text-white badge badge-primary font-weight-bold">Sedang diproses</small>
                                    <?php elseif( $invoice->status == 2) : ?>
                                            <small class="text-white badge badge-success font-weight-bold">Sedang dikirim</small>
                                    <?php endif; ?>
                                    </td>

                                    <td><?= date("D, d M Y H:i:s",  $invoice->date_buyying ); ?></td>
                                    <td><?= date("D, d M Y H:i:s", $invoice->dateline_buyying); ?></td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>

                    <!-- Detail Pesanan -->
                    <table class="table table-striped table-borderless ">
                        <thead>
                            <tr class="text-uppercase">
                            <th scope="col">ID barang</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah Pesanan</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Sub-total</th>
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
                    <a href="<?= base_url(); ?>invoice_admin"  class="btn btn-secondary">Kembali</a>
                    <a href="<?= base_url(); ?>invoice_download_pdf/<?= $invoice_id; ?>"  class="btn btn-secondary float-right"> <i class="fa fa-download"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->