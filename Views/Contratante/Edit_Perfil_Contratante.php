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
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= assets_url_css(); ?>stylesMenu.css">
    <link rel="stylesheet" href="<?= assets_url_css(); ?>stylesGlobal.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= assets_url_css(); ?>responsive.css">
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
        require_once('./Views/Components/LoadingForms.php');
        require_once('./Views/Components/LayoutC.php');
        ?>
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= URL ?>Menu">Menú </a></li>
                        <li class="mx-1"> / </li>
                        <li> Editar Perfil</li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-body p-0">
                                <div class="iq-edit-list">
                                    <ul class="iq-edit-profile d-flex nav nav-pills">
                                        <li class="col-md-6 p-0">
                                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                                Información personal
                                            </a>
                                        </li>
                                        <li class="col-md-6 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                                Cambiar contraseña
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="iq-edit-list-data">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Información personal</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form id="formPrincipal" enctype="multipart/form-data">
                                                <input type="hidden" class="form-control" name="idUsuario" id="idUsuario" value="<?= $_SESSION['user-data']['idUsuario'] ?>" />
                                                <input type="hidden" name="foto_actual" id="foto_actual" value="<?= $_SESSION['user-data']['imagenUsuario'] ?>" />
                                                <input type="hidden" name="foto_remove" id="foto_remove" value="0" />
                                                <div class="form-group row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="profile-img-edit">
                                                            <img class="profile-pic" width="180" height="200" src="<?= $_SESSION['imgProfile'] ?>" alt="<?= $_SESSION['user-data']['nombreUsuario'] ?>">
                                                            <div class="p-image">
                                                                <i class="las la-pencil-alt upload-button"></i>
                                                                <input class="file-upload" name="foto" id="foto" type="file" accept="image/*" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class=" row align-items-center">
                                                    <div class="form-group col-sm-12">
                                                        <label for="fname">Nombre:</label>
                                                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" value="<?= $_SESSION['user-data']['nombreUsuario'] ?>" disabled>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="lname">Identificación:</label>
                                                        <input type="text" class="form-control" name="numDoc" id="numDoc" value="<?= $_SESSION['user-data']['numDocUsuario'] ?>" disabled>
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label for="uname">Tipo de Identificación:</label>
                                                        <select name="tipoDoc" id="tipoDoc" class="form-control" disabled>
                                                            <?php foreach ($data['list_tipodoc'] as $tipoDoc) : ?>
                                                                <option value="<?php echo $tipoDoc['idTipoDocumento'] ?>" <?= $tipoDoc['idTipoDocumento'] == $_SESSION['user-data']['idTipoDocumentoFK'] ? 'selected' : '' ?>><?php echo $tipoDoc['nombreTipoDocumento'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="cname">Número de Contacto Fijó:</label>
                                                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $_SESSION['user-data']['numTelFijo'] ?>" disabled>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="cname">Número de Contacto Móvil:</label>
                                                        <input type="text" class="form-control" name="mobile" id="mobile" value="<?= $_SESSION['user-data']['numTelUsuario'] ?>" disabled>
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label for="dob">Barrio:</label>
                                                        <select name="Barrio" id="Barrio" class="form-control" disabled>
                                                            <?php foreach ($data['list_barrio'] as $barrio) : ?>
                                                                <option value="<?php echo $barrio['idBarrio'] ?>" <?= $barrio['idBarrio'] == $_SESSION['user-data']['idBarrioFK'] ? 'selected' : '' ?>><?php echo $barrio['nombreBarrio'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Dirección:</label>
                                                        <input type="text" class="form-control" name="Direccion" id="Direccion" value="<?= $_SESSION['user-data']['direccionUsuario'] ?>" disabled>
                                                    </div>
                                                </div>
                                                <button type="button" id="edit" class="btn btn-primary mr-2"><i class="fas fa-edit"></i> Editar</button>
                                                <button type="submit" id="guardar" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Guardar</button>
                                                <button type="reset" id="cancelar" class="btn iq-bg-danger mr-2"><i class="fas fa-ban text-danger"></i> Cancelar</button>
                                                <button type="reset" id="inhabilitar" class="btn iq-bg-danger"><i class="fas fa-exclamation-triangle text-danger"></i> Inhabilitar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                                    <?php require_once('./Views/Components/LoadingForms.php'); ?>
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Cambiar contraseña</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form id="change-password">
                                                <div class="form-group">
                                                    <label for="actual">Contraseña Actual</label>
                                                    <input type="Password" class="form-control" id="actual" name="actual" placeholder="Ingrese su contraseña actual...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nueva">Contraseña Nueva:</label>
                                                    <input type="Password" class="form-control" id="nueva" name="nueva" placeholder="Ingrese su nueva contraseña...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="verificar">Verificar Contraseña:</label>
                                                    <input type="Password" class="form-control" id="verificar" name="verificar" placeholder="Confirme la nueva contraseña...">
                                                </div>
                                                <button type="submit" id="cambiar" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Guardar</button>
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