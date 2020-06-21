<?= $this->session->flashdata("privacy_police_edit");  ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h2><i class="fas fa-fw fa-user-secret"></i> Edit Kebijakan Privasi</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                
                <?php foreach ($privacy_police as $privacy) :?>
                    <div class="form-group">
                        <label for="body">Kebijakan Privasi</label>
                        <textarea name="body" id="body" class="form-control <?php if(form_error('body')) {echo "is-invalid";} ?>" ><?= $privacy->privacy; ?></textarea>
                        <?php if(form_error('body')) : ?>
                            <div class="invalid-feedback">
                                <?= form_error("body"); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
              
                <button type="submit" class="btn btn-primary float-left mr-3">Publish Kebijakan Privasi Update</button>
            </form>

            <a href="<?= base_url(); ?>blog_admin" class="btn btn-outline-info">Kembali</a>
        </div>
    </div>
</div>