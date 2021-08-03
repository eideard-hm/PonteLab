<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/aspirante.css" />
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
                <a href="Menu"><i class="fas fa-home"></i>Inicio</a>
                <a href="Aspirante"><i class="fas fa-user-tie"></i>Aspirante</a>
                <a href="Estudios"><i class="fas fa-graduation-cap"></i>Estudios</a>
                <a href="Experiencia"><i class="fas fa-briefcase"></i>Experiencia</a>
                <a href="HojaVida"><i class="fas fa-folder"></i>Hoja de vida</a>
                <button class="switch" id="switch">
                    <i class="fas fa-sun sol" title="Modo claro"></i>
                    <i class="fas fa-moon luna" title="Modo oscuro"></i>
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
                <li><i class="fas fa-user-edit"></i><a href="Perfil_Aspirante">Editar perfil</a></li>
                <li><i class="fas fa-user-circle"></i><a href="Perfil_Aspirante">Cambiar foto</a></li>
                <li><i class="fas fa-key"></i><a href="Recuperar_Password">Cambiar contraseña</a></li>
                <li>
                    <i class="fas fa-sign-in-alt"></i><a href="<?=URL ?>logout">Cerrar sesión</a>
                </li>
            </ul>
        </div>
        <div class="contenedor-responsive">
            <ul class="contenedor-responsive-lista">
                <li><a href="Contratante">Contratante</a></li>
                <li><a href="Vacante">Vacante</a></li>
                <li><a href="Aspirante">Aspirante</a></li>
                <li><a href="HojaVida">Hoja de Vida</a></li>
                <li><a href="Estudios">Estudios</a></li>
                <li><a href="Experiencia">Experiencia</a></li>
            </ul>
        </div>
    </header>

    <br><br>
    <div class="container rounded mb-3 contenedor-perfil_aspirante">
        <div class="row mt-3">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="https://image.freepik.com/vector-gratis/dibujos-animados-perfil-mujer_18591-58478.jpg" width="250" height="250"><span class="font-weight-bold">Emily Camargo</span><span>emily_c12@gmail.com</span><span>Colombia</span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-right">Perfil Aspirante</h6>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Nombres:</label><input type="text" class="form-control" value="Emily" readonly onmousedown="return false;"></div>
                        <div class="col-md-6"><label class="labels">Apellidos:</label><input type="text" class="form-control" value="Camargo Lopez" readonly onmousedown="return false;"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Titulo:</label><input type="text" class="form-control" value="Ingeniera en Sistemas" readonly onmousedown="return false;"></div>
                        <div class="col-md-12"><label class="labels">Posicion Actual/Desarrollada:</label><input type="text" class="form-control" value="Diseñadora FrontEnd y analista de bases de datos" readonly onmousedown="return false;"></div>
                        <div class="col-md-12"><label class="labels">Educacion:</label><input type="text" class="form-control" value="Universidad Jorge Tadeo Lozano" readonly onmousedown="return false;"></div>
                        <div class="col-md-12"><label class="labels">Idiomas:</label><input type="text" class="form-control" value="Ingles b2 y Frances c1" readonly onmousedown="return false;"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Ciudad:</label><input type="text" class="form-control" value="Bogotá" readonly onmousedown="return false;"></div>
                        <div class="col-md-6"><label class="labels">Número Celular:</label><input type="text" class="form-control" value="312 8956471" readonly onmousedown="return false;"></div>
                        <div class="col-md-6"><label class="labels">Direccion de residencia:</label><input type="text" class="form-control" value="Carrera 28 #7-51" readonly onmousedown="return false;"></div>
                    </div>
                    <div class="mt-5"><button class="btn btn-primary profile-button" type="button">Editar Perfil</button></div>
                    <div class="mt-5"><button class="btn btn-primary profile-button" type="button">Inactivar Cuenta</button></div>
                    <div class="mt-5"><button class="btn btn-primary profile-button" type="button">Activar Cuenta</button></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex flex-row mt-3 exp-container"><img src="https://i.imgur.com/azSfBM3.png" width="45" height="45">
                        <div class="work-experience ml-1"><span class="font-weight-bold d-block">Senior UI/UX Designer</span><span class="d-block labels">Twitter Inc.</span><span class="d-block labels">March,2017 - May 2020</span></div>
                    </div>
                    <hr>
                    <div class="d-flex flex-row mt-3 exp-container"><img src="https://img.icons8.com/color/100/000000/facebook.png" width="45" height="45">
                        <div class="work-experience ml-1"><span class="font-weight-bold d-block">Senior UI/UX Designer</span><span class="d-block labels">Facebook Inc.</span><span class="d-block labels">March,2017 - May 2020</span></div>
                    </div>
                    <hr>
                    <div class="d-flex flex-row mt-3 exp-container"><img src="https://img.icons8.com/color/50/000000/google-logo.png" width="45" height="45">
                        <div class="work-experience ml-1"><span class="font-weight-bold d-block">UI/UX Designer</span><span class="d-block labels">Google Inc.</span><span class="d-block labels">March,2017 - May 2020</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
</body>

</html>