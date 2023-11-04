<?= $this-> extend("private_layout") ?>
<?= $this-> section("content" )?>

<div class="container">
    <div class='row'>
        <div class='col-sm-12'>
            <h2>List of Registered User</h2>
             <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
     
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user): ?>
    <tr>
      <th scope="row"><?=$user['user_id']?></th>
      <td><?=$user['user_name']?></td>
      <td><?=$user['user_email']?></td>
    </tr>
    <?php endforeach ?>
    
  </tbody>
</table>
        </div>
    </div>
</div>
<?= $this->endSection()?>