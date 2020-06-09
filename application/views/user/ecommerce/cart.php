<div class="container my-5 card-produk">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Keranjang Belanja</h1>
            <p>Belanja mudah dan aman hanya di wagiman supply <span class="text-tosca">Online Shop</span></p>
            <hr>
        </div>
    </div>

    <div class="row cart my-5">
    <?php if($this->cart->contents()) : ?>
    <div class="col-md-8">
            <!-- Detail Produk Looping -->
            <?php foreach ($this->cart->contents() as $item) : ?>
            <div class="card mb-4">
                <div class="card-body d-flex">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url("assets/admin/img/ecommerce/") . $item['image']; ?>" class="img-fluid img-thumbnail" width="200px" height="200px">
                        </div>
                        <div class="col-md-8 mt-3">
                            <div class="ml-3">
                                <h6 class="text-nama-produk"><?= $item['name']; ?></h6>
                                <small class="text-muted">Rp<?= number_format($item['price'],0,",","."); ?></small>
                                <small class="text-muted d-block">
                                Jumlah  : 
                                <?= $item['qty']; ?>
                                </small>
                                <small class="text-harga d-block">
                                Subtotal  : 
                                Rp<?=  number_format($item['subtotal'],0,",","."); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Detail Produk Looping -->
            <?php  endforeach; ?>
        </div>


        <!-- CheckOut -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h6>Ringkasan Belanja</h6>
                    <hr>
                    <p class="text-muted">Total Harga <span class="float-right text-dark font-weight-bolder">Rp<?=  number_format($this->cart->total(),0,",","."); ?></span></p>

                    <?php $cart = $this->cart->total_items();  ?>
                    <a href="<?= base_url(); ?>ecommerce_checkout" class="btn btn-success btn-block btn-lg cart" data-toggle="tooltip" data-placement="left" title="Pergi ke halaman pembayaran untuk proses selanjutnya">Pembayaran (<?= $cart; ?>)</a>
                    <hr> <br>

                    <a href="<?= base_url(); ?>ecommerce" class="btn btn-block btn-sm btn-info cart" data-toggle="tooltip" data-placement="left" title="Lanjutkan belanja untuk menambahkan product lagi ke keranjang">Lanjutkan belanja</a>
                   
                    <a href="<?= base_url(); ?>ecommerce_delete_product_checkout" class="btn btn-block btn-sm btn-danger cart" data-toggle="tooltip" data-placement="left" title="Hapus Semua Product yang tersimpan dalam keranjang">Hapus Semua Product</a>

                </div>
            </div>
        </div>

        <?php  else : ?>
            <div class="text-center">
                <img src="<?= base_url(); ?>assets/user/images/checkout_empty.jpg" class="img-fluid w-50"> 
                <a href="<?= base_url(); ?>ecommerce" class="btn  btn-sm btn-info cart" data-toggle="tooltip" data-placement="left" title="Belanja dan tambahkan ke keranjang terlebih dulu sebelum memeriksa halaman cart">Belanja Sekarang yuk</a>
            </div>
        <?php endif;  ?>

    </div>
</div>
