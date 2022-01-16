<div class="container-fluid px-4" >
<div class="row  py-4">
            <div class="col-lg-6 col-7">
              
              <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?= $page_title; ?></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
 
            </div>
          </div>

<div class="row main-bg text-center d-flex justify-content-center" style="padding-top:50px;padding-bottom:300px">
  <?php if ($Categories != null) : ?>
    <?php foreach ($Categories as $Category) : ?>
      <div class="col-xl-3 col-md-4">
        <a href="<?= base_url('Categories/Courses/' . $Category['id']) ?>">
          <div class="card card-stats">

            <div class="card-body">

              <div class="row">
                <div class="col">

                  <h3 class="card-title font-weight-bold mb-0"><?= esc($Category['name']) ?></h3>

                </div>

              </div>

            </div>
          </div>
        </a>
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
</div>
</div>