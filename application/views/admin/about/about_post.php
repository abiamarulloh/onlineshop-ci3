<?= $this->session->flashdata("about"); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center font-weight-bold text-dark">Edit tentang wagiman supply</h2>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="web_name">Nama Website</label>
                                <input type="text"
                                    class="form-control <?php if(form_error('web_name')) {echo "is-invalid";} ?>"
                                    name="web_name" id="web_name" value="<?= $about->web_name; ?>">
                                <?php if(form_error('web_name')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("web_name"); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ceo">CEO</label>
                                <input type="text"
                                    class="form-control <?php if(form_error('ceo')) {echo "is-invalid";} ?>" name="ceo"
                                    id="ceo" value="<?= $about->ceo; ?>">
                                <?php if(form_error('ceo')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("ceo"); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="body">Deskripsi</label>
                            <textarea name="description" id="body"
                                class="form-control <?php if(form_error('description')) {echo "is-invalid";} ?>"><?= $about->description; ?></textarea>
                            <?php if(form_error('description')) : ?>
                            <div class="invalid-feedback">
                                <?= form_error("description"); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat Lengkap</label>
                            <input type="text" class="form-control <?php if(form_error('ceo')) {echo "is-invalid";} ?>"
                                id="address" placeholder="Alamat Lengkap" value="<?= $about->address; ?>"
                                name="address">
                            <?php if(form_error('address')) : ?>
                            <div class="invalid-feedback">
                                <?= form_error("address"); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text"
                                    class="form-control <?php if(form_error('phone')) {echo "is-invalid";} ?>"
                                    id="phone" value="<?= $about->phone; ?>" name="phone">
                                <?php if(form_error('phone')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("phone"); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="text"
                                    class="form-control <?php if(form_error('email')) {echo "is-invalid";} ?>"
                                    id="email" value="<?= $about->email; ?>" name="email">
                                <?php if(form_error('email')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("email"); ?>
                                </div>`
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cityince">Provinsi</label>
                                <select class="form-control" name="province" id="province">
                                    <option value="0">Pilih Provinsi</option>
                                    <?php foreach ($provinsi as $prov) : ?>
                                    <option value="<?= $prov->province_id; ?>" <?php if($prov->province_id == $about->province){echo "selected";} ?> >
                                        <?= $prov->province; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="city">Kota </label>
                                <select class="form-control" name="city" id="city">
                                    <option value="0">Pilih Kota</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="file">Logo </label>
                                <input type="file" class="form-control" id="file" name="image">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url("about_admin"); ?>" class="btn btn-outline-info"><i class="fas fa-fw fa-angle-double-left"></i>  Kembali </a>
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-fw fa-bookmark"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
