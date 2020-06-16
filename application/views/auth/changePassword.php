<div class="container my-5 auth">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body shadow-lg">
                    <div class="text-center">
                        <h2>Ganti Password</h2>
                        <h6><?= $this->session->userdata("reset_email"); ?></h6>
                        <small class="text-muted">Ganti password dengan kombinasi angka serumit mungkin dan mudah diingat!</small>
                    </div>
                    <hr>
                    <?= $this->session->flashdata('auth'); ?>
                    <form method="post" action="<?= base_url("changePassword"); ?>">
                        <div class="form-group">
                            <label for="password1">Password baru</label>
                            <input type="password" class="form-control <?php if( form_error('password1') )   { echo "is-invalid";}  ?>" id="password1" placeholder="Masukkan password baru" name="password1">
                            <?php if(form_error('password1')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('password1') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="password2">Ulangi Password baru</label>
                            <input type="password" class="form-control <?php if( form_error('password2') )   { echo "is-invalid";}  ?>" id="password2" placeholder="Masukkan Ulang password baru" name="password2">
                            <?php if(form_error('password2')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('password2') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="remember_me" value="1" id="rememberme">
                            <label class="form-check-label" for="rememberme">Ingat saya </label>
                        </div> -->
                        <button type="submit" class="btn btn-auth btn-sm btn-block mb-2">Submit</button>
                        
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>