
<!-- Wagiman Supply ONLINE SHOP -->
<div class="container online_shop my-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Wagiman Supply <b> Online Shop</b> </h1> 
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, nemo.</p>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <form  method="post"  action="">
                <div class="input-group my-3">
                    <input type="text" class="form-control" placeholder="search" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" ><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Display Product -->
    <div class="row d-flex justify-content-center">
        <?php if($list_product)  :?> 
            <?php foreach ($list_product as $product) :?>
            <div class="col-md-3 mb-3 p-1">
                <div class="card shadow-sm">
                    <div class="card-header bg-white text-center">
                        <img src="<?= base_url(); ?>assets/admin/img/ecommerce/<?= $product->image; ?>" style="height:200px; width:200px;" class="card-img-top img-fluid p-2">
                    </div>
                    <div class="card-body">
                        <div class="card-title text-center">
                            <p class="card-text m-0"><?= $product->name; ?></p>
                            <small class="badge badge-pill badge-success m-0">Rp<?= number_format($product->price); ?></small>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url(); ?>ecommerce_add_to_cart/<?= $product->id++; ?>" class="btn btn-primary btn-block btn-sm" style="font-size:12px">Tambah ke keranjang</a> 
                            <a href="" class="btn btn-info btn-sm btn-block" style="font-size:12px">Detail</a>
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
