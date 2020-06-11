<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Bank Payment</h2>
            <hr>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <h5>List Bank Payment </h5>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBox">
                    <i class="fas fa-plus"></i> Tambah Bank
                </button>

            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <?= $this->session->flashdata("bank_payment"); ?>
                        <?php if(empty($bank_payment)) : ?>
                        <p class="list-group lead">Bank Payment Not Found</p>
                        <?php else : ?>
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bank</th>
                                    <th>Pemilik</th>
                                    <th>No Rekening</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Bank</th>
                                    <th>Pemilik</th>
                                    <th>No Rekening</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($bank_payment as $bank) :?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $bank->bank_name; ?></td>
                                    <td><?= $bank->on_behalf_of_the; ?></td>
                                    <td><?=  $bank->account_number; ?></td>
                                    <td> 
                                        <a href="<?= base_url("invoice_bank_payment_delete/") .$bank->id; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bank Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="bank_name">Nama Bank</label>
                        <input type="text"
                            class="form-control <?php if(form_error('bank_name')) {echo "is-invalid";} ?>"
                            name="bank_name">
                        <?php if(form_error('bank_name')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("bank_name"); ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="on_behalf_of_the">Atas Nama Pemilik</label>
                        <input type="text"
                            class="form-control <?php if(form_error('on_behalf_of_the')) {echo "is-invalid";} ?>"
                            name="on_behalf_of_the">
                        <?php if(form_error('on_behalf_of_the')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("on_behalf_of_the"); ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="account_number">Nomor Rekening Bank</label>
                        <input type="text"
                            class="form-control <?php if(form_error('account_number')) {echo "is-invalid";} ?>"
                            name="account_number">
                        <?php if(form_error('account_number')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("account_number"); ?>
                        </div>
                        <?php endif; ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>