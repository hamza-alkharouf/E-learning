<div class="container" style="margin-bottom: 20%;">
  <div class="row">
  <dev class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-4 shadow p-3 mb-5">
      <div class="container user">
        <br>
        <h5 class="text-center"><?= $page_title; ?></h5>
        <br>
        <div class="text-center col-12">
    <img src="<?= base_url('assets/images/reset-password.jpg')?>" height="200px" width="300px" class="rounded" alt="...">
  </div>
  <hr>
        <form action="" method="POST">

      <div class="form-group mb-3">
          <label for="inputEmail1">E-mail </label>
          <input type="email" class="form-control" name="email" id="Email1" value="<?= set_value('email') ?>" aria-describedby="email" placeholder="enter Email">
          <div class="text-danger error">
            <?=$validation->getError('email') ?>
          </div>
        </div>
        <div class="row">
        <div class="d-grid gap-2  mb-3 col-6 mx-auto">
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


