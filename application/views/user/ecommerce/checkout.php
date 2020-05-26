<div class="container card-produk my-5">

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="btn btn-lg btn-block btn-success">
                <?php 
                    $grand_total = 0;
                    if($cart = $this->cart->contents()) {

                        // Looping
                        foreach($cart as $item) {
                            $grand_total += $item['subtotal'];
                        }

                        echo "Total belanja anda " . "Rp" . number_format($grand_total, 0, ",", "."); 

                    }
                ?>
            </div> <br><br>

            <h3>Proses Pengiriman dan Pembayaran</h3>
            <hr>
            <form action="" method="post">
                <div class="form-group">
                  <label for="fullname">Nama Lengkap</label>
                  <input type="text" class="form-control <?php if(form_error('fullname')) {echo "is-invalid";} ?>" name="fullname" id="fullname"  placeholder="Nama Lengkap">
                    <?php if(form_error('fullname')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("fullname"); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                  <label for="address">Alamat Tujuan Pengiriman</label>
                  <input type="text" class="form-control <?php if(form_error('address')) {echo "is-invalid";} ?>" name="address" id="address"  placeholder="Alamat Tujuan Pengiriman">
                  <?php if(form_error('address')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("address"); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                  <label for="phone">No Telepon</label>
                  <input type="text" class="form-control  <?php if(form_error('phone')) {echo "is-invalid";} ?>" name="phone" id="phone"  placeholder="No Telepon">
                  <?php if(form_error('phone')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("phone"); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                  <label for="kurir">Jasa Pengiriman</label>
                  <select multiple class="form-control" name="kurir" id="kurir">
                    <option>JNE</option>
                    <option>JNT</option>
                    <option>NINJA EXPRESS</option>
                    <option>POS INDONESIA</option>
                    <option>GOJEK</option>
                    <option>GRAB</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="bank_payment_method">BANK</label>
                  <select multiple class="form-control" name="bank_payment_method" id="bank_payment_method" >
                    <option>BRI</option>
                    <option>BNI</option>
                    <option>MANDIRI</option>
                  </select>
                </div>
                    
                <button type="submit" class="btn btn-sm btn-primary btn-block">Submit</button>

            </form>
        </div>
    </div>
</div>