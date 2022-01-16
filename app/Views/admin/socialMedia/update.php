<form action="" method="POST">
<div class="container">
  <div class="form-group">
      <label for="inputName"><?= $page_title; ?> </label>     
        <select class="form-select" id="name" name="name" aria-label="Default select example"  
        onchange='CheckOther(this.value);'>
        <option value="<?=$socialMedias['name']?>" 
        selected><?= set_value('name',$socialMedias['name']) ?></option>
        <?php foreach ($medias as $media): ?>
        <option value="<?=$media?>"><?=$media?></option>
        <?php endforeach;?>
        <option value="other">other</option>
        </select>
        <div class="text-danger error">
        <?=$validation->getError('name') ?>
        </div>
        <input type="text" class="form-control" id="other" name="other" 
         value="<?= set_value('other') ?>" Style='display:none;' placeholder="enter Other Name">
        <div class="text-danger error">
        <?=$validation->getError('other') ?>
        </div>
    </div>
  <div class="form-group">
      <label for="inputLink">Add Link</label>
      <input type="text" class="form-control" id="link" name="link" 
       value="<?= set_value('link',$socialMedias['link']) ?>"  placeholder="enter Link">
      <div class="text-danger error">
        <?=$validation->getError('link') ?>
      </div>
    </div>
    <div class="d-grid gap-2 col-6 mx-auto">
    <button  class="btn btn-primary" ><?= $page_title; ?></button>
  </div>
 
</div>
</form>