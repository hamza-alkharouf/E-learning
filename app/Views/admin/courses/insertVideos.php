<div class="container border $gray-500 border-1 rounded-1 py-5  w-75">
  <div class="row">
    <h1 class="display-4">Choose a <?= $page_title; ?></h1>


    
    <div class="col mt-5 ps-5">

      <form method="post" action="<?=site_url('/Admin/Courses/insertVideos/'.$video['id'])?>" enctype='multipart/form-data'>
        <div class="form-group">
        <label for="file-upload" class="custom-file-upload">
        <i class="fa fa-cloud-upload"></i>Click me to Upload Videos
        </label>
        <input id="file-upload" id="file"  multiple type="file" name='file[]'  style="display:none;" />
          <div class="text-danger error">
            <?=$validation->getError('file') ?>
        </div>
        
      </div>


        <div class="filenames "></div>
        <div class="form-group">
          <input id="#myFile"   type='submit' class="btn  btn-primary  mt-1" value='Upload' name='but_upload'>
        </div>
      </form>
    </div>

    <div class="col-1">
      <hr width="2" size="200">    
    </div>

    <div class="col mt-2 pe-5">
      <form method="post" action="<?=site_url('/Admin/Courses/insertVideosFromLink/'.$video['id'])?>" enctype='multipart/form-data'>
        <div class="form-group">  
          <label for="url">Enter name of video</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="name voideo" required>
          <div class="text-danger error">
          <?=$validation->getError('name') ?>
        </div>
        </div>
        <div class="form-group">
          <label for="url">Enter an https:// URL:</label>
          <input type="url" name="url" id="url" class="form-control"placeholder="https://example.com" pattern="https://.*" size="30" required>
        <div class="text-danger error">
          <?=$validation->getError('file') ?>
        </div>
          </div>
          
        <div class="form-group">
        <label for="videoDuration">Video Duration</label>
          <input id="videoDuration"class="form-control" required    type="text" placeholder="Video Duration" name='videoDuration'>
          <div class="text-danger error">
          <?=$validation->getError('videoDuration') ?>
        </div>
        </div>

        <div class="form-group">
          <button class="btn btn-primary mt-1">Upload</button>
        </div>
      </form>
    </div>
    <a href="javascript:window.history.go(-1);"><button type="button" class="btn  mt-1 btn-secondary">back</button></a>
  </div>
</div>

