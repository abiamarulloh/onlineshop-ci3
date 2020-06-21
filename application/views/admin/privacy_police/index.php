<div class="container  about">
    <div class="row">
        <div class="col-md-12  text-center">
            <h2 class="lora"><span class="text-tosca">Panduan Kebijakan Privasi</span> </h2>
            <p class="lead">Belanja aman diwagiman supply</p>
        </div>
    </div>

    <div class="row my-3">
    <div class="col-md-8 mx-auto col-sm-12 text-break" style="color: rgba(41, 41, 41, 1)">
           <?php 
                 foreach ($privacy as $pr) {
                    echo $pr->privacy;
                }
           ?>
        </div>
    </div>
</div>