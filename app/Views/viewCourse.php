<div class="container px-4">
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">

      <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item "><a href="/Categories">Categories</a></li>
          <li class="breadcrumb-item "><a href=<?= base_url('Categories/Courses/' . $course['categories_id']) ?>><?= esc($course['categories_name']) ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?= $page_title; ?> - <?= esc($course['courses_name']) ?></li>    
        </ol>
      </nav>
  </div>
  <?php if (!$enable) :?>
  <div class="col">
    <form action="" method="POST">
      <div class="d-grid gap-3 col-8 mx-auto d-flex flex-row-reverse bd-highlight mb-2">
        <button name="add" class="btn btn-primary me-md-5 bd-highlight">enrolment</button>
      </div>
    </form>
  </div>
  <?php endif?>

    </div>
    <?php if ($errors) :?>
    <div class="alert alert-danger fs-6 fw-bolder" style="color: #842029;background-color: #f8d7da;border-color: #f5c2c7;" role="alert">
    <?=$errors?>
    </div>
    <?php endif?>

    <!-- header -->

      <?php if (!empty($enable)) :?>
        <?php if ($enable[0]['enable']) :?>

      <div class="row " >
      <div class="col-8">

        <?php if ($videos != null) : ?>
          <?php foreach ($videos as $Video) : ?>
            <?php if (substr($Video['path'], 0, 8) == 'https://') { ?>

              <div class="card" style="height: 500px">

                <iframe width="100%" height="100%" src="<?= $Video['path']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                </iframe>

              </div>
            <?php  } else { ?>

              <div class="card" style="height: 500px">
                <video src="<?= base_url('assets/videos/' . $Video['path']); ?>" controls width='100%' height='100%'></video>

              </div>

            <?php } ?>


          <?php endforeach; ?>
        <?php else : ?>

          <h3>No videoes yet</h3><br>
          <p>Unable to find any videoes.</p>

        <?php endif ?>
        </div>
          <div class="col overflow-auto " style=" height:500px;">
            <div data-bs-spy="scroll">
              <?= $pager->newlinks('default', 'default_courses', $allVideo) ?>
            </div>
          </div>
      </div>
      <?php endif ?>
<?php else:?>
  <div class="row " >
      <div class="col-8">

        <?php if ($videos != null) : ?>
          <?php foreach ($videos as $Video) : ?>
            <?php if (substr($Video['path'], 0, 8) == 'https://') { ?>

              <div class="card" style="height: 500px">

                <iframe width="100%" height="100%" src="<?= $Video['path']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                </iframe>

              </div>
            <?php  } else { ?>

              <div class="card" style="height: 500px">
                <video src="<?= base_url('assets/videos/' . $Video['path']); ?>" controls width='100%' height='100%'></video>

              </div>

            <?php } ?>


          <?php endforeach; ?>
        <?php else : ?>

          <h3>No videoes yet</h3><br>
          <p>Unable to find any videoes.</p>

        <?php endif ?>
      </div>
    </div>
<?php endif?>


    <div class="row mt-5">
    <div class="col-md-4 bg-light text-dark ">
    <img src="<?=base_url('assets/uploads/'.$course['courses_image']);?>" class="img-fluid rounded ms-4 mt-1"  alt="course">

    <?php $sum = array(); foreach ($videoDuration as $Video):
    array_push($sum, $Video['videoDuration']);
    endforeach;
    $videoDuration = array_sum($sum);
    ?>
    </div>
    <div class="col-md-8 ">
      <div class="card-body">
        <h5 class="card-title"><?= esc($course['courses_name']) ?></h5>
        <p class="card-text"><small class="text-muted"><?= esc($course['categories_name']) ?></small><br><small class="text-muted"><?= esc($course['courses_language_code']) ?> /<?= esc($videoDuration)?>m</small></p>
        <p class="card-text text-break"><?= esc($course['courses_description']) ?></p>
      </div>
    </div>
  </div>
</div>
