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
                <img src="<?= URL; ?>Assets/img/Logo_ponslabor.png" alt="PonsLabor" class="logo-empresa" />
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
            <?php
            require_once('./Views/Components/NavbarInfoAspirante.php');
            ?>
        </div>
        <div class="contenedor-responsive">
            <?php
            require_once('./Views/Components/NabvarResponsive.php');
            ?>
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