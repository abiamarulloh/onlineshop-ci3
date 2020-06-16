<!-- Footer -->
<footer>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-6 mb-5">
                <img src="<?= base_url() ?>assets/user/images/logos.png" class="img-fluid">
            </div>
            <div class="col-md-6 d-flex align-items-center info-footer">
                <div>
                    <p><i class="fa fa-phone"></i> +<?= $about->phone; ?></p>
                    <p><i class="fa fa-envelope"></i> <?= $about->email; ?> </p>
                    <p class="text-lowercase"><i class="fa fa-map-pin"></i> <?= $about->address; ?> </p>
                    <p hidden>
                    <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/703735/t/6"></script>
                    </p>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6 mb-5">
                © <?= $about->web_name; ?> 2020 
                <?php if(date("Y", $about->created_date) > 2020) : ?>
                    - <?= date("Y", time()); ?> .
                <?php endif; ?>
                 All rights reserved - Love from Tangerang <i class="fa fa-heart"></i>
            </div>
            <div class="col-md-6">
                <?php foreach($social_media as $social) : ?>
                    <a href="<?= $social->url; ?>" class="text-white d-inline ml-2" target="_blank">
                        <?= $social->icon . " " . $social->title; ?>
                    </a>
                <?php endforeach; ?>
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



</script>
</body>

</html>