
<div class="container  brands">
    <div class="row">
        <div class="col-md-12  text-center">
            <h2 class="display-4"><span class="text-tosca">Brands</span><b></b> </h2> 
          
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form  method="get"  action="">
                <div class="input-group my-3">
                    <input type="text" class="form-control" placeholder="search your favorite brand" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-tosca" type="submit" ><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Data -->
    <div class="row my-5">
        <?php if($this->session->flashdata('brand')) : ?>
           <div class="col-md-12">
                <?= $this->session->flashdata('brand'); ?>
           </div>
        <?php endif; ?>

        <!-- Looping Post -->
        <?php if(empty($list_brand)) : ?>
            <div class="col-md-12 text-center my-5">
                <h1>Data Tidak ditemukan</h1>
            </div>
        <?php else : ?>
            <?php foreach ($list_brand as $brand) : ?>
            <div class="col-md-4 d-flex overflow-wrap-brand align-items-center jusify-content-center">
                <a href="<?= base_url(); ?>brand_preview/<?= $brand->id; ?>" class="mx-auto">
                    <div>
                        <img src="<?= base_url(); ?>assets/admin/img/brand/<?= $brand->image; ?>" class="card-img text-center  img-responsive p-3 " alt="<?= $brand->name;  ?>">
                        <div class="overflow-text-brand  align-items-center d-flex justify-content-center"><img src="<?= base_url(); ?>assets/user/images/vision.png" class="img-fluid w-25" alt=""></div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>


    <div class="row">
        <div class="col-md-12">
            <!--Tampilkan pagination-->
            <?= $pagination; ?>
        </div>
    </div>
 
</div>