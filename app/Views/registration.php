

<div class="container">
  <div class="row">
  <dev class="col-9 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 shadow p-3 mb-4">
   
    <div class="container  user">
    <br>
        <h5 class="text-center"><?= $page_title; ?></h5>
        <br>
    <div class="text-center col-12">
    <img src="<?= base_url('assets/images/login-form-img.png')?>" height="200px" width="300px" class="rounded" alt="...">
  </div>
  <hr>

        <form action="" method="POST">
        <div class="form-group mb-3">
          <label for="Fname">First Name</label>
          <input type="text" id="Fname" name="firstname" class="form-control" value="<?= set_value('firstname') ?>" placeholder="enter first name" >
          <div class="text-danger error">
            <?=$validation->getError('firstname') ?>
          </div>
        </div>
      <div class="form-group mb-3">
          <label for="inputLname">Last Name</label>
          <input type="text" class="form-control" id="Lname" name="lastname"  value="<?= set_value('lastname') ?>"  placeholder="enter last name">
            <div class="text-danger error">
            <?=$validation->getError('lastname') ?>
          </div>
        </div>
      <div class="form-group mb-3">
          <label for="inputEmail1">E-mail </label>
          <input type="email" class="form-control" name="email" id="Email1" value="<?= set_value('email') ?>" aria-describedby="email" placeholder="enter Email">
          <div class="text-danger error">
            <?=$validation->getError('email') ?>
          </div>
        </div>
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
        <button  class="button btn " ><?= $page_title; ?></button>

        </div>
        <div class="col-12 mb-3 col-sm-12 lh-lg text-center">
            <a href="<?= base_url('Users/login')?>">already have an account?</a>
        </div>
        </div>
        </form>
      </div>
    </dev>  
  </div>
</div>


