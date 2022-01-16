


<div class="container" >


<div class="row">

<div class="col-md-12 mt-5">

<div class="card">


<div class="card-header" >

<h4  >List Of <?= $page_title; ?>


<a href=" <?=  base_url ('Admin/Admins/add ')?>"  class="text-light" ><button  type="button" class="btn btn-primary float-end"> <i class="fas fa-user-plus" ></i> Add Category</button></a>

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
  <?php if ($admins!=null) : ?>
	<?php foreach ($admins as $admin): ?>
	<tr>
	<th scope="row"><?= esc($admin['id']) ?></th>
	<th><?= esc($admin['firstname']) ?></th>
	<th><?= esc($admin['lastname']) ?></th>
	<th><?= esc($admin['email']) ?></th>
	<th><?php if ($admin['is_active']==1) 
	{
		echo "true";	
	} else {
		echo "false";
	}?></th>

	<th>
		<a href="<?=base_url('Admin/Admins/update/'.$admin['id'])?>"><button type="button" class="btn btn-md btn-sm btn-lg btn-success"><i class="fas fa-user-edit"></i>Update</button></a>
		<a href="<?=base_url('Admin/Admins/delete/'.$admin['id'])?>">
		<button type="button" class="btn btn-md btn-sm btn-lg btn-danger"><i class="fas fa-user-times"></i> Delete</button></a>
	</th>
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

