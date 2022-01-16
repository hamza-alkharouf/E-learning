<form action="" method="POST">
<div class="container">
  <div class="form-group">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control" id="Address" name="Address"
       value="<?= set_value('Address') ?>" placeholder="Enter Address">
      <div class="text-danger error">
        <?=$validation->getError('Address') ?>
      </div>
      
    </div>
  <div class="form-group">
      <label for="inputPhone">Phone</label>
      <input type="text" class="form-control" id="Phone" name="Phone"  
      value="<?= set_value('Phone') ?>"  placeholder="Enter Phone">
      <div class="text-danger error">
        <?=$validation->getError('Phone') ?>
      </div>
    </div>
  <div class="form-group">
      <label for="inputEmail1">E-mail </label>
      <input type="email" class="form-control" name="email" id="Email1"
       value="<?= set_value('email') ?>" aria-describedby="email" placeholder="Enter Email">
      <div class="text-danger error">
        <?=$validation->getError('email') ?>
      </div>
    </div>
  <div class="d-grid gap-2 col-6 mx-auto">
    <button  class="btn btn-primary" ><?= $page_title; ?></button>
  </div>
 
</div>
</form>