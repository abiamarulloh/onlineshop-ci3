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
                            <!-- Jika Ecommerce -->
                            <?php foreach ($product as $pro) :?>
                            <?php if($c->choose_id == $pro->id && $c->menu_url == "ecommerce") : ?>
                            <div class="form-check mb-2">
                                <input class="form-check-input carausel_check_active"
                                    <?php if($c->status == 1) {echo "checked";} ?> name="carausel_active" data-status="<?= $c->status ?>" data-id="<?= $c->id; ?>" id="<?= $c->id ?>"  type="checkBox" value="<?= $c->id ?>">
                                <label class="form-check-label" for="<?= $c->id ?>"><?= $pro->name; ?></label>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            
                            <!-- Jika Blog -->
                            <?php foreach ($blog as $bl) :?>
                            <?php if($c->choose_id == $bl->id && $c->menu_url == "blog") : ?>
                            <div class="form-check mb-2">
                                <input class="form-check-input carausel_check_active"
                                    <?php if($c->status == 1) {echo "checked";} ?> name="carausel_active" data-status="<?= $c->status ?>" data-id="<?= $c->id; ?>" id="<?= $c->id ?>"  type="checkBox" value="<?= $c->id ?>">
                                <label class="form-check-label" for="<?= $c->id ?>"><?= $bl->title; ?></label>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>

                            <!-- Brand -->
                            <?php foreach ($brand as $br) :?>
                            <?php if($c->choose_id == $br->id && $c->menu_url == "brand") : ?>
                            <div class="form-check mb-2">
                                <input class="form-check-input carausel_check_active"
                                    <?php if($c->status == 1) {echo "checked";} ?> name="carausel_active" data-status="<?= $c->status ?>" data-id="<?= $c->id; ?>" id="<?= $c->id ?>"  type="checkBox" value="<?= $c->id ?>">
                                <label class="form-check-label" for="<?= $c->id ?>"><?= $br->name; ?></label>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>


                            <!-- Restorasi -->
                            <?php foreach ($restorasi as $res) :?>
                            <?php if($c->choose_id == $res->id && $c->menu_url == "restorasi.vespa") : ?>
                            <div class="form-check mb-2">
                                <input class="form-check-input carausel_check_active"
                                    <?php if($c->status == 1) {echo "checked";} ?> name="carausel_active" data-status="<?= $c->status ?>" data-id="<?= $c->id; ?>" id="<?= $c->id ?>"  type="checkBox" value="<?= $c->id ?>">
                                <label class="form-check-label" for="<?= $c->id ?>"><?= $res->name_restorasi; ?></label>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>