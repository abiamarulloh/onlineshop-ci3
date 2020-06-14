<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Restorasi</h1>
    <?= $this->session->flashdata("restorasi"); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div>
                <h6 class="d-inline m-0 font-weight-bold text-primary">Data Restorasi Member Wagiman Supply</h6>

                <a href="<?= base_url("restorasi_publish_post"); ?>" class="btn btn-primary btn-sm float-right">Tambah
                    paket
                    restorasi</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-borderless" id="dataTable" width="100%" cellspacing="0"
                    style="font-size:14px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket Restorasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket Restorasi</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($restorasi_vespa as $restorasi) : ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>

                            <td>
                                <?= $restorasi->name_restorasi; ?>
                            </td>
                            <td>
                                <a href="<?= base_url("detail_restorasi/") . $restorasi->id; ?>"
                                    class="btn btn-sm btn-primary"><i class="fas fa-info"></i> Detail</a>
                                <a href="<?= base_url("edit_restorasi/") . $restorasi->id; ?>"
                                    class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url("restorasi_image_multiple/")  . $restorasi->id; ?>"
                                    class="btn btn-sm btn-info"> <i class="fas fa-image"></i> Thumbnails</a>
                                <a href="<?= base_url("delete_restorasi/")  . $restorasi->id; ?>"
                                    class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="modalResi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                        <input type="text" class="form-control" id="name_resi" placeholder="Resi">
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