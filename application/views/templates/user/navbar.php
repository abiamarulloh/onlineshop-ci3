<!-- Navbar -->
<nav class="navbar navbar-expand-lg  fixed-top navbar-light shadow-sm navbar-custom" style="background-color:#00cec9; border-bottom:6px solid #81ecec;">
    <div class="container">
        <a class="navbar-brand text-white text-bolder" href="#">
            Wagiman Supply
        <a/>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav  mx-auto">
                <li class="nav-item navbar-custome ml-2  text-center">
                    <a class="nav-link text-white" href="<?= base_url("home"); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item navbar-custome ml-2 text-center">
                    <a class="nav-link text-white" href="<?= base_url("ecommerce"); ?>">Online Shop</a>
                </li>
                <li class="nav-item navbar-custome ml-2 text-center">
                    <a class="nav-link text-white" href="<?= base_url("stock"); ?>">Stock</a>
                </li>
                <li class="nav-item navbar-custome ml-2 text-center">
                    <a class="nav-link text-white" href="<?= base_url("restorasi.vespa"); ?>">Restorasi Vespa </a>
                </li>
                <li class="nav-item navbar-custome ml-2 text-center">
                    <a class="nav-link text-white" href="<?= base_url("blog"); ?>">Blog</a>
                </li>
                <li class="nav-item navbar-custome ml-2 text-center">
                    <a class="nav-link text-white" href="<?= base_url("brand"); ?>">Brand</a>
                </li>
                <li class="nav-item navbar-custome ml-2 text-center">
                    <a class="nav-link text-white" href="<?= base_url("about"); ?>">About</a>
                </li>
            </ul>
            <div class="ml-auto text-center">
                <?php $cart = $this->cart->total_items();  ?>
                <a href="<?= base_url("cart"); ?>" class="nav-link text-white d-inline" data-toggle="tooltip" title="Keranjang Belanjaan"> 
                    <i class="fa fa-shopping-cart fa-2x"></i> <span class="badge badge-light"><?= $cart; ?></span>
                    <span class="d-sm-block d-md-none">Cart</span>
                </a>
        
                <a href="<?= base_url("login"); ?>" class="nav-link nav-card-account d-inline text-white" data-toggle="tooltip" title="Akun"> 
                    <i class="fa fa-user-circle fa-2x"></i>
                    <span class="d-sm-block d-md-none">
                        Akun
                    </span>
                </a>
             
            </div>
        </div>

    </div>
  </nav>

