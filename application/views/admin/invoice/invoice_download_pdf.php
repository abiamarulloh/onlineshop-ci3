<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/sb-admin-2.min.css">

    <title><?= $title; ?></title>

</head>

<body>

    <table class="table">
        <thead>
            <tr>
                <td colspan="5">ID INVOICE <small class="badge badge-success"><?= $id_invoice; ?></small> </td>
            </tr>
            <tr>
                <td scope="col" colspan="2">
                    <h6 class="font-weight-bold m-0">Pemilik Toko : </h6>
                    <small class="m-0 d-block"><?= $get_admin->fullname; ?></small>
                    <small class="m-0 d-block"><a href="https://wa.me/<?= $get_admin->phone; ?>"><?= $get_admin->phone; ?></a></small>
                    <small class="m-0 d-block"><?= $get_admin->email; ?></small>
                    <small class="m-0 d-block text-lowercase"><?= $get_admin->address; ?></small>
                </td>
                <td></td>
                <td scope="col" colspan="2">
                    <h6 class="m-0 font-weight-bolder">Tagihan kepada : </h6>
                    <?php $total = 0; ?>
                    <?php foreach ($detail_auth_order as $auth) :?>
                        <small class="m-0 d-block"><?= $auth->auth_fullname; ?></small>
                        <small class="m-0 d-block"><a href="https://wa.me/<?= $auth->auth_phone; ?>"><?= $auth->auth_phone; ?></a></small>
                        <small class="m-0 d-block"><?= $auth->auth_email; ?></small>
                        <small class="m-0 d-block"><?= $auth->auth_address; ?></small>
                    <?php endforeach; ?>
                    <hr>

                  
                </td>
            </tr>
        </thead>

        
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="<?= base_url(); ?>assets/admin/js/sb-admin-2.min.js"></script>
</body>

</html>


