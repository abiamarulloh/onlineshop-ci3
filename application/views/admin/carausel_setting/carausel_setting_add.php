<?= $this->session->flashdata('carausel'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Tambah Carausel</h2>
            <a href="<?= base_url(); ?>carausel_setting" class="btn btn-primary"><i class="fa fa-angle-double-left"
                    aria-hidden="true"></i> Kembali </a>
            <hr>
        </div>
    </div>
    <!-- enctype="multipart/form-data"> -->
    <div class="row">
        <div class="col-md-12">
            <form  method="post" action="<?= base_url(); ?>carausel_setting_add" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="file">Gambar Banner / Poster </label>
                            <input type="file" class="form-control" name="image" id="file">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="menu_carausel_url">Pilih Menu Tujuan</label>
                            <select class="form-control <?php if( form_error('menu_carausel_url') )   { echo "is-invalid";}  ?>" name="menu_carausel_url" id="menu_carausel_url">
                                <option value="0">Pilih Menu</option>
                                <?php foreach ($menu as $m) :?>
                                    <option value="<?= $m->url; ?>"><?= $m->title; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if(form_error('menu_carausel_url')) : ?>
                            <div class="invalid-feedback">
                                <?= form_error('menu_carausel_url') ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <select class="form-control form-control-lg <?php if( form_error('choose_id') )   { echo "is-invalid";}  ?>"
                                    name="choose_id" id="choose_id">
                                    <option value="0">Pilih Menu Dulu !</option>
                                </select>
                                <?php if(form_error('choose_id')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('choose_id') ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-outline-primary">Tambah Carausel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



</div>