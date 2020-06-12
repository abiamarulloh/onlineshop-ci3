<div class="container restorasi my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="text-dark font-weight-bold"> <i class="fas fa-info"></i> Detail Restorasi </h2>
                        <div>
                            <a href="https://wa.me/<?= $about->phone; ?>" class="btn btn-success my-1"> <i class="fab fa-whatsapp"></i> Hubungi Penjual Jasa</a>
                            <a href="<?= base_url("restorasi.vespa"); ?>" class="btn btn-primary "> <i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header bg-primary" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn text-white btn-link text-decoration-none btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#image_restorasi" aria-expanded="true"
                                        aria-controls="image_restorasi">
                                        <i class="fas fa-image"></i> Gambar Restorasi
                                    </button>
                                </h2>
                            </div>

                            <div id="image_restorasi" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                   <a  href="<?= base_url(); ?>assets/admin/img/restorasi/<?= $restorasi_vespa->image; ?>" rel="lightbox" title="Bukti Transaksi"> 
                                        <img src="<?= base_url(); ?>assets/admin/img/restorasi/<?= $restorasi_vespa->image; ?>" style="max-width:200px;">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-primary " id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn text-white text-decoration-none btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#name_restorasi" aria-expanded="true"
                                        aria-controls="name_restorasi">
                                         <i class="fa fa-motorcycle" aria-hidden="true"></i> Nama Restorasi
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
                            <div class="card-header bg-primary" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn text-white text-decoration-none btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#desc" aria-expanded="false"
                                        aria-controls="desc">
                                        <i class="fas fa-book"></i> Deskripsi Restorasi
                                    </button>
                                </h2>
                            </div>
                            <div id="desc" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
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