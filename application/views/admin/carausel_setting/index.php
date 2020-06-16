<?= $this->session->flashdata('carausel'); ?>

<div class="container">
    <div class="row my-2">
        <div class="col-md-12">
            <div>
                <h2>Carausel Setting</h2>
                <button type="button" data-toggle="modal" data-target="#addMenu" class="btn btn-primary"><i
                        class="fas fa-plus"></i> tambah carausel</button>

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
                                    <th>menu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>menu</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($carausel as $c) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $c->image; ?></td>
                                    <td><?= $c->menu_name; ?></td>
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


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="form-menu" action="<?= base_url("carausel_setting_add"); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file">Gambar Banner / Poster </label>
                        <input type="file" class="form-control" name="image" id="file">
                    </div>

                    <div class="form-group">
                        <label for="menu_id">Pilih Menu Tujuan</label>
                        <select class="form-control" name="menu_id" id="menu_id">
                            <option value="0" id="option-null">Pilih Menu</option>
                            <?php foreach ($menu as $m) :?>
                            <option value="<?= $m->id; ?>"><?= $m->title; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" id="carausel-button"><i class="fa fa-save"></i> Simpan</button>

                </form>
            </div>

        </div>
    </div>
</div>