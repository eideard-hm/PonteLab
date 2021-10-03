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
                <div class="row flex-grow mb-5">
                    <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                            <div class="alert" role="alert" id="generar-pdf" data-user="<?= $_SESSION['user-data']['nombreUsuario'] ?> - <?= $_SESSION['user-data']['numDocUsuario'] ?>">
                                <div class="iq-alert-icon">
                                    <i class="fas fa-file-download"></i>
                                    <!-- <i class="fas fa-file-pdf" style="color: red;"></i> -->
                                </div>
                                <a href="#" class="iq-alert-text">Descargar</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 grid-margin stretch-card">
                        <div class="iq-card-body" id="change-bg-cv">
                            <button type="button" class="btn btn-primary mb-3" id="btn-change-bg-primary"><i class="ri-heart-fill pr-0"></i></button>
                            <button type="button" class="btn btn-secondary mb-3" id="btn-change-bg-secondary"><i class="ri-star-fill pr-0"></i></button>
                            <button type="button" class="btn btn-success mb-3" id="btn-change-bg-success"><i class="ri-settings-4-fill pr-0"></i></button>
                            <button type="button" class="btn btn-warning mb-3" id="btn-change-bg-warning"><i class="ri-delete-bin-2-fill pr-0"></i></button>
                            <button type="button" class="btn btn-info mb-3" id="btn-change-bg-info"><i class="ri-lock-fill pr-0"></i></button>
                            <button type="button" class="btn btn-light mb-3" id="btn-change-bg-light"><i class="ri-time-fill pr-0"></i></button>
                            <button type="button" class="btn btn-dark mb-3" id="btn-change-bg-dark"><i class="ri-sun-fill pr-0"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="contenedor-cv" id="contenedor-cv">
                        <!-- seccion de nombre y foto -->
                        <div class="nombre-foto ">
                            <h2 class="nombre-aspirante"><?= $_SESSION['user-data']['nombreUsuario'] ?></h2>
                            <img src="<?= $_SESSION['imgProfile']; ?>" alt="<?= $_SESSION['user-data']['nombreUsuario'] ?>" class="imagen-aspirante" />
                        </div>

                        <!-- profesion y perfil laboral -->
                        <div class="profesion-perfil ">
                            <?php foreach ($data['puestos_interes'] as $puestoInteres) : ?>
                                <h3 class="profesion"><?= $puestoInteres['nombrePuesto'] ?></h3>
                            <?php endforeach ?>
                            <p class="perfil-laboral">
                                <?php
                                if (isset($data['info_aspirante'])) {
                                    echo $data['info_aspirante']["descripcionPersonalAspirante"];
                                } else {
                                    "El usuario no ha registrado información personal";
                                }
                                ?>
                            </p>
                        </div>

                        <!-- ============================================================================ -->
                        <div class="contenedor-informacion">

                            <!-- CONTENEDOR PARA LOS ELEMENTOS DE ANCHO DE 30% -->

                            <div class="contenedor-w30">
                                <!-- perfil aspirante -->
                                <div class="perfil">
                                    <div class="encabezado-perfil encabezado">
                                        <i class="fas fa-user-circle icono-encabezado"></i>
                                        <h4 class="titulo-encabezado">Perfil</h4>
                                    </div>
                                    <div class="datos-perfil mt">
                                        <div class="datos">
                                            <span>Email</span>
                                            <p><?= $_SESSION['user-data']['correoUsuario'] ?></p>
                                        </div>
                                        <div class="datos">
                                            <span>Teléfono</span>
                                            <p><?= $_SESSION['user-data']['numTelUsuario'] ?></p>
                                            <p><?= $_SESSION['user-data']['numTelFijo'] ?></p>
                                        </div>
                                        <div class="datos">
                                            <span>Dirección</span>
                                            <p><?= $_SESSION['user-data']['direccionUsuario'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- habilidades del aspirante -->
                                <div class="habilidades">
                                    <div class="encabezado-habilidades encabezado">
                                        <i class="fas fa-bolt icono-encabezado"></i>
                                        <h4 class="titulo-encabezado">Habilidades</h4>
                                    </div>

                                    <div class="habilidad mt">
                                        <?php foreach ($data['habilidades'] as $habilidad) : ?>
                                            <div class="habi df">
                                                <span><?= $habilidad['nombrehabilidad'] ?></span>
                                                <span class="estrellas">
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
                                    </div>
                                </div>

                                <!-- idiomas -->

                                <div class="idiomas ">
                                    <div class="encabezado-idioma encabezado">
                                        <i class="fas fa-language icono-encabezado"></i>
                                        <h4 class="titulo-encabezado">Idiomas</h4>
                                    </div>

                                    <div class="idioma mt">
                                        <?php foreach ($data['idiomas'] as $idioma) : ?>
                                            <div class="idi df">
                                                <span><?= $idioma['nombreIdioma'] ?></span>
                                                <span class="estrellas">
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
                                    </div>
                                </div>
                            </div>

                            <!--        CONTENEDOR PARA LOS ELEMENTOS DEL ANCHO 70% -->
                            <div class="contenedor-w70">
                                <!-- Educación del aspirante -->
                                <div class="educacion">
                                    <div class="encabezado-educacion encabezado">
                                        <i class="fas fa-graduation-cap icono-encabezado"></i>
                                        <h4 class="titulo-encabezado">Educación</h4>
                                    </div>
                                    <div class="estudios-realizados mt">
                                        <?php foreach ($data['estudios'] as $estudio) : ?>
                                            <div class="estudios">
                                                <div class="fechas contenedor-w30">
                                                    <p class="inicio-estudio"><?= $estudio['mesInicio'] ?> <?= $estudio['añoInicio'] ?> -</p>
                                                    <p class="fin-estudio"><?= $estudio['mesFin'] ?> <?= $estudio['añoFin'] ?></p>
                                                </div>
                                                <div class="infor-estudios contenedor-w70">
                                                    <h4 class="entidad"><?= $estudio['nombreInstitucion'] ?></h4>
                                                    <p class="programa"><?= $estudio['nombreGrado'] ?> <?= $estudio['tituloObtenido'] ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>

                                <!-- experiencia del usuario -->

                                <div class="experiencia-laboral">
                                    <div class="encabezado-experiencia encabezado">
                                        <i class="fas fa-briefcase icono-encabezado"></i>
                                        <h4 class="titulo-encabezado">Experiencia laboral</h4>
                                    </div>

                                    <div class="info-experiencia mt">
                                        <?php foreach ($data['experiencias'] as $experiencia) : ?>
                                            <div class="experiencia">
                                                <div class="fechas contenedor-w30">
                                                    <p class="inicio-estudio"><?= $experiencia['mesInicio'] ?> <?= $experiencia['añoInicio'] ?> -</p>
                                                    <p class="fin-estudio"><?= $experiencia['mesFin'] ?> <?= $experiencia['añoFin'] ?></p>
                                                </div>
                                                <div class="informacion-experiencia contenedor-w70">
                                                    <h5 class="puesto"><?= $experiencia['nombrePuestoDesempeño'] ?></h5>
                                                    <p class="empresa"><?= $experiencia['empresaLaboro'] ?></p>
                                                    <p>
                                                        <?= $experiencia['funcionDesempeño'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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