<?php if ($contact!=null) : ?>
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active " aria-current="page" 
    href="<?= base_url('Admin/ContactInfo')?>"><h5><?= $page_title; ?></h5></a>
  </li>
  <li class="nav-item">
    <a class="nav-link " 
    href="<?= base_url('Admin/SocialMedia/index/'.$contact[0]['id'])?>"> <h5>Social Media</h5></a>
  </li>
</ul>

     <div class="box">
     <div id="buttonAdd">
     <a href="<?=base_url('Admin/ContactInfo/update/'.$contact[0]['id'])?>" 
      class="text-light" style="text-decoration: none" >
      <button type="button" class="btn btn-success">
       <span class="fs-5">Update <?= $page_title; ?> </span></button></a> </div>
       </div>  
        <div class="container">
       <div class="contact-method">
       <i class="fas fa-map-marker-alt"></i>
        <span>Address <ul class="b"><li> <?= $contact[0]['Address']?></li></ul> </span>
      </div>
      <br>
      <div class="contact-method">
        <i class="fas fa-mobile-alt"></i>
        <span> Phone  <ul class="b"><li> <?= $contact[0]['Phone']?></li></ul> </span>
      </div>
      <br>
      <div class="contact-method">
      <i class="fas fa-envelope"></i>
        <span>Email  <ul class="b"><li> <?= $contact[0]['Email']?></li></ul> </span>
      </div>
     
        <div class="contact-method">
        <a href="<?=base_url('Admin/ContactInfo/delete/'.$contact[0]['id'])?>" 
        class="text-light" style="text-decoration: none" >
        <button type="button" class="btn btn-danger">
        <span class="fs-5">Delete</span></button></a>
      </div>
    </div>

    <?php else : ?>
    <br>
    <div id="buttonAdd">
    <a href="<?=base_url('Admin/ContactInfo/add')?>" 
    class="text-light">
    <button type="button" class="btn btn-primary"> <h4> <i class="fas fa-plus"></i> Add <?= $page_title; ?></h4></button></a>
    </div>
    <br>
    <div class="Messages">
    <h3 >No <?= $page_title; ?> yet</h3>
    <p>Unable to find any <?= $page_title; ?>.</p>
    </div>										
</div>
<?php endif ?>