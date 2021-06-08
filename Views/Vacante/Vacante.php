<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/contratante.css">
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
</head>

<body>
    <?php
    require_once('./Views/Components/NabvarMenu.php');
    ?>
    <div class="content">
        <div class="vac-form">
            <h2 class="name">Registro <span>Vacante</span></h2>

            <form action="">
                <p>
                    <label for="">ID</label>
                    <input type="text" name="identificacion" id="" required />
                </p>
                <p>
                    <label for="">Estado</label>
                    <input type="text" name="estado" id="" required />
                </p>
                <p>
                    <label for="">Direccion</label>
                    <input type="text" name="direccion" id="" required />
                </p>
                <p class="block">
                    <label for="">Publicacion</label>
                    <input type="date" name="fechapublicacion" id="" required />
                </p>
                <p class="block">
                    <label for="">Fecha de Cierre</label>
                    <input type="date" name="fechacierre" id="" required />
                </p>
                <p class="block">
                    <label for="">Especificaciones</label>
                    <textarea name="especificaciones" id="" rows="1"></textarea>
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
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
</body>

</html>