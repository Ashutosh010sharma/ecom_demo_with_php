<?= $this->extend("public_layout") ?>
<?= $this->section("content") ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1> this is home page
            </h1>
            <img src="<?= base_url('/images/cat.jpg') ?>" alt="">
        </div>
    </div>
</div>
<?= $this->endSection() ?>