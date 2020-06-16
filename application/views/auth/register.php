<div class="container my-5 auth">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body shadow-lg">
                    <div class="text-center">
                        <h2>Daftar</h2>
                        <small class="text-muted">Daftar lalu Masuk untuk membeli barang</small>
                    </div>
                    <hr>
                    <?= $this->session->flashdata('auth'); ?>

                    <form method="post" action="">
                        <div class="form-group">
                            <label for="fullname">Nama Lengkap</label>
                            <input type="text" class="form-control <?php if( form_error('fullname') )   { echo "is-invalid";}  ?>" id="fullname" placeholder="Nama Lengkap" name="fullname" value="<?= set_value('fullname') ?>">
                            <?php if(form_error('fullname')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('fullname') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input type="text" class="form-control <?php if( form_error('email') )   { echo "is-invalid";}  ?>" id="email_address" placeholder="Email Address" name="email" value="<?= set_value('email') ?>">
                            <?php if(form_error('email')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('email') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" class="form-control <?php if( form_error('password1') )   { echo "is-invalid";}  ?>" id="password1" placeholder="Password" name="password1" value="<?= set_value('password1') ?>">
                            <?php if(form_error('password1')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('password1') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="password2">Konfirmasi Password</label>
                            <input type="password" class="form-control <?php if( form_error('password2') )   { echo "is-invalid";}  ?>" id="password2" placeholder="Konfirmasi Password" name="password2">
                            <?php if(form_error('password2')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('password2') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        
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