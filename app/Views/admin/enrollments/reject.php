<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('Admin/enrollments/Approvals/'.$StudentId)?>">Approvals List</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="<?= base_url('Admin/enrollments/Cancellation/'.$StudentId)?>">Cancellation List</a>
  </li>
</ul>

<?php if ($enrollments!=null) : ?>  
  <div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($enrollments as $Enrollment): ?>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="card shadow h-100">
              <div class="card-header">
              <?= $page_title; ?>
              </div>
              <div class="card-body">
                <h5 class="card-title">Procedures after refusing to register for courses</h5>
                <p class="card-text">Student <?=$Enrollment['firstname'] ?> <?=$Enrollment['lastname'] ?>  was denied registration in Course <?=$Enrollment['name'] ?>, what are your procedures?</p>
              </div>
              <div class="card-footer d-flex justify-content-between">
              <a href="<?= base_url('Admin/enrollments/acceptStudent/'.$Enrollment['id'].'/'.$Enrollment['studentId'])?>" name="formButton" value="accept" class="btn btn-primary"><i class="fas fa-check"></i> accept</a>
              </div>
            </div>
            </div>
    <?php endforeach; ?>
  </div>
  <div id="Pagination">
    <?= $pager->links() ?>
    </div>
  </div>
					<?php else : ?>
              <br>
              <br>
							<h3>There are no <?= $page_title; ?> yet</h3>
              <p>Unable to find any  <?= $page_title; ?>.</p>				
			<?php endif ?>


