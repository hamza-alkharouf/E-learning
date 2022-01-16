<header class="container-fluid">

  <div class="row" style="height:200px">
  <div class="card mb-3" style="max-width: 750px;">
  <div class="row g-1">
    <div class="col-md-4 bg-light text-dark ">
    <img src="<?=base_url('assets/uploads/'.$course['courses_image']);?>" class="img-thumbnail ms-4 mt-1"  alt="course">
    <a href="<?=base_url('Admin/Courses/insertVideos/'.$course['courses_id'])?>"><button type="button" class="btn mt-1 ms-5 btn-md btn-sm btn-lg btn-primary"><img src="<?= base_url('assets/images/add.png') ?>"  />upload Video </button></a>

    </div>
    <div class="col-md-8 ">
      <div class="card-body">
        <h5 class="card-title"><?= esc($course['courses_name']) ?></h5>
        <p class="card-text"><small class="text-muted"><?= esc($course['categories_name']) ?></small><br><small class="text-muted"><?= esc($course['courses_language_code']) ?></small></p>
        <p class="card-text text-break"><?= esc($course['courses_description']) ?></p>
      </div>
    </div>
  </div>
</div>

  </div>

</header>

<div class="container">

<div class="row">


<?php if ($videos!=null) : ?>
						<?php foreach ($videos as $Video): ?>
              <div class="col  ">
              <?php if(substr($Video['path'], 0, 8) == 'https://'){ ?>
                
                  <div class="card mb-5" style="width: 320px;">
                  
                    <iframe width="320px" height="315"
                    src="<?=$Video['path'];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>                 
                    <div class="card-body">
                    <h5 class="card-title"><?= esc($Video['name']) ?></h5>
                    <a href="<?=base_url('Admin/Courses/editVideo/'.$Video['id'])?>"><button type="button" class="btn btn-md btn-sm btn-lg btn-success"> <i class="fas fa-user-edit"></i>Update Video</button></a>
                      <a href="<?=base_url('Admin/Courses/deleteVideo/'.$Video['id'])?>"><button type="button" class="btn btn-md btn-sm btn-lg btn-danger"><i class="fas fa-user-times"></i> Delete Video</button></a>
                  </div>
                </div>
                <?php  }else{?>
                  <div class="card mb-5" style="width: 320px;">
                    <video src="<?=base_url('assets/videos/'.$Video['path']);?>" controls width='320px' height='320px' ></video>
                  <div class="card-body">
                    <h5 class="card-title"><?= esc($Video['name']) ?></h5>
                    <a href="<?=base_url('Admin/Courses/editVideo/'.$Video['id'])?>"><button type="button" class="btn btn-md btn-sm btn-lg btn-success"> <i class="fas fa-user-edit"></i>Update Video</button></a>
                      <a href="<?=base_url('Admin/Courses/deleteVideo/'.$Video['id'])?>"><button type="button" class="btn btn-md btn-sm btn-lg btn-danger"><i class="fas fa-user-times"></i> Delete Video</button></a>

                  </div>
                </div>           
  
                  <?php }?>


                  </div>
						<?php endforeach; ?>
					<?php else : ?>
					
							<h3>No videos yet</h3><br><p>Unable to find any videos.</p>
										
			<?php endif ?>

      <div id="Pagination">
            <?= $pager->links() ?>
          </div> 



      </div>

</div>
