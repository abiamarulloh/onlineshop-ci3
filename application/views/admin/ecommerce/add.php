<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Publish Product</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open_multipart(); ?>
                <div class="form-group">
                    <label for="file">Gambar</label>
                    <input type="file" class="form-control" id="file" name="image">
                    <small class="text-primary">* Pilih Gambar Product Terlebih dahulu</small>
                </div>

                <div class="form-group">
                    <input type="file" id="img" name="image_thumb" />
                    <img id="preview" class="w-25" src="#" alt="your image" />
                </div>

                <div class="form-group">
                    <label for="name">Nama Product</label>
                    <input type="text" class="form-control  <?php if(form_error('name')) {echo "is-invalid";} ?>" id="name"  name="name" value="<?= set_value('name') ?>">
                    <?php if(form_error('name')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("name"); ?>
                        </div>
                    <?php endif; ?>
                </div>
             

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="body" class="form-control <?php if(form_error('description')) {echo "is-invalid";} ?>" ><?= set_value('description') ?></textarea>
                    <?php if(form_error('description')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("description"); ?>
                        </div>
                    <?php endif; ?>
                </div>
                

                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="text" class="form-control  <?php if(form_error('price')) {echo "is-invalid";} ?>" id="price"  name="price" value="<?= set_value('price') ?>">
                    <?php if(form_error('price')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("price"); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="qty">Jumlah</label>
                    <input type="number" class="form-control  <?php if(form_error('qty')) {echo "is-invalid";} ?>" id="qty" min="1"  name="qty" value="<?= set_value('qty') ?>">
                    <?php if(form_error('qty')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("qty"); ?>
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