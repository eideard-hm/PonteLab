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
            <?php
            require_once('./Views/Components/NabvarLogo.php');
            ?>
            <nav class="nav nav_menu">
                <a href="<?= URL ?>Menu/Menu_Contratante"><i class="fas fa-home"></i>Inicio</a>
                <a href="<?= URL ?>Contratante" class="active"><i class="fas fa-user-tie"></i>Contratante</a>
                <a href="<?= URL ?>Vacante"><i class="fas fa-business-time"></i>Vacante</a>

                <button class="switch" id="switch">
                    <i class="fas fa-sun sol"></i>
                    <i class="fas fa-moon luna"></i>
                    <span class="circulo"></span>
                </button>
                <div class="imagen-persona">
                    <img src="<?php echo $_SESSION['imgProfile']; ?>" id="imagen_perfil" data-id="<?php echo $_SESSION['id']; ?>" alt="<?php echo $_SESSION['user-data']['nombreUsuario'] ?>" />
                </div>
            </nav>
        </div>
        <div class="info-persona">
            <?php
            require_once('./Views/Components/NabvarInfoContratante.php');
            ?>
        </div>
        <div class="contenedor-responsive">
            <?php
            require_once('./Views/Components/NabvarResponsiveContratante.php');
            ?>
        </div>
    </header>

    <div class="content">
        <div class="con-form">
            <h2 class="name">Registro <span>Contratante</span></h2>

            <form method="POST" id="form-contractor">
                <input type="hidden" id="idContractor" name="idContractor" value="0">
                <p class="block">
                    <label for="especificaciones">Descripcion</label>
                    <br>
                    <input name="especificaciones" id="especificaciones" placeholder="Especificaciones..." rows="1" required></input>
                </p>
                <p class="block">
                    <button type="submit" id="btn_submit">Registrar</button>
                </p>
                <p class="block">
                    <button type="submit" id="btn_modify">Modificar</button>
                </p>
                <p class="block">
                    <button type="submit" id="btn_srch">Consultar</button>
                </p>
            </form>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/x2oub1u70xqw4t9bxdur2k98oz7jsin9tx0vewhh6zf7pc68/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL ?>Assets/js/contratante.js"></script>
</body>

</html>