
<form action="" method="POST">

<div class="container">
  <div class="form-group">
      <label for="inputFname">First Name </label>
      <input type="text" class="form-control" id="inputFname" name="firstname" aria-describedby="fname" value="<?= set_value('firstname') ?>" placeholder="enter first name">
      <div class="text-danger error">
        <?=$validation->getError('firstname') ?>
      </div>
      
    </div>
  <div class="form-group">
      <label for="inputLname">Last Name</label>
      <input type="text" class="form-control" id="Lname" name="lastname" aria-describedby="lname" value="<?= set_value('lastname') ?>"  placeholder="enter last name">
      <div class="text-danger error">
        <?=$validation->getError('lastname') ?>
      </div>
    </div>
  <div class="form-group">
      <label for="inputEmail1">E-mail </label>
      <input type="email" class="form-control" name="email" id="Email1" value="<?= set_value('email') ?>" aria-describedby="email" placeholder="enter Email">
      <div class="text-danger error">
        <?=$validation->getError('email') ?>
      </div>
    </div>

  <div class="form-group">
      <label for="inputPassword1">Password</label>
      <input type="password" class="form-control" id="Password" name="password" value="<?=set_value('password');?>" placeholder="password">
      <div class="text-danger error">
        <?=$validation->getError('password') ?>
      </div>
    </div>
  <div class="form-group">
      <label for="inputPassword2">Password Confirm</label>
      <input type="password" class="form-control" name="passwordConfirmation" id="confPassword" value="<?=set_value('passwordConfirmation');?>"  placeholder="repeat confPassword">
      <div class="text-danger error">
        <?=$validation->getError('passwordConfirmation')?>
      </div>
    </div>

  <div class="d-grid gap-2 col-6 mx-auto">
    <button  class="button btn btn-primary" ><?= $page_title; ?></button>
  </div>
 
</div>
</form>







