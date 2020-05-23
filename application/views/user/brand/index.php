
<div class="container my-5 brands">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Brands</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates, neque!</p>
        </div>
    </div>
</div>
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
        <div class="col-md-4 mx-auto">
        <?php if($this->session->flashdata('search-brand')) : ?>
            <?= $this->session->flashdata('search-brand'); ?>
        <?php endif; ?>
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
            <div class="col-md-4">
                <div class="card mb-3" >
                    <div class="row no-gutters">
                        <div class="col-md-4 align-items-center justify-content-center d-flex">
                            <div>
                                <img src="<?= base_url(); ?>assets/admin/img/brand/<?= $brand->image; ?>" class="card-img text-center img-responsive p-3 " alt="<?= $brand->name;  ?>">
                            </div>
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $brand->name;  ?></h5>
                            <p class="card-text">
                                <small class="text-muted">Created date :  <?= date("d M Y", $brand->created_date);  ?></small> 
                            
                                <?php if($brand->updated_date ) : ?>
                                    <small class="text-muted">updated date :  <?= date("d M Y", $brand->updated_date);  ?></small>
                                <?php endif; ?>
                            </p>
                   
                        </div>
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