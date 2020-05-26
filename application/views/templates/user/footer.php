
  <!-- Footer -->
<footer>
  <div class="container p-5">
    <div class="row">
      <div class="col-md-6 mb-5">
        <img src="<?= base_url() ?>assets/user/images/logos.png" class="img-fluid">
      </div>
      <div class="col-md-6 d-flex align-items-center info-footer">
        <div>
          <p><i class="fa fa-phone"></i> +62 83159313115</p>
          <p><i class="fa fa-envelope"></i> abiamarulloh06@gmail.com </p>
          <p>
          <i class="fa fa-map-pin"></i>
          Poris Gaga, RT 003/RW 02, No. 50, Kelurahan Poris Gaga Kecamatan Batuceper, Kota Tangerang, Banten 15122
          </p>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-6 ">
         © 2020 Inoda • All rights reserved • Love from Tangerang <i class="fa fa-heart"></i>
      </div>
      <div class="col-md-6 social-media-footer d-flex justify-content-end">
        <div>
          <a href="">
            <img src="<?= base_url() ?>assets/user/images/facebook.svg" class="img-fluid" alt="facebook">
          </a>
          <a href="">
            <img src="<?= base_url() ?>assets/user/images/instagram.svg" class="img-fluid" alt="instagram">
          </a>
          <a href="">
            <img src="<?= base_url() ?>assets/user/images/whatsapp.svg" class="img-fluid" alt="facebook">
          </a>
          <a href="">
            <img src="<?= base_url() ?>assets/user/images/line.svg" class="img-fluid" alt="line">
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Lightbox -->
    <script src="<?= base_url(); ?>assets/admin/js/lightbox.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

      <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>assets/user/js/demo/datatables-demo.js"></script>

    <script>
        $('.nav-link').tooltip('enable');
        $('.cart').tooltip('enable');
   
        // LightBOX
        lightbox.option({
          'resizeDuration': 200,
          'wrapAround': true
        })
   
    </script>
  </body>
</html>