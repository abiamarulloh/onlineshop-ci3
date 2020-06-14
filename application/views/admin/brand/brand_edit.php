<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Brand</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open_multipart(); ?>
                <input type="text" name="id" hidden readonly value="<?= $list_brand_by_id->id; ?>">
                <div class="form-group">
                    <label for="file">Logo Brand</label>
                    <input type="file" class="form-control" id="file" name="image">
                    <small class="text-primary">* Pilih Gambar Terlebih dahulu</small>
                </div>

                <div class="form-group">
                    <label for="name">Nama Brand</label>
                    <input type="text" class="form-control  <?php if(form_error('name')) {echo "is-invalid";} ?>" id="name"  name="name" value="<?= $list_brand_by_id->name; ?>">
                    <?php if(form_error('name')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("name"); ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="<?= base_url("brand_admin"); ?>" class="btn btn-outline-primary"> <i class="fas fa-fw fa-angle-double-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-edit"></i> Publish Brand</button>
                </div>
            </form>
        </div>
    </div>
</div>