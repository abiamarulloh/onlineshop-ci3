<div class="container-fluid online_shop my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header"> <i class="fas fa-info"></i> Detail Product</h5>
                <div class="card-body">

                    <?php foreach ($list_product_by_id as $product_id) : ?>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= base_url(); ?>assets/admin/img/ecommerce/<?= $product_id->product_image; ?>"
                                alt="" class="card-img-top w-75 image-zoom">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="owl-carousel owl-theme">
                                        <div> Your Content </div>
                                        <div> Your Content </div>
                                        <div> Your Content </div>
                                        <div> Your Content </div>
                                        <div> Your Content </div>
                                        <div> Your Content </div>
                                        <div> Your Content </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <table class="table  table-borderless">
                                <tr>
                                    <td>Nama Product</td>
                                    <td><strong><?= $product_id->name; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td><strong><?= $product_id->category_name; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Stock</td>
                                    <td>
                                        <?php if($product_id->qty > 0) : ?>
                                            <strong class="text-tosca">Tersedia</strong>
                                        <?php else : ?>
                                            <strong class="text-danger">Tidak Tersedia</strong>
                                        <?php endif;  ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Brand</td>
                                    <td><strong><?= $product_id->brand_name; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td><strong
                                            class="btn btn-sm btn-success">Rp<?= number_format( $product_id->price,0,",",".") ?></strong>
                                    </td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-md-4 offset-md-6">
                                    <a href="<?= base_url(); ?>ecommerce_add_to_cart/<?= $product_id->id; ?>"
                                        class="btn btn-primary btn-block " style="font-size:12px"> <i
                                            class="fas fa-bookmark"></i> Tambah ke keranjang</a>
                                    <a href="<?= base_url(); ?>ecommerce"
                                        class="btn btn-outline-primary btn-block " style="font-size:12px"> <i
                                            class="fas fa-backward"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comentar -->
                    <div class="row my-5">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="deskripsi-tab" data-toggle="tab" href="#deskripsi"
                                        role="tab" aria-controls="deskripsi" aria-selected="true">Deskripsi</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active p-2" id="deskripsi" role="tabpanel"
                                    aria-labelledby="deskripsi-tab"><?= $product_id->description; ?></div>
                                <div class="tab-pane fade" id="option" role="tabpanel" aria-labelledby="option-tab">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>



                </div>
            </div>
        </div>
    </div>
</div>