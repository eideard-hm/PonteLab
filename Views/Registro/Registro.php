<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maxium-scale=1.0, minimum-scale=1.0">
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
    <img src="./Assets/img/Logo_ponslabor.png" class="pontelab">
    <img src="<?= URL; ?>Assets/img/registro.svg" class="registro">

    <div class="contenedor">
        <form id="msform" method="POST" enctype="multipart/form-data">
            <?php require_once('./Views/Components/LoadingForms.php') ?>
            <input type="hidden" id="idUsuario" name="idUsuario" value="0">
            <br><br><br><br><br>
            <ul id="progressbar">
                <li class="active">Datos de cuenta</li>
                <li>Datos Personales</li>
                <li>Datos Finales</li>
                <li>Sector</li>
            </ul>

            <fieldset>
                <h2 class="fs-title">Crear cuenta</h2>
                <h3 class="fs-subtitle">Ingrese los datos solicitados</h3>
                <select name="rol" id="rol">
                    <option selected value="" disabled>Seleccione su rol</option>
                    <!-- 
                    1. Contratante
                    2. Aspirante
                 -->
                    <?php foreach ($data['list_rol'] as $rol) : ?>
                        <option value="<?php echo $rol['idRol'] ?>"><?php echo $rol['nombreRol'] ?></option>
                    <?php endforeach ?>
                </select>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" />
                <input type="hidden" name="apellido" id="apellido" placeholder="Arturo" />
                <input type="email" name="email" id="email" placeholder="example@example.com" />
                <input id="inputPassword" type="password" placeholder="Contraseña" name="pass" />
                <span id="spanMostrar" class="form-clear d-none"><i id="iconMostrar" class="material-icons mdc-text-field__icon">visibility</i></span>
                <input type="password" placeholder="Confirmar contraseña" name="pass2" id="pass2" />
                <button name="next" class="next action-button" value="Siguiente" id="siguiente1" style="width: 413px; height:48px" onclick="validarCampos();"> Siguiente </button>
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Crear cuenta</h2>
                <h3 class="fs-subtitle">Ingrese los datos solicitados</h3>
                <select name="documento" id="documento">
                    <option selected disabled value="">Seleccione un tipo de documento</option>
                    <?php foreach ($data['list_tipodoc'] as $tipoDoc) : ?>
                        <option value="<?php echo $tipoDoc['idTipoDocumento'] ?>"><?php echo $tipoDoc['nombreTipoDocumento'] ?></option>
                    <?php endforeach ?>
                </select>
                <input type="number" name="numDoc" id="numDoc" placeholder="Digite su número de documento" required />
                <input type="number" name="numCel" id="numCel" placeholder="Ingrese su número de teléfono celular" required />
                <input type="number" name="numFijo" id="numFijo" placeholder="Ingrese su número de teléfono fijo" required />
                <button name="previous" class="previous action-button" style="width: 195px; height:48px; background: #676766;" value="Atras">Atras</button>
                <button type="button" name="next2" class="action-button" value="Siguiente" id="siguiente2" style="width: 195px; height:48px;" onclick="validarCamposFildset2();"> Siguiente </button>
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Crear cuenta</h2>
                <h3 class="fs-subtitle">Ingrese los datos solicitados</h3>
                <!-- <select name="estado" id="estado">
                <option selected value="" disabled>Elige el estado del usuario</option>
                <option value="0">Activo</option>
                <option value="1">Inactivo</option>
            </select>
            <br> -->
                <select name="barrio" id="barrio">
                    <option selected disabled value=""> Elija el barrio donde vive </option>
                    <?php foreach ($data['list_barrio'] as $barrio) : ?>
                        <option value="<?php echo $barrio['idBarrio'] ?>"><?php echo $barrio['nombreBarrio'] ?></option>
                    <?php endforeach ?>
                </select>

                <input type="text" name="direccion" id="direccion" placeholder="Ingrese la dirección de residencia" />
                <!-- <input type="file" name="foto" id="foto" multiple="multiple" /> -->
                <div class="photo">
                    <label for="imagenAnuncio" class="label">Por favor añade una foto.</label>
                    <!--Caja de texto en el formulario y su contenido-->
                    <div class="prevPhoto">
                        <span class="delPhoto notBlock">X</span>
                        <label for="foto"></label>
                        <div class="prevPhoto__img">
                            <img id="img" style="width: 280px;" src="<?php echo URL; ?>Assets/Img/file.jpg" />
                        </div>
                    </div>
                    <div class="upimg">
                        <input type="file" name="foto" id="foto" data-toggle="tooltip" data-placement="bottom" title="Ingresar imagen" multiple="multiple">
                    </div>
                    <div id="form_alert"></div>
                </div>
                <br>
                <h5 style="font-size: 15px; color: #999999; text-align:left;">Al hacer clic en "Registrarse", aceptas nuestra <a style="color: #009FE0;" href="Politicas_de_Datos">Politica de datos</a> y la <a style="color: #009FE0;" href="Politicas_de_Datos/Politicas_de_Cookies">Politica de Cookies.</a>
                </h5>
                <br>
                <button type="button" name="previous" class="previous action-button" style="width: 195px; height:48px; background: #676766;" value="Atras"> Atras </button>
                <button type="submit" name="submit" id="btn_submit" class="action-button" style="width: 195px; height:48px" value="Registrarse"> Registrarse </button>
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Registro sector</h2>
                <h3 class="fs-subtitle">Ingrese los datos solicitados</h3>
                <br>
                <label>Por favor seleccione el sector con el cual te identificas tu o tu empresa.</label>
                <br>
                <br>
                <input type="hidden" id="sectores" name="sectores" value="">
                <ul class="list_sectores" id="list_sectores">
                    <?php foreach ($data['list_sector'] as $barrio) : ?>
                        <li data-id="<?php echo $barrio['idSector'] ?>"><?php echo $barrio['nombreSector'] ?></li>
                    <?php endforeach ?>
                </ul>
                <br>
                <button type="submit" name="submit" id="btn_sector" class="submit action-button">Registrar sector</button>
            </fieldset>
        </form>
    </div>
    <img src="<?= URL; ?>Assets/img/wave.jpg" class="wave">
    <script>
        const base_url = "<?= URL ?>";
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>
    <script src="<?= URL; ?>Assets/js/registro.js" defer></script>
</body>

</html>