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
    <link rel="stylesheet" href="<?= URL ?>Assets/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= URL ?>Assets/css/stylesMenu.css">
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

        <div id="content-page" class="content-page">
            <!-- ===== Start of Job Header Section ===== -->
            <section class="job-header mtb20">
                <div class="container">
                    <!-- Start of Row -->
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-6 col-xs-12">
                            <h3>php senior developer</h3>
                        </div>
                        <div class="col-md-6 col-xs-12 text-right">
                            <a href="#" class="btn btn-success capitalize mt15">full time</a>
                            <!-- <a href="#" class="btn btn-primary mt15"><i class="fa fa-star"></i>Agregar a favoritos</a> -->
                        </div>
                    </div>
                    <!-- End of Row -->
                </div>
            </section>
            <!-- ===== End of Job Header Section ===== -->

            <!-- ===== Start of Main Wrapper Job Section ===== -->
            <section class="ptb80" id="job-page">
                <div class="container">
                    <!-- Start of Row -->
                    <div class="row">
                        <!-- ===== Start of Job Details ===== -->
                        <div class="col-md-8 col-xs-12">
                            <!-- Start of Company Info -->
                            <div class="row company-info">
                                <!-- Job Company Image -->
                                <div class="col-md-3">
                                    <div class="job-company">
                                        <a href="company-page.html">
                                            <img src="images/companies/envato.svg" alt="">
                                        </a>
                                    </div>
                                </div>

                                <!-- Job Company Info -->
                                <div class="col-md-9">
                                    <div class="job-company-info mt30">
                                        <h3 class="capitalize">envato</h3>
                                        <ul class="list-inline mt10">
                                            <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i>Website</a></li>
                                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a></li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Company Info -->

                            <!-- Start of Job Details -->
                            <div class="row job-details mt40">
                                <div class="col-md-12">
                                    <!-- Vimeo Video -->
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/176916362?title=0&amp;byline=0&amp;portrait=0" allowfullscreen=""></iframe>
                                    </div>
                                    <!-- Div wrapper -->
                                    <div class="pt40">
                                        <h5>Job Overview</h5>
                                        <p class="mt20">Our development team focuses on unit testing, TDD, CI, design patterns and refactoring. Internal and external training is encouraged through mentoring, guided self-learning, conferences, user groups and training courses. We maintain and improve existing codebases, and create new systems, exposing developers to constant variety.</p>
                                        <p>Our team understands the performance implications of serving more than 25,000 page requests per-hour, crafting awesome user experiences. While we leverage existing tech, we also research new technologies to overcome technical and business challenges, to maintain our industry-leading status.</p>
                                    </div>
                                    <!-- Div wrapper -->
                                    <div class="pt40">
                                        <h5 class="mt40">Key Requirements</h5>
                                        <!-- Start of List -->
                                        <ul class="list mt20">
                                            <li>Personally passionate and up to date with current trends and technologies, committed to quality and comfortable working with adult media.</li>
                                            <li>Bachelor or Master degree level educational background.</li>
                                            <li>4 years relevant PHP dev experience.</li>
                                            <li>Troubleshooting, testing and maintaining the core product software and databases.</li>
                                        </ul>
                                        <!-- End of List -->
                                    </div>
                                    <!-- Div wrapper -->
                                    <div class="pt40">
                                        <h5 class="mt40">We Offer</h5>
                                        <!-- Start of List -->
                                        <ul class="list mt20">
                                            <li>An exciting job where you can assume responsibility and develop professionally.</li>
                                            <li>A dynamic team with friendly, highly-qualified colleagues from all over the world.</li>
                                            <li>Strong, sustainable growth and fresh challenges every day.</li>
                                            <li>Flat hierarchies and short decision paths.</li>
                                        </ul>
                                        <!-- End of List -->
                                        <p class="mt40">If you feel that this is the place where you belong and start your career with a ton of new opportunities, please don't hasitate to apply for the job position.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Job Details -->
                        </div>
                        <!-- ===== End of Job Details ===== -->

                        <!-- ===== Start of Job Sidebar ===== -->
                        <div class="col-md-4 col-xs-12">
                            <!-- Start of Job Sidebar -->
                            <div class="job-sidebar">
                                <ul class="job-overview nopadding mt40">
                                    <li>
                                        <h5><i class="fa fa-calendar"></i> Date Posted:</h5>
                                        <span>Posted 1 year ago</span>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-map-marker"></i> Location:</h5>
                                        <span>New York, NY, United States</span>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-money"></i> Hourly Rate:</h5>
                                        <span>$25-$35 per Hour</span>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-money"></i> Salary:</h5>
                                        <span>$25.000-$35.000</span>
                                    </li>
                                </ul>

                                <div class="mt20">
                                    <a href="#" class="btn btn-primary">Aplicar a este empleo</a>
                                </div>
                            </div>
                            <!-- Start of Job Sidebar -->
                            <!-- Start of Google Map -->
                            <div class="col-md-12 gmaps mt60">
                                <div id="map"></div>
                            </div>
                            <!-- End of Google Map -->
                        </div>
                        <!-- ===== End of Job Sidebar ===== -->
                    </div>
                    <!-- End of Row -->

                    <!-- Start of Row -->
                    <div class="row mt80">
                        <div class="col-md-12">
                            <h2 class="capitalize pb40">Trabajos relacionados</h2>
                            <!-- Start of Owl Slider -->
                            <div class="owl-carousel related-jobs">
                                <!-- Start of Slide item 1 -->
                                <div class="item">
                                    <a href="job-page.html">
                                        <h5>UI/UX Designer</h5>
                                    </a>
                                    <a href="#" class="btn btn-success capitalize mt15">full time</a>
                                    <h5 class="pt40 pb10"><i class="fa fa-money"></i> Salary:</h5>
                                    <h5>$25.000-$35.000</h5>
                                </div>
                                <!-- End of Slide item 1 -->

                                <!-- Start of Slide item 2 -->
                                <div class="item">
                                    <a href="job-page.html">
                                        <h5>Restaurant Chef</h5>
                                    </a>
                                    <a href="#" class="btn btn-danger capitalize mt15">temporary</a>
                                    <h5 class="pt40 pb10"><i class="fa fa-money"></i> Salary:</h5>
                                    <h5>$15.000-$20.000</h5>
                                </div>
                                <!-- End of Slide item 2 -->

                                <!-- Start of Slide item 3 -->
                                <div class="item">
                                    <a href="job-page.html">
                                        <h5>Social Marketing</h5>
                                    </a>
                                    <a href="#" class="btn btn-warning capitalize mt15">part time</a>
                                    <h5 class="pt40 pb10"><i class="fa fa-money"></i> Salary:</h5>
                                    <h5>$25.000-$35.000</h5>
                                </div>
                                <!-- End of Slide item 3 -->

                                <!-- Start of Slide item 4 -->
                                <div class="item">
                                    <a href="job-page.html">
                                        <h5>PHP Developer</h5>
                                    </a>
                                    <a href="#" class="btn btn-success capitalize mt15">full time</a>
                                    <h5 class="pt40 pb10"><i class="fa fa-money"></i> Salary:</h5>
                                    <h5>$35.000-$40.000</h5>
                                </div>
                                <!-- End of Slide item 4 -->

                                <!-- Start of Slide item 5 -->
                                <div class="item">
                                    <a href="job-page.html">
                                        <h5>IOS Developer</h5>
                                    </a>
                                    <a href="#" class="btn btn-primary capitalize mt15">freelancer</a>
                                    <h5 class="pt40 pb10"><i class="fa fa-money"></i> Salary:</h5>
                                    <h5>$30.000</h5>
                                </div>
                                <!-- End of Slide item 5 -->
                                <!-- Start of Slide item 6 -->
                                <div class="item">
                                    <a href="job-page.html">
                                        <h5>Web Developer</h5>
                                    </a>
                                    <a href="#" class="btn btn-info mt15 capitalize">intership</a>
                                    <h5 class="pt40 pb10"><i class="fa fa-money"></i> Salary:</h5>
                                    <h5>$45.000-$50.000</h5>
                                </div>
                                <!-- End of Slide item 6 -->
                            </div>
                            <!-- End of Owl Slider -->
                        </div>
                    </div>
                    <!-- End of Row -->
                </div>
            </section>
            <!-- ===== End of Main Wrapper Job Section ===== -->
        </div id="content-page" class="content-page" v>
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
    <script src="<?= URL ?>Assets/js/owl.carousel.min.js" defer></script>
    <!-- Custom JavaScript -->
    <script src="https://kit.fontawesome.com/ff77c957bf.js" crossorigin="anonymous"></script>
    <script src="<?= URL ?>Assets/js/custom.js" defer></script>
</body>

</html>