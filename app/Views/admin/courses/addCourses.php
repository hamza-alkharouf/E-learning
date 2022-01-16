
      <form  action="<?=site_url('/Admin/Courses/addCourses')?>" enctype="multipart/form-data" method="POST">
      <div class="container">  
        <div class="form-group">
            <label for="inputFname">Name Course</label>
            <input type="text" class="form-control" id="inputFname" name="namecourse" aria-describedby="namecourse"value="<?= set_value('namecourse') ?>"  placeholder="Name Course">
            <div class="text-danger error">
            <?=$validation->getError('namecourse') ?>
            </div>
          </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Description</label>
          <textarea class="form-control" name ="description"aria-describedby="description"  placeholder="Description of Course"value="" id="exampleFormControlTextarea1" rows="3"><?= set_value('description') ?></textarea>
          <div class="text-danger error">
          <?=$validation->getError('description') ?>
          </div>
        </div>
        <div class="form-group">
          <select class="form-select"name="Language"value="<?= set_value('Language') ?>"aria-describedby="Language"  aria-label="Default  select example">
            <option selected>Choose Language</option>
            <option value="en">en</option>
            <option value="ar">ar</option>
          </select>
          <div class="text-danger error">
          <?=$validation->getError('Language') ?>
          </div>
        </div>
        <div class="form-group">
          <select class="form-select"name="id_category"value="<?= set_value('id_category') ?>"aria-describedby="category"  aria-label="Default select example">
              <option selected>Choose category</option>
              
              <?php foreach ($categoryes as $category): ?>
              <option value="<?=$category['id']?>"><?=$category['name']?></option>
              <?php endforeach;?>
          </select>
          <div class="text-danger error">
          <?=$validation->getError('category') ?>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="customFile">Upload course image</label>
          <input type="file" class="form-control"value="<?= set_value('image') ?>"aria-describedby="image"name="image" id="customFile" />
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
          <button class="btn btn-primary" ><?= $page_title; ?></button>
        </div>
          </div>
      </form>




