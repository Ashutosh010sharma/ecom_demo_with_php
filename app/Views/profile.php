<?= $this->extend("public_layout") ?>
<?= $this->section("content") ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php 
            use App\Models\UserDetails;
            $model=new UserDetails();
            $session=session();
            $user_id=$session->user_id;
            $record=$model->where("user_id",$user_id)->first();
            ?>
            <h1> change profile
            </h1>
            <form action="<?=base_url('profile')?>" method="post">
                <div class="col">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" name="country" id="country" value="<?= ! is_null($record)?$record['country']:''?>">
                </div>
                <div class="col">
                    <label for="state">State</label>
                    <input type="text" class="form-control" name="state" id="state" value="<?= ! is_null($record)?$record['state']:''?>">
                </div>
                <div class="col">
                    <label for="district">District</label>
                    <input type="text" class="form-control" name="district" id="district" value="<?= ! is_null($record)?$record['district']:''?>">
                </div>

                <div class="row">
                    <div class="col">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control" name="pincode" id="pincode" value="<?= ! is_null($record)?$record['pincode']:''?>">
                    </div>
                    <div class="col">
                        <label for="phone_no">Phone Number</label>
                        <input type="text" class="form-control" name="phone_no" id="phone_no" value="<?= ! is_null($record)?$record['phone_no']:''?>">
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col">
                        <label for="local_address">Local Address</label>
                        <textarea name="local_address" id="local_address" cols="30" rows="10"  class="form-control" ><?= ! is_null($record)?$record['local_address']:''?></textarea>
                    </div>
                    <div class="col">
                        <label for="permanent_address">Permanent Address</label>
                        <textarea name="permanent_address" id="permanent_address" cols="30" rows="10"  class="form-control"><?= ! is_null($record)?$record['permanent_address']:''?></textarea>
                    </div>
                    
                </div>
                <div class="text-center my-2">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
           
        </div>
    </div>
    
</div>
<?= $this->endSection() ?>