<?= $this->session->flashdata("carausel_change"); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Pilih Carausel / Slider yang pertama muncul</h2>
                        <a href="<?= base_url("carausel_setting"); ?>" class="btn btn-primary"> kembali <i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <p class="lead font-weight-bold text-primary">Pilih salah satu Carausel / Slider agar dapat berfungsi</p>
                    <hr>

                    <form>
                        <?php foreach ($carausel as $c) :?>
                        <div class="form-check mb-2">
                            <input class="form-check-input carausel_check_active"
                                <?php if($c->status == 1) {echo "checked";} ?> name="carausel_active" data-status="<?= $c->status ?>" data-id="<?= $c->carausel_id; ?>"  type="checkBox" value="<?= $c->carausel_id ?>">
                            <label class="form-check-label"><?= $c->title; ?></label>
                        </div>
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>