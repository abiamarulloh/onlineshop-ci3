<?= $this->session->flashdata('sosmed'); ?>

<div class="container">
    <div class="row my-2">
        <div class="col-md-12">
            <div>
                <h2>Social Media Setting</h2>
                <button type="button" data-toggle="modal" data-target="#addMenu" class="btn btn-primary"><i class="fas fa-plus"></i> tambah Social Media</button>
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
                                    <th>Nama Social Media</th>
                                    <th>URL</th>
                                    <th>Icon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Social Media</th>
                                    <th>URL</th>
                                    <th>Icon</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($sosmed as $s) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $s->title; ?></td>
                                    <td><?= $s->url; ?></td>
                                    <td><?= $s->icon; ?></td>
                                    <td>
                                       <a href="<?= base_url("sosmed_setting_delete/") . $s->id ; ?>" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Social Media</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="form-sosmed" action="<?= base_url("sosmed_setting_add"); ?>">
                    <div class="form-group">
                        <label for="title">Nama Social Media</label>
                        <input type="text" class="form-control" name="title" id="title">
                        <small>Example : Facebook , instagram , or twitter</small>
                    </div>

                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" name="url" id="url">
                        <small>Example : https://instagram.com/abiamarulloh</small>
                    </div>

                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" name="icon" id="icon">
                        <small> Exampel : <xmp><i class="fab fa-facebook-square"></i></xmp> </small>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" id="button-sosmed" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>