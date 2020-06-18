<div class="container restorasi ">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="lora"><span class="text-tosca">Wagiman Supply</span> <b>  Restorasi Vespa</b> </h2> 
            <p class="lead">Manjakan Vespa mu dengan paket restorasi vespa di wagiman supply</p>
        </div>
    </div>
    <div class="row">
        <?php foreach($restorasi_vespa as $restorasi) : ?>
        <div class="col-md-10 mx-auto my-5">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url() ?>assets/admin/img/restorasi/<?= $restorasi->image; ?>" class="card-img" alt="<?= $restorasi->image; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-dark font-weight-bold"><?= $restorasi->name_restorasi; ?></h5>
                            <a href="<?= base_url("detail_restorasi/") . $restorasi->id; ;?>" class="btn btn-info my-2"> <i class="fas fa-info"></i> Detail Jasa Restorasi</a>
                            <a href="https://wa.me/<?= $about->phone; ?>" class="btn btn-success my-2"> <i class="fab fa-whatsapp"></i> Hubungi Penjual Jasa</a>
                            <p class="card-text"><small class="text-muted">Terakhir diupdate <?= date("l ,d M Y", $restorasi->created_date); ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>

    </div>
</div>