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
                <table class="table table-striped table-borderless" id="dataTable" width="100%" cellspacing="0" style="font-size:14px">
                    <thead>
                    <tr>
                        <th>ID Invoice</th>
                        <th>Resi</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Batas Pembayaran</th> 
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Invoice</th>
                            <th>Resi</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Batas Pembayaran</th> 
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                            <?php foreach ($list_invoice as $invoice):?>
                            <tr>
                                <td>
                                    <?= $invoice->invoice_id; ?>
                                </td>
                                <td>
                                    <?php if($invoice->status == 1)  : ?>
                                        <?php if($invoice->resi  ) : ?>
                                            <small class="badge badge-success my-2 py-2"><?= $invoice->resi; ?></small>
                                        <?php else : ?>
                                            -
                                        <?php endif;  ?>
                                            <!-- Button trigger modal -->
                                            <button type="button" id="resi" data-id="<?= $invoice->invoice_id;  ?>" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalResi">
                                            <i class="fas fa-user-edit "></i>
                                            </button>
                                    <?php elseif($invoice->status >= 2) : ?>
                                        <small class="badge badge-success my-2 py-2"><?= $invoice->resi; ?></small>
                                    <?php else : ?>
                                        -
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <?php  if( $invoice->image_payment == null ) : ?>
                                        Belum ada bukti    
                                    <?php else : ?>
                                        <a  href="<?= base_url(); ?>assets/user/images/payment/<?= $invoice->image_payment; ?>" rel="lightbox" title="Bukti Transaksi"> 
                                            <img src="<?= base_url(); ?>assets/user/images/payment/<?= $invoice->image_payment; ?>" style="max-width:100px;">
                                        </a>
                                    <?php endif; ?>
                                </td>
                                

                                <td>
                                    <?php  if( $invoice->status == 0 ) : ?>
                                    
                                        <?php if($invoice->image_payment == "No-Image-Available.png") : ?>
                                            <small class="badge badge-danger p-2 font-weight-bold">Belum dibayar</small>
                                        <?php elseif($invoice->image_payment != null) : ?>
                                            <small class="badge badge-info p-2 font-weight-bold">Menunggu konfirmasi pembayaran dari admin</small>
                                        <?php endif; ?>

                                    <?php elseif( $invoice->status == 1) : ?>
                                        <small class="badge badge-warning p-2 font-weight-bold">Proses Pengemasan barang</small>
                                    <?php elseif( $invoice->status == 2) : ?>
                                        <small class="badge badge-primary p-2 font-weight-bold">Pesanan sedang dikirim</small>
                                    <?php elseif( $invoice->status == 3) : ?>
                                        <small class="badge badge-success p-2 font-weight-bold">Selesai</small>
                                    <?php endif; ?>
                                </td>
                                
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
                                            <?php if($invoice->image_payment != "No-Image-Available.png") : ?>
                                                <a href="<?= base_url(); ?>invoice_status/<?= $invoice->invoice_id; ?>" class="btn btn-sm  btn-primary">Proses</a>
                                            <?php endif; ?>

                                    <?php elseif( $invoice->status == 1) : ?>
                                            <a href="<?= base_url(); ?>invoice_status/<?= $invoice->invoice_id; ?>" class="btn btn-sm  btn-info">Dikirim</a>

                                            <a href="<?= base_url(); ?>invoice_status_down/<?= $invoice->invoice_id; ?>" class="btn mt-2 btn-sm btn-outline-primary"><i class="fas fa-undo"></i>  Batal Proses</a>
                                    <?php elseif($invoice->status == 2)  :?>
                                            <a href="<?= base_url(); ?>invoice_status/<?= $invoice->invoice_id; ?>" class="btn btn-sm  btn-success">Selesai</a>

                                            <a href="<?= base_url(); ?>invoice_status_down/<?= $invoice->invoice_id; ?>" class="btn mt-2 btn-sm btn-outline-primary"><i class="fas fa-undo"></i>  Batal Dikirim</a>
                                    <?php elseif($invoice->status == 3)  :?>
                                            <p class="bg-info p-1 text-white"> <i class="fas fa-check fa-sm"></i> Selesai</p>

                                            
                                            <a href="<?= base_url(); ?>invoice_status_down/<?= $invoice->invoice_id; ?>" class="btn btn-sm  mt-2 btn-outline-primary"> <i class="fas fa-undo"></i> Batal Selesai</a>
                                    <?php endif; ?>

                                    <a href="<?= base_url(); ?>invoice_detail/<?= $invoice->invoice_id; ?>" class="btn btn-sm btn-outline-info mt-2">Detail</a>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluinvoice_id -->


<!-- Modal -->
<div class="modal fade" id="modalResi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Resi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="resi">Resi</label>
                <input type="text" class="form-control"   id="name_resi" placeholder="Resi">
            </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Resi</button>
        </form>
      </div>
    </div>
  </div>
</div>