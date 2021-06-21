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
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
</head>

<body>
    <?php
    require_once('./Views/Components/Navbar.php');
    ?>

    <section class="from-logi">
        <h5> Iniciar Sesión </h5>
        <input class="controls" type="text" name="Usurario" id="Usuario" required placeholder="Usuario">
        <input class="controls" type="password" name="Contraseña" id="Contraseña" placeholder="Contraseña">
        <select class="despe" name="DESPLEGABLE">
            <option value="1">Aspirante</option>
            <option value="2">Contratante</option>
        </select>
        <center><a id="valida" class="boton_3">Iniciar Sesion</a> </center>
        <center>
            <p style="color: black;"><a class="a1" href="Correo_Recuperar_Password">¿Olvido su contraseña?</a></p>
        </center>
        <center>
            <p><a class="a2" href="Registro">Crear cuenta</a></p>
        </center>
    </section>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL; ?>Assets/js/login.js"></script>
</body>

</html>