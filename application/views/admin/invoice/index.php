<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Invoice Transaksi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Invoice Transaksi Member Wagiman Supply</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:14px">
                    <thead>
                    <tr>
                        <th>Bukti Pembayaran</th>
                        <th>ID Invoice</th>
                        <th>Status</th>
                        <th>Resi</th>
                        <th>Nama Pemesan</th>
                        <th>Alamat Pengiriman</th>
                        <th>No Telepon</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Batas Pembayaran</th> 
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Bukti Pembayaran</th>
                            <th>ID Invoice</th>
                            <th>Status</th>
                            <th>Resi</th>
                            <th>Nama Pemesan</th>
                            <th>Alamat Pengiriman</th>
                            <th>No Telepon</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Batas Pembayaran</th> 
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php  if($list_invoice == null) : ?>
                            <tr>
                                <th colspan="9" class="text-center">Belum ada data invoice masuk</th>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($list_invoice as $invoice):?>
                            <tr>
                                <td>
                                    <?php  if( $invoice->status == 0 ) : ?>
                                        Belum ada bukti    
                                    <?php else : ?>
                                        <a  href="<?= base_url(); ?>assets/user/images/payment/payment_sample.png" rel="lightbox" title="Bukti Transaksi" style="width:200%; height:100%;"> 
                                            <img src="<?= base_url(); ?>assets/user/images/payment/payment_sample.png" class="w-75">
                                        </a>
                                    <?php endif; ?>
                                </td>
                                
                                <td><?= $invoice->id; ?></td>
                                <?php  if( $invoice->status == 0 ) : ?>
                                    <td class="bg-warning"> 
                                        <small class="text-white font-weight-bold">Belum dibayar</small>
                                    </td>
                                <?php elseif( $invoice->status == 1) : ?>
                                    <td class="bg-primary"> 
                                        <small class="text-white font-weight-bold">Proses Pengemasan barang</small>
                                    </td>
                                <?php elseif( $invoice->status == 2) : ?>
                                    <td class="bg-success"> 
                                        <small class="text-white font-weight-bold">Pesanan sedang dikirim</small>
                                    </td>
                                <?php elseif( $invoice->status == 3) : ?>
                                    <td class="bg-success"> 
                                        <small class="text-white font-weight-bold">Selesai</small>
                                    </td>
                                <?php endif; ?>
                                <td><?= $invoice->resi; ?>1211212</td>
                                <td><?= $invoice->fullname; ?></td>
                                <td><?= $invoice->address; ?></td>
                                <td><?= $invoice->phone; ?></td>
                                <td><?= date("D, d M Y H:i:s",  $invoice->date_buyying ); ?></td>
                                <td><?= date("D, d M Y H:i:s", $invoice->dateline_buyying); ?></td>
                                <td>
                                    <!-- 
                                        0 =  belum dibayar
                                        1 =  Proses
                                        2 =  Dikirim
                                        3 =  Selesai
                                    -->
                                    <?php  if( $invoice->status == 0 ) : ?>
                                            <a href="<?= base_url(); ?>invoice_status/<?= $invoice->id; ?>" class="btn btn-sm  btn-primary">Proses</a>
                                    <?php elseif( $invoice->status == 1) : ?>
                                            <a href="<?= base_url(); ?>invoice_status/<?= $invoice->id; ?>" class="btn btn-sm  btn-info">Dikirim</a>
                                    <?php elseif($invoice->status == 2)  :?>
                                            <a href="<?= base_url(); ?>invoice_status/<?= $invoice->id; ?>" class="btn btn-sm  btn-success">Selesai</a>
                                    <?php elseif($invoice->status == 3)  :?>
                                            <p class="bg-info p-1 text-white"> <i class="fas fa-check fa-sm"></i> Selesai</p>
                                            
                                    <?php endif; ?>
                                    <a href="<?= base_url(); ?>invoice_detail/<?= $invoice->id; ?>" class="btn btn-sm btn-outline-info mt-2">Detail</a>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif;  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->