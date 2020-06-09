<div class="container my-5 blog">
    <div class="row">
        <div class="col-md-12 justify-content-center d-flex">
            <form class="form-inline" method="post" action="">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="search" class="sr-only">Cari</label>
                    <input type="text" name="keyword" class="form-control" id="search" placeholder="Search Post">
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
        <a href="<?= base_url(); ?>blog_preview/<?= $blog->id; ?>" class="text-decoration-none text-muted">
            <div class="col-md-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="card-header">
                                <img src="<?= base_url(); ?>assets/admin/img/blog/<?= $blog->image; ?>" class="card-img" alt="<?= $blog->image; ?>" style="max-height:150px;">
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
                                        <?php foreach ($list_category as $category) : ?>
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
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?= $pagination; ?>
        </div>
    </div>
</div>