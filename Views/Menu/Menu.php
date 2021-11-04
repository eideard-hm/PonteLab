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

        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container">
                <div class="row flex-grow mb-5">
                    <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                            <div class="alert alert-light" role="alert">
                                <div class="iq-alert-icon">
                                    <i class="fas fa-business-time"></i>
                                </div>
                                <div class="iq-alert-text"><?php date_default_timezone_set('America/Bogota');
                                                            echo date('d F  Y h:i:s A'); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="alert alert-primary" role="alert">
                                <div class="iq-alert-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <a href="<?= URL ?>Aspirante/Perfil_Aspirante" class="iq-alert-text">Añadir información personal</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card" id="hoja-vida">
                        <div class="card">
                            <div class="alert alert-success" role="alert">
                                <div class="iq-alert-icon">
                                    <i class="far fa-folder-open"></i>
                                </div>
                                <a href="<?= URL ?>Aspirante/HojaVida" class="iq-alert-text" id="link-hoja-vida">Hoja de vida</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-card mt-3">
                    <div class="iq-card-body p-0">
                        <div class="user-tabing">
                            <ul class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0">
                                <li class="col-6 p-0">
                                    <h5 class="card-title titulo-perfil nav-link">Bienvenido usuario <strong><?= $_SESSION['user-data']['nombreRol'] ?></strong> <b><?= $_SESSION['user-data']['nombreUsuario'] ?></b></h5>
                                    <a href="<?= URL ?>Aspirante/Perfil_Aspirante" class="btn mt-3 mb-3 mx-3 btn-primary" id="editar"><i class="far fa-user"></i>Ver perfil</a>
                                    <a href="<?= URL ?>Aspirante/Edit_Profile_Aspirante" class="btn mt-3 mb-3 btn-success"><i class="fas fa-user-edit"></i>Editar perfil</a>
                                </li>
                                <li class="col-6 p-0">
                                    <div class="job-company text-right mx-4">
                                        <a href="#">
                                            <img src="<?= URL ?>Assets/img/welcome.svg" alt="" class="img-welcome" />
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Información usuario</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form id="form-wizard1" class="text-center mt-4">
                                <ul id="top-tab-list" class="p-0">
                                    <li class="active" id="account">
                                        <a href="javascript:void();">
                                            <i class="fas fa-unlock-alt"></i><span>Cuenta</span>
                                        </a>
                                    </li>
                                    <li id="personal" class="">
                                        <a href="javascript:void();">
                                            <i class="fas fa-user-circle"></i><span>Información personal</span>
                                        </a>
                                    </li>
                                    <li id="payment" class="">
                                        <a href="javascript:void();">
                                            <i class="far fa-image"></i><span>Imagen</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset style="position: relative; opacity: 1;">
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-7">
                                                <h3 class="mb-4">Información cuenta:</h3>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Paso 1 - 3</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Correo electrónico: *</label>
                                                    <input type="email" class="form-control" name="email" value="<?= $_SESSION['user-data']['correoUsuario'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nombre: *</label>
                                                    <input type="text" class="form-control" name="uname" value="<?= $_SESSION['user-data']['nombreUsuario'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next">Siguiente</button>
                                </fieldset>
                                <fieldset style="display: none; opacity: 0; position: relative;">
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-7">
                                                <h3 class="mb-4">Información personal:</h3>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Paso 2 - 3</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipo documento: *</label>
                                                    <input type="text" class="form-control" name="fname" value="<?= $_SESSION['user-data']['nombreTipoDocumento'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Número documento: *</label>
                                                    <input type="text" class="form-control" name="lname" value="<?= $_SESSION['user-data']['numDocUsuario'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>N° Télefono: *</label>
                                                    <input type="text" class="form-control" name="phno" value="<?= $_SESSION['user-data']['numTelUsuario'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>N° teléfono fijo: *</label>
                                                    <input type="text" class="form-control" name="phno_2" value="<?= $_SESSION['user-data']['numTelFijo'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next">Siguiente</button>
                                    <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Anterior</button>
                                </fieldset>
                                <fieldset style="display: block; opacity: 0; position: relative;">
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-7">
                                                <h3 class="mb-4">Imagen:</h3>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Paso 3 - 3</h2>
                                            </div>
                                        </div>
                                        <div class="user-detail text-center mb-3 form-group">
                                            <div class="profile-img">
                                                <img src="<?php echo $_SESSION['imgProfile']; ?>" id="imagen_perfil" data-id="<?php echo $_SESSION['id']; ?>" alt="<?php echo $_SESSION['user-data']['nombreUsuario'] ?>" class="avatar-130 img-fluid" />
                                            </div>
                                            <div class="profile-detail">
                                                <h4><?= $_SESSION['user-data']['nombreUsuario'] ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Anterior</button>
                                </fieldset>
                            </form>
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
    <script src="<?= URL ?>Assets/js/js.dashboard/lottie.js" defer></script>
    <script src="<?= URL ?>Assets/js/js.dashboard/chart-custom.js" defer></script>
    <script src="<?= URL ?>Assets/js/Perfil_Aspirante.js" defer></script>
    
</body>

</html>