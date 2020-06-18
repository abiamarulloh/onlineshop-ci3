<?= $this->session->flashdata('carausel'); ?>

<div class="container">
    <div class="row my-2">
        <div class="col-md-12">
            <div>
                <h2>Carausel Setting</h2>
                <a href="<?= base_url(); ?>carausel_setting_add" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>

                <!-- Pilih Menu aktif -->
                <a href="<?= base_url("on_change_active");?>" class="btn btn-outline-success">Pilih Menu aktif</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($carausel as $c) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><a href="<?= base_url(); ?>assets/user/images/carausel/<?= $c->image; ?>" rel="lightbox"><img src="<?= base_url(); ?>assets/user/images/carausel/<?= $c->image; ?>" alt="<?= $c->image; ?>" class="img-thumbnail img-fluid" width="200px" ></a></td>
                                    <td>
                                        <a href="<?= base_url("carausel_setting_delete/") . $c->id ; ?>"
                                            class="btn btn-danger" onclick="return confirm('yakin ingin menghapus carausel ini ?')"> <i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



