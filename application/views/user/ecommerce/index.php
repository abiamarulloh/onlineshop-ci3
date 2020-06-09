<!-- Wagiman Supply ONLINE SHOP -->
<div class="container online_shop my-5">
    <div class="row">
        <div class="col-md-12 mt-5 text-center">
            <h2 class="lora"><span class="text-tosca">Wagiman Supply</span> <b> Online Shop</b> </h2>
            <p class="lead">Produk kebutuhanmu sekarang sudah tersedia di Online Shop Wagiman Supply</p>
        </div>
    </div>

    <div class="row my-3 d-flex justify-content-center">
        <!-- Search By Brand -->
        <div class="col-md-6">
            <form method="get" action="">
                <div class="form-group">
                    <label for="search_by_brand">Brand</label>
                    <select class="form-control" id="search_by_brand">
                        <option value="0">Semua Brand</option>
                        <?php foreach ($list_brand as $brand) :?>
                        <option value="<?= $brand->id; ?>"><?=  $brand->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>
        </div>

        <!-- Search By Category -->
        <div class="col-md-6">
            <form  method="get" action="">
                <div class="form-group">
                    <label for="search_by_category">Category</label>
                    <select class="form-control" id="search_by_category">
                        <option value="0">Semua Kategori</option>
                        <?php foreach ($list_category as $category) :?>
                        <option value="<?= $category->id; ?>"><?=  $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>
        </div>

    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <form method="get" action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="search" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Display Product -->
    <div class="row d-flex justify-content-center" id="search_by_body">
        <?php if($list_product)  :?>

        <?php foreach ($list_product as $product) :?>
        <div class="col-md-3 col-sm-12 mb-3 p-1">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white text-center">
                    <img src="<?= base_url(); ?>assets/admin/img/ecommerce/<?= $product->product_image; ?>"
                        style="height:200px; width:200px;" class="card-img-top img-fluid p-2 image-zoom">
                </div>
                <div class="card-body">
                    <div class="card-title text-center">
                        <p class="card-text m-0"><?= $product->product_name; ?></p>
                        <small
                            class="badge badge-pill badge-success m-0">Rp<?= number_format($product->price); ?></small>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url(); ?>ecommerce_add_to_cart/<?= $product->product_id; ?>"
                            class="btn btn-primary btn-block btn-sm" style="font-size:12px"> <i class="fas fa-shopping-bag"></i> Tambah ke keranjang</a>
                        <a href="<?= base_url(); ?>ecommerce_preview/<?= $product->product_id; ?>"
                            class="btn btn-info btn-sm btn-block" style="font-size:12px"> <i class="fas fa-book-open"></i> Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php else : ?>
        <div class="col-md-6 mx-auto text-center">
            <img src="<?= base_url(); ?>assets/user/images/checkout_empty.jpg" class="img-fluid w-50 ">
            <h6>Oops, Product tidak ditemukan</h6>
            <a href="<?= base_url(); ?>ecommerce" class="btn btn-outline-success   ">Belanja lagi</a>
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