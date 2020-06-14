<?= $this->session->flashdata("success_checkout");  ?>
<div class="container card-product my-5">
    <div class="row">
        <div class="col-md-6 text-center mx-auto my-5">
            <img src="<?= base_url(); ?>assets/user/images/success_checkout.jpg" class="img-fluid w-50"> 
            <h6>Selamat, <br> Pesanan anda akan segera diproses</h6>
            <a href="<?= base_url(); ?>member" class="btn btn-outline-primary  border">Pergi ke halaman invoice</a>
        </div>
    </div>
</div>