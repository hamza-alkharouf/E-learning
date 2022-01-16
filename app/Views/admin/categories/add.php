
<form action="" method="POST">
<div class="container">
<div class="form-group">

<label for="name"> Name </label>
      <input type="text" class="form-control" id="name" name="name"  value="<?=set_value('name') ?>" placeholder="enter name">
      <div class="text-danger error">
        <?=$validation->getError('name') ?>
      </div>
      
    </div>
  <div class="form-group">
      <label for="descrption">Description</label>
      <textarea type="text" class="form-control" id="descrption" name="descrption"  value="<?=set_value('descrption') ?>"  placeholder="enter descrption"></textarea>
      <div class="text-danger error">
        <?=$validation->getError('descrption') ?>
      </div>
    </div>
 
    <div class="d-grid gap-2 col-6 mx-auto" >
    <button class="btn btn-primary" ><?= $page_title; ?> </button>
  </div>

</div>


</form>

