<!-- Footer -->
<footer>
   <div class="container py-5">
        <div class="row">
            <div class="col-md-4 mb-5">
                <h4>Logo</h4>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <br>
                <img src="<?= base_url() ?>assets/user/images/logos.png" class="img-fluid">
            </div>
            <div class="col-md-4 mb-5">
                <h4>FAQ <small> ( Frequently Asked Question ) </small></h4>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <br>
                <div class="accordion text-dark"  id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-dark  btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="font-size:14px;">
                        Bagaimana cara melakukan pembayaran ?  
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body" style="font-size:12px;">
                        Pembayaran dapat dilakukan dengan cara pergi kehalaman <a href="https://wagimansupply.com/member">Profile</a> kalian <i class="fas fa-angle-double-right"></i> scroll ke bawah <i class="fas fa-angle-double-right"></i> lalu ada tabel <b>Data Invoice Transaksi</b> <i class="fas fa-angle-double-right"></i> kemudian upload bukti transaksi dengan cara menekan tombol  <i class="fas fa-upload"></i>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-dark text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-size:14px;">
                        Bagaimana cara melakukan pembelian produk ? 
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body" style="font-size:12px;">
                        Pastikan  <a href="https://wagimansupply.com/member">Profile</a> sudah lengkap <i class="fas fa-angle-double-right"></i> pergi kehalaman <a href="https://wagimansupply.com/ecommerce">Online Shop</a> <i class="fas fa-angle-double-right"></i> klik tombol <small type="button" class="badge badge-primary"> <i class="fas fa-shopping-bag"></i> Tambah ke keranjang</small> <i class="fas fa-angle-double-right"></i>  Pergi kehalaman <a href="https://wagimansupply.com/cart"> <i class="fas fa-shopping-cart"></i> Cart</a>  <i class="fas fa-angle-double-right"></i>  Klik Tombol Hijau <small class="badge badge-success">Pembayaran</small>  <i class="fas fa-angle-double-right"></i>  Lengkapi Form Pembayaran  <i class="fas fa-angle-double-right"></i>  klik tombol selesai <i class="fas fa-angle-double-right"></i>  Klik tombol <small class="badge badge-primary">pergi ke halaman invoice</small> untuk lakukan pembayaran
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-dark btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="font-size:14px;">
                        Mengapa pesanan saya belum diproses ?
                        </button>
                    </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body p-0" style="font-size:12px;">
                        <ol type="1">
                            <li>Pastikan anda sudah mengupload bukti pembayaran dengan gambar yang jelas</li> 
                            <li>Sudah bayar tapi belum diproses ?, silahkan tunggu sampai kami menyetujui bukti pembayarannya atau dapat langsung menghubungi call center kami</li>                       
                        </ol>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <h4>Office</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                        <p> <i class="fas fa-fw fa-phone"></i> +<?= $about->phone; ?></p>
                        <p> <i class="fas fa-fw fa-envelope-open"></i> <?= $about->email; ?></p>
                        <p class="text-lowercase"> <i class="fas fa-fw fa-map-marked-alt"></i> <?= $about->address; ?></p>
                    </div>
                    <div class="col-md-12 mb-5">
                        <h4>Social Media</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                        <?php foreach($social_media as $social) : ?>
                            <a href="<?= $social->url; ?>" class="text-white d-inline ml-2" target="_blank">
                                <?= $social->icon . " " . $social->title; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-12 mb-5">
                        <h4>Credits</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                        <div>
                            <a href="https://www.freepik.com/" class="text-white ml-2" target="_blank">Freepik</a>
                            <a href="https://www.flaticon.com/" class="text-white" target="_blank">Flaticon</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                © <?= $about->web_name; ?> 2020 
                <?php if(date("Y", $about->created_date) > 2020) : ?>
                    - <?= date("Y", time()); ?> .
                <?php endif; ?>
                 All rights reserved - Love from 
                 
                 <?php $kota =  $this->db->get("city")->result(); ?>
                 <?php foreach ($kota as $k ) : ?>
                    <?php if($k->city_id == $about->city) : ?>
                        <?= $k->type . " " . $k->city_name; ?> 
                    <?php endif; ?>
                 <?php endforeach; ?>
                 
                 <i class="fa fa-heart"></i>
            </div>
        </div>
   </div>
</footer>





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Lightbox -->
<script src="<?= base_url(); ?>assets/admin/js/lightbox.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/admin/js/demo/datatables-demo.js"></script>

