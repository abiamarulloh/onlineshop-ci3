<!-- Navbar -->
<nav class="navbar navbar-expand-lg  fixed-top navbar-light shadow-sm navbar-custom" style="background-color:#00cec9;">
    <div class="container">
        
        <a class="d-sm-non navbar-brand font-weight-bolder shadow-sm bg-white p-2  rounded text-tosca" href="<?= base_url(); ?>" style="color: #00cec9">
        Wagiman Supply
        <a/>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" title="Klik untuk berpindah menu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav  mx-auto  pt-2 pb-2">
                    <?php if($title == "Home") : ?>
                    <li class="nav-item bg-dark navbar-custome ml-2  text-center rounded">
                        <?php else  : ?>
                    <li class="nav-item  navbar-custome ml-2  text-center">
                        <?php endif; ?>
                        <a class="nav-link text-white" href="<?= base_url("home"); ?>"><i class="fas fa-home"></i> Home
                            <span class="sr-only">(current)</span></a>
                    </li>

                    <?php if($title == "Online Shop") : ?>
                    <li class="nav-item bg-dark navbar-custome ml-2  text-center rounded">
                        <?php else  : ?>
                    <li class="nav-item  navbar-custome ml-2  text-center">
                        <?php endif; ?>
                        <a class="nav-link text-white" href="<?= base_url("ecommerce"); ?>"><i class="fa fa-store"></i>
                            Online Shop</a>
                    </li>


                    <?php if($title == "Restorasi") : ?>
                    <li class="nav-item bg-dark navbar-custome ml-2  text-center rounded">
                        <?php else  : ?>
                    <li class="nav-item  navbar-custome ml-2  text-center">
                        <?php endif; ?>
                        <a class="nav-link text-white" href="<?= base_url("restorasi.vespa"); ?>"> <i
                                class="fas fa-motorcycle"></i> Restorasi </a>
                    </li>

                    <?php if($title == "Blog") : ?>
                    <li class="nav-item bg-dark navbar-custome ml-2  text-center rounded">
                        <?php else  : ?>
                    <li class="nav-item  navbar-custome ml-2  text-center">
                        <?php endif; ?>
                        <a class="nav-link text-white" href="<?= base_url("blog"); ?>"><i class="fab fa-blogger"></i>
                            Blog</a>
                    </li>

                    <?php if($title == "Brand") : ?>
                    <li class="nav-item bg-dark navbar-custome ml-2  text-center rounded">
                        <?php else  : ?>
                    <li class="nav-item  navbar-custome ml-2  text-center">
                        <?php endif; ?>
                        <a class="nav-link text-white" href="<?= base_url("brand"); ?>"> <i class="fas fa-random"></i>
                            Brand</a>
                    </li>

                    <?php if($title == "About") : ?>
                    <li class="nav-item bg-dark navbar-custome ml-2  text-center rounded">
                        <?php else  : ?>
                    <li class="nav-item  navbar-custome ml-2  text-center">
                        <?php endif; ?>
                        <a class="nav-link text-white" href="<?= base_url("about"); ?>"> <i
                                class="fas fa-address-card"></i> About</a>
                    </li>
                </ul>
                <div class="ml-auto text-center">
                    <?php $cart = $this->cart->total_items();  ?>
                    <a href="<?= base_url("cart"); ?>" class="nav-link    text-white d-inline"
                        data-toggle="tooltip" title="Keranjang Belanjaan">
                        <i class="fa fa-shopping-cart fa-2x"></i> <span
                            class="badge badge-light"><?= $cart; ?></span>
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