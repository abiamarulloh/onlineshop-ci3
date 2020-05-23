<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Publish Blog</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open_multipart('blog_publish_post'); ?>
                <div class="form-group">
                    <label for="file">Gambar</label>
                    <input type="file" class="form-control" id="file" name="image">
                    <small class="text-primary">* Pilih Gambar Terlebih dahulu</small>
                </div>

                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control  <?php if(form_error('title')) {echo "is-invalid";} ?>" id="title"  name="title" value="<?= set_value('title') ?>">
                    <?php if(form_error('title')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("title"); ?>
                        </div>
                    <?php endif; ?>
                </div>
                

                <div class="form-group">
                    <label for="body">Isi</label>
                    <textarea name="body" id="body" class="form-control <?php if(form_error('body')) {echo "is-invalid";} ?>" ><?= set_value('body') ?></textarea>
                    <?php if(form_error('body')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("body"); ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="category_id">Pilih Kategori</label>
                    <select multiple class="form-control text-center" id="category_id" name="category_id">
                        <option disabled > ---  Pilih Kategori --- </option>
                        <?php foreach ($list_category as $category) : ?>
                            <option value="<?= $category->id ?>"><?= $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
              
                <button type="submit" class="btn btn-primary">Publish Product</button>
            </form>
        </div>
    </div>
</div>