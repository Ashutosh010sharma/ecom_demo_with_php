<?= $this-> extend("private_layout") ?>
<?= $this-> section("content" )?>

<div class="row">
    <div class="col-sm-4 mx-auto">
        <?php
        $validation=\Config\Services::validation();
        ?>
        <div class="card">
            <div class="card-body">
                <form action="<?=base_url('admin/product_categories')?>" method="post" enctype="multipart/form-data">
                    <div class="mb-2">
                       <h1>Add Product Categories</h1>
                    </div>
                    <div class="mb-2">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" class="form-control" value="<?=old('name')?>">
                        <span class="text-denger"><?=$validation->getError("name")?></span>
                        <span class="text-denger"><?=$validation->getError("name")?></span>

                    </div>

                    <div class="mb-2">
                        <label for="image">Category Image</label>
                        <input type="file" name="image" class="form-control">
                        <span class="text-denger"><?=$validation->getError("image")?></span>
                    </div>

                    
                    <div class="mb-2 text-center">
                        <input type="submit" name="save" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <h5>List of Categories</h5>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($records as $record):?>
                <tr>
                    <td><?=$record['name']?></td>
                    <td>
                        <img src="<?=base_url('images/product_categories')?><?=$record['image']?>" alt="" style="width: 80px; height: 80px; object-fit: cover;">
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div>
            <?=$pager->links()?>
        </div>
    </div>
</div>



<?= $this->endSection()?>