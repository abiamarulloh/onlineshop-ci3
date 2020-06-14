<div class="jumbotron jumbotron-fluid my-5 bg-tosca">
  <div class="container">
    <img src="<?= base_url() ?>assets/user/images/detail_product.jpg" class="img-fluid">
  </div>
</div>

<div class="container-fluid online_shop my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                <h2 class="lora"><span class="text-tosca">Detail Product</h2>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="gallery w-100">
                                <img src="<?= base_url(); ?>assets/admin/img/ecommerce/<?= $list_product_by_id->product_image; ?>"
                                    alt="<?= $list_product_by_id->product_image; ?>"
                                    class="card-img-top img-responsive img-thumbnail image-zoom">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="owl-carousel owl-theme">
                                        <?php foreach ($image_thumbnails as $thumbnail) :?>
                                        <div class="thumbnail">
                                            <a
                                                href="<?= base_url("assets/admin/img/ecommerce/ecommerce_thumbnails/") . $thumbnail->image_name; ?>">
                                                <img src="<?= base_url("assets/admin/img/ecommerce/ecommerce_thumbnails/") . $thumbnail->image_name; ?>"
                                                    alt="<?= $thumbnail->image_name; ?>">
                                            </a>

                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <table class="table  table-borderless">
                                <tr>
                                    <td>Nama Product</td>
                                    <td><strong><?= $list_product_by_id->name; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td><strong><?= $list_product_by_id->category_name; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Stock</td>
                                    <td>
                                        <?php if($list_product_by_id->qty > 0) : ?>
                                        <strong class="text-tosca">Tersedia</strong>
                                        <?php else : ?>
                                        <strong class="text-danger">Tidak Tersedia</strong>
                                        <?php endif;  ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Brand</td>
                                    <td><strong><?= $list_product_by_id->brand_name; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td><strong
                                            class="btn btn-sm btn-success">Rp<?= number_format( $list_product_by_id->price,0,",",".") ?></strong>
                                    </td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-md-4 offset-md-6">
                                    <a href="<?= base_url(); ?>ecommerce_add_to_cart/<?= $list_product_by_id->id; ?>"
                                        class="btn btn-primary btn-block " style="font-size:12px"> <i
                                            class="fas fa-bookmark"></i> Tambah ke keranjang</a>
                                    <a href="<?= base_url(); ?>ecommerce" class="btn btn-outline-primary btn-block "
                                        style="font-size:12px"> <i class="fas fa-backward"></i> Kembali</a>
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
                                    aria-labelledby="deskripsi-tab"><?= $list_product_by_id->description; ?></div>
                                <div class="tab-pane fade" id="option" role="tabpanel" aria-labelledby="option-tab">
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>


    <!-- Product Terkait -->
    <div class="row">
        <div class="col-md-12  text-left">
            <h2 class="lora"><span class="text-tosca">Product terkait</h2>
            <p class="lead">Produk kebutuhanmu sekarang sudah tersedia di Online Shop Wagiman Supply</p>
            <hr>
        </div>
    </div>


    <!-- Product Terkait dengan kategory -->
    <div class="row d-flex justify-content-center">

        <?php foreach ($list_product as $product) :?>
        <?php if($list_product_by_id->category_id  == $product->category_id) :?>
        <div class="col-md-3 col-sm-12 mb-3 p-1">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white text-center">
                    <img src="<?= base_url(); ?>assets/admin/img/ecommerce/<?= $product->image; ?>"
                        style="height:200px; width:200px;" class="card-img-top img-fluid p-2 image-zoom">
                </div>
                <div class="card-body">
                    <div class="card-title text-center">
                        <p class="card-text m-0"><?= $product->name; ?></p>
                        <small
                            class="badge badge-pill badge-success m-0">Rp<?= number_format($product->price); ?></small>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url(); ?>ecommerce_add_to_cart/<?= $product->id; ?>"
                            class="btn btn-primary btn-block btn-sm" style="font-size:12px"> <i
                                class="fas fa-shopping-bag"></i> Tambah ke keranjang</a>
                        <a href="<?= base_url(); ?>ecommerce_preview/<?= $product->id; ?>"
                            class="btn btn-info btn-sm btn-block" style="font-size:12px"> <i
                                class="fas fa-book-open"></i> Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>


    </div>


</div>