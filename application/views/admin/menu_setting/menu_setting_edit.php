<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><i class="fas fa-edit"></i> Edit Menu</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?= base_url("menu_setting_edit/") . $menu_by_id->id; ?>">
                        <input type="text" hidden readonly name="id" id="id" 
                        value="<?= $menu_by_id->id; ?>">
                        <div class="form-group">
                            <label for="title">Nama Menu</label>
                            <input type="text" class="form-control" value="<?= $menu_by_id->title; ?>" name="title"
                                id="title">
                        </div>

                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" value="<?= $menu_by_id->url; ?>" name="url"
                                id="url">
                        </div>

                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" value="<?= $menu_by_id->icon; ?>" name="icon"
                                id="icon">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" id="button-menu" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url("menu_setting"); ?>" class="btn btn-secondary" >Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>