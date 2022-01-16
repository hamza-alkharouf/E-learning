<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title><?= $page_title; ?></title>
        <?php echo link_tag('assets/adminImage/'.$logoWebSite, 'shortcut icon', 'image/ico'); ?>

        <link href="<?= base_url('assets/css/admin.min.css'); ?>" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
        <?php foreach ($css as $file) : ?>
            <link rel="stylesheet" href="<?= base_url('assets/css/'.$file); ?>">
        <?php endforeach; ?>
    </head>
    <body class="sb-nav-fixed">
        <?= view('admin/layout/navbar'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?= view('admin/layout/sidebar'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?= $page_title; ?></h1>
                        <?= view($view_file,$controller_data); ?>
                    </div>
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
            </div>
        </div>
        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <?php foreach ($js as $file) : ?>
            <script src="<?= base_url('assets/js/'.$file); ?>"></script>
        <?php endforeach; ?>
        <script src="<?= base_url('assets/js/admin.js'); ?>"></script>
        
    </body>
</html>
