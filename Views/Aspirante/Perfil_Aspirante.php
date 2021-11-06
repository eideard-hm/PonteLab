<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $data['titulo_pagina'] ?></title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <?php
    require_once('./Views/Components/stylesAspirante.php');
    ?>
</head>

<body class="right-column-fixed">
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-body profile-page p-0">
                                <div class="profile-header">
                                    <div class="cover-container">
                                        <img src="<?= URL ?>Assets/img/page-img/profile-bg1.jpg" alt="profile-bg" class="rounded img-fluid">
                                        <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                            <li><a href="javascript:void();"><i class="las la-pencil-alt"></i></a></li>
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
                                    <div class="profile-info p-4 d-flex align-items-center justify-content-between position-relative">
                                        <div class="social-links">
                                            <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                                                <li class="text-center pr-3">
                                                    <a href="#"><img src="<?= URL ?>Assets/img/icon/08.png" class="img-fluid rounded" alt="facebook"></a>
                                                </li>
                                                <li class="text-center pr-3">
                                                    <a href="#"><img src="<?= URL ?>Assets/img/icon/09.png" class="img-fluid rounded" alt="Twitter"></a>
                                                </li>
                                                <li class="text-center pr-3">
                                                    <a href="#"><img src="<?= URL ?>Assets/img/icon/10.png" class="img-fluid rounded" alt="Instagram"></a>
                                                </li>
                                                <li class="text-center pr-3">
                                                    <a href="#"><img src="<?= URL ?>Assets/img/icon/11.png" class="img-fluid rounded" alt="Google plus"></a>
                                                </li>
                                                <li class="text-center pr-3">
                                                    <a href="#"><img src="<?= URL ?>Assets/img/icon/12.png" class="img-fluid rounded" alt="You tube"></a>
                                                </li>
                                                <li class="text-center pr-3">
                                                    <a href="#"><img src="<?= URL ?>Assets/img/icon/13.png" class="img-fluid rounded" alt="linkedin"></a>
                                                </li>
                                            </ul>
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
                    <div class="alert alert-primary mb-4" role="alert">
                        <div class="iq-alert-text">Apreciado usuario <b><?= $_SESSION['user-data']['nombreUsuario'] ?></b>, desde PonteLab
                            lo invitamos a registrar los datos que se presentan a continuación: <b>Información personal,
                                el o los puestos de interés que tiene, idiomas, habilidades, educación, experiencia laboral.
                            </b>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="tab-content">
                            <!-- Información personal  -->
                            <div class="tab-pane fade active show" id="timeline" role="tabpanel">
                                <div class="iq-card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="post-modal-data" class="iq-card">
                                                <div class="iq-card-header d-flex justify-content-between">
                                                    <div class="iq-header-title">
                                                        <h4 class="card-title titulo-perfil">Información personal</h4>
                                                    </div>
                                                    <a class="btn" role="button" tabindex="0" id="data-idAspirante">
                                                        <i class="las la-plus" data-toggle="modal" data-target="#informacion-personal"></i>
                                                    </a>
                                                </div>
                                                <div class="iq-card-body" id="perfil-laboral-aspirante">
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="informacion-personal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="post-modalLabel">Perfil laboral</h5>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-times"></i></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="#" id="info-persona" class="contenedor-form">
                                                                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $_SESSION['id'] ?>">
                                                                    <input type="hidden" name="idAspirante" id="idAspirante">

                                                                    <div class="contenedor-grupo w100 form-group" id="grupo-perfil">
                                                                        <label for="txtPerfil">Perfil laboral</label>
                                                                        <textarea name="textPerfilLab" id="especificaciones" rows="1" placeholder="Perfil laboral..."></textarea>
                                                                    </div>

                                                                    <div class="contenedor-grupo w100 form-group" id="grupo-estado">
                                                                        <label for="txtEstado">Estado laboral</label>
                                                                        <select name="txtEstado" id="txtEstado" class="form-control">
                                                                            <option value="" disabled selected>Seleccione su estado laboral actual</option>
                                                                            <?php foreach ($data['list_workStatus'] as $listStatus) : ?>
                                                                                <option value="<?= $listStatus['idEstadoLaboral'] ?>"><?= $listStatus['nombreEstado'] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo btn-enviar mt15">
                                                                        <button class="btn btn-primary mr-2">
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

                                <!-- Puesto de interes  -->
                                <div class="iq-card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="post-modal-data" class="iq-card">
                                                <div class="iq-card-header d-flex justify-content-between">
                                                    <div class="iq-header-title">
                                                        <h4 class="card-title titulo-perfil">Puesto de interés</h4>
                                                    </div>
                                                    <a class="btn" role="button" tabindex="0" id="data-idPuestoInteres">
                                                        <i class="las la-plus" data-toggle="modal" data-target="#puesto-interes"></i>
                                                    </a>
                                                </div>
                                                <div class="iq-card-body" id="puesto-interes-aspirante">
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="puesto-interes" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="post-modalLabel">Puesto interés</h5>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-times"></i></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="#" id="perfil-laboral" class="contenedor-form form-input-w50">
                                                                    <input type="hidden" name="idAspirante" value="<?= isset($_SESSION['data-aspirante']['idAspirante']) ? $_SESSION['data-aspirante']['idAspirante'] : 0 ?>">

                                                                    <div class="contenedor-grupo form-group" id="grupo-puesto">
                                                                        <input type="hidden" name="txtPuesto" id="txtPuesto" value="">
                                                                        <ul class="list_sectores" id="list_PuestoInteres">
                                                                        </ul>
                                                                    </div>

                                                                    <div class="contenedor-grupo form-group" id="grupo-otro_puesto">
                                                                        <input type="checkbox" id="grupo-puesto-otro_puesto" name="grupo-puesto-otro_puesto" />
                                                                        <label for="grupo-puesto-otro_puesto">Otro puesto de interés.</label>
                                                                    </div>

                                                                    <div class="contenedor-grupo form-group" id="grupo-otro_puesto_interes">
                                                                        <label for="txtOtroPuesto">Otro puesto interés</label>
                                                                        <input type="text" class="form-control" name="txtOtroPuesto" id="txtOtroPuesto" placeholder="Desarrollador frontend con React" />
                                                                        <i class="estado-input fa fa-times-circle"></i>
                                                                        <p class="leyenda-input">
                                                                            El puesto de interés no debe contener números y debe tener mínimo 3
                                                                            letras.
                                                                        </p>
                                                                    </div>

                                                                    <div class="add-puntuacion">
                                                                        <button class="boton_add_puesto" id="boton_add_puesto">
                                                                            Agregar puesto
                                                                            <i class="fas fa-plus icon-btn"></i>
                                                                        </button>
                                                                    </div>

                                                                    <div class="contenedor-grupo btn-enviar">
                                                                        <button class="btn btn-primary mr-2 change-name-btn-PuestoInteres" id="btn-puesto-interes">
                                                                            Guardar<i class="far fa-save icon-btn"></i>
                                                                        </button>
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

                                <!-- Idiomas  -->
                                <div class="iq-card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="post-modal-data" class="iq-card">
                                                <div class="iq-card-header d-flex justify-content-between">
                                                    <div class="iq-header-title">
                                                        <h4 class="card-title titulo-perfil">Idiomas</h4>
                                                    </div>
                                                    <a class="btn" role="button" tabindex="0" id="data-idIdiomas">
                                                        <i class="las la-plus" data-toggle="modal" data-target="#idiomas"></i>
                                                    </a>
                                                </div>
                                                <div class="iq-card-body" id="idiomas-selected">
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="idiomas" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="post-modalLabel">Idiomas</h5>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-times"></i></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="#" id="form-idiomas" class="contenedor-form">
                                                                    <input type="hidden" name="idIdioma" id="idIdioma" value="0">

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-idioma">
                                                                        <div class="agrupar-estrellas" id="agrupar-estrellas-select">
                                                                            <label for="txtListIdioma" id="grupo-idioma-idioma">Idiomas</label>
                                                                            <select name="txtListIdioma" class="form-control" id="txtListIdioma"></select>
                                                                            <label for="txtIdioma" id="grupo-idioma-otro_idioma" style="display: none;">Otro idioma</label>
                                                                            <input type="text" class="form-control" name="txtIdioma" id="txtIdioma" placeholder="Inglés" autofocus style="display: none;" />
                                                                            <i class="estado-input estado-input-w50 fa fa-times-circle"></i>
                                                                            <p class="leyenda-input" id="grupo-idioma-leyenda">
                                                                                El nombre del idioma no debe contener números.
                                                                            </p>
                                                                        </div>
                                                                        <span class="estrellas" id="grupo-idioma-estrellas">
                                                                            <label class="fas fa-star puntuacion idioma" id="1idioma">
                                                                                <input type="radio" name="txtNivelIdioma" class="input-radio" id="1idioma" value="1">
                                                                            </label>
                                                                            <label class="fas fa-star puntuacion idioma" id="2idioma">
                                                                                <input type="radio" name="txtNivelIdioma" class="input-radio" id="2idioma" value="2">
                                                                            </label>
                                                                            <label class="fas fa-star puntuacion idioma" id="3idioma">
                                                                                <input type="radio" name="txtNivelIdioma" class="input-radio" id="3idioma" value="3">
                                                                            </label>
                                                                            <label class="fas fa-star puntuacion idioma" id="4idioma">
                                                                                <input type="radio" name="txtNivelIdioma" class="input-radio" id="4idioma" value="4">
                                                                            </label>
                                                                            <label class="fas fa-star puntuacion idioma" id="5idioma">
                                                                                <input type="radio" name="txtNivelIdioma" class="input-radio" id="5idioma" value="5">
                                                                            </label>
                                                                        </span>
                                                                    </div>

                                                                    <div class="contenedor-grupo" id="grupo-otro_idioma">
                                                                        <input type="checkbox" id="grupo-puesto-otro_idioma" />
                                                                        <label for="grupo-puesto-otro_idioma">Otro idioma.</label>
                                                                    </div>

                                                                    <div class="add-puntuacion">
                                                                        <button class="boton_add_puntuacion" id="agregar_idioma">
                                                                            <i class="fas fa-plus"></i>
                                                                            Agregar idioma
                                                                        </button>
                                                                        <button class="boton_add_idioma boton_add_puntuacion" id="boton_add_idioma">
                                                                            <i class="fas fa-plus"></i>
                                                                            Agregar nuevo idioma
                                                                        </button>
                                                                    </div>

                                                                    <div class="contenedor-grupo" id="lista_idiomas">
                                                                    </div>

                                                                    <div class="contenedor-grupo" id="select-idiomas">
                                                                        <input type="hidden" name="idSelectIdioma" id="idSelectIdioma" value="">
                                                                        <input type="hidden" name="nivelIdioma" id="nivelIdioma" value="">
                                                                        <ul id="select-idiomas-list">
                                                                        </ul>
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

                                <!-- Habilidades  -->
                                <div class="iq-card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="post-modal-data" class="iq-card">
                                                <div class="iq-card-header d-flex justify-content-between">
                                                    <div class="iq-header-title">
                                                        <h4 class="card-title titulo-perfil">Habilidades</h4>
                                                    </div>
                                                    <a class="btn" role="button" tabindex="0" id="data-idHabilidades">
                                                        <i class="las la-plus" data-toggle="modal" data-target="#habilidades"></i>
                                                    </a>
                                                </div>
                                                <div class="iq-card-body" id="list-habilidades-selected">
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="habilidades" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="post-modalLabel">Habilidades</h5>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-times"></i></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="#" id="form-habilidades" class="contenedor-form">
                                                                    <input type="hidden" name="idHabilidad" id="idHabilidad" value="0">

                                                                    <div class="contenedor-grupo w100" id="grupo-habilidad">
                                                                        <div class="agrupar-estrellas form-group">
                                                                            <label for="txtListHabilidad" id="grupo-idioma-habilidad">Habilidades</label>
                                                                            <select name="txtListHabilidad" class="form-control" id="txtListHabilidad"></select>
                                                                            <label for="txtHabilidad" id="grupo-idioma-otra_habilidad" style="display: none;">Nueva Habilidad</label>
                                                                            <input type="text" class="form-control" name="txtHabilidad" id="txtHabilidad" placeholder="JavaScript" autofocus style="display: none;" />
                                                                            <i class="estado-input estado-input-w50 fa fa-times-circle"></i>
                                                                            <p class="leyenda-input">
                                                                                El nombre de la habilidad no debe contener números.
                                                                            </p>
                                                                        </div>
                                                                        <span class="estrellas">
                                                                            <label class="fas fa-star puntuacion habilidad" id="1habi">
                                                                                <input type="radio" name="txtNivelHabilidades" class="input-radio" id="1habi" checked value="1">
                                                                            </label>
                                                                            <label class="fas fa-star puntuacion habilidad" id="2habi">
                                                                                <input type="radio" name="txtNivelHabilidades" class="input-radio" id="2habi" value="2">
                                                                            </label>
                                                                            <label class="fas fa-star puntuacion habilidad" id="3habi">
                                                                                <input type="radio" name="txtNivelHabilidades" class="input-radio" id="3habi" value="3">
                                                                            </label>
                                                                            <label class="fas fa-star puntuacion habilidad" id="4habi">
                                                                                <input type="radio" name="txtNivelHabilidades" class="input-radio" id="4habi" value="4">
                                                                            </label>
                                                                            <label class="fas fa-star puntuacion habilidad" id="5habi">
                                                                                <input type="radio" name="txtNivelHabilidades" class="input-radio" id="5habi" value="5">
                                                                            </label>
                                                                        </span>
                                                                    </div>

                                                                    <div class="contenedor-grupo w100" id="grupo-otra_habilidad">
                                                                        <input type="checkbox" id="grupo-puesto-otra_habilidad" />
                                                                        <label for="grupo-puesto-otra_habilidad">Otro Habilidad.</label>
                                                                    </div>

                                                                    <div class="add-puntuacion">
                                                                        <button class="boton_add_puntuacion" id="agregar_habilidad">
                                                                            <i class="fas fa-plus"></i>
                                                                            Agregar habilidad
                                                                        </button>
                                                                        <button class="boton_add_habilidad boton_add_puntuacion" id="boton_add_habilidad">
                                                                            <i class="fas fa-plus"></i>
                                                                            Agregar nueva habilidad
                                                                        </button>
                                                                    </div>

                                                                    <div class="contenedor-grupo w100" id="lista_habilidades">
                                                                    </div>

                                                                    <div class="contenedor-grupo w100" id="select-habilidad">
                                                                        <input type="hidden" name="idSelectHabilidad" id="idSelectHabilidad" value="">
                                                                        <input type="hidden" name="nivelHabilidad" id="nivelHabilidad" value="">
                                                                        <ul id="select-habilidad-list">
                                                                        </ul>
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

                                <!-- Educación -->
                                <div class="iq-card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="post-modal-data" class="iq-card">
                                                <div class="iq-card-header d-flex justify-content-between">
                                                    <div class="iq-header-title">
                                                        <h4 class="card-title titulo-perfil">Educación</h4>
                                                    </div>
                                                    <a class="btn" role="button" tabindex="0" id="data-idEducacion">
                                                        <i class="las la-plus" data-toggle="modal" data-target="#educacion"></i>
                                                    </a>
                                                </div>
                                                <div class="iq-card-body" id="list-estudios">
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="educacion" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="post-modalLabel">Educación - Estudios</h5>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-times"></i></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="estudios" class="contenedor-form">
                                                                    <input type="hidden" name="idEducacion" id="idEducacion">
                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-institucion">
                                                                        <label for="input-institucion">Institución</label>
                                                                        <input type="text" class="form-control" name="txtInstitucion" id="input-institucion" placeholder="Universidad Nacional de Colombia" />
                                                                        <i class="estado-input fa fa-times-circle"></i>
                                                                        <p class="leyenda-input">
                                                                            El nombre de la institución no puede contener numeros.
                                                                        </p>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-titulo">
                                                                        <label for="input-titulo">Titulo obtenido</label>
                                                                        <input type="text" class="form-control" name="txtTitulo" id="input-titulo" placeholder="Ingeniero/a de sistemas y computación" />
                                                                        <i class="estado-input fa fa-times-circle"></i>
                                                                        <p class="leyenda-input">
                                                                            El nombre del titulo obtenido no puede contener numeros.
                                                                        </p>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-ciudad">
                                                                        <label for="txtCiudad">Ciudad</label>
                                                                        <select class="form-control" name="txtCiudad" id="txtCiudad">
                                                                            <option value="0">Bogotá D.C</option>
                                                                            <option value="1">Medellin</option>
                                                                            <option value="2">Cali</option>
                                                                            <option value="3">Barranquilla</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-gradoest">
                                                                        <label for="txtGradoEst">Grado estudio</label>
                                                                        <select class="form-control" name="txtGradoEst" id="txtGradoEst">
                                                                            <option value="" disabled selected>Seleccione su grado de estudio</option>
                                                                            <?php foreach ($data['list_gradoEstudio'] as $grado) : ?>
                                                                                <option value="<?= $grado['idGrado'] ?>"><?= $grado['nombreGrado'] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo w100 form-group" id="grupo-sector">
                                                                        <label for="txtSector">Sector</label>
                                                                        <select class="form-control" name="txtSector" id="txtSector">
                                                                            <option value="" disabled selected>Seleccione su sector</option>
                                                                            <?php foreach ($data['list_sectores'] as $sector) : ?>
                                                                                <option value="<?= $sector['idSector'] ?>"><?= $sector['nombreSector'] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-anioini">
                                                                        <label for="txtAnioIni">Año inicio</label>
                                                                        <select class="form-control" name="txtAnioIni" id="txtAnioIni">
                                                                            <option value="" disabled selected>Seleccione el año de inicio de los estudios</option>
                                                                            <option value="1954">1954</option>
                                                                            <option value="1955">1955</option>
                                                                            <option value="1956">1956</option>
                                                                            <option value="1957">1957</option>
                                                                            <option value="1958">1958</option>
                                                                            <option value="1959">1959</option>
                                                                            <option value="1960">1960</option>
                                                                            <option value="1961">1961</option>
                                                                            <option value="1962">1962</option>
                                                                            <option value="1963">1963</option>
                                                                            <option value="1964">1964</option>
                                                                            <option value="1965">1965</option>
                                                                            <option value="1966">1966</option>
                                                                            <option value="1967">1967</option>
                                                                            <option value="1968">1968</option>
                                                                            <option value="1969">1969</option>
                                                                            <option value="1970">1970</option>
                                                                            <option value="1971">1971</option>
                                                                            <option value="1972">1972</option>
                                                                            <option value="1973">1973</option>
                                                                            <option value="1974">1974</option>
                                                                            <option value="1975">1975</option>
                                                                            <option value="1976">1976</option>
                                                                            <option value="1977">1977</option>
                                                                            <option value="1978">1978</option>
                                                                            <option value="1979">1979</option>
                                                                            <option value="1980">1980</option>
                                                                            <option value="1981">1981</option>
                                                                            <option value="1982">1982</option>
                                                                            <option value="1983">1983</option>
                                                                            <option value="1984">1984</option>
                                                                            <option value="1985">1985</option>
                                                                            <option value="1986">1986</option>
                                                                            <option value="1987">1987</option>
                                                                            <option value="1988">1988</option>
                                                                            <option value="1989">1989</option>
                                                                            <option value="1990">1990</option>
                                                                            <option value="1991">1991</option>
                                                                            <option value="1992">1992</option>
                                                                            <option value="1993">1993</option>
                                                                            <option value="1994">1994</option>
                                                                            <option value="1995">1995</option>
                                                                            <option value="1996">1996</option>
                                                                            <option value="1997">1997</option>
                                                                            <option value="1998">1998</option>
                                                                            <option value="1999">1999</option>
                                                                            <option value="2000">2000</option>
                                                                            <option value="2001">2001</option>
                                                                            <option value="2002">2002</option>
                                                                            <option value="2003">2003</option>
                                                                            <option value="2004">2004</option>
                                                                            <option value="2005">2005</option>
                                                                            <option value="2006">2006</option>
                                                                            <option value="2007">2007</option>
                                                                            <option value="2008">2008</option>
                                                                            <option value="2009">2009</option>
                                                                            <option value="2010">2010</option>
                                                                            <option value="2011">2011</option>
                                                                            <option value="2012">2012</option>
                                                                            <option value="2013">2013</option>
                                                                            <option value="2014">2014</option>
                                                                            <option value="2015">2015</option>
                                                                            <option value="2016">2016</option>
                                                                            <option value="2017">2017</option>
                                                                            <option value="2018">2018</option>
                                                                            <option value="2019">2019</option>
                                                                            <option value="2020">2020</option>
                                                                            <option value="2021">2021</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-mesini">
                                                                        <label for="txtMesIni">Mes inicio</label>
                                                                        <select class="form-control" name="txtMesIni" id="txtMesIni">
                                                                            <option value="" disabled selected>Seleccione el mes de inicio de los estudios</option>
                                                                            <option value="01">Enero</option>
                                                                            <option value="02">Febrero</option>
                                                                            <option value="03">Marzo</option>
                                                                            <option value="04">Abril</option>
                                                                            <option value="05">Mayo</option>
                                                                            <option value="06">Junio</option>
                                                                            <option value="07">Julio</option>
                                                                            <option value="08">Agosto</option>
                                                                            <option value="09">Septiembre</option>
                                                                            <option value="10">Octubre</option>
                                                                            <option value="11">Noviembre</option>
                                                                            <option value="12">Diciembre</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-aniofin">
                                                                        <label for="txtAnioFin">Año finalización</label>
                                                                        <select class="form-control" name="txtAnioFin" id="txtAnioFin">
                                                                            <option value="" disabled selected>Seleccione el año de fin de los estudios</option>
                                                                            <option value="1954">1954</option>
                                                                            <option value="1955">1955</option>
                                                                            <option value="1956">1956</option>
                                                                            <option value="1957">1957</option>
                                                                            <option value="1958">1958</option>
                                                                            <option value="1959">1959</option>
                                                                            <option value="1960">1960</option>
                                                                            <option value="1961">1961</option>
                                                                            <option value="1962">1962</option>
                                                                            <option value="1963">1963</option>
                                                                            <option value="1964">1964</option>
                                                                            <option value="1965">1965</option>
                                                                            <option value="1966">1966</option>
                                                                            <option value="1967">1967</option>
                                                                            <option value="1968">1968</option>
                                                                            <option value="1969">1969</option>
                                                                            <option value="1970">1970</option>
                                                                            <option value="1971">1971</option>
                                                                            <option value="1972">1972</option>
                                                                            <option value="1973">1973</option>
                                                                            <option value="1974">1974</option>
                                                                            <option value="1975">1975</option>
                                                                            <option value="1976">1976</option>
                                                                            <option value="1977">1977</option>
                                                                            <option value="1978">1978</option>
                                                                            <option value="1979">1979</option>
                                                                            <option value="1980">1980</option>
                                                                            <option value="1981">1981</option>
                                                                            <option value="1982">1982</option>
                                                                            <option value="1983">1983</option>
                                                                            <option value="1984">1984</option>
                                                                            <option value="1985">1985</option>
                                                                            <option value="1986">1986</option>
                                                                            <option value="1987">1987</option>
                                                                            <option value="1988">1988</option>
                                                                            <option value="1989">1989</option>
                                                                            <option value="1990">1990</option>
                                                                            <option value="1991">1991</option>
                                                                            <option value="1992">1992</option>
                                                                            <option value="1993">1993</option>
                                                                            <option value="1994">1994</option>
                                                                            <option value="1995">1995</option>
                                                                            <option value="1996">1996</option>
                                                                            <option value="1997">1997</option>
                                                                            <option value="1998">1998</option>
                                                                            <option value="1999">1999</option>
                                                                            <option value="2000">2000</option>
                                                                            <option value="2001">2001</option>
                                                                            <option value="2002">2002</option>
                                                                            <option value="2003">2003</option>
                                                                            <option value="2004">2004</option>
                                                                            <option value="2005">2005</option>
                                                                            <option value="2006">2006</option>
                                                                            <option value="2007">2007</option>
                                                                            <option value="2008">2008</option>
                                                                            <option value="2009">2009</option>
                                                                            <option value="2010">2010</option>
                                                                            <option value="2011">2011</option>
                                                                            <option value="2012">2012</option>
                                                                            <option value="2013">2013</option>
                                                                            <option value="2014">2014</option>
                                                                            <option value="2015">2015</option>
                                                                            <option value="2016">2016</option>
                                                                            <option value="2017">2017</option>
                                                                            <option value="2018">2018</option>
                                                                            <option value="2019">2019</option>
                                                                            <option value="2020">2020</option>
                                                                            <option value="2021">2021</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-mesfin">
                                                                        <label for="txtMesFin">Mes finalización</label>
                                                                        <select class="form-control" name="txtMesFin" id="txtMesFin">
                                                                            <option value="" disabled selected>Seleccione el mes de finalización de los estudios</option>
                                                                            <option value="01">Enero</option>
                                                                            <option value="02">Febrero</option>
                                                                            <option value="03">Marzo</option>
                                                                            <option value="04">Abril</option>
                                                                            <option value="05">Mayo</option>
                                                                            <option value="06">Junio</option>
                                                                            <option value="07">Julio</option>
                                                                            <option value="08">Agosto</option>
                                                                            <option value="09">Septiembre</option>
                                                                            <option value="10">Octubre</option>
                                                                            <option value="11">Noviembre</option>
                                                                            <option value="12">Diciembre</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo btn-enviar">
                                                                        <button type="submit" class="btns">
                                                                            Guardar<i class="far fa-save icon-btn"></i>
                                                                        </button>
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

                                <!-- Experiencia laboral -->
                                <div class="iq-card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="post-modal-data" class="iq-card">
                                                <div class="iq-card-header d-flex justify-content-between">
                                                    <div class="iq-header-title">
                                                        <h4 class="card-title titulo-perfil">Experiencia laboral</h4>
                                                    </div>
                                                    <a class="btn" role="button" tabindex="0" id="data-idExperiencia">
                                                        <i class="las la-plus" data-toggle="modal" data-target="#experiencia-laboral"></i>
                                                    </a>
                                                </div>
                                                <div class="iq-card-body" id="list-experiencia">
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="experiencia-laboral" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="post-modalLabel">Experiencia laboral</h5>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-times"></i></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="#" id="form-experiencia-laboral" class="contenedor-form">
                                                                    <input type="hidden" name="idExperiencia" id="idExperiencia">
                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-empresa">
                                                                        <label for="txtEmpresa">Empresa laboró</label>
                                                                        <input class="form-control" type="text" name="txtEmpresa" id="txtEmpresa" autofocus placeholder="Microsoft" />
                                                                        <i class="estado-input fa fa-times-circle"></i>
                                                                        <p class="leyenda-input">
                                                                            El nombre de la empresa en la cual laboró no debe contener
                                                                            números, guines ni carácteres espciales.
                                                                        </p>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-sectorex">
                                                                        <label for="txtSectorExp">Sector laboró</label>
                                                                        <select class="form-control" name="txtSectorExp" id="txtSectorExp">
                                                                            <option value="" disabled selected>Seleccione su sector</option>
                                                                            <?php foreach ($data['list_sectores'] as $sector) : ?>
                                                                                <option value="<?= $sector['idSector'] ?>"><?= $sector['nombreSector'] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-ciudadlab">
                                                                        <label for="txtCiudadLab">Ciudad</label>
                                                                        <select class="form-control" name="txtCiudadLab" id="txtCiudadLab">
                                                                            <option value="0">Bogotá D.C</option>
                                                                            <option value="1">Medellin</option>
                                                                            <option value="2">Cali</option>
                                                                            <option value="3">Barranquilla</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-tipoexp">
                                                                        <label for="txtTipoExp">Tipo experiencia</label>
                                                                        <select class="form-control" name="txtTipoExp" id="txtTipoExp">
                                                                            <option value="" disabled selected>---- Seleccione un tipo de experiencia ----</option>
                                                                            <?php foreach ($data['list_tipoExperiencia'] as $tipoExperiencia) : ?>
                                                                                <option value="<?= $tipoExperiencia['idTipoExperiencia'] ?>"><?= $tipoExperiencia['nombreTipoExperiencia'] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo w100 form-group" id="grupo-puesto">
                                                                        <label for="txtPuesto">Puesto desempeñado</label>
                                                                        <input class="form-control" type="text" name="txtPuesto" id="txtPuestoDesempeñado" placeholder="Desarollador de software frontend" />
                                                                        <i class="estado-input fa fa-times-circle"></i>
                                                                        <p class="leyenda-input">
                                                                            El nombre del puesto que desempeño no debe contener números, guines, carácteres
                                                                            especiales.
                                                                        </p>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-anioiniexp">
                                                                        <label for="txtAnioIniExp">Año inicio</label>
                                                                        <select class="form-control" name="txtAnioIniExp" id="txtAnioIniExp">
                                                                            <option value="" disabled selected>---- Seleccione el año inicio comenzo a laborar ----</option>
                                                                            <option value="1954">1954</option>
                                                                            <option value="1955">1955</option>
                                                                            <option value="1956">1956</option>
                                                                            <option value="1957">1957</option>
                                                                            <option value="1958">1958</option>
                                                                            <option value="1959">1959</option>
                                                                            <option value="1960">1960</option>
                                                                            <option value="1961">1961</option>
                                                                            <option value="1962">1962</option>
                                                                            <option value="1963">1963</option>
                                                                            <option value="1964">1964</option>
                                                                            <option value="1965">1965</option>
                                                                            <option value="1966">1966</option>
                                                                            <option value="1967">1967</option>
                                                                            <option value="1968">1968</option>
                                                                            <option value="1969">1969</option>
                                                                            <option value="1970">1970</option>
                                                                            <option value="1971">1971</option>
                                                                            <option value="1972">1972</option>
                                                                            <option value="1973">1973</option>
                                                                            <option value="1974">1974</option>
                                                                            <option value="1975">1975</option>
                                                                            <option value="1976">1976</option>
                                                                            <option value="1977">1977</option>
                                                                            <option value="1978">1978</option>
                                                                            <option value="1979">1979</option>
                                                                            <option value="1980">1980</option>
                                                                            <option value="1981">1981</option>
                                                                            <option value="1982">1982</option>
                                                                            <option value="1983">1983</option>
                                                                            <option value="1984">1984</option>
                                                                            <option value="1985">1985</option>
                                                                            <option value="1986">1986</option>
                                                                            <option value="1987">1987</option>
                                                                            <option value="1988">1988</option>
                                                                            <option value="1989">1989</option>
                                                                            <option value="1990">1990</option>
                                                                            <option value="1991">1991</option>
                                                                            <option value="1992">1992</option>
                                                                            <option value="1993">1993</option>
                                                                            <option value="1994">1994</option>
                                                                            <option value="1995">1995</option>
                                                                            <option value="1996">1996</option>
                                                                            <option value="1997">1997</option>
                                                                            <option value="1998">1998</option>
                                                                            <option value="1999">1999</option>
                                                                            <option value="2000">2000</option>
                                                                            <option value="2001">2001</option>
                                                                            <option value="2002">2002</option>
                                                                            <option value="2003">2003</option>
                                                                            <option value="2004">2004</option>
                                                                            <option value="2005">2005</option>
                                                                            <option value="2006">2006</option>
                                                                            <option value="2007">2007</option>
                                                                            <option value="2008">2008</option>
                                                                            <option value="2009">2009</option>
                                                                            <option value="2010">2010</option>
                                                                            <option value="2011">2011</option>
                                                                            <option value="2012">2012</option>
                                                                            <option value="2013">2013</option>
                                                                            <option value="2014">2014</option>
                                                                            <option value="2015">2015</option>
                                                                            <option value="2016">2016</option>
                                                                            <option value="2017">2017</option>
                                                                            <option value="2018">2018</option>
                                                                            <option value="2019">2019</option>
                                                                            <option value="2020">2020</option>
                                                                            <option value="2021">2021</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-mesiniExp">
                                                                        <label for="txtMesIniExp">Mes inicio</label>
                                                                        <select class="form-control" name="txtMesIniExp" id="txtMesIniExp">
                                                                            <option value="" disabled selected>---- Seleccione el mes en que inicio a laborar ----</option>
                                                                            <option value="01">Enero</option>
                                                                            <option value="02">Febrero</option>
                                                                            <option value="03">Marzo</option>
                                                                            <option value="04">Abril</option>
                                                                            <option value="05">Mayo</option>
                                                                            <option value="06">Junio</option>
                                                                            <option value="07">Julio</option>
                                                                            <option value="08">Agosto</option>
                                                                            <option value="09">Septiembre</option>
                                                                            <option value="10">Octubre</option>
                                                                            <option value="11">Noviembre</option>
                                                                            <option value="12">Diciembre</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-aniofinexp">
                                                                        <label for="txtAnioFinExp">Año finalización</label>
                                                                        <select class="form-control" name="txtAnioFinExp" id="txtAnioFinExp">
                                                                            <option value="" disabled selected>---- Seleccione el año finalización laboral ----</option>
                                                                            <option value="1954">1954</option>
                                                                            <option value="1955">1955</option>
                                                                            <option value="1956">1956</option>
                                                                            <option value="1957">1957</option>
                                                                            <option value="1958">1958</option>
                                                                            <option value="1959">1959</option>
                                                                            <option value="1960">1960</option>
                                                                            <option value="1961">1961</option>
                                                                            <option value="1962">1962</option>
                                                                            <option value="1963">1963</option>
                                                                            <option value="1964">1964</option>
                                                                            <option value="1965">1965</option>
                                                                            <option value="1966">1966</option>
                                                                            <option value="1967">1967</option>
                                                                            <option value="1968">1968</option>
                                                                            <option value="1969">1969</option>
                                                                            <option value="1970">1970</option>
                                                                            <option value="1971">1971</option>
                                                                            <option value="1972">1972</option>
                                                                            <option value="1973">1973</option>
                                                                            <option value="1974">1974</option>
                                                                            <option value="1975">1975</option>
                                                                            <option value="1976">1976</option>
                                                                            <option value="1977">1977</option>
                                                                            <option value="1978">1978</option>
                                                                            <option value="1979">1979</option>
                                                                            <option value="1980">1980</option>
                                                                            <option value="1981">1981</option>
                                                                            <option value="1982">1982</option>
                                                                            <option value="1983">1983</option>
                                                                            <option value="1984">1984</option>
                                                                            <option value="1985">1985</option>
                                                                            <option value="1986">1986</option>
                                                                            <option value="1987">1987</option>
                                                                            <option value="1988">1988</option>
                                                                            <option value="1989">1989</option>
                                                                            <option value="1990">1990</option>
                                                                            <option value="1991">1991</option>
                                                                            <option value="1992">1992</option>
                                                                            <option value="1993">1993</option>
                                                                            <option value="1994">1994</option>
                                                                            <option value="1995">1995</option>
                                                                            <option value="1996">1996</option>
                                                                            <option value="1997">1997</option>
                                                                            <option value="1998">1998</option>
                                                                            <option value="1999">1999</option>
                                                                            <option value="2000">2000</option>
                                                                            <option value="2001">2001</option>
                                                                            <option value="2002">2002</option>
                                                                            <option value="2003">2003</option>
                                                                            <option value="2004">2004</option>
                                                                            <option value="2005">2005</option>
                                                                            <option value="2006">2006</option>
                                                                            <option value="2007">2007</option>
                                                                            <option value="2008">2008</option>
                                                                            <option value="2009">2009</option>
                                                                            <option value="2010">2010</option>
                                                                            <option value="2011">2011</option>
                                                                            <option value="2012">2012</option>
                                                                            <option value="2013">2013</option>
                                                                            <option value="2014">2014</option>
                                                                            <option value="2015">2015</option>
                                                                            <option value="2016">2016</option>
                                                                            <option value="2017">2017</option>
                                                                            <option value="2018">2018</option>
                                                                            <option value="2019">2019</option>
                                                                            <option value="2020">2020</option>
                                                                            <option value="2021">2021</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo w50 form-group" id="grupo-mesfinexp">
                                                                        <label for="txtMesFinExp">Mes finalización</label>
                                                                        <select class="form-control" name="txtMesFinExp" id="txtMesFinExp">
                                                                            <option value="" disabled selected>---- Seleccione el mes de finalización laboral ----</option>
                                                                            <option value="01">Enero</option>
                                                                            <option value="02">Febrero</option>
                                                                            <option value="03">Marzo</option>
                                                                            <option value="04">Abril</option>
                                                                            <option value="05">Mayo</option>
                                                                            <option value="06">Junio</option>
                                                                            <option value="07">Julio</option>
                                                                            <option value="08">Agosto</option>
                                                                            <option value="09">Septiembre</option>
                                                                            <option value="10">Octubre</option>
                                                                            <option value="11">Noviembre</option>
                                                                            <option value="12">Diciembre</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="contenedor-grupo w100 form-group" id="grupo-funcion">
                                                                        <label for="txtFuncion">Funciones</label>
                                                                        <textarea name="textFunciones" id="funciones" rows="1" placeholder="Funciones que desempeño..."></textarea>
                                                                    </div>

                                                                    <div class="contenedor-grupo btn-enviar">
                                                                        <button type="submit" class="btns">
                                                                            Guardar<i class="fas fa-chevron-right icon-btn"></i>
                                                                        </button>
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
                            <!-- Acerca del perfil de la persona  -->
                            <div class="tab-pane fade" id="about" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0">
                                                    <li>
                                                        <a class="nav-link active" data-toggle="pill" href="#basicinfo">Contacto e Informacion Basica</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9 pl-4">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                                                        <h4>Información de Contacto</h4>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <h6>Email</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0"><?= $_SESSION['user-data']['correoUsuario'] ?></p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>Celular</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0"><?= $_SESSION['user-data']['numTelUsuario'] ?></p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>Direccion</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0"><?= $_SESSION['user-data']['direccionUsuario'] ?></p>
                                                            </div>
                                                        </div>
                                                        <h4 class="mt-3">Websites and Social Links</h4>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <h6>Website</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0">www.bootstrap.com</p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>Social Link</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0">www.bootstrap.com</p>
                                                            </div>
                                                        </div>
                                                        <h4 class="mt-3">Informacion Basica</h4>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <h6>Identificacion</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0"><?= $_SESSION['user-data']['nombreTipoDocumento'] ?></option>
                                                                </p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>Numero ID</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0"><?= $_SESSION['user-data']['numDocUsuario'] ?></p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>Barrio</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0"><?= $_SESSION['user-data']['nombreBarrio'] ?></p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>Num Fijo</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0"><?= $_SESSION['user-data']['numTelFijo'] ?></p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>Estado</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0"><?= $_SESSION['user-data']['estadoUsuario'] ?> - Activo</p>
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

    <script src="https://cdn.tiny.cloud/1/x2oub1u70xqw4t9bxdur2k98oz7jsin9tx0vewhh6zf7pc68/tinymce/5/tinymce.min.js" referrerpolicy="origin" defer></script>
    <!-- Scripts  -->
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL; ?>Assets/js/fntAspirante.js" type="module" defer></script>
</body>

</html>