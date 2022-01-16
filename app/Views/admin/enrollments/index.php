

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
          <h5 class="card-title">Course registration procedures</h5>
          <p class="card-text">Student <?=$Enrollment['firstname'] ?> <?=$Enrollment['lastname'] ?> is trying to enter course  <?=$Enrollment['name']?>, what is your procedure?</p> 
        </div>
        <div class="card-footer d-flex justify-content-between">
        <a href="<?= base_url('Admin/enrollments/accept/'.$Enrollment['id'])?>" name="formButton" value="accept" class="btn btn-primary"><i class="fas fa-check"></i> accept</a>
          <a href="<?= base_url('Admin/enrollments/reject/'.$Enrollment['id'])?>"  name="formButton" value="reject" class="btn btn-danger"><i class="fas fa-times"></i> reject</a>      </div>
      </div>
  </div>
      <?php endforeach; ?>
    </div>
     <div id="Pagination">
    <?= $pager->links() ?>
    </div> 
<?php else : ?>
    <h3>No <?= $page_title; ?>  yet</h3>
    <p>Unable to find any <?= $page_title; ?>.</p>				
<?php endif ?>
