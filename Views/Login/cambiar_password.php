<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/login.css">
</head>

<body>

    <section class="from-logi">
        <form method="POST" action="" id="formCambiarPass" name="formCambiarPass">
            <img src="./Assets/img/Logo_ponslabor.png" class="pontelab">
            <h1>Cambiar Contraseña</h5>
                <input class="controls" type="hidden" name="idUsuario" id="idUsuario" value="<?= $data['idUsuario']; ?>">
                <input class="controls" type="password" name="txtPassword" id="txtPassword" required placeholder="Nueva Contraseña">
                <input class="controls" type="password" name="txtPasswordConfirm" id="txtPasswordConfirm" required placeholder="Confirmar Contraseña">
                <span id="spanMostrar" class="form-clear d-none"><i id="iconMostrar" class="material-icons mdc-text-field__icon">visibility</i></span>
                <button type="submit" id="valida" class="boton_3">Ingresar</button>
        </form>
    </section>
    <img src="<?= URL; ?>Assets/img/Login.svg" class="job">
    <img src="<?= URL; ?>Assets/img/wave.jpg" class="wave">

    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL ?>Assets/js/login.js"></script>
</body>

</html>