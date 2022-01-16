


<div class="container" >


<div class="row">

<div class="col-md-12 mt-5">

<div class="card">


<div class="card-header" >

<h4  >List Of <?= $page_title; ?>


<a href=" <?=  base_url ('Admin/Categories/add ')?>"  class="text-light" ><button  type="button" class="btn btn-primary float-end"> <i class="fas fa-user-plus" ></i> Add Category</button></a>

</h4>

</div>

<div class="card-body" >

<table class="table table-bordered  table-hover ">

<thead class="table-secondary">
    <tr >
      <th scope="col">Id</th>
      <th scope="col"> Name </th>
	  <th scope="col"> Descrption </th>
	  <th scope="col" > Action</th>
    </tr>

  </thead>

  <tbody>
			<?php if ($categories!=null) : ?>
						<?php foreach ($categories as $Category): ?>
							<tr>
							<th scope="row"><?= esc($Category['id']) ?></th>
							<th><?= esc($Category['name']) ?></th>
							<th><?= esc($Category['descrption']) ?></th>
							<th><a href="<?=base_url('Admin/Categories/update/'.$Category['id'])?>"><button  type="button" class="btn btn-md btn-sm btn-lg btn-success"> <i class="fas fa-user-edit"></i> Update</button></a>
							<a href="<?=base_url('Admin/Categories/delete/'.$Category['id'])?>"><button type="button" class="btn btn-md btn-sm btn-lg btn-danger"><i class="fas fa-user-times"></i> Delete</button></a></th>
							</tr>
							
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<th colspan="4"><h3>No <?= $page_title; ?> yet</h3><br><p>Unable to find any <?= $page_title; ?>.</p></th>
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

