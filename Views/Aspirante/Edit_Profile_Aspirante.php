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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-body p-0">
                                <div class="iq-edit-list">
                                    <ul class="iq-edit-profile d-flex nav nav-pills">
                                        <li class="col-md-3 p-0">
                                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                                Personal Information
                                            </a>
                                        </li>
                                        <li class="col-md-3 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                                Cambiar contraseña
                                            </a>
                                        </li>
                                        <li class="col-md-3 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#emailandsms">
                                                Email and SMS
                                            </a>
                                        </li>
                                        <li class="col-md-3 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#manage-contact">
                                                Manage Contact
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
                                            <form id="form-aspirante" method="POST">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="profile-img-edit">
                                                            <img class="profile-pic" width="250px" height="200px" src="<?php echo $_SESSION['imgProfile']; ?>" alt="Edier">
                                                            <div class="p-image">
                                                                <i class="las la-pencil-alt upload-button"></i>
                                                                <input type="file">
                                                                <!--<input class="file-upload" type="file" multiple/>-->

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" row align-items-center">
                                                        <div class="form-group col-sm-6">
                                                            <br><br>
                                                            <label for="fname">Nombres y Apellidos:</label>
                                                            <input type="text" class="form-control" id="nombreApellido" name="nombreApellido" value="<?= $_SESSION['user-data']['nombreUsuario'] ?>">
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <br><br>
                                                            <label for="uname">Identificacion:</label>
                                                            <select name="titulo" id="titulo" class="form-control">
                                                                <option selected disabled value="0"><?= $_SESSION['user-data']['nombreTipoDocumento'] ?></option>
                                                                <?php foreach ($data['list_tipodoc'] as $tipoDoc) : ?>
                                                                    <option value="<?php echo $tipoDoc['idTipoDocumento'] ?>"><?php echo $tipoDoc['nombreTipoDocumento'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>

                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label for="cname"> Numero de celular:</label>
                                                            <input type="text" class="form-control" id="posicion" name="posicion" value="<?= $_SESSION['user-data']['numTelUsuario'] ?>">
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label for="dob">Numero fijo:</label>
                                                            <input class="form-control" id="idioma" name="idioma" value="<?= $_SESSION['user-data']['numTelFijo'] ?>">
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label for="lname">Numero de identificacion:</label>
                                                            <input type="text" class="form-control" id="numDoc" name="numDoc" value="<?= $_SESSION['user-data']['numDocUsuario'] ?>">
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label for="dob">Direccion:</label>
                                                            <input class="form-control" id="direccion" name="direccion" value="<?= $_SESSION['user-data']['direccionUsuario'] ?>">
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label>Barrio:</label>
                                                            <select name="Barrio" id="Barrio" class="form-control">
                                                                <option selected value=""> <?= $_SESSION['user-data']['nombreBarrio'] ?></option>
                                                                <?php foreach ($data['list_barrio'] as $barrio) : ?>
                                                                    <option value="<?php echo $barrio['idBarrio'] ?>"><?php echo $barrio['nombreBarrio'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-primary profile-button mr-2" id="guardar" onclick="editPerfil();">Guardar</button>
                                                    <button class="btn btn-danger" id="inhabilitar" type="button" onclick="inhabilitarAs();"><i class="fas fa-times"></i>Inactivar Cuenta</button>
                                                    <button type="reset" class="btn iq-bg-danger">Cancelar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Cambio de contraseña</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="cpass">Contraseña actual:</label>
                                                <input type="Password" class="form-control" id="cpass" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="npass">Nueva contraseña:</label>
                                                <input type="Password" class="form-control" id="npass" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="vpass">Verificar contraseña:</label>
                                                <input type="Password" class="form-control" id="vpass" value="">
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn iq-bg-danger">Cancle</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Email and SMS</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <form>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-3" for="emailnotification">Email Notification:</label>
                                                <div class="col-md-9 custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="emailnotification" checked="">
                                                    <label class="custom-control-label" for="emailnotification"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-3" for="smsnotification">SMS Notification:</label>
                                                <div class="col-md-9 custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="smsnotification" checked="">
                                                    <label class="custom-control-label" for="smsnotification"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-3" for="npass">When To Email</label>
                                                <div class="col-md-9">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="email01">
                                                        <label class="custom-control-label" for="email01">You have new notifications.</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="email02">
                                                        <label class="custom-control-label" for="email02">You're sent a direct message</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="email03" checked="">
                                                        <label class="custom-control-label" for="email03">Someone adds you as a connection</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-3" for="npass">When To Escalate Emails</label>
                                                <div class="col-md-9">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="email04">
                                                        <label class="custom-control-label" for="email04"> Upon new order.</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="email05">
                                                        <label class="custom-control-label" for="email05"> New membership approval</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="email06" checked="">
                                                        <label class="custom-control-label" for="email06"> Member registration</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn iq-bg-danger">Cancle</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Manage Contact</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="cno">Contact Number:</label>
                                                <input type="text" class="form-control" id="cno" value="001 2536 123 458">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="text" class="form-control" id="email" value="Bnijone@demo.com">
                                            </div>
                                            <div class="form-group">
                                                <label for="url">Url:</label>
                                                <input type="text" class="form-control" id="url" value="https://getbootstrap.com">
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn iq-bg-danger">Cancle</button>
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
    </div>
    <!-- Wrapper END -->
    <!-- Footer -->
    <script src="<?= URL; ?>Assets/js/Perfil_Aspirante.js"></script>
    <?php
    require_once('./Views/Components/Footer.php');
    ?>
    <!-- Scripts  -->
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
</body>

</html>