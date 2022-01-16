

	<div class="container-fluid px-4">
<!-- <div class="row align-items-center py-4">
<form action="">
      <div class="input-group mb-3">
        <input name="search" width="100%" type="text" aria-describedby="search" class="form-control form-control-lg" placeholder="Search "/>
        <div class="input-group-append">
          <button class="btn btn-lg btn-dark" type="submit">Search</button>
        </div>
      </div>
    </form>

</div> -->

<div class="container">
  <div class="row" style="margin-bottom: 210px;">
    <?php if ($courses != null) : ?>
      <?php foreach ($courses as $course) : ?>
        <div class="col mt-5">
          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img class="imgCard" src="<?= base_url('assets/uploads/' . $course['courses_image']); ?>" alt="Avatar" />
                <h5 class="card-text text-white bottom-left-Title"><?= esc($course['courses_name']) ?></h5>
                <p class="card-text bottom-left"><small class="text-white"><?= esc($course['categories_name']) ?></small></p>
              </div>
              <div class="flip-card-back">
                <div class="contain">
                  <p class="card-text text-center"><?= esc($course['courses_description']) ?></p>
                  <a href="<?=base_url('Categories/view/'.$course['courses_id'])?>"><button class="btn btn-primary">View</button></a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <div class="text-white-50 bg-dark">
        <h3 colspan="6">
          <h3>No <?= $page_title; ?> yet</h3><br>
          <p>Unable to find any <?= $page_title; ?>.</p>
        </h3>
      </div>
    <?php endif ?>
    <div class="mt-5" id="Pagination">
            <?= $pager->links() ?>
    </div> 
  </div>
</div>
</div>
