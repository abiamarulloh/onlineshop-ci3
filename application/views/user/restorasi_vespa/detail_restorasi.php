<div class="container restorasi my-5">
    <div class="row">
        <div class="col-md-12 my-5">
            <div class="card border-0">
                <div class="card-header">
                    <div>
                        <h2 class="text-dark font-weight-bold"> <i class="fas fa-info"></i> Detail Restorasi </h2>
                        <div>
                            <a href="<?= base_url("restorasi.vespa"); ?>" class="btn btn-outline-primary "> <i
                                    class="fas fa-angle-double-left"></i> Kembali</a>
                            <a href="https://wa.me/<?= $about->phone; ?>" class="btn btn-success my-1"> <i
                                    class="fab fa-whatsapp"></i> Hubungi Penjual Jasa</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header bg-tosca " id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn text-white text-decoration-none btn-link btn-block text-left"
                                        type="button" data-toggle="collapse" data-target="#name_restorasi"
                                        aria-expanded="true" aria-controls="name_restorasi">
                                        <i class="fa fa-motorcycle" aria-hidden="true"></i> Nama Restorasi 
                                        <div class="float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                        </div>
                                    </button>
                                </h2>
                            </div>

                            <div id="name_restorasi" class="collapse " aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <?= $restorasi_vespa->name_restorasi; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-tosca" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn text-white btn-link text-decoration-none btn-block text-left"
                                        type="button" data-toggle="collapse" data-target="#image_restorasi"
                                        aria-expanded="true" aria-controls="image_restorasi">
                                        <i class="fas fa-image"></i> Gambar Restorasi 
                                        <div class="float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                        </div>
                                    </button>
                                </h2>
                            </div>

                            <div id="image_restorasi" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 gallery mx-auto">
                                            <a href="<?= base_url(); ?>assets/admin/img/restorasi/<?= $restorasi_vespa->image; ?>"
                                                rel="lightbox" title="Restorasi">
                                                <img src="<?= base_url(); ?>assets/admin/img/restorasi/<?= $restorasi_vespa->image; ?>"
                                                    class="img-thumbnail">
                                            </a>

                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row my-2">
                                        <?php foreach ($image_restorasi_thumbnails as $restorasi_image) :?>
                                        <div class="col-md-3 thumbnail">
                                            <a href="<?= base_url(); ?>assets/admin/img/restorasi/restorasi_thumbnails/<?= $restorasi_image->image_name; ?>"
                                                rel="lightbox">
                                                <img src="<?= base_url(); ?>assets/admin/img/restorasi/restorasi_thumbnails/<?= $restorasi_image->image_name; ?>"
                                                    class="img-thumbnail image-zoom">
                                            </a>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header bg-tosca" id="headingTwo">
                                <h2 class="mb-0">
                                    <button
                                        class="btn text-white text-decoration-none btn-link btn-block text-left collapsed"
                                        type="button" data-toggle="collapse" data-target="#desc" aria-expanded="false"
                                        aria-controls="desc">
                                        <i class="fas fa-book"></i> Deskripsi dan detail Restorasi  <div class="float-right">
                                            <i class="fas fa-angle-double-down"></i>
                                        </div>
                                    </button>
                                </h2>
                            </div>
                            <div id="desc" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body text-break">
                                    <?= $restorasi_vespa->description; ?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>