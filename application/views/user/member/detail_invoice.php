<div class="container my-5 auth">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="<?= base_url(); ?>member" class="btn btn-outline-primary"><i class="fas fa-angle-double-left"></i> Kembali</a>

                    <button class="btn btn-primary">ID INVOICE <small
                            class="badge badge-light"><?= $id_invoice; ?></small></button>
                    
                    
                    <a href="<?= base_url(); ?>invoice_download_pdf/<?= $id_invoice; ?>" 
                        class="btn btn-outline-info"><i class="fas fa-download"></i>Unduh</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Pemilik Toko -->
                        <div class="col-md-6">
                            <!-- Web Name -->
                            <h6>
                                <i class="fas fa-fw fa-building"></i> <?= $admin->web_name; ?>
                            </h6>
                            <!-- CEO -->
                            <h6 class="m-0">
                                <i class="fas fa-fw fa-user"></i> <?= $admin->ceo; ?>
                            </h6>

                            <p class="m-0">
                                <!-- Phone -->
                                <a href="https://wa.me/<?= $admin->phone; ?>" class="d-block">
                                    <i class="fab fa-fw fa-whatsapp"></i> <?= $admin->phone; ?>
                                </a>

                                <!-- Email -->
                                <a href="mailto:<?= $admin->email; ?>" class="d-block">
                                    <i class="fas fa-fw fa-envelope-open"></i> <?= $admin->email; ?>
                                </a>

                                <!-- Address -->
                                <small class="text-lowercase">
                                    <i class="fas fa-fw fa-map"></i>
                                    <?= $admin->address ?>
                                </small>

                            </p>
                            <hr>
                            <?php foreach ($bank_payment as $bank) :?>
                            <h6> <i class="fas fa-fw fa-money-check-alt"></i>
                                <?= $bank->bank_name . " <br> " . $bank->on_behalf_of_the . " - " . $bank->account_number; ?>
                            </h6>
                            <?php endforeach; ?>

                        </div>



                        <!-- Pembeli -->
                        <div class="col-md-6 my-4">
                            <hr class="d-sm d-md-none">
                            <!-- Fullname -->
                            <h6 class="m-0">
                                <i class="fas fa-fw fa-user"></i> <?= $list_invoice_by_id->fullname; ?>
                            </h6>

                            <p class="m-0">
                                <!-- Phone -->
                                <a href="https://wa.me/<?= $list_invoice_by_id->phone; ?>" class="d-block">
                                    <i class="fab fa-fw fa-whatsapp"></i> <?= $list_invoice_by_id->phone; ?>
                                </a>

                                <!-- Email -->
                                <a href="mailto:<?= $list_invoice_by_id->email; ?>" class="d-block">
                                    <i class="fas fa-fw fa-envelope-open"></i> <?= $list_invoice_by_id->email; ?>
                                </a>

                                <!-- Address -->
                                <small class="text-lowercase">
                                    <i class="fas fa-fw fa-map"></i>
                                    <?= $list_invoice_by_id->address ?>
                                </small>
                            </p>

                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h2> <i class="fas fa-shopping-cart"></i> Detail Pembelian</h2>
                        </div>
                    </div>

                    <?php $total = 0; ?>
                    <?php foreach($orders_by_invoice as $order) : ?>
                    <?php 
                            $subtotal = $order->grand_qty * $order->grand_price; 
                            $total += $subtotal; 
                        ?>
                    <div class="row my-5">
                        <div class="col-md-3">
                            <img src="<?= base_url("assets/admin/img/ecommerce/") . $order->product_image; ?>"
                                class="img-fluid img-thumbnail img-responsive" width="200px;"
                                alt="<?= $order->product_image; ?>">
                        </div>
                        <div class="col-md-4 my-2 text-dark font-weight-bold">
                            <p>
                                Name : <?= $order->product_name; ?> <br>
                                Brand : <?= $order->brand_name; ?> <br>
                                Category : <?= $order->category_name; ?> <br>
                                Jumlah : <?= $order->grand_qty; ?> <br>
                                Harga Satuan : Rp<?= number_format( $order->grand_price,0,",","."); ?> <br>
                                <span class="bg-success text-white p-1">
                                    Subtotal : Rp<?= number_format( $subtotal,0,",","."); ?>
                                </span>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>


                    <!-- Detail Harga Total beserta Ongkir -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5>
                                        Harga Pembelian Product : Rp<?= number_format( $total,0,",","."); ?>
                                    </h5>
                                 
                                    <P>
                                        <span> Harga Ongkos Kirim :</span>
                                        <div class="card">
                                            <div class="card-body text-dark">
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <span class="font-weight-bold">Dari : <br></span>
                                                        <?php foreach($invoice_rajaongkir->rajaongkir->origin_details as $key => $origin) : ?>
                                                        <?php if($key == "province") : ?>
                                                        <?= $origin; ?> <br>
                                                        <?php elseif($key == "type") : ?>
                                                        <?= $origin; ?>
                                                        <?php elseif($key == "city_name"): ?>
                                                        <?= $origin; ?>
                                                        <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="font-weight-bold">Menuju : <br></span>
                                                        <?php foreach($invoice_rajaongkir->rajaongkir->destination_details as $key => $destination) : ?>
                                                        <?php if($key == "province") : ?>
                                                        <?= $destination; ?> <br>
                                                        <?php elseif($key == "type") : ?>
                                                        <?= $destination; ?>
                                                        <?php elseif($key == "city_name"): ?>
                                                        <?= $destination; ?>
                                                        <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>

                                                <div class="row my-2 font-weight-bold">
                                                    <div class="col-md-12">

                                                        <?php $total_ongkir = 0; ?>
                                                        <?php foreach($invoice_rajaongkir->rajaongkir->results as $rajaongkir)  : ?>
                                                        <!-- Cek Jika jne == jne -->
                                                        <?php
                                                        if($rajaongkir->code == $invoice_sub_ekspedisi->ekspedisi){

                                                            foreach($rajaongkir->costs as $costs) {
                                                                // Jika OKE == OKE
                                                                if($costs->service == $invoice_sub_ekspedisi->sub_ekspedisi) {
                                                                    ?>

                                                        <p class="text-uppercase">
                                                            <?= $invoice_sub_ekspedisi->ekspedisi . " - " . $costs->service; ?>
                                                        </p>
                                                        <?php foreach($costs->cost as $cost) : ?>

                                                        <p> <?php $total_ongkir += $cost->value; ?> 
                                                        Rp<?= number_format( $cost->value,0,",","."); ?></p>

                                                        <?php endforeach; ?>

                                                        <?php }
                                                            
                                                            }

                                                         
                                                        }
                                                   ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </P>

                                    <hr class="bg-white">
                                    <div class="card-footer bg-primary">
                                        <p class="text-white ">Total Harga yang harus dibayarkan :
                                            Rp<?= number_format($total + $total_ongkir,0,",","."); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>