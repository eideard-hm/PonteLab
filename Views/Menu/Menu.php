<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>/Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>Assets/css/aspirante.css">
</head>

<body class="body-vacs" id="menu">
    <header id="header_menu">
        <div class="contenedor barra">
            <span href="#" class="content-logo content_logo_menu">
                <a href="javascript:window.history.back();" style="visibility: hidden; opacity:0">
                    <i class="fas fa-arrow-left" id="icono-regresar" style="display: none;"></i>
                </a>
                <i class="fas fa-bars" id="icono-reponsive"></i>
                <span href="#" class="logo-nombre">
                    <img src="<?= URL; ?>Assets/img/Logo_ponslabor.png" alt="PonsLabor" class="logo-empresa" />
                    <h2>Ponte<span>Lab.</span></h2>
                </span>
            </span>
            <nav class="nav nav_menu">
                <a href="#" class="active"><i class="fas fa-home"></i>Inicio</a>
                <a href="Aspirante"><i class="fas fa-user-tie"></i>Aspirante</a>
                <a href="Estudios"><i class="fas fa-graduation-cap"></i>Estudios</a>
                <a href="Experiencia"><i class="fas fa-briefcase"></i>Experiencia</a>
                <a href="HojaVida"><i class="fas fa-folder"></i>Hoja de vida</a>
                <div class="content-search">
                    <i class="fas fa-search" id="icon-search" title="Buscar"></i>
                </div>
                <button class="switch" id="switch">
                    <i class="fas fa-sun sol" title="Modo claro"></i>
                    <i class="fas fa-moon luna" title="Modo oscuro"></i>
                    <span class="circulo"></span>
                </button>
                <div class="imagen-persona">
                    <img src="<?php echo $_SESSION['imgProfile']; ?>" id="imagen_perfil" data-id="<?php echo $_SESSION['id']; ?>" alt="<?php echo $_SESSION['user-data']['nombreUsuario'] ?>" />
                </div>
            </nav>
        </div>
        <div class="info-persona">
            <h3><?php echo $_SESSION['user-data']['nombreUsuario'] ?><br /><span><?php echo $_SESSION['user-data']['nombreRol'] ?></span></h3>
            <ul>
                <li><i class="fas fa-user-edit"></i><a href="Perfil_Aspirante">Editar perfil</a></li>
                <li><i class="fas fa-user-circle"></i><a href="Perfil_Aspirante">Cambiar foto</a></li>
                <li><i class="fas fa-key"></i><a href="Recuperar_Password">Cambiar contraseña</a></li>
                <li>
                    <i class="fas fa-sign-in-alt"></i><a href="<?= URL ?>logout">Cerrar sesión</a>
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

    <form class="content-bar-search">
        <input type="search" id="txtSearchVacantes" name="txtSearchVacantes" placeholder="Ingrese lo que desea buscar" autofocus>
        <button id="icono-buscar"><i class="fas fa-search" title="Buscar"></i></button>
        <i class="fas fa-times" id="borrar-contenido" title="Borrar"></i>
    </form>

    <ul class="list_vacantes">
    </ul>

    <div class="cover-ctn-search"></div>

    <div class="content-vacs">
        <!--<div class="vacs-form">-->
        <div id="form-vacs">
        </div>
        <!--</div>-->
    </div>

    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL; ?>Assets/js/menu.js"></script>
</body>

</html>