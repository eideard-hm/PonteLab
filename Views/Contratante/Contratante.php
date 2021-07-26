<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contratante</title>
    <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/contratante.css">
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
                <a href="#" class="active"><i class="fas fa-user-tie"></i>Contratante</a>
                <a href="Vacante"><i class="fas fa-business-time"></i>Vacante</a>
                <button class="switch" id="switch">
                    <i class="fas fa-sun sol"></i>
                    <i class="fas fa-moon luna"></i>
                    <span class="circulo"></span>
                </button>
                <div class="imagen-persona">
                    <img src="<?= URL; ?>Assets/img/Logo_ponslabor.png" alt="" />
                </div>
            </nav>
        </div>
        <div class="info-persona">
            <h3>Edier Heraldo<br /><span>Desarrollador de software web.</span></h3>
            <ul>
                <li><i class="fas fa-user-edit"></i><a href="Perfil_Contratante">Editar perfil</a></li>
                <li><i class="fas fa-user-circle"></i><a href="Perfil_Contratante">Cambiar foto</a></li>
                <li><i class="fas fa-key"></i><a href="Recuperar_Password">Cambiar contraseña</a></li>
                <li>
                    <i class="fas fa-sign-in-alt"></i><a href="Login">Cerrar sesión</a>
                </li>
            </ul>
        </div>
        <div class="contenedor-responsive">
            <ul class="contenedor-responsive-lista">
                <li><a href="Menu">Inicio</a></li>
                <li><a href="#">Contratante</a></li>
                <li><a href="Vacante">Vacante</a></li>
            </ul>
        </div>
    </header>
    <!--
contratante:
-identificacion contratante
-nombre contratante
-descripcion
-->
    <div class="content">
        <div class="con-form">
            <h2 class="name">Registro <span>Contratante</span></h2>

            <form action="">
                <p>
                    <label for="">ID</label>
                    <input type="text" name="identificacion" id="identificacion" required />
                </p>
                <p>
                    <label for="">Nombre</label>
                    <input type="text" name="estado" id="estado" required />
                </p>
                <p class="block">
                    <label for="">Descripcion</label>
                    <textarea name="especificaciones" id="especificaciones" rows="1"></textarea>
                </p>
                <p class="block">
                    <button type="submit">Registrar</button>
                </p>
                <p class="block">
                    <button type="submit">Modificar</button>
                </p>
                <p class="block">
                    <button type="submit">Consultar</button>
                </p>
            </form>
        </div>
    </div>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
</body>

</html>