<div class="container border $gray-500 border-1 rounded-1 py-5  w-75">
  <div class="row">
    <h1 class="display-4">Choose a <?= $page_title; ?></h1>
    <div class="text-danger error">
      <?= $validation->getError('file') ?>
    </div>
    <div class="text-danger error">
      <?= $validation->getError('videoDuration') ?>
    </div>
    <div class="text-danger error">
      <?= $validation->getError('name') ?>
    </div>

    <div class="col mt-5 ps-5">



      <form method="post" action="<?= site_url('/Admin/Courses/editVideo/' . $video['id']) ?>" enctype='multipart/form-data'>
        <div class="form-group">


          <?php if (strpos($video['path'], 'https://www.youtube.com/embed') !== false) { ?>
            <label for="file-upload" class="custom-file-upload">
              <i class="fa fa-cloud-upload"></i>Click me to Upload Videos
            </label>
            <input id="file-upload" id="file" class="file" multiple type='file' name='file' />
          <?php } else { ?>
            <label for="img">Click me to Upload Videos</label><br>
            <label for="file-upload" class="custom-file-upload">
              <i class="fa fa-cloud-upload"></i><?= set_value('path'), $video['path'] ?>
            </label>
            <input id="file-upload" id="file" multiple type='file' class="file" name='file' value="<?= set_value('path', $video['path']) ?>" />

          <?php }  ?>


        </div>

        <div class="form-group">
          <label for="videoDuration">Video Duration</label>

          <?php if (strpos($video['path'], 'https://www.youtube.com/embed') !== false) { ?>
            <input id="videoDuration" class="form-control" require type="text" placeholder="Video Duration" value="" name='videoDuration'>
          <?php } else { ?>
            <input id="videoDuration" class="form-control" require type="text" placeholder="Video Duration" value="<?= set_value('videos', $video['videoDuration']) ?>" name='videoDuration'>
          <?php }  ?>

        </div>

        <div class="form-group">
          <button class="btn w-25 btn-primary  mt-1" >Upload</button>
        </div>
      </form>
    </div>

    <div class="col-1">
      <hr width="2" size="200">
    </div>

    <div class="col mt-2 pe-5">
      <form method="post" action="<?= site_url('/Admin/Courses/editVideoFromLink/' . $video['id']) ?>" enctype='multipart/form-data'>
        <div class="form-group">
          <label for="url">Enter name of video</label>
          <?php if (strpos($video['path'], 'https://www.youtube.com/embed') !== false) { ?>
            <input type="text" name="name" id="name" class="form-control" placeholder="name voideo" value="<?= set_value('name', $video['name']) ?>" required>


          <?php } else { ?>
            <input type="text" name="name" id="name" class="form-control" placeholder="name voideo" value="" required>

          <?php }  ?>
        </div>

        <div class="form-group">
          <label for="url">Enter an https:// URL:</label>
          <?php if (strpos($video['path'], 'https://www.youtube.com/embed') !== false) { ?>
            <input type="url" name="url" id="url" class="form-control" placeholder="https://example.com" pattern="https://.*" value="<?= set_value('path', $video['path']) ?>" size="30" required>
          <?php } else { ?>
            <input type="url" name="url" id="url" class="form-control" placeholder="https://example.com" pattern="https://.*" value="" size="30" required>
          <?php }  ?>

        </div>
        <div class="form-group">
          <label for="videoDuration">Video Duration</label>
          <?php if (strpos($video['path'], 'https://www.youtube.com/embed') !== false) { ?>
            <input id="videoDuration" class="form-control" require type="text" placeholder="Video Duration" value="<?= set_value('videoDuration', $video['videoDuration']) ?>" name='videoDuration'>

          <?php } else { ?>
            <input id="videoDuration" class="form-control" require type="text" placeholder="Video Duration" value="" name='videoDuration'>

          <?php }  ?>

        </div>
        <div class="form-group">
          <button class="btn w-25  btn-primary mt-1">Upload</button>
        </div>
      </form>
    </div>
    <a href="javascript:window.history.go(-1);"><button type="button" class="btn  mt-1 w-25 btn-secondary">back</button></a>
  </div>
</div>