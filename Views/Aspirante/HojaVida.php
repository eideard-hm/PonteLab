<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['titulo_pagina'] ?></title>
    <?php
    require_once('./Views/Components/stylesAspirante.php');
    ?>
    <link href="<?= URL ?>Assets/css/cv/styleCv-1.css" rel="stylesheet" id="css-cv" />
</head>

<body>
    <!-- loader Start -->
    <?php
    require_once('./Views/Components/loader.php');
    ?>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Menu de navegación -->
        <?php
        require_once('./Views/Components/Layout.php');
        ?>
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container">
                <div class="row flex-grow mt-3">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="alert generar-pdf" role="alert" id="generar-pdf" data-user="<?= $_SESSION['user-data']['nombreUsuario'] ?> - <?= $_SESSION['user-data']['numDocUsuario'] ?>">
                                <div class="iq-alert-icon">
                                    <i class="fas fa-file-download"></i>
                                    <!-- <i class="fas fa-file-pdf" style="color: red;"></i> -->
                                </div>
                                <a href="#" class="iq-alert-text font-weight-bold">Descargar</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="iq-card-body d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary mb-3 me-2 active" id="cv-1"><i class="ri-time-fill pr-0"></i>Diseño 1</button>
                            <button type="button" class="btn btn-success mb-3" id="cv-2"><i class="ri-sun-fill pr-0"></i>Diseño 2</button>
                        </div>
                    </div>

                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="iq-card-body" id="change-bg-cv">
                            <button type="button" class="btn btn-primary mb-3" id="btn-change-bg-primary"><i class="ri-heart-fill pr-0"></i></button>
                            <button type="button" class="btn btn-secondary mb-3" id="btn-change-bg-secondary"><i class="ri-star-fill pr-0"></i></button>
                            <button type="button" class="btn btn-success mb-3" id="btn-change-bg-success"><i class="ri-settings-4-fill pr-0"></i></button>
                            <button type="button" class="btn btn-warning mb-3" id="btn-change-bg-warning"><i class="ri-delete-bin-2-fill pr-0"></i></button>
                            <button type="button" class="btn btn-info mb-3" id="btn-change-bg-info"><i class="ri-lock-fill pr-0"></i></button>
                            <button type="button" class="btn btn-dark mb-3" id="btn-change-bg-dark"><i class="ri-sun-fill pr-0"></i></button>
                        </div>
                    </div>
                </div>
                <article class="resume-wrapper text-center position-relative template-1" id="template-1">
                    <div class="resume-wrapper-inner mx-auto text-start bg-white shadow-lg">
                        <header class="resume-header pt-4 pt-md-0">
                            <div class="row">
                                <div class="col-block col-md-auto resume-picture-holder text-center text-md-start">
                                    <img class="picture img-thumbnail" src="<?= $_SESSION['imgProfile']; ?>" alt="<?= $_SESSION['user-data']['nombreUsuario'] ?>">
                                </div>
                                <!--//col-->
                                <div class="col">
                                    <div class="row p-4 justify-content-center justify-content-md-between align-items-center">
                                        <div class="primary-info col-md-6">
                                            <h1 class="name mt-0 mb-1 text-white text-uppercase text-uppercase"><?= $_SESSION['user-data']['nombreUsuario'] ?></h1>
                                            <?php foreach ($data['puestos_interes'] as $puestoInteres) : ?>
                                                <div class="title mb-3"><?= $puestoInteres['nombrePuesto'] ?></div>
                                            <?php endforeach ?>
                                        </div>
                                        <!--//primary-info-->
                                        <div class="secondary-info col-md-6 mt-2">
                                            <ul class="resume-social list-unstyled">
                                                <li class="mb-3"><a class="text-link" href="#"><span class="fa-container text-center me-2"><i class="fas fa-mobile-alt fa-fw icon"></i></span><?= $_SESSION['user-data']['correoUsuario'] ?></a></li>
                                                <li class="mb-3"><a class="text-link" href="#"><span class="fa-container text-center me-2"><i class="fas fa-phone-alt fa-fw icon"></i></span><?= $_SESSION['user-data']['numTelUsuario'] ?></a></li>
                                                <li class="mb-3"><a class="text-link" href="#"><span class="fa-container text-center me-2"><i class="fas fa-envelope-square fa-fw icon"></i></span><?= $_SESSION['user-data']['numTelFijo'] ?></a></li>
                                                <li><a class="text-link" href="#"><span class="fa-container text-center me-2"><i class="fas fa-map-marker-alt fa-fw icon"></i></span><?= $_SESSION['user-data']['direccionUsuario'] ?></a></li>
                                            </ul>
                                        </div>
                                        <!--//secondary-info-->
                                    </div>
                                    <!--//row-->
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </header>
                        <div class="resume-body p-5">
                            <section class="resume-section summary-section mb-5">
                                <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Perfil laboral</h2>
                                <div class="resume-section-content">
                                    <p class="mb-0"><?= $data['info_aspirante']["descripcionPersonalAspirante"]; ?></p>
                                </div>
                            </section>
                            <!--//summary-section-->
                            <div class="row">
                                <div class="col-lg-8">
                                    <section class="resume-section experience-section mb-5">
                                        <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Experiencia laboral</h2>
                                        <div class="resume-section-content">
                                            <div class="resume-timeline position-relative">
                                                <?php foreach ($data['experiencias'] as $experiencia) : ?>
                                                    <article class="resume-timeline-item position-relative pb-5">
                                                        <div class="resume-timeline-item-header mb-2">
                                                            <div class="d-flex flex-column flex-md-row">
                                                                <h3 class="resume-position-title font-weight-bold mb-1"><?= $experiencia['nombrePuestoDesempeño'] ?></h3>
                                                                <div class="resume-company-name ms-auto"><?= $experiencia['empresaLaboro'] ?></div>
                                                            </div>
                                                            <!--//row-->
                                                            <div class="resume-position-time"><?= $experiencia['añoInicio'] ?> - <?= $experiencia['añoFin'] ?></div>
                                                        </div>
                                                        <!--//resume-timeline-item-header-->
                                                        <div class="resume-timeline-item-desc">
                                                            <?= $experiencia['funcionDesempeño'] ?>
                                                        </div>
                                                        <!--//resume-timeline-item-desc-->
                                                    </article>
                                                    <!--//resume-timeline-item-->
                                                <?php endforeach ?>
                                            </div>
                                            <!--//resume-timeline-->
                                        </div>
                                    </section>
                                    <!--//experience-section-->
                                    <section class="resume-section experience-section mb-5">
                                        <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Educación</h2>
                                        <div class="resume-section-content">
                                            <div class="resume-timeline position-relative">
                                                <?php foreach ($data['estudios'] as $estudio) : ?>
                                                    <article class="resume-timeline-item position-relative pb-5">
                                                        <div class="resume-timeline-item-header mb-2">
                                                            <div class="d-flex flex-column">
                                                                <h3 class="resume-position-title font-weight-bold mb-1"><?= $estudio['nombreGrado'] ?> <?= $estudio['tituloObtenido'] ?></h3>
                                                                <div class="resume-degree-org"><?= $estudio['nombreInstitucion'] ?></div>
                                                            </div>
                                                            <!--//row-->
                                                            <div class="resume-position-time"><?= $estudio['añoInicio'] ?> - <?= $estudio['añoFin'] ?></div>
                                                        </div>
                                                    </article>
                                                    <!--//resume-timeline-item-->
                                                <?php endforeach ?>
                                            </div>
                                            <!--//resume-timeline-->
                                        </div>
                                    </section>
                                    <!--//education-section-->
                                </div>
                                <div class="col-lg-4">
                                    <section class="resume-section skills-section mb-5">
                                        <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Habilidades</h2>
                                        <div class="resume-section-content">
                                            <div class="resume-skill-item">
                                                <ul class="list-unstyled mb-4">
                                                    <?php foreach ($data['habilidades'] as $habilidad) : ?>
                                                        <li class="mb-2">
                                                            <div class="resume-degree-org"><?= $habilidad['nombrehabilidad'] ?></div>
                                                            <div>
                                                                <div class="estrellas">
                                                                    <?php if ($habilidad['nivelHabilidad'] == 1) { ?>
                                                                        <div class="progress resume-progress">
                                                                            <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    <?php } elseif ($habilidad['nivelHabilidad'] == 2) { ?>
                                                                        <div class="progress resume-progress">
                                                                            <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    <?php } elseif ($habilidad['nivelHabilidad'] == 3) { ?>
                                                                        <div class="progress resume-progress">
                                                                            <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    <?php } elseif ($habilidad['nivelHabilidad'] == 4) { ?>
                                                                        <div class="progress resume-progress">
                                                                            <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    <?php } elseif ($habilidad['nivelHabilidad'] == 5) { ?>
                                                                        <div class="progress resume-progress">
                                                                            <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php endforeach ?>

                                                </ul>
                                            </div>
                                            <!--//resume-skill-item-->
                                        </div>
                                        <!--resume-section-content-->
                                    </section>
                                    <!--//skills-section-->
                                    <section class="resume-section skills-section mb-5">
                                        <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Idiomas</h2>
                                        <div class="resume-section-content">
                                            <div class="resume-skill-item">
                                                <ul class="list-unstyled mb-4">
                                                    <?php foreach ($data['idiomas'] as $idioma) : ?>
                                                        <li class="mb-2">
                                                            <div class="resume-degree-org"><span class="resume-lang-name font-weight-bold"><?= $idioma['nombreIdioma'] ?></span></div>
                                                            <div>
                                                                <div class="estrellas">
                                                                    <?php if ($idioma['nivelIdioma'] == 1) { ?>
                                                                        <div class="progress resume-progress">
                                                                            <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    <?php } elseif ($idioma['nivelIdioma'] == 2) { ?>
                                                                        <div class="progress resume-progress">
                                                                            <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    <?php } elseif ($idioma['nivelIdioma'] == 3) { ?>
                                                                        <div class="progress resume-progress">
                                                                            <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    <?php } elseif ($idioma['nivelIdioma'] == 4) { ?>
                                                                        <div class="progress resume-progress">
                                                                            <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    <?php } elseif ($idioma['nivelIdioma'] == 5) { ?>
                                                                        <div class="progress resume-progress">
                                                                            <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php endforeach ?>

                                                </ul>
                                            </div>
                                            <!--//resume-skill-item-->
                                        </div>
                                        <!--resume-section-content-->
                                    </section>
                                    <!--//languages-section-->
                                </div>
                            </div>
                            <!--//row-->
                        </div>
                        <!--//resume-body-->
                    </div>
                </article>

                <div class="main-wrapper" id="template-2">
                    <article class="resume-wrapper mx-auto theme-bg-light p-5 shadow-lg" id="contenedor-cv">
                        <div class="resume-header">
                            <div class="row align-items-center">
                                <div class="resume-title col-12 col-md-6 col-lg-8 col-xl-8">
                                    <h2 class="resume-name mb-0 text-uppercase"><?= $_SESSION['user-data']['nombreUsuario'] ?></h2>
                                    <?php foreach ($data['puestos_interes'] as $puestoInteres) : ?>
                                        <div class="resume-tagline mb-3 mb-md-0"><?= $puestoInteres['nombrePuesto'] ?></div>
                                    <?php endforeach ?>
                                </div>
                                <!--//resume-title-->
                                <div class="resume-contact col-12 col-md-6 col-lg-4 col-xl-4">
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><i class="fas fa-mobile-alt fa-fw fa-lg me-2 icon"></i><a class="resume-link" href="tel:#"><?= $_SESSION['user-data']['numTelUsuario'] ?></a></li>
                                        <li class="mb-2"><i class="fas fa-phone-alt fa-fw fa-lg me-2 icon"></i><a class="resume-link" href="tel:#"><?= $_SESSION['user-data']['numTelFijo'] ?></a></li>
                                        <li class="mb-2"><i class="fas fa-envelope-square fa-fw fa-lg me-2 icon"></i><a class="resume-link" href="mailto:#"><?= $_SESSION['user-data']['correoUsuario'] ?></a></li>
                                        <li class="mb-0"><i class="fas fa-map-marker-alt fa-fw fa-lg me-2 icon"></i><?= $_SESSION['user-data']['direccionUsuario'] ?></li>
                                    </ul>
                                </div>
                                <!--//resume-contact-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//resume-header-->
                        <hr>
                        <div class="resume-intro py-3">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-3 col-xl-3 text-center">
                                    <img class="resume-profile-image mb-3 mb-md-0 me-md-5  ms-md-0 rounded-circle mx-auto" src="<?= $_SESSION['imgProfile']; ?>" alt="<?= $_SESSION['user-data']['nombreUsuario'] ?>">
                                </div>

                                <div class="col col-md-9 col-xl-9 text-start">
                                    <p class="mb-0">
                                        <?= $data['info_aspirante']["descripcionPersonalAspirante"] ?>
                                    </p>
                                </div>
                                <!--//col-->
                            </div>
                        </div>
                        <!--//resume-intro-->
                        <hr>
                        <div class="resume-body">
                            <div class="row">
                                <div class="resume-main col-12 col-lg-7 col-xl-7 pe-0 pe-lg-5">
                                    <section class="work-section py-3">
                                        <h3 class="text-uppercase resume-section-heading mb-4">Experiencia laboral</h3>
                                        <?php foreach ($data['experiencias'] as $experiencia) : ?>
                                            <div class="item mb-3">
                                                <div class="item-heading row align-items-center mb-2">
                                                    <h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0"><?= $experiencia['nombrePuestoDesempeño'] ?></h4>
                                                    <div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-start text-md-end"><?= $experiencia['empresaLaboro'] ?> | <?= $experiencia['añoInicio'] ?> - <?= $experiencia['añoFin'] ?></div>

                                                </div>
                                                <div class="item-content">
                                                    <?= $experiencia['funcionDesempeño'] ?>
                                                </div>
                                            </div>
                                            <!--//item-->
                                        <?php endforeach ?>
                                    </section>
                                    <!--//work-section-->

                                    <section class="project-section py-3">
                                        <h3 class="text-uppercase resume-section-heading mb-4">Educación</h3>
                                        <?php foreach ($data['estudios'] as $estudio) : ?>
                                            <div class="item mb-3">
                                                <div class="item-heading row align-items-center mb-2">
                                                    <h4 class="item-title col-12 col-md-6 col-lg-12 mb-2 mb-md-0"><?= $estudio['nombreGrado'] ?> <?= $estudio['tituloObtenido'] ?></h4>
                                                    <div class="col-12 resume-degree-org text-muted"><?= $estudio['nombreInstitucion'] ?></div>
                                                </div>
                                                <div class="item-content">
                                                    <div class="resume-degree-time text-muted"><?= $estudio['añoInicio'] ?> - <?= $estudio['añoFin'] ?></div>
                                                </div>
                                            </div>
                                            <!--//item-->
                                        <?php endforeach ?>
                                    </section>
                                    <!--//project-section-->
                                </div>
                                <!--//resume-main-->
                                <aside class="resume-aside col-12 col-lg-5 col-xl-5 px-lg-4 pb-lg-4">
                                    <section class="skills-section py-3">
                                        <h3 class="text-uppercase resume-section-heading mb-4">Habilidades</h3>
                                        <?php foreach ($data['habilidades'] as $habilidad) : ?>
                                            <div class="item d-flex justify-content-between">
                                                <span class="col-7 text-left"><?= $habilidad['nombrehabilidad'] ?></span>
                                                <span class="estrellas d-flex justify-content-end align-items-center col-5 text-right">
                                                    <?php if ($habilidad['nivelHabilidad'] == 1) { ?>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    <?php } elseif ($habilidad['nivelHabilidad'] == 2) { ?>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    <?php } elseif ($habilidad['nivelHabilidad'] == 3) { ?>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    <?php } elseif ($habilidad['nivelHabilidad'] == 4) { ?>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star"></i>
                                                    <?php } elseif ($habilidad['nivelHabilidad'] == 5) { ?>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                        <?php endforeach ?>
                                    </section>
                                    <!--//skills-section-->
                                    <section class="skills-section py-3">
                                        <h3 class="text-uppercase resume-section-heading mb-4">Idiomas</h3>
                                        <?php foreach ($data['idiomas'] as $idioma) : ?>
                                            <div class="item d-flex justify-content-between">
                                                <span class="col-7 text-left"><?= $idioma['nombreIdioma'] ?></span>
                                                <span class="estrellas d-flex justify-content-end align-items-center col-5 text-right">
                                                    <?php if ($idioma['nivelIdioma'] == 1) { ?>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    <?php } elseif ($idioma['nivelIdioma'] == 2) { ?>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    <?php } elseif ($idioma['nivelIdioma'] == 3) { ?>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    <?php } elseif ($idioma['nivelIdioma'] == 4) { ?>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star"></i>
                                                    <?php } elseif ($idioma['nivelIdioma'] == 5) { ?>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                        <?php endforeach ?>
                                    </section>
                                    <!--//certificates-section-->
                                </aside>
                                <!--//resume-aside-->
                            </div>
                            <!--//row-->
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php
        require_once('./Views/Components/Footer.php');
        ?>
        <script src="https://cdn.tutorialjinni.com/html2pdf.js/0.9.2/html2pdf.bundle.min.js" defer></script>
        <?php
        require_once('./Views/Components/ScriptsJs.php');
        ?>
</body>

</html>