<script src="<?= base_url(); ?>assets/user/js/zoom-master/jquery.zoom.js"></script>

<!-- owl Carausel -->
<script src="<?= base_url(); ?>assets/user/js/owl/owl.carousel.min.js"></script>

<!-- Disqus -->
<script id="dsq-count-scr" src="//wagimansupply.disqus.com/count.js" async></script>

<script>
// Zoom Image
$(document).ready(function() {
    $('.image-zoom')
        .wrap('<span style="display:inline-block"></span>')
        .css('display', 'block')
        .parent()
        .zoom({
            url: $(this).find('img').attr('data-zoom')
        });


    // Galeri Image
    $(".thumbnail a").click(function(evt) {
        evt.preventDefault();
        $(".gallery").empty().append(
            $("<img>", {
                src: this.href,
                class: 'img-thumbnail image-zoom'
            })
        );
    });



// Owl Carausel ( slider )
    $(".owl-carousel").owlCarousel();



    $('#dataTable').DataTable();






// LightBOX
lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true
})




    $('#updateUploadImagePayment').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type: 'post',
            url: '<?= base_url(); ?>getIdByAjaxImagePayment',
            data: 'id=' + id,
            success: function(data) {
                var invoice = JSON.parse(data);
                // console.log(invoice);

                $('.fetched-data').html(
                    `
                          <a href="<?= base_url("assets/user/images/payment/"); ?>${invoice.image_payment}" rel="lightbox" title="Bukti Transaksi" style="width:200%; height:100%;">
                            <img src="<?= base_url("assets/user/images/payment/"); ?>${invoice.image_payment}" class="w-25" >
                          </a>

                          <form action="<?=  base_url(); ?>update_image_payment/${invoice.id}" enctype="multipart/form-data" method="POST">
                            <input type="text" hidden name="invoice_id"  value="${invoice.id}">
                            <div class="form-group">
                                <label for="image_payment">Update Foto Bukti Pembayaran</label>
                                <input type="file" name="image" id="image_payment">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm btn-block">Upload</button>
                        </form>
             
                        `
                );
            }
        });
    });



// Search By Category

    $("#search_by_category").change(function() {

        fetch("<?= base_url('search_by_category/'); ?>" + this.value, {
                method: "GET",
            })
            .then((response) => response.text())
            .then((data) => {
                document.getElementById("search_by_body").innerHTML = data;
            })
    })


// Seach By Brand

    $("#search_by_brand").change(function() {

        fetch("<?= base_url('search_by_brand/'); ?>" + this.value, {
                method: "GET",
            })
            .then((response) => response.text())
            .then((data) => {
                document.getElementById("search_by_body").innerHTML = data;
            })
    })




// Cek Form File Member Upload Foto Profile
$("#file").change(function() {
    var ukuran = 0;
    var inputFile = document.getElementById('file');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;

    if (!ekstensiOk.exec(pathFile)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Silakan upload file yang memiliki ekstensi .jpeg/.jpg/.png!',
        })
        inputFile.value = '';
        return false;
    } else if (this.files[0].size > 2000000) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'File Terlalu besar, tidak boleh lebih dari 2MB',
        })
        inputFile.value = '';
        return false;
    } else {
        Swal.fire(
            'Good job!',
            '',
            'success'
        )
        // Preview gambar
        if (inputFile.files && inputFile.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').innerHTML = '<img src="' + e.target.result +
                    '" style="height:200px"/>';
            };
            reader.readAsDataURL(inputFile.files[0]);
        }
    }
})




$("#phone").change(function() {
    let phoneInput = document.getElementById('phone')
    let phone = phoneInput.value;
    if (phone[0] == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Awali nomor telepon dengan 62 bukan 0 !',
        })
        phoneInput.value = '';
        return false;
    } else if (parseInt(phone[0]) != 6 || parseInt(phone[1]) != 2 || parseInt(phone[2]) != 8) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Nomor Telepon yang anda masukkan tidak valid !, harus 628*** ',
        })
        phoneInput.value = '';
        return false;
    } else {
        Swal.fire(
            'Good job!',
            '',
            'success'
        )
    }

})






})


    function showHide() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showHideRegisterPassword() {
        var x = document.getElementById("password1");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showHideRegisterPasswordConfirm() {
        var x = document.getElementById("password2");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }


    



</script>
</body>

</html>