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
                <?php
                require_once('./Views/Components/NabvarLogo.php');
                ?>
            </span>
            <nav class="nav nav_menu">
                <?php
                require_once('./Views/Components/NabvarContrantate.php');
                ?>
            </nav>
        </div>
        <div class="info-persona">
            <?php
            require_once('./Views/Components/NabvarInfoContratante.php');
            ?>
        </div>
    </header>

    <div class="content">
        <div class="con-form">
            <h2 class="name">Registro <span>Contratante</span></h2>

            <form action="">
                <p class="block">
                    <label for="estado">Nombre</label>
                    <input type="text" name="estado" id="estado" required />
                </p>
                <p class="block">
                    <label for="especificaciones">Descripcion</label>
                    <br>
                    <textarea name="especificaciones" id="especificaciones" placeholder="Especificaciones..." rows="1" required></textarea>
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

    <script src="https://cdn.tiny.cloud/1/x2oub1u70xqw4t9bxdur2k98oz7jsin9tx0vewhh6zf7pc68/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL ?>Assets/js/contratante.js"></script>
</body>

</html>