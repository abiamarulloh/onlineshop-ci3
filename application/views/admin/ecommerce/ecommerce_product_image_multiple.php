<?= $this->session->flashdata('product_image_thumnails'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-12 text-center font-weight-bold text-dark">
            <h2>Tambah data gambar thumbnails</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?= form_open_multipart(); ?>
                    <input type="text" name="id" hidden value="<?= $id; ?>">
                    <div class="form-group">
                        <label for="file">Upload Banyak Gambar Thumbnails</label>
                        <input type="file" name="gambar[]" id="file" class="form-control" multiple>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-edit"></i> Tambah</button>
                        <a href="<?= base_url("ecommerce_admin"); ?>" class="btn btn-outline-info"> <i  class="fas fa-angle-double-right"></i> kembali</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-md-12">
            <h2 class="text-dark font-weight-bold">Data gambar thumbnails</h2>
        </div>
        <?php if($image_thumbnails) : ?>
        <?php foreach ($image_thumbnails as $thumnail) :?>
        <div class="col-md-3 my-2">
            <div class="card">
                <img src="<?= base_url("assets/admin/img/ecommerce/ecommerce_thumbnails/") . $thumnail->image_name; ?>"
                    class="card-img-top" alt="<?= $thumnail->image_name; ?>">
                <a href="<?= base_url("ecommerce_product_image_multiple_delete/") . $thumnail->id; ?>"
                    class="btn btn-danger rounded-0" onclick="return confirm('Yakin akan menghapus ?')"><i
                        class="fas fa-trash"></i></a>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <p class="text-center font-weight-bold text-dark">Belum ada data gambar !</p>
        <?php endif; ?>
    </div>