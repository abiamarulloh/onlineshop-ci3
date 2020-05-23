<div class="container my-5 auth">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                <?= $this->session->flashdata("member"); ?>
                <?php echo form_open_multipart(); ?>
                    <input type="text" name="id" hidden  readonly value="<?= $user->id; ?>">
                    <div class="form-group text-center my-5">
                        <img src="<?= base_url("assets/user/images/profile/") . $user->image; ?>" class="rounded text-center mx-auto" style="width:150px;">
                    </div>

                    <hr>

                    <p class="lead text-center">Date Created : <?= date("d M Y", $user->created_date); ?></p>

                    <div class="form-group mt-5">
                        <label for="file">Gambar</label>
                        <input type="file" class="form-control" id="file" name="image">
                        <small class="text-primary">* Ganti Profile</small>
                    </div>

                    <div class="form-group">
                        <label for="fullname">Nama Lengkap</label>
                        <input type="text" class="form-control  <?php if(form_error('fullname')) {echo "is-invalid";} ?>"
                            id="fullname" style="font-size:14px;"  name="fullname" value="<?= $user->fullname ?>">
                        <?php if(form_error('fullname')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("fullname"); ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor HP</label>
                        <input type="text" class="form-control  <?php if(form_error('phone')) {echo "is-invalid";} ?>"
                            id="phone" name="phone" style="font-size:14px;"  value="<?= $user->phone ?>" placeholder="Example : 62121355215674">
                        <?php if(form_error('phone')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("phone"); ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control  <?php if(form_error('password')) {echo "is-invalid";} ?>"
                            id="password" name="password" style="font-size:14px;" placeholder="password (leave blank if no change)">
                        <?php if(form_error('password')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("password"); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <a href="<?= base_url(); ?>logout" class="btn btn-outline-secondary">Keluar</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


