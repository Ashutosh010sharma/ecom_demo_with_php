<?= $this->extend("public_layout") ?>
<?= $this->section("content") ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?= $this->include('bootstrap') ?>
</head>

<body>
  <div class="card mt-4 mx-5">
    <div class="card-body">
      <?php $validation = \Config\Services::validation(); ?>
      <form action="<?= base_url('login') ?>" method="post" class="row g-3 m-4">
        <h2>Login to Account</h2>
        <?php $session=session(); ?>
        <?php if(! is_null($session->getFlashdata('failed_message'))): ?>
          <div class="alert alert-danger">
            <?= $session->getFlashdata('failed_message');?>
          </div>
          <?php endif ?>




        

        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email"
            value="<?= old('email') ?>">
          <div class="text-danger">
            <?= $validation->getError("Email") ?>
          </div>
        </div>

        <div class="col-12">
          <label class="form-label">Password</label>
          <input type="text" name="password" class="form-control" id="password" placeholder="Password"
            value="<?= old('password') ?>">
          <div class="text-danger">
            <?= $validation->getError("password") ?>
          </div>
        </div>
        

        <div class="col-12">
          <button type="submit" name="login" value="Login" class="btn btn-primary">Login</button>
        </div>
        <div>
          <a href="<?= base_url('register') ?>">Does not  have an Account?</a>
        </div>
      </form>
    </div>

  </div>

<div>
 
</div>

</body>

</html>

<?= $this->endSection() ?>