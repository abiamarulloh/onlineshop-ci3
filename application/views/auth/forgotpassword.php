<div class="container my-5 auth">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body shadow-lg">
                    <div class="text-center">
                        <h2>Lupa Password</h2>
                        <small class="text-muted">Kami akan mengirimkan email verifikasi ke akun email yang anda masukkan !</small>
                    </div>
                    <hr>
                    <?= $this->session->flashdata('auth'); ?>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input type="text" class="form-control <?php if( form_error('email') )   { echo "is-invalid";}  ?>" id="email_address" placeholder="Email Address" value="<?= set_value('email') ?>" name="email">
                            <?php if(form_error('email')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('email') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="remember_me" value="1" id="rememberme">
                            <label class="form-check-label" for="rememberme">Ingat saya </label>
                        </div> -->
                        <button type="submit" class="btn btn-auth btn-sm btn-block mb-2">Submit</button>
                        <a href="<?= base_url("login"); ?>"><small class="text-muted ">Sudah punya akun ? Masuk</small></a>
                        <br>
                        <a href="<?= base_url("forgotpassword"); ?>"><small class="text-muted ">Lupa Password ? </small></a>
                        
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>