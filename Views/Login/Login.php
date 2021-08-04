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
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/login.css">
</head>

<body>
    <?php
    require_once('./Views/Components/Navbar.php');
    ?>

    <section class="from-logi">
        <form method="POST" action="" id="form-login">
            <h5> Iniciar Sesión </h5>
            <input class="controls" type="email" name="Usuario" id="Usuario" required placeholder="example@example.com">
            <input type="password" class="controls" name="Password" id="Contraseña" placeholder="Contraseña">
            <span id="spanMostrar" class="form-clear d-none"><i id="iconMostrar" class="material-icons mdc-text-field__icon">visibility</i></span>
            <center><button type="submit" id="valida" class="boton_3">Iniciar Sesión</button></center>
            <center>
                <p><a class="a1" href="Correo_Recuperar_Password" style="color: #d32f2f; font-size: 16px; font-weight:600; position: relative; top: 30px;">¿Olvido su contraseña?</a></p>
            </center>
            <center>
                <p><a class="a2" href="Registro" style="color: #303f9f; font-size: 15px; font-weight:500;position: relative; top: 50px; ">Crear cuenta</a></p>
            </center>
        </form>
    </section>
    <img src="<?= URL; ?>/Assets/img/job.svg" class="job">
    <img src="<?= URL; ?>/Assets/img/wave.jpg" class="wave">
        <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL; ?>Assets/js/login.js"></script>
</body>

</html>