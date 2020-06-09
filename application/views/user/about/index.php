<?php 

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
    "key: 0575c15d25c683c7b81b8133971a25a8"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $data['city'] = json_decode($response, true);
}

?>

<div class="container my-5 about">
    <div class="row my-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="text-center"><a href="http://wagimansupply.com/" target="_blank" class="badge badge-info">wagimansupply.com</a> </h6>
                    <hr>
                    <?= $this->session->flashdata('about'); ?>
             
                <h6><span class="btn btn-info btn-sm">Logo            : </span><br><br> 
                  <img src="<?= base_url(); ?>assets/admin/img/about/<?= $about->image; ?>" alt="" class="img-fluid img-thumbnail w-25"> 
                </h6>
                 
                <h6><span class="btn btn-info btn-sm">Nama Website    : </span>
                <br><br> <?= $about->web_name; ?>
                </h6>

                <h6><span class="btn btn-info btn-sm">CEO             : </span>
                <br><br> <?= $about->ceo; ?>
                </h6>
                
                <h6><span class="btn btn-info btn-sm">Deskripsi       : </span>
                <br><br>  <?= $about->description; ?>
                </h6>
                
                <h6><span class="btn btn-info btn-sm">Alamat          : </span>
                <br><br>  <?= $about->address; ?>
                </h6>
                
                <h6><span class="btn btn-info btn-sm">Phone           : </span>
                <br><br>   <?= $about->phone; ?>
                </h6> 
                
                <h6><span class="btn btn-info btn-sm">Email           : </span>
                <br><br>  <?= $about->email; ?>
                </h6> 
                
                <h6><span class="btn btn-info btn-sm">Provinsi        : </span>
                <br><br> <?php foreach ($provinsi->rajaongkir->results as $prov) : ?><?php  if($prov->province_id == $about->province) : ?> <?= $prov->province; ?><?php endif; ?><?php endforeach; ?> 
                </h6> 
                
                <h6><span class="btn btn-info btn-sm">Kota            : </span>
                <br><br> <?php foreach ($data['city']['rajaongkir']['results'] as $city) : ?><?php  if($city['city_id'] == $about->city) : ?> <?= $city['city_name']; ?><?php endif; ?><?php endforeach; ?>  
                </h6> 
                <hr>
                <br>
                <h6><span class="btn btn-info btn-sm">Link Credits : </span></h6>
                    <p class="lead"><a href="http://www.freepik.com">Designed by slidesgo / Freepik</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
