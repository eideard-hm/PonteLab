<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $data['titulo_pagina'] ?></title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <?php require_once('./Views/Components/stylesContratante.php'); ?>
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
                        <li> Perfil</li>
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
                                            <img src="<?php echo $_SESSION['imgProfile']; ?>" id="imagen_perfil" data-id="<?php echo $_SESSION['id']; ?>" alt="<?php echo $_SESSION['user-data']['nombreUsuario'] ?>" class="avatar-130 img-fluid" />
                                        </div>
                                        <div class="profile-detail">
                                            <h4><?= $_SESSION['user-data']['nombreUsuario'] ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card">
                            <div class="iq-card-body p-0">
                                <div class="user-tabing">
                                    <ul class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0">
                                        <li class="col-sm-6 p-0">
                                            <a class="nav-link active" data-toggle="pill" href="#timeline">Perfil</a>
                                        </li>
                                        <li class="col-sm-6 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#about">Información</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="tab-content">
                            <!-- Descripcion contratante  -->
                            <div class="tab-pane fade active show" id="timeline" role="tabpanel">
                                <div class="iq-card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="post-modal-data" class="iq-card">
                                                <div class="iq-card-header d-flex justify-content-between">
                                                    <div class="iq-header-title">
                                                        <h4 class="card-title">Descripción Contratante</h4>
                                                    </div>
                                                    <a class="btn" role="button" tabindex="0" id="data-idContratante">
                                                        <i class="las la-plus" data-toggle="modal" data-target="#informacion-personal"></i>
                                                    </a>
                                                </div>
                                                <div class="iq-card-body" id="perfil-contratante">
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="informacion-personal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="post-modalLabel">Descripción Contratante</h5>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-times" id="icon-reg-edit"></i></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="#" id="form-contractor" class="contenedor-form">
                                                                    <input type="hidden" name="idContractor" id="idContractor" value="">
                                                                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $_SESSION['id'] ?>">

                                                                    <div class="contenedor-grupo w100 form-group" id="grupo-perfil">
                                                                        <label for="txtPerfil">Descripción *</label>
                                                                        <textarea name="especificaciones" id="especificaciones" rows="1" placeholder="Descripción..."></textarea>
                                                                    </div>

                                                                    <div class="contenedor-grupo btn-enviar mt15">
                                                                        <button class="btn btn-primary mr-2" id="btn_submit">
                                                                            <strong class="btn-save">Guardar</strong><i class="far fa-save icon-btn"></i>
                                                                        </button>
                                                                        <button type="reset" class="btn iq-bg-danger change-name-btn-Aspirante" data-dismiss="modal">Cancelar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Imprimir datos de Yesenia en el siguiente formOuO -->
                            <!-- Acerca del perfil de la persona  -->
                            <div class="tab-pane fade" id="about" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0">
                                                    <li>
                                                        <a class="nav-link active" data-toggle="pill" href="#basicinfo">Información del Usuario Contratante</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9 pl-4">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                                                        <h4>Usuario</h4>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <h6>Tipo de Usuario</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0"><?= $_SESSION['user-data']['nombreRol'] ?></p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6> Estado</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <?php if ($_SESSION['user-data']['estadoUsuario'] == 0) { ?>
                                                                    <p>Activo</p>
                                                                <?php } else { ?>
                                                                    <p>Inactivo</p>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                                                        <h4>Información Basica </h4>
                                                        <hr>
                                                        <div class="row">

                                                            <div class="col-3">
                                                                <h6>Nombre</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0"><?= $_SESSION['user-data']['nombreUsuario'] ?></p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>Email</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0"><?= $_SESSION['user-data']['correoUsuario'] ?></p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6> Identificación</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0"><?= $_SESSION['user-data']['numDocUsuario'] ?></p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6> Tipo de Identificación</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0"><?php print_r($_SESSION['user-data']['nombreTipoDocumento']) ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h4 class="mt-3">Dirección</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <h6> Ubicación</h6>
                                                        </div>
                                                        <div class="col-9">
                                                            <p class="mb-0"><?= $_SESSION['user-data']['direccionUsuario'] ?></p>
                                                        </div>
                                                        <div class="col-3">
                                                            <h6> Barrio</h6>
                                                        </div>
                                                        <div class="col-9">
                                                            <p class="mb-0"><?= $_SESSION['user-data']['nombreBarrio'] ?></p>
                                                        </div>
                                                    </div>
                                                    <h4 class="mt-3">Números de Contacto </h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <h6>Número Fijó</h6>
                                                        </div>
                                                        <div class="col-9">
                                                            <p class="mb-0"><?= $_SESSION['user-data']['numTelFijo'] ?></p>
                                                        </div>
                                                        <div class="col-3">
                                                            <h6>Número Movíl</h6>
                                                        </div>
                                                        <div class="col-9">
                                                            <p class="mb-0"><?= $_SESSION['user-data']['numTelUsuario'] ?></p>
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

    <script src="https://cdn.tiny.cloud/1/x2oub1u70xqw4t9bxdur2k98oz7jsin9tx0vewhh6zf7pc68/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- Scripts  -->
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL ?>Assets/js/contratante.js" type="module" defer></script>
</body>

</html>