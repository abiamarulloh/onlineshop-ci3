<div class="container my-5 brands">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>List <span class="text-tosca">Product</span> berdasarkan <span class="text-tosca">Brand</span></h2>
            <p class="lead">Wagimansupply.com</p>
            <h6 class="text-tosca">Brand <?= $brand_id->name; ?> </h6>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <form  method="get"  action="">
                <div class="input-group">
                    <input type="text" class="form-control"  placeholder="Brand <?= $brand_id->name; ?>" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" ><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Display Product -->
    <div class="row d-flex justify-content-center" id="search_by_body">
        <?php if($list_product_by_brand)  :?> 
            
            <?php foreach ($list_product_by_brand as $product) :?>
            <div class="col-md-3 col-sm-12 mb-3 p-1">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white text-center">
                        <img src="<?= base_url(); ?>assets/admin/img/ecommerce/<?= $product->product_image; ?>" style="height:200px; width:200px;" class="card-img-top img-fluid p-2 image-zoom">
                    </div>
                    <div class="card-body">
                        <div class="card-title text-center">
                            <p class="card-text m-0"><?= $product->product_name; ?></p>
                            <small class="badge badge-pill badge-success m-0">Rp<?= number_format($product->price); ?></small>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url(); ?>ecommerce_add_to_cart/<?= $product->product_id; ?>" class="btn btn-primary btn-block btn-sm" style="font-size:12px">Tambah ke keranjang</a> 
                            <a href="<?= base_url(); ?>ecommerce_preview/<?= $product->product_id; ?>" class="btn btn-info btn-sm btn-block" style="font-size:12px">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        <?php else : ?>
            <div class="col-md-6 mx-auto text-center">
                <img src="<?= base_url(); ?>assets/user/images/checkout_empty.jpg" class="img-fluid w-50 ">  
                <h6>Oops, Product di brand tidak ditemukan</h6>
                <a href="<?= base_url(); ?>brand_preview/<?= $brand_id->id; ?>" class="btn btn-outline-success">Kembali</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?= $pagination; ?>
        </div>
    </div>
</div>