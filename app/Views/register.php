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
      <form action="<?= base_url('register') ?>" method="post" class="row g-3 m-4">
        <h2>Create a New Account</h2>


        <?php $session=session(); ?>
        <?php if(! is_null($session->getFlashdata('success_message'))): ?>
          <div class="alert alert-success">
            <?= $session->getFlashdata('success_message');?>
          </div>
          <?php endif ?>

        


        <div class="col-md-6">
          <label class="form-label">User Name</label>
          <input type="text" name="username" class="form-control" id="username" placeholder="Username"
            value="<?= old('username') ?>">
          <div class="text-danger">
            <?= $validation->getError("username") ?>
          </div>

        </div>
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
          <label class="form-label">Confirm Password</label>
          <input type="text" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password"
            value="<?= old('cpassword') ?>">
          <div class="text-danger">
            <?= $validation->getError("confirm password") ?>
          </div>
        </div>

        <div class="col-12">
          <button type="submit" name="register" value="Register" class="btn btn-primary">Register</button>
        </div>
        <div>
          <a href="<?= base_url('login') ?>">Already have an Account?</a>
        </div>
      </form>
    </div>

  </div>

<div>
 
</div>

</body>

</html>

<?= $this->endSection() ?>