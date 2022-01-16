<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title><?= $page_title; ?></title>
        <?php echo link_tag('assets/adminImage/'.$logoWebSite, 'shortcut icon', 'image/ico'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
      <link href="<?= base_url('assets/css/navbar.css'); ?>" rel="stylesheet"/>

        <link href="<?= base_url('assets/css/admin.min.css'); ?>" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <?php foreach ($css as $file) : ?>
            <link rel="stylesheet" href="<?= base_url('assets/css/'.$file); ?>">
        <?php endforeach; ?>


        

    </head>
    <body class="sb-nav-fixed">
    <?= view('layout/navbar'); ?>
                <main>
                        <?= view($view_file,$controller_data); ?>
                </main>
                <footer class="py-4  bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <?php foreach ($js as $file) : ?>
            <script src="<?= base_url('assets/js/'.$file); ?>"></script>
        <?php endforeach; ?>
        <script src="<?= base_url('assets/js/admin.js'); ?>"></script>

        
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
 <script>
         $(".car").owlCarousel({
           margin: 20,
           loop: true,
           autoplay: true,
           autoplayTimeout: 2000,
           autoplayHoverPause: true,
           responsive: {
             0:{
               items:1,
               nav: false
             },
             600:{
               items:2,
               nav: false
             },
             1000:{
               items:3,
               nav: false
             }
           }
         });
      </script>
      <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
        
    </body>
</html>
