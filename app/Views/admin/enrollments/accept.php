

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="<?= base_url('Admin/enrollments/Approvals/'.$StudentId)?>">Approvals List</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('Admin/enrollments/Cancellation/'.$StudentId)?>">Cancellation List</a>
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
    <h5 class="card-title">Post-registration procedures in courses</h5>
    <p class="card-text">The registration of Student <?=$Enrollment['firstname'] ?> <?=$Enrollment['lastname'] ?> in Course  <?=$Enrollment['name'] ?> has been approved. Do you want to refuse to register it now?</p>
  </div>
  <div class="card-footer d-flex justify-content-between">
  <a href="<?= base_url('Admin/enrollments/rejectStudent/'.$Enrollment['id'].'/'.$Enrollment['studentId'])?>"  name="formButton" value="reject" class="btn btn-danger"><i class="fas fa-times"></i> reject</a>
  
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
							<h3>There are no  <?= $page_title; ?> yet</h3>
              <p>Unable to find any  <?= $page_title; ?>.</p>
			<?php endif ?>
