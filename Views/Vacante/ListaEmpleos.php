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
    <link rel="stylesheet" href="<?= URL ?>Assets/css/stylesGlobal.css" />
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
        <?php require_once('./Views/Components/LoadingForms.php'); ?>
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
                        <?php foreach ($data['vacantes_pagination'] as $vacante) : ?>
                            <div class="single-job-post row nomargin" data-idVacante="<?= $vacante['idVacante'] ?>">
                                <!-- Job Company -->
                                <div class="col-md-2 col-xs-3">
                                    <div class="job-company">
                                        <a href="<?= URL . "Vacante/DetallesVacante/" . $vacante['idVacante'] ?>" data-idVacante="<?= $vacante['idVacante'] ?>">
                                            <img src="<?= $vacante['imagenUsuario'] != null ? URL . "Assets/img/" . $vacante['imagenUsuario'] : URL . "Assets/img/upload.svg" ?>" alt="<?= $vacante['nombreUsuario'] ?>" class="img-fluid" />
                                        </a>
                                    </div>
                                </div>
                                <!-- Job Title & Info -->
                                <div class="col-md-7 col-xs-6 ptb20">
                                    <div class="job-title">
                                        <a href="<?= URL . "Vacante/DetallesVacante/" . $vacante['idVacante'] ?>" data-idVacante="<?= $vacante['idVacante'] ?>"><?= $vacante['nombreVacante'] ?></a>
                                    </div>
                                    <div class="job-info">
                                        <span class="company"><i class="fa fa-building-o"></i><?= $vacante['nombreUsuario'] ?></span>
                                        <span class="location"><i class="fa fa-map-marker"></i><?= $vacante['direccionVacante'] ?></span>
                                    </div>
                                </div>
                                <!-- Job Category -->
                                <div class="col-md-3 col-xs-3 ptb30">
                                    <div class="job-category">
                                        <a href="<?= URL . "Vacante/DetallesVacante/" . $vacante['idVacante'] ?>" class="btn btn-success capitalize" data-idVacante="<?= $vacante['idVacante'] ?>">full time</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- End of Job Post Wrapper -->
                    <!-- Start of Pagination -->
                    <ul class="pagination justify-content-center mt-3">
                        <li class="page-item <?php echo $data['numero_vacante'] <= 1 ? 'disabled' : '' ?>">
                            <a href="<?= URL ?>Vacante/ListaEmpleos/<?= $data['numero_vacante'] - 1 ?>" class="page-link">Anterior</a>
                        </li>

                        <?php for ($i = 0; $i < $data['count-rows']; $i++) : ?>
                            <li class="page-item <?php echo $data['numero_vacante']  == $i + 1 ? 'active' : '' ?>">
                                <a class="page-link" href="<?= URL ?>Vacante/ListaEmpleos/<?= $i + 1 ?>">
                                    <?= $i + 1 ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <li class="page-item <?php echo $data['numero_vacante'] >= $data['count-rows'] ? 'disabled' : '' ?>">
                            <a href="<?= URL ?>Vacante/ListaEmpleos/<?= $data['numero_vacante'] + 1 ?>" class="page-link">Siguiente</a>
                        </li>
                    </ul>
                    <!-- End of Pagination -->
                </div>
                <!-- End of Job Post Main -->
                <!-- Start of Job Post Sidebar -->
                <?php if (!empty($data['recomendados'])) { ?>
                    <div class="col-md-4 col-sm-12 col-xs-12 job-post-sidebar" id="<?= $data['recomendados']['idVacante'] ?>">
                        <h2 class="capitalize"><i class="fa fa-star"></i>Recomendados</h2>
                        <!-- Start of Featured Job Widget -->
                        <div class="featured-job widget mt60">
                            <!-- Start of Company Logo -->
                            <div class="company">
                                <img src="<?= $data['recomendados']['imagenUsuario'] != null ? URL . "Assets/img/{$data['recomendados']['imagenUsuario']}" : URL . "Assets/img/upload.svg" ?>" class="img-fluid" alt="">
                            </div>
                            <!-- End of Company Logo -->
                            <!-- Start of Featured Job Info -->
                            <div class="featured-job-info">
                                <!-- Job Title -->
                                <div class="job-title d-flex justify-content-between align-items-center">
                                    <h5 class="uppercase pull-left"><?= $data['recomendados']['nombreVacante'] ?></h5>
                                </div>
                                <br>
                                <a href="<?= URL . "Vacante/DetallesVacante/" . $data['recomendados']['idVacante'] ?>" class="btn btn-success capitalize">full time</a>
                                <!-- Job Info -->
                                <div class="job-info mt-3">
                                    <span id="company"><i class="fa fa-building-o"></i><?= $data['recomendados']['nombreUsuario'] ?></span>
                                    <span id="location" class="mt-2"><i class="fa fa-map-marker"></i><?= $data['recomendados']['direccionVacante'] ?></span>
                                </div>
                                <br>
                                <p class="mt20"><?= $data['recomendados']['descripcionVacante'] ?></p>
                                <!-- View Job Button -->
                                <div class="text-center mt20">
                                    <a href="<?= URL . "Vacante/DetallesVacante/" . $data['recomendados']['idVacante'] ?>" class="btn btn-info capitalize">Ver más ...</a>
                                </div>
                            </div>
                            <!-- End of Featured Job Info -->
                        </div>
                        <!-- End of Featured Job Widget -->
                        <!-- Start of Upload Resume Widget -->
                        <!-- <div class="upload-resume widget mt40 text-center">
                        <h4 class="capitalize">upload your resume</h4>
                        <p class="mtb10"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry...</p>
                        <a href="#" class="btn btn-primary capitalize mt10">upload resume</a>
                    </div> -->
                        <!-- End of Upload Resume Widget -->
                    </div>
                    <!-- End of Job Post Sidebar -->
                <?php } ?>
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