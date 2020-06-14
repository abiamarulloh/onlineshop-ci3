<?= $this->session->flashdata('menu'); ?>

<div class="container">
    <div class="row my-2">
        <div class="col-md-12">
            <div>
                <h2>Menu Setting</h2>
                <button type="button" data-toggle="modal" data-target="#addMenu" class="btn btn-primary"><i
                        class="fas fa-plus"></i> tambah menu</button>
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
                                    <th>Nama Menu</th>
                                    <th>URL</th>
                                    <th>Icon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Menu</th>
                                    <th>URL</th>
                                    <th>Icon</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($menu as $m) : ?>
                                <tr>
                                    <td><?= $m->id; ?></td>
                                    <td><?= $m->title; ?></td>
                                    <td><?= $m->url; ?></td>
                                    <td><?= $m->icon; ?></td>
                                    <td>
                                       <a href="<?= base_url("menu_setting_edit/") . $m->id ; ?>" class="btn btn-warning"> <i class="fas fa-edit"></i> Edit</a>
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
                <form method="post" class="form-menu" action="<?= base_url("menu_setting_add"); ?>">
                    <div class="form-group">
                        <label for="title">Nama Menu</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>

                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" name="url" id="url">
                    </div>

                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" name="icon" id="icon">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" id="button-menu" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>