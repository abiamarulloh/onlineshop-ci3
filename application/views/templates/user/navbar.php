<!-- <div class="card border-0 fixed-top">
    <div class="card-body alert  alert-dismissible fade show"  role="alert">
        <div class="row">
            <div class="col-md-8">
                <h5 class="card-title text-dark font-weight-bold"> <i class="fas fa-smile-beam"></i> Belanja aman,
                    nyaman dan terpercaya.</h5>
            </div>
            <div class="col-md-4">
                <a href="" class="mr-1">
                    <i class="fab fa-fw fa-facebook-square"></i> Facebook
                </a>
                <a href="" class="mr-1">
                    <i class="fab fa-fw fa-instagram"></i> Instagram
                </a>
                <a href="" class="mr-1">
                    <i class="fab fa-twitter-square"></i> Twitter
                </a>
                <a href="" class="mr-1">
                    <i class="fab fa-line"></i> Line
                </a>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div> -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-light shadow-sm navbar-custom"
    style="background-color:#00cec9;">
    <div class="container">

        <a class="d-sm-non navbar-brand font-weight-bolder shadow-sm bg-white p-2  rounded text-tosca"
            href="<?= base_url(); ?>" style="color: #00cec9">
            Wagiman Supply
            <a />

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" title="Klik untuk berpindah menu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Query Menu -->
            <?php 
                $menu = $this->db->get("menu_member")->result();
               
            ?>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav  mx-auto  pt-2 pb-2">
                    <!-- Looping menu -->
                    <?php foreach($menu as $m) : ?>
                            <?php if($title == $m->title) : ?>
                        <li class="nav-item bg-dark navbar-custome ml-2  text-center rounded">
                            <?php else  : ?>
                        <li class="nav-item  navbar-custome ml-2  text-center">
                            <?php endif; ?>
                            <a class="nav-link text-white" href="<?= base_url($m->url); ?>">

                            <!-- Jika Titlenya Restorasi maka iconnya gambar -->
                            <?php if($m->title == "Restorasi"): ?>
                                <img src="<?= base_url("assets/user/images/") . $m->icon; ?>" alt="<?= $m->icon; ?>" width="25px">
                            <?php endif; ?>
                            
                            <i class="<?= $m->icon; ?>"></i> 
                            <?= $m->title; ?>
                            <span class="sr-only">(current)</span></a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="ml-auto text-center">
                    <?php $cart = $this->cart->total_items();  ?>
                    <a href="<?= base_url("cart"); ?>" class="nav-link    text-white d-inline" data-toggle="tooltip"
                        title="Keranjang Belanjaan">
                        <i class="fa fa-shopping-cart fa-2x"></i> <span class="badge badge-light"><?= $cart; ?></span>
                    </a>

                    <a href="<?= base_url("login"); ?>" class="nav-link nav-card-account d-inline text-white"
                        data-toggle="tooltip" title="Akun">
                        <i class="fa fa-user-circle fa-2x"></i>
                        <span class="d-sm-block d-md-none">
                            Akun
                        </span>
                    </a>
                </div>
            </div>

    </div>
</nav>