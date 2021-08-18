<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/index.css">
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
</head>

<body>
    <?php
    require_once('./Views/Components/Navbar.php');
    ?>

    <form id="msform">
        <br><br><br><br><br><br><br>
        <fieldset>
            <h2 class="fs-title">Recupera tu cuenta</h2>
            <h3 class="fs-subtitle">Ingresa tu correo electronico, te enviaremos un link para su reestablecimiento</h3>
            <img src="<?= URL; ?>Assets/img/telefono.png" width="200" height="200" alt="telefono" class="logo3" />
            <input type="email" name="recu-cuenta" required placeholder="Email" />
            <button name="cambiar" class="action-button" value="Siguiente">Enviar</button>
        </fieldset>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <?php
        require_once('./Views/Components/ScriptsJs.php');
        ?>
</body>

</html>