<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $data['titulo_pagina'] ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= URL ?>Assets/img/Logo_ponslabor.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= URL ?>Assets/css/bootstrap.min.css" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= URL ?>Assets/css/stylesMenu.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= URL ?>Assets/css/responsive.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body class="right-column-fixed">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Menu de navegación -->
        <?php
        require_once('./Views/Components/Layout.php');
        ?>
        <!-- ===== Start of Job Post Section ===== -->
        <section class="ptb80" id="job-post">
            <div class="container d-flex">
                <!-- Start of Job Post Main -->
                <div class="col-md-8 col-sm-12 col-xs-12 job-post-main">
                    <h2 class="capitalize"><i class="las la-briefcase"></i>Últimos trabajos</h2>
                    <!-- Start of Job Post Wrapper -->
                    <div class="job-post-wrapper mt60" id="list-vacantes">
                    </div>
                    <!-- End of Job Post Wrapper -->

                    <!-- Start of Pagination -->
                    <ul class="pagination justify-content-center mt-3">
                        <li class="page-item disabled">
                            <a class="page-link">Anterior</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Siguiente</a>
                        </li>
                    </ul>
                    <!-- End of Pagination -->
                </div>
                <!-- End of Job Post Main -->
                <!-- Start of Job Post Sidebar -->
                <div class="col-md-4 col-sm-12 col-xs-12 job-post-sidebar">
                    <h2 class="capitalize"><i class="fa fa-star"></i>Recomendados</h2>
                    <!-- Start of Featured Job Widget -->
                    <div class="featured-job widget mt60">
                        <!-- Start of Company Logo -->
                        <div class="company">
                            <img src="<?= URL ?>Assets/img/upload.png" class="img-fluid" alt="">
                        </div>
                        <!-- End of Company Logo -->
                        <!-- Start of Featured Job Info -->
                        <div class="featured-job-info">
                            <!-- Job Title -->
                            <div class="job-title d-flex justify-content-between align-items-center">
                                <h5 class="uppercase pull-left">ui designer</h5>
                                <a href="#" class="btn btn-success capitalize">full time</a>
                            </div>
                            <!-- Job Info -->
                            <div class="job-info pt5">
                                <span id="company"><i class="fa fa-building-o"></i>cloudify</span>
                                <span id="location"><i class="fa fa-map-marker"></i>london, uk</span>
                            </div>
                            <p class="mt20"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <!-- View Job Button -->
                            <div class="text-center mt20">
                                <a href="#" class="btn btn-info capitalize">view job</a>
                            </div>
                        </div>
                        <!-- End of Featured Job Info -->
                    </div>
                    <!-- End of Featured Job Widget -->
                    <!-- Start of Upload Resume Widget -->
                    <div class="upload-resume widget mt40 text-center">
                        <h4 class="capitalize">upload your resume</h4>
                        <p class="mtb10"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry...</p>
                        <a href="#" class="btn btn-primary capitalize mt10">upload resume</a>
                    </div>
                    <!-- End of Upload Resume Widget -->
                </div>
                <!-- End of Job Post Sidebar -->
            </div>
        </section>
        <!-- ===== End of Job Post Section ===== -->
    </div>
    <!-- Wrapper END -->
    <!-- Footer -->
    <?php
    require_once('./Views/Components/Footer.php');
    ?>

    <!-- Scripts  -->
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL ?>Assets/js/vacante.js" type="module" defer></script>
</body>

</html>