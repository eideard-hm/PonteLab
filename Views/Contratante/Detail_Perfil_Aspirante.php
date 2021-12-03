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
    <link rel="stylesheet" href="<?= assets_url_css(); ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?= assets_url_css(); ?>stylesMenu.css">
    <link rel="stylesheet" href="<?= assets_url_css(); ?>stylesGlobal.css">
    <link rel="stylesheet" href="<?= assets_url_css(); ?>responsive.css">


    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Responsive CSS -->


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
        <?php require_once('./Views/Components/LoadingForms.php'); ?>
        <!-- Menu de navegación -->
        <?php
        require_once('./Views/Components/LayoutC.php');
        ?>

        <!-- Page Content  -->

        <div id="content-page" class="content-page">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= URL ?>Menu">Menú </a></li>
                        <li class="mx-1"> / </li>
                        <li> Información del Aspirante</li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-body profile-page p-0">
                                <div class="profile-header">
                                    <div class="cover-container">
                                        <img src="<?= assets_url_img(); ?>page-img/fondoAzul2.jpg" alt="profile-bg" class="rounded img-fluid" style=" width: 1550px; Height: 250px;">
                                        <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">

                                        </ul>
                                    </div>
                                    <div class="user-detail text-center mb-3">
                                        <div class="profile-img">
                                            <img src="<?= $data['perfil']['imagenUsuario'] != null ? assets_url_img() . "uploads/" . $data['perfil']['imagenUsuario'] : assets_url_img() . "uploads/upload.svg" ?>" class="avatar-130 img-fluid" alt="<?= $data['perfil']['nombreUsuario'] ?>">
                                        </div>
                                        <div class="profile-detail">
                                            <h4><?= $data['perfil']['nombreUsuario'] ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card">
                            <div class="iq-card-body p-0">
                                <div class="user-tabing">
                                    <ul class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0">
                                        <li class="col-sm-12 p-0">
                                            <a class="nav-link active" data-toggle="pill" href="#timeline">Información</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="timeline" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0">
                                                    <li>
                                                        <a class="nav-link active" data-toggle="pill" href="#basicinfo">Información del Usuario Aspirante</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9 pl-4">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                                                        <h4><?= $data['perfil']['nombrePuesto'] ?></h4>
                                                        <hr>
                                                        <div class="row">

                                                            <div class="profile-details mt20">
                                                                <?= $data['perfil']['descripcionPersonalAspirante'] ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                                                        <hr>
                                                        <div class="row">

                                                            <div class="col-1">
                                                                <h6><i class="fa fa-map-marker"></i></h6>
                                                            </div>
                                                            <div class="col-11">
                                                                <p class="mb-0"><?= $data['perfil']['nombreBarrio'] ?>, <?= $data['perfil']['nombreCiudad'] ?></p>
                                                            </div>
                                                            <div class="col-1">
                                                                <h6><i class="fas fa-phone-alt"></i></h6>
                                                            </div>
                                                            <div class="col-11">
                                                                <p class="mb-0"><?= $data['perfil']['numTelUsuario'] ?></p>
                                                            </div>
                                                            <div class="col-1">
                                                                <h6> <i class="fa fa-envelope"></i></h6>
                                                            </div>
                                                            <div class="col-11">
                                                                <a href="#"><?= $data['perfil']['correoUsuario'] ?></a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <h6>HTML5</h6>
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="progress ">
                                                                    <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <h6>CSS3</i></h6>
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="progress ">
                                                                    <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <h6>JavaScript</h6>
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="progress ">
                                                                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <h6>PHP</h6>
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="progress ">
                                                                    <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <h6>MySql</h6>
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="progress ">
                                                                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <h6>Wordpress</h6>
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="progress ">
                                                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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