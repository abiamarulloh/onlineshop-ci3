<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Dashboard</h1>
       
    </div>

    <!-- Content Row -->
    <div class="row">
        
             <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Member</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $member; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Blog</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $blog; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-open fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Product</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-dark"><?= $product; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-bag fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Restorasi</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $restorasi; ?> Paket</div>
                        </div>
                        <div class="col-auto">
                            <img src="<?= base_url("assets/user/images/vespa.svg"); ?>" width="50px">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Brands</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $brands; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-random fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Invoice All</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $invoice; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Content Row -->





    <!-- Invoice -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark"><i class="fas fa-book"></i> Invoice</h1>
    </div>


    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"> Belum bayar </div>
                            <div class="h5 mb-0 font-weight-bold text-dark">
                                <?= $invoice_belum_terkonfirmasi; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fill fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Menunggu Konfirmasi dari
                                admin</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-dark">
                                        <?= $invoice_sudah_terkonfirmasi ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-spinner fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sedang dikemas</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $invoice_sedang_dikemas; ?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dalam Pengiriman
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $invoice_sedang_dikirim; ?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-truck-moving fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Selesai</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $invoice_selesai_sampai; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-people-carry fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-dark">
                                <script type="text/javascript"
                                    src="https://www.freevisitorcounters.com/en/home/counter/703735/t/6"></script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>











</div>
<!-- /.container-fluid -->