<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Publish Restorasi Vespa</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open_multipart(); ?>
                <input hidden readonly type="text" name="id" value="<?= $restorasi_vespa->id; ?>">

                <img src="<?= base_url("assets/admin/img/restorasi/") . $restorasi_vespa->image; ?>" class="rounded w-25">
                <div class="form-group">
                    <label for="file">Gambar</label>
                    <input type="file" class="form-control" id="file" name="image" value="<? ?>">
                    <small class="text-primary">* Pilih Gambar Terlebih dahulu</small>
                </div>

                <div class="form-group">
                    <label for="name_restorasi">Nama Restorasi</label>
                    <input type="text" class="form-control  <?php if(form_error('name_restorasi')) {echo "is-invalid";} ?>" id="name_restorasi"  name="name_restorasi" value="<?= $restorasi_vespa->name_restorasi; ?>">
                    <?php if(form_error('name_restorasi')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("name_restorasi"); ?>
                        </div>
                    <?php endif; ?>
                </div>
                

                <div class="form-group">
                    <label for="body">Isi</label>
                    <textarea name="description" id="body" class="form-control <?php if(form_error('description')) {echo "is-invalid";} ?>" ><?= $restorasi_vespa->description; ?></textarea>
                    <?php if(form_error('description')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("description"); ?>
                        </div>
                    <?php endif; ?>
                </div>
           
              
                <button type="submit" class="btn btn-primary float-left mr-3">Update Restorasi</button>
            </form>

            <a href="<?= base_url(); ?>restorasi_admin" class="btn btn-outline-info">Kembali</a>
        </div>
    </div>
</div>