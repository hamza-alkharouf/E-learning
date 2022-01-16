


<div class="container" >


<div class="row">

<div class="col-md-12 mt-5">

<div class="card">


<div class="card-header" >

<h4  >List Of <?= $page_title; ?>


<a href=" <?=  base_url ('Admin/Students/add ')?>"  class="text-light" ><button  type="button" class="btn btn-primary float-end"> <i class="fas fa-user-plus" ></i> Add Category</button></a>

</h4>

</div>

<div class="card-body" >

<table class="table table-bordered  table-hover ">

<thead class="table-secondary">
<tr>
      <th scope="col">ID</th>
      <th scope="col">First Name </th>
      <th scope="col">Last Name</th>
	  <th scope="col">Email</th>
	  <th scope="col">is active</th>
	  <th scope="col">operations</th>
	 
    </tr>

  </thead>

  <tbody>
  <?php if ($Students!=null) : ?>
	<?php foreach ($Students as $Student): ?>
		<tr>
		<th scope="row"><?= esc($Student['id']) ?></th>
		<th><?= esc($Student['firstname']) ?></th>
		<th><?= esc($Student['lastname']) ?></th>
		<th><?= esc($Student['email']) ?></th>
		<th><?php if ($Student['is_active']==1) 
		{
			echo "true";	
		} else {
			echo "false";
		}?></th>
		<th><a href="<?=base_url('Admin/Students/update/'.$Student['id'])?>"><button type="button" class="btn btn-md btn-sm btn-lg btn-success"> <i class="fas fa-user-edit"></i> Update</button></a>
		<a href="<?=base_url('Admin/Students/delete/'.$Student['id'])?>"><button type="button" class="btn btn-md btn-sm btn-lg btn-danger"><i class="fas fa-user-times"></i> Delete</button></a>
		<a href="<?=base_url('Admin/Students/ban/'.$Student['id'])?>"><button type="button" class="btn btn-md btn-sm btn-lg btn-dark"><i class="fas fa-user-slash"></i> Ban</button></a>		
		<a href="<?=base_url('Admin/Enrollments/Approvals/'.$Student['id'])?>"><button type="button" class="btn btn-md btn-sm btn-lg btn-secondary">enrollments</button></a></th>
		</tr>
					
	<?php endforeach; ?>
	<?php else : ?>
	<tr>
 <th colspan="6"><h3>No <?= $page_title; ?> yet</h3><br><p>Unable to find any <?= $page_title; ?>.</p></th>
	</tr>					
 <?php endif ?>


			</tbody>

</table>

<div id="Pagination">
    <?= $pager->links() ?>
    </div>

</div>
</div>



</div>


</div>



</div>

