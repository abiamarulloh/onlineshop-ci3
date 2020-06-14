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
                <input type="text" hidden name="id" value="<?= $list_product_by_id->product_id; ?>">
                <img src="<?= base_url(); ?>assets/admin/img/ecommerce/<?= $list_product_by_id->product_image; ?>" alt="" class="w-25 image-zoom">
                <div class="form-group">
                    <label for="file">Gambar</label>
                    <input type="file" class="form-control" id="file" name="image">
                    <small class="text-primary">* Pilih Gambar Product Terlebih dahulu</small>
                </div>

                <div class="form-group">
                    <label for="name">Nama Product</label>
                    <input type="text" class="form-control  <?php if(form_error('name')) {echo "is-invalid";} ?>" id="name"  name="name" value="<?= $list_product_by_id->product_name; ?>">
                    <?php if(form_error('name')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("name"); ?>
                        </div>
                    <?php endif; ?>
                </div>
             

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="body" class="form-control <?php if(form_error('description')) {echo "is-invalid";} ?>" ><?= $list_product_by_id->description; ?></textarea>
                    <?php if(form_error('description')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("description"); ?>
                        </div>
                    <?php endif; ?>
                </div>
                

                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="text" class="form-control  <?php if(form_error('price')) {echo "is-invalid";} ?>" id="price"  name="price" value="<?= $list_product_by_id->price; ?>">
                    <?php if(form_error('price')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("price"); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="qty">Jumlah</label>
                    <input type="text" class="form-control  <?php if(form_error('qty')) {echo "is-invalid";} ?>" id="qty" min="1"  name="qty" value="<?= $list_product_by_id->qty; ?>">
                    <?php if(form_error('qty')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("qty"); ?>
                        </div>
                    <?php endif; ?>
                </div>


                <div class="form-group">
                    <label for="weight">Berat (GRAM) ex : 1000 </label>
                    <input type="text" class="form-control  <?php if(form_error('weight')) {echo "is-invalid";} ?>" id="weight" name="weight" value="<?= $list_product_by_id->weight; ?>">
                    <?php if(form_error('weight')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("weight"); ?>
                        </div>
                    <?php endif; ?>
                </div>


                <div class="form-group">
                    <label for="category_id">Pilih Kategori</label>
                    <select  class="form-control <?php if(form_error('category_id')) {echo "is-invalid";} ?>" id="category_id" name="category_id">
                        <option value="0" > ---  Pilih Kategori --- </option>
                        <?php foreach ($list_category as $category) : ?>
                            <option <?=  set_select('category_id', $category->id ); if($category->id == $list_product_by_id->category_id) {echo "selected";} ?> value="<?= $category->id ?>"><?= $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if(form_error('category_id')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("category_id"); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="brand_id">Pilih Brand</label>
                    <select  class="form-control <?php if(form_error('brand_id')) {echo "is-invalid";} ?>" id="brand_id" name="brand_id">
                        <option  value="0"> ---  Pilih Brand --- </option>
                        <?php foreach ($list_brand as $brand) : ?>
                            <option value="<?= $brand->id ?>" <?=  set_select('brand_id', $brand->id ); if($brand->id == $list_product_by_id->brand_id) {echo "selected";} ?>  ><?= $brand->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if(form_error('brand_id')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("brand_id"); ?>
                        </div>
                    <?php endif; ?>
                </div>

              
                <button type="submit" class="btn btn-primary">Publish Product Update</button>

                <a href="<?= base_url(); ?>ecommerce_admin" class="btn btn-info">kembali</a>
            </form>
        </div>
    </div>
</div>