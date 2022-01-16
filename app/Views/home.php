
	
	
    

<!--home section-->

<section class="homepage" id="homepage">

<div class="homepage">

  
	


<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img  src="<?= base_url('assets/images/img10.jpeg');?>" class="d-block w-100" alt="..."> 
    <div class="carousel-caption">
          <h5 class="animated bounceInRight" style="animation-delay: 1s">ELEARN</h5>
          <p class="animated bounceInLeft" style="animation-delay: 2s">Never give up until you learn what you want!
          </p>
          <?php if (!session()->get('loginStudant')) { ?>
        <a href="<?=base_url ('Users/registration')?>" ><button class="animated bounceInRight" style="animation-delay: 3s" type="button" class="btn btn-primary">Rigester Now!</button></a>
      <?php }else{ ?>
        <a href="<?=base_url ('categories')?>" ><button class="animated bounceInRight" style="animation-delay: 3s" type="button" class="btn btn-primary">Go To Categories</button></a>
        <?php } ?>
    </div>
    </div>
    <div class="carousel-item">
    <img  src="<?= base_url('assets/images/img2.jpeg');?>" class="d-block w-100" alt="..."> 
    <div class="carousel-caption">
      <h5 class="animated bounceInRight" style="animation-delay: 1s">ELEARN</h5>
      <p class="animated bounceInLeft" style="animation-delay: 2s">Never give up until you learn what you want!
      </p>
      <?php if (!session()->get('loginStudant')) { ?>
        <a href="<?=base_url ('Users/registration')?>" ><button class="animated bounceInRight" style="animation-delay: 3s" type="button" class="btn btn-primary">Rigester Now!</button></a>
      <?php }else{ ?>
        <a href="<?=base_url ('categories')?>" ><button class="animated bounceInRight" style="animation-delay: 3s" type="button" class="btn btn-primary">Go To Categories</button></a>
        <?php } ?>
    </div>
    </div>
    <div class="carousel-item">
    <img  src="<?= base_url('assets/images/img5.jpeg');?>" class="d-block w-100" alt="..."> 
    <div class="carousel-caption">
              <h5 class="animated bounceInRight" style="animation-delay: 1s">ELEARN</h5>
              <p class="animated bounceInLeft" style="animation-delay: 2s">Never give up until you learn what you want!</p>

        <?php if (!session()->get('loginStudant')) { ?>
        <a href="<?=base_url ('Users/registration')?>" ><button class="animated bounceInRight" style="animation-delay: 3s" type="button" class="btn btn-primary">Rigester Now!</button></a>
      <?php }else{ ?>
        <a href="<?=base_url ('categories')?>" ><button class="animated bounceInRight" style="animation-delay: 3s" type="button" class="btn btn-primary">Go To Categories</button></a>
        <?php } ?>

            </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>


 


</section>
<!--end home section-->














<!--courses section-->

<section id="courses" class="container-fluid">
<h1 style="font-size:50px; margin-top:30px" class="heading"><span>O</span>UR <SPAN>L</SPAN>ATEST<span> C</span>OURSES</h1>
  

<div class="wrapper">
         <div class="car owl-carousel">


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
                  <a href="<?=base_url('Categories/viewCourse/'.$course['courses_id'])?>"><button class="btn btn-primary">View</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <div class="text-white-50 bg-dark">
        <h3 colspan="6">
          <h3>No courses yet</h3><br>
          <p>Unable to find any courses.</p>
        </h3>
      </div>
    <?php endif ?>
            

            </div>
         
      </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</section>

<!-- end courses section-->






<!--contact section-->




<!-- end contact section-->



















































