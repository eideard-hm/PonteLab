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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/login.css">
</head>

<body>
    <?php
    require_once('./Views/Components/Navbar.php');
    ?>

    <form id="msform">
        <br><br><br><br><br>
        <ul id="progressbar">
            <li class="active">Datos de cuenta</li>
            <li>Información Personal</li>
            <li>Informacion de contacto</li>
        </ul>

        <fieldset>
            <h2 class="fs-title">Crear cuenta PonsLabor</h2>
            <h3 class="fs-subtitle">Ingrese los datos solicitados</h3>
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="pass" placeholder="Password" />
            <select name="rol" size="1">
                <option selected value="0"> Elige el rol que desees </option>
                <option value="1">Aspirante</option>
                <option value="2">Contratante</option>
            </select>
            <br>
            <input type="button" name="next" class="next action-button" value="Siguiente" />
        </fieldset>

        <fieldset>
            <h2 class="fs-title">Informacion Personal</h2>
            <h3 class="fs-subtitle">Ingrese los datos personales solicitados</h3>
            <input type="text" name="nombre" placeholder="Escriba su nombre" />
            <input type="text" name="apellido" placeholder="Escriba su apellido" required />
            <select name="documento" size="1" required>
                <option selected value="00"> Elige el tipo de documento </option>
                <option value="3">Tarjeta de identidad</option>
                <option value="4">Cedula de ciudadania</option>
                <option value="5">Cedula de extranjeria</option>
                <option value="6">Pasaporte</option>
                <option value="7">Registro civil</option>
            </select>
            <input type="number" name="numDoc" placeholder="Digite su numero de documeto" required />
            <input type="file" name="foto" />
            <input type="button" name="previous" class="previous action-button" value="Atras" />
            <input type="button" name="next" class="next action-button" value="Siguiente" />
        </fieldset>

        <fieldset>
            <h2 class="fs-title">Informacion de Contacto</h2>
            <h3 class="fs-subtitle">Ingrese los datos de contacto solicitados</h3>
            <input type="number" name="numCel" placeholder="Ingrese su numero de celular" required />
            <input type="number" name="numFijo" placeholder="Ingrese el telefono fijo" required />
            <input type="text" name="barrio" placeholder="Ingrese el barrio en el que vive" required />
            <input type="text" name="direccion" placeholder="Ingrese la direccion de residencia" required />
            <input type="button" name="previous" class="previous action-button" value="Atras" />
            <input type="submit" name="submit" class="submit action-button" value="Registrarse" />
        </fieldset>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?= URL; ?>Assets/js/registro.js"></script>
</body>

</html>