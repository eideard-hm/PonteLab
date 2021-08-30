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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/index.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
</head>

<body>
    <?php
    require_once('./Views/Components/NabvarInicio.php');
    ?>

    <form id="msform">
        <br><br><br><br><br><br><br>
        <fieldset>
            <h2 class="fs-title">Recupera tu cuenta</h2>
            <img src="<?= URL; ?>Assets/img/candado.png" width="150" height="150" alt="Candado" class="logo2" />
            <input id="inputPassword" type="password" placeholder="Contraseña" name="pass">
            <span id="spanMostrar" class="form-clear d-none"><i id="iconMostrar" class="material-icons mdc-text-field__icon">visibility</i></span>
            <input type="password" name="confirm-nueva-contra" placeholder="Confirmar Contraseña" />
            <button name="cambiar" class="action-button" value="Cambiar"> Cambiar </button>

            <br><br>
            <p><a class="a1" href="Login" style="color: black;">Volver a iniciar sesion</a></p>
        </fieldset>

        </div>
        </div>

        <script>
            document.getElementById("spanMostrar").addEventListener("click", function() {
                let elementInput = document.getElementById("inputPassword");
                let elementIcon = document.getElementById("iconMostrar");
                if (elementIcon.classList.contains("active")) {
                    elementIcon.classList.remove("active");
                    elementIcon.innerHTML = "visibility";
                    elementInput.type = "password";
                } else {
                    elementIcon.classList.add("active");
                    elementIcon.innerHTML = "visibility_off";
                    elementInput.type = "text";
                }
            });
        </script>
        <?php
        require_once('./Views/Components/ScriptsJs.php');
        ?>
        <script>
            mdc.textField.MDCTextField.attachTo(document.querySelector('.mdc-text-field'));
        </script>
</body>

</html>