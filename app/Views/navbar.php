<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <?= $this->include('bootstrap')?>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=base_url()?>">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=base_url('admin/product_categories')?>">product_categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0">
        <?php $session=session();?>
        <?php if($session->loginned=="loginned"):?>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url()?>/<?=$session->user_type=="admin"?"admin_dashboard":"user_dashboard"?>"></i><?=$session->username?></a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('logout') ?>"><i class="bi bi-person-fill-add p-2"></i>Logout</a>
        </li>
        <?php else:  ?>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('login') ?>"><i class="bi bi-person-fill-add p-2"></i>Login</a>
        </li>
        <?php endif ?>
      </ul>
      
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>