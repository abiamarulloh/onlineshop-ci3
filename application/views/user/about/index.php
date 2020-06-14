<div class="container  about">
    <div class="row">
        <div class="col-md-12  text-center">
            <h2 class="lora"><span class="text-tosca">Wagiman Supply</span> <b> About</b> </h2>
            <p class="lead">Sejarah dan detail tentang <span class="text-tosca">wagimansupply.com</span></p>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row ">
        <div class="col-md-12">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button
                                class="btn btn-link text-white text-decoration-none font-weight-bold btn-block text-left"
                                type="button" style="background-color:#00cec9;" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fas fa-fw fa-image"></i> Logo Wagiman Supply
                                <div class="float-right">
                                    <i class="fas fa-angle-double-down"></i>
                                </div>
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body text-center">
                            <img src="<?= base_url(); ?>assets/admin/img/about/<?= $about->image; ?>" alt=""
                                class="img-fluid img-thumbnail w-25">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button
                                class="btn btn-link text-white text-decoration-none font-weight-bold btn-block text-left collapsed"
                                type="button" style="background-color:#00cec9;" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fas fa-fw fa-edit"></i> Nama Website Wagiman Supply

                                <div class="float-right">
                                    <i class="fas fa-angle-double-down"></i>
                                </div>

                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <?= $about->web_name; ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button
                                class="btn btn-link text-white text-decoration-none font-weight-bold btn-block text-left collapsed"
                                type="button" style="background-color:#00cec9;" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="fas fa-fw fa-user-circle"></i> CEO atau pendiri
                                <div class="float-right">
                                    <i class="fas fa-angle-double-down"></i>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <?= $about->ceo; ?>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button
                                class="btn btn-link text-white text-decoration-none font-weight-bold btn-block text-left collapsed"
                                type="button" style="background-color:#00cec9;" data-toggle="collapse"
                                data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                <i class="fas fa-fw fa-book"></i> Deskripsi dan Sejarah Wagiman Supply
                                <div class="float-right">
                                    <i class="fas fa-angle-double-down"></i>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div id="collapsefour" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <?= $about->description; ?>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button
                                class="btn btn-link text-white text-decoration-none font-weight-bold btn-block text-left collapsed"
                                type="button" style="background-color:#00cec9;" data-toggle="collapse"
                                data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                <i class="fas fa-fw fa-address-book"></i> Alamat Kantor Wagiman Supply
                                <div class="float-right">
                                    <i class="fas fa-angle-double-down"></i>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div id="collapsefive" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <?= $about->address; ?>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button
                                class="btn btn-link text-white text-decoration-none font-weight-bold btn-block text-left collapsed"
                                type="button" style="background-color:#00cec9;" data-toggle="collapse"
                                data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <i class="fas fa-fw fa-phone"></i> Nomor Telepon yang dapat dihubungi
                                <div class="float-right">
                                    <i class="fas fa-angle-double-down"></i>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            +<?= $about->phone; ?>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button
                                class="btn btn-link text-white text-decoration-none font-weight-bold btn-block text-left collapsed"
                                type="button" style="background-color:#00cec9;" data-toggle="collapse"
                                data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <i class="fas fa-fw fa-envelope"></i> Email kantor Wagiman supply
                                <div class="float-right">
                                    <i class="fas fa-angle-double-down"></i>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <?= $about->email; ?>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button
                                class="btn btn-link text-white text-decoration-none font-weight-bold btn-block text-left collapsed"
                                type="button" style="background-color:#00cec9;" data-toggle="collapse"
                                data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                <i class="fas fa-fw fa-city"></i> Provinsi Wagiman Supply
                                <div class="float-right">
                                    <i class="fas fa-angle-double-down"></i>
                                </div>
                            </button>

                        </h2>
                    </div>
                    <div id="collapseNine" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <?php foreach ($provinsi as $prov) : ?><?php  if($prov->province_id == $about->province) : ?>
                            <?= $prov->province; ?><?php endif; ?><?php endforeach; ?>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button
                                class="btn btn-link text-white text-decoration-none font-weight-bold btn-block text-left collapsed"
                                type="button" style="background-color:#00cec9;" data-toggle="collapse"
                                data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                <i class="fas fa-building"></i> Kota / Kabupaten Wagiman Supply
                                <div class="float-right">
                                    <i class="fas fa-angle-double-down"></i>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTen" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <?php foreach ($city as $ct) : ?><?php  if($ct->city_id == $about->city) : ?>
                            <?= $ct->type . " " . $ct->city_name; ?><?php endif; ?><?php endforeach; ?>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button
                                class="btn btn-link text-white text-decoration-none font-weight-bold btn-block text-left collapsed"
                                type="button" style="background-color:#00cec9;" data-toggle="collapse"
                                data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Link Pendukung wagiman supply 
                                <div class="float-right">
                                    <i class="fas fa-angle-double-down"></i>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseEight" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <p class="lead"><a href="http://www.freepik.com">Designed by slidesgo / Freepik</a></p>
                        </div>
                    </div>
                </div>



            </div>


        </div>
    </div>
</div>