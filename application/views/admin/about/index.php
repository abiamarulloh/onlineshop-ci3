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

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="web_name">Nama Website</label>
                                <input type="text"
                                    class="form-control <?php if(form_error('web_name')) {echo "is-invalid";} ?>"
                                    name="web_name" id="web_name" value="<?= $about->web_name; ?>">
                                <?php if(form_error('web_name')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("web_name"); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ceo">CEO</label>
                                <input type="text"
                                    class="form-control <?php if(form_error('ceo')) {echo "is-invalid";} ?>" name="ceo"
                                    id="ceo" value="<?= $about->ceo; ?>">
                                <?php if(form_error('ceo')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("ceo"); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="body">Deskripsi</label>
                            <textarea name="description" id="body"
                                class="form-control <?php if(form_error('description')) {echo "is-invalid";} ?>"><?= $about->description; ?></textarea>
                            <?php if(form_error('description')) : ?>
                            <div class="invalid-feedback">
                                <?= form_error("description"); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat Lengkap</label>
                            <input type="text" class="form-control <?php if(form_error('ceo')) {echo "is-invalid";} ?>"
                                id="address" placeholder="Alamat Lengkap" value="<?= $about->address; ?>"
                                name="address">
                            <?php if(form_error('address')) : ?>
                            <div class="invalid-feedback">
                                <?= form_error("address"); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text"
                                    class="form-control <?php if(form_error('phone')) {echo "is-invalid";} ?>"
                                    id="phone" value="<?= $about->phone; ?>" name="phone">
                                <?php if(form_error('phone')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("phone"); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="text"
                                    class="form-control <?php if(form_error('email')) {echo "is-invalid";} ?>"
                                    id="email" value="<?= $about->email; ?>" name="email">
                                <?php if(form_error('email')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error("email"); ?>
                                </div>`
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cityince">Provinsi</label>
                                <select class="form-control" name="province" id="province">
                                    <option value="0">Pilih Provinsi</option>
                                    <?php foreach ($provinsi->rajaongkir->results as $prov) : ?>
                                    <option value="<?= $prov->province_id; ?>" <?php if($prov->province_id == $about->province){echo "selected";} ?> >
                                        <?= $prov->province; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="city">Kota </label>
                                <select class="form-control" name="city" id="city">
                                    <option value="0">Pilih Kota</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="logo">Logo </label>
                                <input type="file" class="form-control" id="logo" name="image">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center"><a href="http://wagimansupply.com/" target="_blank"
                            class="badge badge-info">wagimansupply.com</a> </h2>
                    <hr>
                    <?= $this->session->flashdata('about'); ?>
                    <pre>
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
                <br><br> <?php foreach ($data['city']['rajaongkir']['results'] as $city) : ?><?php  if($city['city_id'] == $about->city) : ?> <?= $city['type'] . " " . $city['city_name']; ?><?php endif; ?><?php endforeach; ?>  
                </h6> 
             </pre>
                </div>
            </div>
        </div>
    </div>
</div>
