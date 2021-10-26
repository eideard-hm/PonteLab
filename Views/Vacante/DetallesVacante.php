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
                            <h3><?= $data['detail_vacante']['nombreVacante'] ?></h3>
                        </div>
                        <div class="col-md-6 col-xs-12 text-right">
                            <a href="#" class="btn btn-success capitalize mt15"><?= $data['detail_vacante']['tipoContratoVacante'] ?></a>
                            <a href="#" class="btn btn-success capitalize mt15">full time</a>
                            <!-- <a href="#" class="btn btn-primary mt15"><i class="fa fa-star"></i>Agregar a favoritos</a> -->
                        </div>
                    </div>
                    <!-- End of Row -->
                </div>
            </section>

            <section class="job-header mtb20">
                <div class="container">
                    <!-- Start of Row -->
                    <div class="row">
                        <?= $data['detail_vacante']['descripcionVacante'] ?>
                    </div>
                </div>
            </section>
            <!-- ===== End of Job Header Section ===== -->
            <!-- ===== Start of Main Wrapper Job Section ===== -->
            <section class="ptb80" id="job-page">
                <div class="container">
                    <!-- Start of Row -->
                    <div class="row" id="detail-vacante">
                        <!-- ===== Start of Job Details ===== -->
                        <div class="col-md-8 col-xs-12">
                            <!-- Start of Company Info -->
                            <div class="row company-info">
                                <!-- Job Company Image -->
                                <div class="col-md-3">
                                    <div class="job-company">
                                        <a href="company-page.html">
                                            <img src="<?= empty($data['detail_vacante']['imagenUsuario']) ? URL . 'Assets/img/upload.png' : URL . 'Assets/img/' . $data['detail_vacante']['imagenUsuario'] ?>" alt="<?= $data['detail_vacante']['nombreUsuario'] ?>" class="img-fluid" />
                                        </a>
                                    </div>
                                </div>

                                <!-- Job Company Info -->
                                <div class=" col-md-9">
                                    <div class="job-company-info mt30">
                                        <h3 class="capitalize"><?= $data['detail_vacante']['nombreUsuario'] ?></h3>
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
                                        <h4>Perfil del aspirante</h4>
                                        <?= $data['detail_vacante']['perfilAspirante'] ?>
                                    </div>
                                    <!-- Div wrapper -->
                                    <div class="pt40">
                                        <h4 class="mt40">Requisitos</h4>
                                        <h6 class="mt40"><?= $data['detail_vacante']['nombreRequisitos'] ?></h5>
                                            <?= $data['detail_vacante']['especficacionRequisitos'] ?>
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
                                        <h5><i class="fa fa-calendar"></i>Publicación:</h5>
                                        <span><?= $data['detail_vacante']['fechaHoraPublicacion'] ?></span>
                                    </li>
                                    <li>
                                        <h5><i class="far fa-calendar-times"></i>Cierre:</h5>
                                        <span><?= $data['detail_vacante']['fechaHoraCierre'] ?></span>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-map-marker"></i>Dirección:</h5>
                                        <span><?= $data['detail_vacante']['direccionVacante'] ?></span>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-money"></i>Salario:</h5>
                                        <span>$ <?= number_format($data['detail_vacante']['sueldoVacante'], 3, '.', ',') ?></span>
                                    </li>
                                    <li>
                                        <h5><i class="fas fa-question"></i>Estado:</h5>
                                        <?= $data['detail_vacante']['estadoVacante'] == 1 ? '<a href="#" class="btn btn-success">Activa</a>' : '<a href="#" class="btn btn-danger">Inactiva</a>' ?>
                                    </li>
                                </ul>

                                <?php
                                if (isset($_SESSION['data-aspirante']['idAspirante']) && empty($data['aspiranteApplyVacancy'])) {
                                ?>
                                    <div class="mt20">
                                        <form id="form-aplicar-vacante">
                                            <input type="hidden" id="idVacante" name="idVacante" value="<?= $data['detail_vacante']['idVacante'] ?>" />
                                            <input type="hidden" id="idAspirante" name="idAspirante" value="<?= $_SESSION['data-aspirante']['idAspirante'] ?>" />
                                        </form>
                                        <a class="btn btn-primary" id="apply-vacancy">Aplicar a este empleo</a>
                                    </div>
                                <?php } ?>
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
        </div>
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