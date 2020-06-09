<div class="container blog my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card  border-0">
                    <div class="card-body">
                    <div class="card-text text-center">
                        <h5><?= $blog_detail->title; ?></h5>
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
                        <a href="<?= base_url(); ?>assets/admin/img/blog/<?= $blog_detail->blog_image; ?>" rel="lightbox" title="blog <?= $blog_detail->title;  ?>">
                            <img src="<?= base_url(); ?>assets/admin/img/blog/<?= $blog_detail->blog_image; ?>" alt="<?= $blog_detail->blog_image; ?>" class="img-fluid img-thumbnail" style="width:100%;  max-height:500px; max-width:100%"> 
                        </a>
                    </div>
                    <hr>

                    <div class="my-5"><?= $blog_detail->body; ?></div>


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
                            var d = document, s = d.createElement('script');
                            s.src = 'https://wagimansupply.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                            })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>