<div class="jumbotron jumbotron-fluid" style="background:#dfe6e9">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center my-5" style="border-right:3px solid #b2bec3">
                <div>
                    <h3>Hello, <?= $user->fullname; ?></h3>

                    <?php if($user->phone == null) : ?>
                    <p class="p-typing">Lengkapi Profile mu untuk belanja dengan nyaman dan praktis.</p>
                    <?php else : ?>
                    <p class="p-typing">Profile sudah lengkap, saatnya belanja, kuy.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-8 my-5 d-flex justify-content-center">
                <form action="" method="post" enctype="multipart/form-data">
                <?= $this->session->flashdata("member"); ?>
                    <div class="form-row">
                        <div class="col-md-4">

                            <input type="text" name="id" hidden readonly value="<?= $user->id; ?>">
                            <div class="form-group text-center my-5">
                                <img src="<?= base_url("assets/user/images/profile/") . $user->image; ?>"
                                    class="rounded text-center mx-auto img-fluid img-thumbnail custome_imageA"
                                    style="width:150px;">
                                <small class="text-center d-block text-muted">Bergabung pada <br>
                                    <?= date("d M Y", $user->created_date); ?></small>
                                <a href="<?= base_url(); ?>logout" class="btn btn-secondary  btn-sm">Keluar</a>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="file">Gambar</label>
                                <input type="file" id="file" name="image">
                                <small class="text-primary">* Ganti Profile</small>
                            </div>

                            <div class="form-group">
                                <label for="fullname">Nama Lengkap</label>
                                <input type="text"
                                    class="form-control  <?php if(form_error('fullname')) {echo "is-invalid";} ?>"
                                    id="fullname" style="font-size:14px;" name="fullname"
                                    value="<?= $user->fullname ?>">
                                <?php if(form_error('fullname')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("fullname"); ?>
                                </div>
                                <?php endif; ?>
                            </div>


                            <div class="form-group">
                                <label for="phone">Nomor HP</label>
                                <input type="text"
                                    class="form-control  <?php if(form_error('phone')) {echo "is-invalid";} ?>"
                                    id="phone" name="phone" style="font-size:14px;" value="<?= $user->phone ?>"
                                    placeholder="Example : 62121355215674">
                                <?php if(form_error('phone')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("phone"); ?>
                                </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="address">Alamat Lengkp</label>
                                <input type="text"
                                    class="form-control  <?php if(form_error('address')) {echo "is-invalid";} ?>"
                                    id="address" style="font-size:14px;" name="address"
                                    value="<?= $user->address ?>">
                                <?php if(form_error('address')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("address"); ?>
                                </div>
                                <?php endif; ?>
                            </div>


                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password"
                                    class="form-control  <?php if(form_error('password')) {echo "is-invalid";} ?>"
                                    id="password" name="password" style="font-size:14px;"
                                    placeholder="password (leave blank if no change)">
                                <?php if(form_error('password')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("password"); ?>
                                </div>
                                <?php endif; ?>
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block btn-sm">Update Profile</button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Invoice Transaksi</h1>
    <?= $this->session->flashdata("invoice"); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Invoice Transaksi Member Wagiman Supply</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-hover" id="dataTable" width="100%" cellspacing="0" style="font-size:12px">
                    <thead>
                        <tr>
                            <th>ID Invoice</th>
                            <th>Status</th>
                            <th>Nama Pemesan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Batas Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Invoice</th>
                            <th>Status</th>
                            <th>Nama Pemesan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Batas Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($list_invoice_by_auth as $invoice):?>
                        <tr>
                            <td><?= $invoice->invoice_id; ?></td>
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
                         
                            <td><?= $invoice->invoice_fullname; ?></td>
                            <td><?= date("D, d M Y H:i:s",  $invoice->invoice_date_buyying ); ?></td>
                            <td><?= date("D, d M Y H:i:s", $invoice->invoice_dateline_buyying); ?></td>
                            <td>
                                <!-- 
                                        0 =  belum dibayar
                                        1 =  Proses
                                        2 =  Dikirim
                                        3 =  Selesai
                                    -->
                           
                                <!-- Jika sudah Mengupload gambar sebelumnya maka tampilkan update foto -->
                                <?php if($invoice->status == 0) : ?>
                                    <button type="button" class="btn btn-sm btn-primary " data-toggle="modal" data-id="<?= $invoice->invoice_id; ?>" data-target="#updateUploadImagePayment"> <i class="fas fa-cloud-upload-alt"></i></button>
                                <?php endif; ?>
                                <a href="<?= base_url(); ?>invoice_detail/<?= $invoice->invoice_id; ?>"
                                    class="btn btn-sm btn-info"><i class="fas fa-info"></i></a>

                                <a href="<?= base_url(); ?>invoice_download/<?= $invoice->invoice_id; ?>"
                                    class="btn btn-sm btn-success"><i class="fas fa-download"></i></a>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->






<!-- Modal Update Upload Image Payment -->
<div class="modal fade" id="updateUploadImagePayment" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Transaksi Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data">
                  <!-- Menampilkan data gambar jika sudah upload -->
                </div>
            </div>
        </div>
    </div>
</div>