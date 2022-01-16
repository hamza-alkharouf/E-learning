<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " aria-current="page" 
    href="<?= base_url('Admin/ContactInfo')?>"> <h5>Contact Info </h5></a>
  </li>

  <li class="nav-item">
    <a class="nav-link active" 
    href="<?= base_url('Admin/SocialMedia/index')?>"><h5><?= $page_title; ?></h5></a>
  </li>
</ul>

    
<div class="box">
    <div id="buttonAdd">
   <a href="<?=base_url('Admin/SocialMedia/add/'.$contactId)?>" 
   class="text-light" style="text-decoration: none" >
   <button type="button" class="btn  btn-primary"> 
   <h5> + Add <?= $page_title; ?> </h5></button></a>
    </div>

    <?php if ($socialMedias!=null) : ?>
    <div class="container">
    <div class="row"> 
    <?php foreach ($socialMedias as $socialMedia): ?>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="box-part text-center">              
    <div class="title">
    <h4><?=$socialMedia['name']?></h4>
    </div>                 
    <a href="<?=$socialMedia['link']?>" class="fs-5">Go to <?=$socialMedia['name']?></a>
    <br>
    <br>
    <a href="<?=base_url('Admin/socialMedia/update/'.$socialMedia['ContactInfoId'].'/'.$socialMedia['id'])?>">
    <button type="button" class="btn btn-md btn-sm btn-lg btn-success">
    <i class="fas fa-user-edit"></i>Update</button></a>

    <a href="<?=base_url('Admin/socialMedia/delete/'.$socialMedia['ContactInfoId'].'/'.$socialMedia['id'])?>">
    <button type="button" class="btn btn-md btn-sm btn-lg btn-danger">
    <i class="fas fa-user-times"></i> Delete</button></a>
    </div>
    </div>	 
    <?php endforeach; ?>		 
      </div>
      <div id="Pagination">
    <?= $pager->links() ?>
    </div> 		
        </div>
        <?php else : ?>
            <div class="Messages">
            <h3>No <?= $page_title; ?> yet</h3>
            <p>Unable to find any <?= $page_title; ?> .</p>
            </div>                                       
            <?php endif ?>
            </div>
