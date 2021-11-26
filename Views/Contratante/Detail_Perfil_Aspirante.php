<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $data['titulo_pagina'] ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= assets_url_img(); ?>Logo_ponslabor.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= assets_url_css(); ?>bootstrapIndex.min.css" />
    <link rel="stylesheet" href="<?= assets_url_css(); ?>index.css" />

    <link rel="stylesheet" href="<?= assets_url_css(); ?>bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= assets_url_css(); ?>stylesMenu.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= assets_url_css(); ?>responsive.css">
    <link rel="stylesheet" href="<?= assets_url_css(); ?>stylesGlobal.css">
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
        require_once('./Views/Components/LayoutC.php');
        ?>
        <div id="content-page" class="content-page">
            <?php require_once('./Views/Components/LoadingForms.php') ?>
            <!-- ===== End of Main Wrapper Job Section ===== -->
            <section class="pb80" id="candidate-profile">
                <div class="container">
                    <!-- Start of Row -->
                    <?php if (isset($data['perfil']) && count($data['perfil']) > 0) {  ?>
                            <div class="row candidate-profile">
                                <!-- Start of Profile Picture -->
                                <div class="col-md-3 col-xs-12">
                                    <div class="profile-photo">
                                        <img src="<?= assets_url_img(); ?>uploads/upload.svg" class="img-responsive" alt="">
                                    </div>
                                </div>
                                <!-- End of Profile Picture -->

                                <!-- Start of Profile Description -->
                                <div class="col-md-9 col-xs-12">
                                    <div class="profile-descr">

                                        <!-- Profile Title -->
                                        <div class="profile-title">
                                            <h2 class="capitalize"><?= $data['perfil']['nombreUsuario'] ?></h2>
                                            <h5 class="pt10"><?= $data['perfil']['nombrePuesto'] ?></h5>
                                        </div>

                                        <!-- Profile Details -->
                                        <div class="profile-details mt20">
                                            <?= $data['perfil']['descripcionPersonalAspirante'] ?>
                                        </div>

                                        <ul class="profile-info mt20 nopadding">
                                            <li>
                                                <i class="fa fa-map-marker"></i>
                                                <span><?= $data['perfil']['nombreBarrio'] ?>, <?= $data['perfil']['nombreCiudad'] ?></span>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i>
                                                <span><?= $data['perfil']['numTelUsuario'] ?></span>
                                            </li>

                                            <li>
                                                <i class="fa fa-envelope"></i>
                                                <a href="#"><?= $data['perfil']['correoUsuario'] ?></a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <!-- End of Profile Description -->
                            </div>
                    <?php } else { ?>
                        <div class="row candidate-profile">
                            <div class="col-md-12 col-xs-12">
                                <div class="profile-descr">
                                    <div class="profile-title">
                                        <h2 class="capitalize">No hay perfil</h2>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- End of Row -->
                        <!-- Start of Row -->
                        <div class="row skills mt40">

                            <div class="col-md-12 text-center">
                                <h3 class="pb40">My Skills</h3>
                            </div>

                            <!-- Start of Skill Bars Wrapper -->
                            <div class="col-md-6 col-xs-12 mt20">
                                <!-- Start of Skill Bar -->
                                <div class="skillbar clearfix " data-percent="90%">
                                    <div class="skillbar-title"><span>HTML5</span></div>
                                    <div class="skillbar-bar"></div>
                                    <div class="skill-bar-percent">90%</div>
                                </div>
                                <!-- End Skill Bar -->

                                <!-- Start of Skill Bar -->
                                <div class="skillbar clearfix " data-percent="85%">
                                    <div class="skillbar-title"><span>CSS3</span></div>
                                    <div class="skillbar-bar"></div>
                                    <div class="skill-bar-percent">85%</div>
                                </div>
                                <!-- End Skill Bar -->

                                <!-- Start of Skill Bar -->
                                <div class="skillbar clearfix " data-percent="75%">
                                    <div class="skillbar-title"><span>JavaScript</span></div>
                                    <div class="skillbar-bar"></div>
                                    <div class="skill-bar-percent">75%</div>
                                </div>
                                <!-- End Skill Bar -->
                            </div>
                            <!-- End of Skill Bars Wrapper -->


                            <!-- Start of Skill Bars Wrapper -->
                            <div class="col-md-6 col-xs-12 mt20">
                                <!-- Start of Skill Bar -->
                                <div class="skillbar clearfix " data-percent="75%">
                                    <div class="skillbar-title"><span>PHP</span></div>
                                    <div class="skillbar-bar"></div>
                                    <div class="skill-bar-percent">75%</div>
                                </div>
                                <!-- End Skill Bar -->

                                <!-- Start of Skill Bar -->
                                <div class="skillbar clearfix " data-percent="65%">
                                    <div class="skillbar-title"><span>MySql</span></div>
                                    <div class="skillbar-bar"></div>
                                    <div class="skill-bar-percent">65%</div>
                                </div>
                                <!-- End Skill Bar -->

                                <!-- Start of Skill Bar -->
                                <div class="skillbar clearfix " data-percent="65%">
                                    <div class="skillbar-title"><span>Wordpress</span></div>
                                    <div class="skillbar-bar"></div>
                                    <div class="skill-bar-percent">65%</div>
                                </div>
                                <!-- End Skill Bar -->
                            </div>
                            <!-- End of Skill Bars Wrapper -->

                        </div>
                        <!-- End of Row -->

                        </div>
            </section>
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
    <script src="<?= assets_url_js(); ?>editarPerfil.js" type="module" defer></script>
</body>

</html>