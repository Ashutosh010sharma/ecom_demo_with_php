<?= $this-> extend("public_layout") ?>
<?= $this-> section("content" )?>

<div class="container">
    <div class='row'>
        <div class='col-sm-10'>
            <h2>welcome to Userdashboard</h2>

        </div>
        <div class="col-sm-2">
            <a href="<?=base_url('profile')?>" class="btn btn-dark"> change profile </a>
        </div>
    </div>
</div>
<?= $this->endSection()?>