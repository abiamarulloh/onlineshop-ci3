<div class="container my-5 auth">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body shadow-lg">
                    <div class="text-center">
                        <h2>Masuk</h2>
                        <small class="text-muted">Masuk untuk membeli barang</small>
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
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control <?php if( form_error('password') )   { echo "is-invalid";}  ?>" id="password" placeholder="Password" name="password">
                            <?php if(form_error('password')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('password') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-auth btn-sm btn-block mb-2">Submit</button>
                        <a href="<?= base_url("register"); ?>"><small class="text-muted ">Belum punya akun ? Daftar</small></a>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>