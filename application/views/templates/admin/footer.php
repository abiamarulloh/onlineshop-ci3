</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?= $about->web_name; ?> 2020  
                <?php if(date("Y", $about->created_date) > 2020) : ?>
                    - <?= date("Y", time()); ?>
                <?php endif; ?>
            </span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url(); ?>logout">Logout</a>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/admin/vendor/chart.js/Chart.min.js"></script>

<script src="<?= base_url(); ?>assets/admin/js/lightbox.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/admin/js/demo/datatables-demo.js"></script>

<script src="<?= base_url(); ?>assets/user/js/zoom-master/jquery.zoom.js"></script>

<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js'></script>

<script>
<<<<<<< HEAD

=======
>>>>>>> 6241c39ce13ac04e41f35710fa6327cc6042057d
$(document).ready(function() {
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


    // Validasi Form menu
    $("#button-menu").click(function() {
        let title = $("#title")
        let url = $("#url")
        let icon = $("#icon")
        if (!title.val()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lengkapi Nama Menu dulu !',
            })
            return false;
        } else if (!url.val()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lengkapi URL dulu !',
            })
            return false;
        } else if (!icon.val()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lengkapi Icon dulu !',
            })
            return false;
        }
    })


        // Validasi Form Sosmed
        $("#button-sosmed").click(function() {
        let title = $("#title")
        let url = $("#url")
        let icon = $("#icon")
        if (!title.val()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lengkapi Nama sosmed dulu !',
            })
            return false;
        } else if (!url.val()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lengkapi URL dulu !',
            })
            return false;
        } else if (!icon.val()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lengkapi Icon dulu !',
            })
            return false;
        }
    })




    // Jika gambar kosong maka disabled input yang lain "ecommerce"
    $("#file").change(function (){
        let file = $("#file").val()
        if( file ){
            $("#name").removeAttr("disabled")
        }else {
            $("#name").attr("disabled", "disabled")
        }
    })

        // Jika gambar kosong maka disabled input yang lain "Blog"
    $("#file").change(function (){
        let file = $("#file").val()
        if( file ){
            $("#title").removeAttr("disabled")
        }else {
            $("#title").attr("disabled", "disabled")
        }
    })

    // Checked Change Update
    $(".carausel_check_active").click(function() {
    let status = $(this).data("status");
    let carausel_id = $(this).data("id");
    $.ajax({
        url: "<?= base_url("change_active"); ?>",
        type: "POST",
        data: {
            status: status,
            carausel_id: carausel_id
        },
        success: function(data) {
            Swal.fire(
                'Good job!',
                '',
                'success'
            )
            // document.location.href = "<?= base_url("on_change_active"); ?>" 
        }
    })
    })

    // Menampilkan data sesuai menu yang dipilih carausel dengan ajax
    $("#menu_carausel_url").change(function() {
    $.ajax({
        type: 'post',
        url: '<?= base_url(); ?>menu_carausel_url',
        data: {
            "menu_url": $(this).val()
        },
        success: function(data) {
            $("#choose_id").html(data);
            // console.log(data)
        }
    })

    })

    // Input Resi
    $("#name_resi").change(function() {
<<<<<<< HEAD
    let id = $("#resi").data("id");
=======
    let id = $("#resi").data("idresi");
>>>>>>> 6241c39ce13ac04e41f35710fa6327cc6042057d
    let name_resi = $("#name_resi").val();
    $.ajax({
        type: 'post',
        url: '<?= base_url(); ?>invoice_give_resi',
        data: {
            'id': id,
            'name_resi': name_resi
        },
        success: function(data) {
            // var resi = JSON.parse(data);
            // console.log(data);

        }
    })

})



// Preview before uploading image
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#img").change(function() {
    readURL(this);
});


$(document).ready(function() {
    $('#dataTable').DataTable();
});


CKEDITOR.replace('body', {
    height: 300,
    filebrowserUploadUrl: "<?= base_url('ckeditor');?>",
});



// LightBOX
lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true
});

$("#inputFile").change(function(event) {
    fadeInAdd();
    getURL(this);
});

$("#inputFile").on('click', function(event) {
    fadeInAdd();
});



// Menyeting provinsi dan kota website

    $("#province").change(function() {

        fetch("<?= base_url('ecommerce_checkout_city/'); ?>" + this.value, {
                method: "GET",
            })
            .then((response) => response.text())
            .then((data) => {
                document.getElementById("city").innerHTML = data;
            })

    })


// Zoom Image

    $('.image-zoom')
    .wrap('<span style="display:inline-block"></span>')
    .css('display', 'block')
    .parent()
    .zoom({
        url: $(this).find('img').attr('data-zoom')
    });




})



<<<<<<< HEAD
=======
    
  

>>>>>>> 6241c39ce13ac04e41f35710fa6327cc6042057d
    
 

</script>

</body>

</html>