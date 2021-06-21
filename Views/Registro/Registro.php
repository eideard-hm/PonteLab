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
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="<?= URL; ?>Assets/css/index.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
</head>

<body>
    <?php
    require_once('./Views/Components/Navbar.php');
    ?>

    <form id="msform">
        <br><br><br><br><br>
        <ul id="progressbar">
            <li class="active">Datos de cuenta</li>
            <li>Datos Personales</li>
            <li>Datos Finales</li>
        </ul>

        <fieldset>
            <h2 class="fs-title">Crear cuenta PonsLabor</h2>
            <h3 class="fs-subtitle">Ingrese los datos solicitados</h3>
            <input type="email" name="email" placeholder="Email">
            <input id="inputPassword" type="password" placeholder="Password" name="pass">
            <span id="spanMostrar" class="form-clear d-none"><i id="iconMostrar" class="material-icons mdc-text-field__icon">visibility</i></span>
            <input type="password" placeholder="Confirmar Password" name="pass2">
            <button name="next" class="next action-button" value="Siguiente"> Siguiente </button>
        </fieldset>

        <fieldset>
            <h2 class="fs-title">Crear cuenta PonsLabor</h2>
            <h3 class="fs-subtitle">Ingrese los datos solicitados</h3>
            <select name="documento" size="1" required>
                <option selected value="0"> Elige el tipo de documento </option>
                <option value="1">Tarjeta de identidad</option>
                <option value="2">Cedula de ciudadania</option>
                <option value="3">Cedula de extranjeria</option>
                <option value="4">Pasaporte</option>
                <option value="5">Registro civil</option>
            </select>
            <input type="number" name="numDoc" placeholder="Digite su numero de documeto" required />
            <input type="number" name="numCel" placeholder="Ingrese su numero de celular" required />
            <input type="number" name="numFijo" placeholder="Ingrese su telefono fijo" required />
            <button name="previous" class="previous action-button" value="Atras"> Atras </button>
            <button name="next" class="next action-button" value="Siguiente"> Siguiente </button>
        </fieldset>

        <fieldset>
            <h2 class="fs-title">Crear cuenta PonsLabor</h2>
            <h3 class="fs-subtitle">Ingrese los datos solicitados</h3>
            <select name="estado" size="1">
                <option selected value="00"> Elige el estado del usuario </option>
                <option value="6">Activo</option>
                <option value="7">Inactivo</option>
            </select>
            <br>
            <select name="rol" size="1">
                <option selected value="000"> Elige el rol que desees </option>
                <option value="0">Aspirante</option>
                <option value="1">Contratante</option>
            </select>
            <br>
            <select name="barrio" size="1" required>
                <option selected value="0000"> Elija el barrio donde vive </option>
                <option value="10">Verbenal</option>
                <option value="11">Toberin</option>
                <option value="12">Los Cedros</option>
                <option value="13">Usaquen</option>
                <option value="14">Chapinero</option>
                <option value="15">Las Nieves</option>
                <option value="16">Las Cruces</option>
                <option value="17">Lourdes</option>
                <option value="18">San Blas</option>
                <option value="19">Sociego</option>
                <option value="20">20 de Julio</option>
                <option value="21">Comuneros</option>
                <option value="22">Tunjuelito</option>
                <option value="23">Policarpa</option>
                <option value="24">Tintal Sur</option>
                <option value="25">Kennedy Central</option>
                <option value="26">Patio Bonito</option>
                <option value="27">Los Laches</option>
                <option value="28">Bavaria</option>
                <option value="29">Fontibon</option>
                <option value="30">Modelia</option>
                <option value="31">Engativa</option>
                <option value="32">Alamos</option>
                <option value="33">Suba</option>
                <option value="34">Santa Isabel</option>
                <option value="35">Ciudad Jardin</option>
                <option value="36">Restrepo</option>
                <option value="37">Ciudad Montes</option>
                <option value="38">Quiroga</option>
                <option value="39">Teusaquillo</option>
                <option value="40">Galerias</option>
                <option value="41">La Floresta</option>
                <option value="42">Los Alpes</option>
                <option value="43">Guacamayas</option>
                <option value="44">Buenos Aires</option>
            </select>
            <input type="text" name="direccion" placeholder="Ingrese la direccion de residencia" required />
            <input type="file" name="foto" />
            <br>
            <h5 style="font-size: 15px;">Al hacer clic en "Registrarse", aceptas nuestra <a href="Politicas_de_Datos">Politica de datos</a> y la <a href="Politicas_de_Cookies">Politica de Cookies.</a>
            </h5>
            <br>
            <button name="previous" class="previous action-button" value="Atras"> Atras </button>
            <button name="submit" class="submit action-button" value="Registrarse"> Registrarse </button>
        </fieldset>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL; ?>Assets/js/registro.js"></script>
    <script>
        mdc.textField.MDCTextField.attachTo(document.querySelector('.mdc-text-field'));
    </script>
</body>

</html>