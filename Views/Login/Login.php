<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>/Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/login.css">
</head>

<body>
    <header class="header">
        <!--header-start-->
        <img src="<?= URL; ?>Assets/img/Logo_ponslabor.png" width="65" height="65" alt="PonsLabor" class="logo1" />
        <div class="logo">
            <h3>Pons<span></span>Labor.</span></h3>
        </div>
        <a href="#" class="nav_ico">
            <label for="menu_trigger">
            </label>
            <span></span>
            <span></span>
            <span></span>
        </a>
    </header>
    <!--header-end-->
    <input type="radio" id="menu_trigger" name="menu_close">
    <nav class="side_nav">
        <span class="close_icon">+
            <input type="radio" name="menu_close">
        </span>
        <ul>
            <li><a href="<?= URL; ?>">Página de incio</a></li>
            <li><a href="#">Iniciar Sesion</a></li>
            <li><a href="<?= URL; ?>Registro">Crear Cuenta</a></li>
            <li><a href="#">Contactanos</a></li>
        </ul>
    </nav>

    <section class="from-logi">
        <h5> Iniciar Sesión </h5>
        <input class="controls" type="text" name="Usurario" id="Usuario" required placeholder="Usuario">
        <input class="controls" type="password" name="Contraseña" id="Contraseña" placeholder="Contraseña">
        <select class="despe" name="DESPLEGABLE">
            <option value="1">Aspirante</option>
            <option value="2">Contratante</option>
        </select>
        <center> <a id="valida" class="boton_3">Iniciar Sesion</a> </center>
        <center>
            <p><a class="a1" href="recuperarCon.html" style="color: black;">¿Olvido su contraseña?</a></p>
        </center>
        <center>
            <p><a class="a2" href="crearCuenta.html" style="color: black;">Crear cuenta</a></p>
        </center>
    </section>
    <script src="<?= URL; ?>Assets/js/login.js"></script>
</body>

</html>