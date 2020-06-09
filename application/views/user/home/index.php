<!-- Jumbotron -->

<div class="jumbotron jumbotron-hero jumbotron-fluid  d-flex align-items-center ">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6 d-flex align-items-center text-white">
                <div>
                    <h1 class="lora">Tempatnya Belanja Perlengkapan Motor</h1>
                    <p>Belanja dengan nyaman, aman, mudah serta dapat dilakukan dimana saja.</p>
                    <a href="<?= base_url(); ?>ecommerce" class="btn btn-home"> <i class="fas fa-store"></i> Pergi
                        Belanja</a>
                </div>
            </div>
            <div class="col-md-6  text-center ">
                <img src="<?= base_url() ?>assets/user/images/logos.png" class="img-fluid">
            </div>
        </div>
    </div>
</div>


<!-- Wagiman Supply ONLINE SHOP -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="lora"><span class="text-tosca">Wagiman Supply</span> <b> Online Shop</b> </h2>
            <p class="lead">Produk kebutuhanmu sekarang sudah tersedia di Online Shop Wagiman Supply</p>
        </div>
    </div>
    <div class="row my-5">
        <?php foreach ($list_ecomerce as $product) :?>
        <div class="col-md-3 mb-3 p-1">
            <div class="card   border-0">
                <div class="card-header bg-white text-center">
                    <img src="<?= base_url(); ?>assets/admin/img/ecommerce/<?= $product->image; ?>"
                        style="height:200px; width:200px;" class="card-img-top img-fluid p-2">
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
                            class="btn btn-info btn-sm btn-block" style="font-size:12px"><i class="fas fa-book-open"></i>
                            Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>


    <!-- selengkapnya -->
    <div class="row my-4">
        <div class="col-md-12 text-right">
            <a href="<?= base_url(); ?>ecommerce" class="btn btn-tosca btn-lg"> <i class="fas fa-search"></i> Lihat
                lebih banyak Produk</a>
        </div>
    </div>
</div>


<!-- Blog Artikel-->
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="lora"><span class="text-tosca">Wagiman Supply</span> <b> Blog</b> </h2>
            <p class="lead">Kunjungi juga artikel menarik yang dapat menemani waktu senggang mu</p>
        </div>
    </div>
    <div class="row my-5">
        <?php foreach($list_blog as $blog):  ?>
        <a href="<?= base_url(); ?>blog_preview/<?= $blog->id; ?>" class="text-decoration-none text-muted">
            <div class="col-md-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="card-header">
                                <img src="<?= base_url(); ?>assets/admin/img/blog/<?= $blog->image; ?>" class="card-img"
                                    alt="<?= $blog->image; ?>" style="max-height:150px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-dark font-weight-bold">
                                    <?= $blog->title; ?>
                                </h5>

                                <p class="small">

                                    <?=  strip_tags(character_limiter($blog->body, 200)); ?>

                                    <a href="<?= base_url(); ?>blog_preview/<?= $blog->id; ?>#disqus_thread"
                                        class="d-block">Link</a>

                                </p>


                                <!-- Button -->
                                <a href="<?= base_url(); ?>blog_preview/<?= $blog->id; ?>"
                                    class="btn btn-primary btn-sm mb-5"> Baca selengkapnya <i
                                        class="fas fa-fw fa-angle-double-right"></i></a>


                                <div class="card-text justify-content-between d-flex">
                                    <small class="text-muted">
                                        <?php foreach ($list_blog_category as $category) : ?>
                                        <?php if($blog->category_id == $category->id) :?>
                                        <i class="fa fa-user-tag"></i>
                                        <a href="<?= base_url(); ?>similar_category/<?= $category->id; ?>">
                                            <?= $category->name; ?>
                                            <?php endif; ?>
                                        </a>
                                        <?php endforeach; ?>
                                    </small>

                                    <small class="text-muted">Last updated
                                        <?= date("d-M-Y", $blog->created_date) ?></small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>


    <!-- selengkapnya -->
    <div class="row my-4">
        <div class="col-md-12 text-left">
            <a href="<?= base_url();  ?>blog" class="btn btn-tosca btn-lg"> <i class="fas fa-search"></i> Lihat lebih
                banyak Blog</a>
        </div>
    </div>
</div>



<!-- Brand-->
<div class="container white-space">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="lora"><span class="text-tosca">Wagiman Supply</span> <b> Brand</b> </h2>
            <p class="lead">Perusahaan yang bekerja sama dengan Wagiman Supply</p>
        </div>
    </div>

    <div class="owl-carousel">
        <?php foreach($list_brand as $brand):  ?>
        <div>
            <div class="row">
                <div class="col-md-12 overflow-wrap-brand">
                    <a href="<?= base_url(); ?>brand_preview/<?= $brand->id; ?>">
                        <div>
                            <img src="<?= base_url(); ?>assets/admin/img/brand/<?= $brand->image; ?>"
                                class="card-img text-center img-responsive pl-2 pr-2" alt="<?= $brand->name;  ?>">
                            <div class="overflow-text-brand  align-items-center d-flex justify-content-center"><img
                                    src="<?= base_url(); ?>assets/user/images/vision.png" class="img-fluid w-25" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>


    <!-- selengkapnya -->
    <div class="row my-4">
        <div class="col-md-12 text-center">
            <a href="<?= base_url();  ?>brand" class="btn btn-tosca btn-lg"> <i class="fas fa-search"></i> Lihat lebih
                banyak Brand</a>
        </div>
    </div>
</div>

