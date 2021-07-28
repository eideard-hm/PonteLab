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
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/login.css">
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
</head>

<body>
    <?php
    require_once('./Views/Components/Navbar.php');
    ?>
    <section class="from-logi" id="from-logi">
        <form method="POST" action="">
            <h5> Iniciar Sesión </h5>
            <!--INPUT USUARIO-->
            <div class="Usuario">
                <div class="input_email input_email-correcto" id="email">
                    <input class="controls" type="email" name="Usurario" id="Usuario" required placeholder="example@example.com" required="" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                    <i class="formulario_validacion fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser email: example@example.com</p>
            </div>
            <!--INPUT PASSWORD-->
            <div id="grupo_password">
                <input type="password" class="controls" name="Contraseña" id="Contraseña" placeholder="Contraseña" required="" minlength="4" maxlength="16">
                <span id="spanMostrar" class="form-clear d-none"><i id="iconMostrar" class="material-icons mdc-text-field__icon">visibility</i></span>
            </div>
            <!--BTN-->
            <center><button id="valida" class="boton_3">Iniciar Sesión</button> </center>
            <!--<center>
                <button type="button" id="valida" class="boton_3">Iniciar Sesion</button>
            </center>-->
            <!--MENSAJE DE RELLENAR EL FORMULARIO-->
            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
            </div>
            <!--HREF RECUPERACION Y RESGISTRO-->

            <center>
                <p><a class="a1" href="Correo_Recuperar_Password" style="color: #d32f2f; font-size: 16px; font-weight:600; position: relative; top: 20px;">¿Olvido su contraseña?</a></p>
            </center>
            <center>
                <p><a class="a2" href="Registro" style="color: #303f9f; font-size: 15px; font-weight:500;position: relative; top: 25px; ">Crear cuenta</a></p>
            </center>

        </form>

    </section>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>

</html>