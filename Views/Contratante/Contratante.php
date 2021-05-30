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
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/contratante.css">
</head>

<body>
    <?php
    require_once('./Views/Components/NabvarMenu.php');
    ?>
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
</body>

</html>