
  
  <form action="<?=site_url('/Admin/Courses/editting/'.$course['id'])?>" enctype="multipart/form-data" method="post">
  <div class="container">  
    <div class="form-group">
      <label for="inputFname">Name Course</label>
      <input type="text" class="form-control" id="inputFname" name="namecourse" aria-describedby="namecourse"value="<?= set_value('namecourse',$course['name']) ?>"  placeholder="Name Course">
      <div class="text-danger error">
        <?=$validation->getError('namecourse') ?>
      </div>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="form-control" name ="description"aria-describedby="description"  placeholder="Description of Course"value="<?= set_value('description',$course['description']) ?>" id="exampleFormControlTextarea1" rows="3"><?= esc($course['description']) ?></textarea>
      <div class="text-danger error">
        <?=$validation->getError('description') ?>
      </div>
    </div>

    <div class="form-group">
      <select class="form-select"name="Language"value="<?= set_value('Language'),$course['language_code'] ?>"aria-describedby="Language"  aria-label="Default  select example">
        <option selected><?= esc($course['language_code']) ?></option>
        <?php foreach ($languages as $language): ?>
          <option value="<?=$language?>"><?=$language?></option>
        <?php endforeach;?>
      </select>
      <div class="text-danger error">
        <?=$validation->getError('Language') ?>
      </div>
    </div>



    <div class="form-group">
      <select class="form-select"name="id_category"value="<?= set_value('id_category'),$dataOfCategoryById['name'] ?>"aria-describedby="category"  aria-label="Default select example">
        <option selectedc value="<?= esc($dataOfCategoryById['id']) ?>"><?= esc($dataOfCategoryById['name']) ?></option>
        <?php foreach ($Categories as $category): ?>
          <?php $count = 0; ?>
          <?php foreach ($category as $categy): ?>   
            <?php if($count == 1) {?>
              <?php if($category['id'] != $dataOfCategoryById['id']) {?>
                <option value="<?=$category['id']?>"><?=$categy?></option>
              <?php }?>
            <?php }?>
            <?php $count++;?>
          <?php endforeach;?>
        <?php endforeach;?>
      </select>
      <div class="text-danger error">
        <?=$validation->getError('category') ?>
      </div>
  </div>

  <div class="form-group">
    <label for="img">Click me to edit image</label><br>

    <label for="file-upload" class="custom-file-upload">
      <i class="fa fa-cloud-upload"></i><?= set_value('image'),$course['image'] ?>
    </label>
    <input type="file" class="file" id="file-upload" name="image"  <?= esc($course['image']) ?> />

        <div class="text-danger error">
        <?=$validation->getError('image') ?>
      </div>
  </div>
  <div class="d-grid gap-2 col-6 mx-auto">
  <button  value='Upload'class="btn btn-success"><?= $page_title; ?></button>
        </div>

</div>

</form>


  



