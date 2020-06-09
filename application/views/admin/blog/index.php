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
        <?php if($this->session->flashdata('blog')) : ?>
           <div class="col-md-12">
                <?= $this->session->flashdata('blog'); ?>
           </div>
        <?php endif; ?>

        <!-- Looping Post -->
        <?php if(empty($list_blog)) : ?>
            <div class="col-md-12 text-center my-5">
                <h1>Data Tidak ditemukan</h1>
            </div>
        <?php else : ?>
            <?php foreach ($list_blog as $blog) : ?>
            <div class="col-md-3 my-2 mx-auto">
                <div class="card">
            
                    <img src="<?= base_url(); ?>assets/admin/img/blog/<?= $blog->image; ?>" class="card-img-top" alt="<?= $blog->image; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $blog->title;  ?></h5>
                        <p class="card-text">
                            <!-- Tag -->
                            <small class="card-text"> 
                                <i class="fa fa-user-tag"></i> 
                            
                            <!-- Cek apakah blog.category_id sama dengan category.id -->
                            <?php foreach ($list_category as $category) : ?>    
                                <?php if($blog->category_id == $category->id)  :?>
                                    <?= $category->name;  ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </small>
                        </p>

                    
                        <a href="<?= base_url(); ?>blog_preview/<?= $blog->id; ?>" class="btn btn-primary btn-sm m-2"> <i class="fas fa-eye"></i> </a>
                        <a href="<?= base_url(); ?>blog_edit/<?= $blog->id; ?>" class="btn btn-warning btn-sm m-2"> <i class="fas fa-edit"></i> </a>
                        <a href="<?= base_url(); ?>blog_delete/<?= $blog->id; ?>" class="btn btn-danger btn-sm m-2"><i class="fas fa-trash"></i> </a>
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