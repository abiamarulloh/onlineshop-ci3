<div class="container">
    <div class="row">
        <div class="col-md-12 justify-content-center d-flex">
            <form class="form-inline" method="post" action="">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="search" class="sr-only">Cari</label>
                    <input type="text" class="form-control" name="keyword"  id="search" placeholder="Search Post">
                </div>
                <button type="submit" class="btn btn-primary mb-2"> <i class="fa fa-search"></i> Search</button>
            </form>
        </div>
    </div>

    <!-- Data -->
    <div class="row my-5">
        <?php if($this->session->flashdata('product')) : ?>
           <div class="col-md-12">
                <?= $this->session->flashdata('product'); ?>
           </div>
        <?php endif; ?>

        <!-- Looping Post -->
        <?php if(empty($list_product)) : ?>
            <div class="col-md-12 text-center my-5">
                <h1>Data Tidak ditemukan</h1>
            </div>
        <?php else : ?>
            <?php foreach ($list_product as $product) : ?>
            <div class="col-md-3 my-2 mx-auto text-center">
                <div class="card border-0">
                    <div class="card-header bg-white">
                        <img src="<?= base_url(); ?>assets/admin/img/ecommerce/<?= $product->product_image; ?>" style="height:200px; width:200px;" class=" card-img-top img-fluid p-2 ">
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <p class="card-text m-0"><?= $product->product_name; ?></p>
                            <small class="badge badge-pill badge-success m-0">Rp<?= number_format($product->price); ?></small>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url(); ?>ecommerce_preview/<?= $product->product_id; ?>" class="btn btn-primary btn-sm  "> <i class="fas fa-eye"></i> </a>
                            <a href="<?= base_url(); ?>ecommerce_product_edit/<?= $product->product_id; ?>" class="btn btn-warning btn-sm  "><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url(); ?>ecommerce_product_image_multiple/<?= $product->product_id; ?>" class="btn btn-info btn-sm "><i class="fas fa-image"></i></a>
                            <a href="<?= base_url(); ?>ecommerce_product_delete/<?= $product->product_id; ?>" class="btn btn-danger btn-sm  " onclick="return confirm('yakin ingin menghapus data product <?= $product->name; ?> ?')"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                       
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?= $pagination; ?>
        </div>
    </div>
</div>