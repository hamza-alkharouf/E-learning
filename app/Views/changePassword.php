

<div class="container " style="margin-bottom: 14%;">
  <div class="row">
  <dev class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 shadow p-3 mb-5 mb-5  ">
      <div class="container user">
      <br>
        <h5 class="text-center"><?= $page_title; ?></h5>
        <br>
        <div class="text-center col-12">
    <img src="<?= base_url('assets/images/change_password.png')?>" height="200px" width="300px" class="rounded" alt="...">
  </div>
  <hr>
        <form action="" method="POST">
      <div class="form-group mb-3">
          <label for="inputPassword">Password</label>
          <input type="password" class="form-control" id="Password" name="password" value="<?=set_value('password');?>" placeholder="password">
          <div class="text-danger error">
            <?=$validation->getError('password') ?>
          </div>
        </div>
      <div class="form-group mb-3">
          <label for="inputPasswordConfirm">Password Confirm</label>
          <input type="password" class="form-control" name="passwordConfirmation" id="confPassword" value="<?=set_value('passwordConfirmation');?>"  placeholder="repeat confPassword">
          <div class="text-danger error">
            <?=$validation->getError('passwordConfirmation')?>
          </div>
        </div>
        <div class="row">
        <div class="d-grid gap-2 col-6 mx-auto">
        <button  class="button btn" ><?= $page_title; ?></button>
        </div>       
        </div>
        <div class="lh-lg">
        <div class="col-12  col-sm-12  text-center">
            <a href="<?= base_url('Users/login')?>">Do you want to cancel it?</a>
        </div>
        </div>
        </form>
      </div>
    </dev>  
  </div>
</div>


