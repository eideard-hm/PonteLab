<!DOCTYPE html>
<html class="html1" lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/aspirante.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/login.css">
</head>

<body>
    <header id="header_menu">
        <div class="contenedor barra">
            <span href="#" class="content-logo">
                <a href="javascript:window.history.back();">
                    <i class="fas fa-arrow-left" id="icono-regresar"></i>
                </a>
                <i class="fas fa-bars" id="icono-reponsive"></i>
                <span href="#" class="logo-nombre">
                    <img src="<?= URL; ?>Assets/img/Logo_ponslabor.png" alt="PonsLabor" class="logo-empresa" />
                    <h2>Pons<span>Labor.</span></h2>
                </span>
            </span>
            <nav class="nav nav_menu">
                <a href="Menu_Contratante"><i class="fas fa-home"></i>Inicio</a>
                <a href="Contratante"><i class="fas fa-user-tie"></i>Contratante</a>
                <a href="Vacante"><i class="fas fa-business-time"></i>Vacante</a>
                <button class="switch" id="switch">
                    <i class="fas fa-sun sol"></i>
                    <i class="fas fa-moon luna"></i>
                    <span class="circulo"></span>
                </button>
                <div class="imagen-persona">
                    <img src="<?php echo $_SESSION['imgProfile']; ?>" id="imagen_perfil" data-id="<?php echo $_SESSION['id']; ?>" alt="<?php echo $_SESSION['user-data']['correoUsuario'] ?>" />
                </div>
            </nav>
        </div>
        <div class="info-persona">
            <h3><?php echo $_SESSION['user-data']['correoUsuario'] ?><br /><span><?php echo $_SESSION['user-data']['nombreRol'] ?></span></h3>
            <ul>
                <li><i class="fas fa-user-edit"></i><a href="Perfil_Contratante">Editar perfil</a></li>
                <li><i class="fas fa-user-circle"></i><a href="Perfil_Contratante">Cambiar foto</a></li>
                <li><i class="fas fa-key"></i><a href="Recuperar_Password">Cambiar contraseña</a></li>
                <li>
                    <i class="fas fa-sign-in-alt"></i><a href="<?= URL ?>logout">Cerrar sesión</a>
                </li>
            </ul>
        </div>
        <div class="contenedor-responsive">
            <ul class="contenedor-responsive-lista">
                <li><a href="Menu">Inicio</a></li>
                <li><a href="Contratante">Contratante</a></li>
                <li><a href="Vacante">Vacante</a></li>
            </ul>
        </div>
    </header>

    <div class="banner">
        <hr>
        <div class="container bootstrap snippet">
            <div class="row">
                <div class="row" id="FormPerfilCon">
                    <div class="col-sm-3">
                        <!--left col-->

                        <div class="text-center">
                            <img style="top: 50px;  position: relative;" src="<?php echo $_SESSION['imgProfile']; ?>" class="avatar img-circle img-thumbnail" alt="avatar" />
                            <h2 style="top: -170px;  position: relative;">Coca-Cola </h2>

                            <a href="#" class="s3d forrst">
                                Forrst
                                <span class="icons forrst"></span>
                            </a>
                            <a href="#" class="s3d twitter">
                                Twitter
                                <span class="icons twitter"></span>
                            </a>

                            <a href="#" class="s3d facebook">
                                Facebook
                                <span class="icons facebook"></span>
                            </a>

                            <a href="#" class="s3d designmoo">
                                Designmoo
                                <span class="icons designmoo"></span>
                            </a>

                            <a href="#" class="s3d flickr">
                                Flickr
                                <span class="icons flickr"></span>
                            </a>
                            </span>
                            <h3></h3>
                        </div>
                        </hr><br>

                    </div>
                    <!--/col-3-->
                    <div class="col-sm-9">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Datos</a></li>
                            <li><a data-toggle="tab" href="#messages">Dirección</a></li>
                            <li><a data-toggle="tab" href="#settings">Descripción</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <hr>
                                <form class="form" action="##" method="post" id="registrationForm">
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="first_name">
                                                <h4>Nombre</h4>
                                            </label>
                                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $_SESSION['user-data']['nombreUsuario'] ?>" placeholder="Coca-Cola" title="enter your first name if any." disabled style="color:#000000">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="last_name">
                                                <h4>Identificación</h4>
                                            </label>
                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="NIT:14,668,569-3" title="enter your last name if any." disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="phone">
                                                <h4>Número de Contacto Fijó</h4>
                                            </label>
                                            <input type="text" class="form-control" name="phone" id="phone" value="<?= $_SESSION['user-data']['numTelFijo'] ?>" placeholder="303 3333333" title="enter your phone number if any." disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="mobile">
                                                <h4>Número de Contacto Móvil</h4>
                                            </label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" value="<?= $_SESSION['user-data']['numTelUsuario'] ?>" placeholder="310 3281558" title="enter your mobile number if any." disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email">
                                                <h4>Email</h4>
                                            </label>
                                            <input type="email" class="form-control" name="email" id="email" value="<?= $_SESSION['user-data']['correoUsuario'] ?>" placeholder="cocacola@gmail.com" title="enter your email." disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email">
                                                <h4>Contraseña</h4>
                                            </label>
                                            <input type="password" class="form-control" id="password" placeholder="********" title="enter a location" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <br>
                                            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                            </div>
                            <!--/tab-pane-->
                            <div class="tab-pane" id="messages">
                                <h2></h2>

                                <hr>
                                <form class="form" action="##" method="post" id="directionForm">
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="city">
                                                <h4>Ciudad</h4>
                                            </label>
                                            <input type="text" class="form-control" name="city" id="city" placeholder="Bogotá D.C" title="" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="phone">
                                                <h4>Localidad</h4>
                                            </label>
                                            <input type="text" class="form-control" name="localidad" id="localida" placeholder="Fontibón" title="enter your phone number if any." disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="Barrio">
                                                <h4>Barrio</h4>
                                            </label>
                                            <input type="text" class="form-control" name="Barrio" id="Barrio" value="<?= $_SESSION['user-data']['nombreBarrio'] ?>" placeholder="Los Monjes" title="enter your last name if any." disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="mobile">
                                                <h4>Dirección</h4>
                                            </label>
                                            <input type="text" class="form-control" name="Dirección" id="Dirección" value="<?= $_SESSION['user-data']['direccionUsuario'] ?>" placeholder="Cl. 25d ##9550" title="" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <br>
                                            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--/tab-pane-->
                            <div class="tab-pane" id="settings">
                                <hr>
                                <form class="form" action="##" method="post" id="descripcionForm">
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="first_name">
                                                <h4>First name</h4>
                                            </label>
                                            <div style="border: #000000; width: 500px;
                                            height: 150px; background:#ffffff;
                                            border-top-left-radius: 20px;border-top-right-radius: 30px;">
                                                <center>
                                                    <p style="top:35px; position: relative;">The Coca-Cola Company es
                                                        una corporación multinacional
                                                        estadounidense de bebidas con sede en Atlanta, Georgia. The
                                                        Coca-Cola Company
                                                        tiene intereses en la fabricación, venta minorista y
                                                        comercialización de concentrados
                                                        y jarabes para bebidas no alcohólicas.</p>
                                                </center>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <br>
                                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Save</button>
                                                <button class="btn btn-lg btn-reset" type="reset"><i class="glyphicon glyphicon-repeat"></i>Reset</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <br>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <!--/tab-pane-->
                    </div>
                    <!--/tab-content-->
                </div>
                <!--/col-9-->
            </div>
            <!--/row-->
        </div>
        <!--FUNCIONALIDAD FORMULARIOS-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <?php
        require_once('./Views/Components/ScriptsJs.php');
        ?>
</body>
<!--   Core JS Files   -->

</html>