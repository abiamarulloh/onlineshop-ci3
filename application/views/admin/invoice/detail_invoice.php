<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary">ID INVOICE  <small class="badge badge-light"><?= $id_invoice; ?></small></button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Pemilik Toko -->
                        <div class="col-md-6">
                            <!-- Web Name -->
                            <h6> 
                                <i class="fas fa-fw fa-building"></i> <?= $admin->web_name; ?>
                            </h6>
                            <!-- CEO -->
                            <h6 class="m-0"> 
                                <i class="fas fa-fw fa-user"></i> <?= $admin->ceo; ?>
                            </h6>

                            <p class="m-0"> 
                                <!-- Phone -->
                                <a href="https://wa.me/<?= $admin->phone; ?>" class="d-block">
                                    <i class="fab fa-fw fa-whatsapp"></i>  <?= $admin->phone; ?>
                                </a>

                                <!-- Email -->
                                <a href="mailto:<?= $admin->email; ?>" class="d-block">
                                    <i class="fas fa-fw fa-envelope-open"></i>  <?= $admin->email; ?>
                                </a>

                                <!-- Address -->
                                <small class="text-lowercase">
                                    <i class="fas fa-fw fa-map"></i> 
                                    <?= $admin->address ?>
                                </small>

                            </p>    
                            <hr>
                            <?php foreach ($bank_payment as $bank) :?>
                                <h6> <i class="fas fa-fw fa-money-check-alt"></i> <?= $bank->bank_name . " <br> " . $bank->on_behalf_of_the . " - " . $bank->account_number; ?></h6>
                            <?php endforeach; ?>
                        
                        </div>

                        

                        <!-- Pemilik Toko -->
                        <div class="col-md-6 my-4">
                            <hr class="d-sm d-md-none">
                            <!-- Fullname -->
                            <h6 class="m-0"> 
                                <i class="fas fa-fw fa-user"></i> <?= $list_invoice_by_id->fullname; ?>
                            </h6>

                            <p class="m-0"> 
                                <!-- Phone -->
                                <a href="https://wa.me/<?= $list_invoice_by_id->phone; ?>" class="d-block">
                                    <i class="fab fa-fw fa-whatsapp"></i>  <?= $list_invoice_by_id->phone; ?>
                                </a>

                                <!-- Email -->
                                <a href="mailto:<?= $list_invoice_by_id->email; ?>" class="d-block">
                                    <i class="fas fa-fw fa-envelope-open"></i>  <?= $list_invoice_by_id->email; ?>
                                </a>

                                <!-- Address -->
                                <small class="text-lowercase">
                                    <i class="fas fa-fw fa-map"></i> 
                                    <?= $list_invoice_by_id->address ?>
                                </small>

                            </p>    
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>