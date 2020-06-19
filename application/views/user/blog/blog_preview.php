<div class="container blog my-5">
    <div class="row">
        <div class="col-md-8 col-sm-12 mx-auto">

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center text-dark">
                        <h1 class="display-4"><?= $blog_detail->title; ?></h1>
                        <small class="text-muted">
                            <i class="fas fa-user-tag"></i> <?= $blog_detail->category_name; ?>
                            &nbsp;
                            <i class="fas fa-user-circle"></i> <?= $blog_detail->fullname; ?>
                            &nbsp;

                            <i class="fas fa-clock"></i> Created : <?= date("d M Y", $blog_detail->blog_created); ?>
                            &nbsp;


                            <i class="fas fa-calendar-check"></i> Updated :
                            <?php if($blog_detail->blog_updated) :  ?>
                            <?= date("d M Y", $blog_detail->blog_updated); ?>
                            <?php else : ?>
                            No Updated
                            <?php endif; ?>
                        </small>

                        <hr>
                        <a href="<?= base_url(); ?>assets/admin/img/blog/<?= $blog_detail->blog_image; ?>"
                            rel="lightbox" title="blog <?= $blog_detail->title;  ?>">
                            <img src="<?= base_url(); ?>assets/admin/img/blog/<?= $blog_detail->blog_image; ?>"
                                alt="<?= $blog_detail->blog_image; ?>" class="img-fluid img-thumbnail"
                                style="width:100%;  max-height:500px; max-width:100%">
                        </a>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="my-5 text-dark">
                <div class="row">
                    <div class="col-md-12 text-break" style="color: rgba(41, 41, 41, 1)">
                        <?= $blog_detail->body; ?>
                    </div>
                </div>
            </div>


            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h6 class="text-bold">Kolom Komentar</h6>
                    <p class="text-primary">*Harap memberi Komentar dengan sopan</p>
                    <hr>
                    <div id="disqus_thread"></div>
                    <script>
                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document,
                            s = d.createElement('script');
                        s.src = 'https://wagimansupply.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                            powered by Disqus.</a></noscript>


                </div>
            </div>
        </div>

    </div>

    <!-- Product Terkait -->
    <div class="row mt-5">
        <div class="col-md-12  text-left">
            <h2 class="lora"><span class="text-tosca">Artikel Blog terkait</h2>
            <p class="lead">Artikel bermanfaat dari wagiman supply</p>
            <hr>
        </div>
    </div>


    <!-- Product Terkait dengan kategory -->
    <div class="row d-flex justify-content-center">

        <!-- Looping Post -->
        <?php if(empty($list_blog)) : ?>
        <div class="col-md-12 text-center my-5">
            <h1>Data Tidak ditemukan</h1>
        </div>
        <?php else : ?>
        <?php foreach ($list_blog as $blog) : ?>
        <?php if($blog_detail->category_id  == $blog->category_id) :?>
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
                                        <?php foreach ($list_category as $category) : ?>
                                        <?php if($blog->category_id == $category->id) :?>
                                        <i class="fa fa-user-tag"></i>
                                        <span <?= $category->id; ?>">
                                            <?= $category->name; ?> </span>
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
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>


</div>

</div>