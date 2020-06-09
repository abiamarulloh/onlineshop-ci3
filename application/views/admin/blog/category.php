<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Category</h2>
            <hr>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-6 mb-5">
            <h5>Add Category</h5>
            <hr>
            <form method="post" action="">
                <div class="form-group">
                    <label for="name">Kategori</label>
                    <input type="text" class="form-control <?php if(form_error('category')) {echo "is-invalid";} ?>" name="category">
                    <?php if(form_error('category')) : ?>
                        <div class="invalid-feedback">
                            <?= form_error("category"); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Publish Category</button>
            </form>
        </div>

        <div class="col-md-6">
            <h5>List Category</h5>
            <hr>
            <?= $this->session->flashdata('blog'); ?>
            <ul class="list-group">
                <?php if(empty($list_category)) : ?>
                    <p class="list-group lead">Category Not Found</p>
                <?php else : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($list_category as $category) :?>
                        <li class="list-group-item">
                            <?= $no++ . ". " . $category->name; ?>
                            <a href="<?= base_url("admin/blog/delete_category/"). $category->id ?>" class="close btn btn-light" >
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>

    </div>
</div>
