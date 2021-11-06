<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/recuperar_Contraseña.css">
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
</head>

<body>
    <a class="home" href="<?= URL; ?>"><i id="home" class="fas fa-home"></i>Inicio</a>
    <a class="Login" href="<?= URL; ?>Login"><i id="Login" class="fas fa-sign-in-alt"></i></i>Login</a>
    <div class="login-page">
        <div class="form">
            <form id="formRecetPass" name="formRecetPass" class="login-form" action="">
                <?php require_once('./Views/Components/LoadingForms.php') ?>
                <div>
                    <img class="pontelab" src="<?= URL; ?>Assets/img/Logo_ponslabor.ico">
                </div>
                <br>
                <div>
                    <p class="parrafo">Ingrese su correo electrónico, le enviaremos un link para su restablecimiento.</p>
                </div>
                <input id="txtEmailReset" name="txtEmailReset" type="email" placeholder="example@micorreo.com" />
                <button class="btn" type="submit">Enviar</button>
                <br>
                <br>
            </form>
        </div>
    </div>

    <img src="<?= URL; ?>Assets/img/olvido.svg" class="job">
    <img src="<?= URL; ?>Assets/img/wave.jpg" class="wave">
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL ?>Assets/js/login.js" type="module" defer></script>

</body>

</html>