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
                    <div class="job-post-wrapper mt60">
                        <!-- Start of Single Job Post 1 -->
                        <div class="single-job-post row nomargin">
                            <!-- Job Company -->
                            <div class="col-md-2 col-xs-3">
                                <div class="job-company">
                                    <a href="company-page-1.html">
                                        <img src="images/companies/envato.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Job Title & Info -->
                            <div class="col-md-7 col-xs-6 ptb20">
                                <div class="job-title">
                                    <a href="job-page.html">php senior developer</a>
                                </div>
                                <div class="job-info">
                                    <span class="company"><i class="fa fa-building-o"></i>envato</span>
                                    <span class="location"><i class="fa fa-map-marker"></i>Melbourn, Australia</span>
                                </div>
                            </div>
                            <!-- Job Category -->
                            <div class="col-md-3 col-xs-3 ptb30">
                                <div class="job-category">
                                    <a href="#" class="btn btn-success capitalize">full time</a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Single Job Post 1 -->
                        <!-- Start of Single Job Post 2 -->
                        <div class="single-job-post row nomargin">
                            <!-- Job Company -->
                            <div class="col-md-2 col-xs-3">
                                <div class="job-company">
                                    <a href="company-page-1.html">
                                        <img src="images/companies/google.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Job Title & Info -->
                            <div class="col-md-7 col-xs-6 ptb20">
                                <div class="job-title">
                                    <a href="job-page.html">department head</a>
                                </div>
                                <div class="job-info">
                                    <span class="company"><i class="fa fa-building-o"></i>google</span>
                                    <span class="location"><i class="fa fa-map-marker"></i>berlin, germany</span>
                                </div>
                            </div>
                            <!-- Job Category -->
                            <div class="col-md-3 col-xs-3 ptb30">
                                <div class="job-category">
                                    <a href="#" class="btn btn-info capitalize">part time</a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Single Job Post 2 -->
                        <!-- Start of Single Job Post 3 -->
                        <div class="single-job-post row nomargin">
                            <!-- Job Company -->
                            <div class="col-md-2 col-xs-3">
                                <div class="job-company">
                                    <a href="company-page-1.html">
                                        <img src="images/companies/facebook.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Job Title & Info -->
                            <div class="col-md-7 col-xs-6 ptb20">
                                <div class="job-title">
                                    <a href="job-page.html">graphic designer</a>
                                </div>
                                <div class="job-info">
                                    <span class="company"><i class="fa fa-building-o"></i>facebook</span>
                                    <span class="location"><i class="fa fa-map-marker"></i>london, UK</span>
                                </div>
                            </div>
                            <!-- Job Category -->
                            <div class="col-md-3 col-xs-3 ptb30">
                                <div class="job-category">
                                    <a href="#" class="btn btn-primary capitalize">freelancer</a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Single Job Post 3 -->
                        <!-- Start of Single Job Post 4 -->
                        <div class="single-job-post row nomargin">
                            <!-- Job Company -->
                            <div class="col-md-2 col-xs-3">
                                <div class="job-company">
                                    <a href="company-page-1.html">
                                        <img src="images/companies/envato.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Job Title & Info -->
                            <div class="col-md-7 col-xs-6 ptb20">
                                <div class="job-title">
                                    <a href="job-page.html">senior UI & UX designer</a>
                                </div>
                                <div class="job-info">
                                    <span class="company"><i class="fa fa-building-o"></i>envato</span>
                                    <span class="location"><i class="fa fa-map-marker"></i>Melbourn, Australia</span>
                                </div>
                            </div>
                            <!-- Job Category -->
                            <div class="col-md-3 col-xs-3 ptb30">
                                <div class="job-category">
                                    <a href="#" class="btn btn-warning capitalize">intership</a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Single Job Post 4 -->
                        <!-- Start of Single Job Post 5 -->
                        <div class="single-job-post row nomargin">
                            <!-- Job Company -->
                            <div class="col-md-2 col-xs-3">
                                <div class="job-company">
                                    <a href="company-page-1.html">
                                        <img src="images/companies/twitter.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Job Title & Info -->
                            <div class="col-md-7 col-xs-6 ptb20">
                                <div class="job-title">
                                    <a href="job-page.html">senior health advisor</a>
                                </div>
                                <div class="job-info">
                                    <span class="company"><i class="fa fa-building-o"></i>twitter</span>
                                    <span class="location"><i class="fa fa-map-marker"></i>New York, USA</span>
                                </div>
                            </div>
                            <!-- Job Category -->
                            <div class="col-md-3 col-xs-3 ptb30">
                                <div class="job-category">
                                    <a href="javascript:void(0)" class="btn btn-danger capitalize">temporary</a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Single Job Post 5 -->
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
                    <h2 class="capitalize"><i class="fa fa-star"></i>golden jobs</h2>
                    <!-- Start of Featured Job Widget -->
                    <div class="featured-job widget mt60">
                        <!-- Start of Company Logo -->
                        <div class="company">
                            <img src="images/companies/cloudify.svg" alt="">
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= URL ?>Assets/js/jquery.min.js" defer></script>
    <script src="<?= URL ?>Assets/js/popper.min.js" defer></script>
    <script src="<?= URL ?>Assets/js/bootstrap.min.js" defer></script>
    <!-- Custom JavaScript -->
    <script src="https://kit.fontawesome.com/ff77c957bf.js" crossorigin="anonymous" defer></script>
    <script src="<?= URL ?>Assets/js/custom.js" defer></script>
</body>

</html>