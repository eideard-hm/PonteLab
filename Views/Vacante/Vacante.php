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

            <form action="#">
                <p>
                    <label for="txtNombreVacante">Nombre</label>
                    <input type="text" name="txtNombreVacante" id="txtNombreVacante" required />
                </p>
                <p>
                    <label for="txtCantidadVacante">Cantidad de Vacantes</label>
                    <input type="text" name="txtCantidadVacante" id="txtCantidadVacante" required />
                </p>
                <p class="block">
                    <label for="txtEspecificacionesVacante">Especificaciones </label>
                    <textarea name="txtEspecificacionesVacante" id="txtEspecificacionesVacante" rows="1" required></textarea>
                </p>
                <p class="block">
                    <label for="txtPerfilTrabajador">Perfil del Trabajador</label>
                    <textarea type="text" name="txtPerfilTrabajador" id="txtPerfilTrabajador" required></textarea>
                </p>
                <p>
                    <label for="txtTipoContrato">Tipo de Contrato</label>
                    <select name="txtTipoContrato" id="txtTipoContrato">
                        <option value="Contrato por Obra o Labor">Contrato por Obra o Labor</option>
                        <option value="Contrato a Termino Fijo">Contrato a Termino Fijo</option>
                        <option value="Contrato a Termino Indefinido">Contrato a Termino Indefinido</option>
                        <option value="Contrato de Aprendizaje">Contrato de Aprendizaje</option>
                        <option value="Contrato Temporal, Ocacional o Accidental">Contrato Temporal, Ocacional o Accidental</option>
                    </select>
                </p>
                <p>
                    <label for="txtSueldoVacante">Sueldo</label>
                    <input type="text" name="txtSueldoVacante" id="txtSueldoVacante" required />
                </p>
                <p class="block">
                    <label for="txtFechaPublicacion">Fecha de Publicacion</label>
                    <input type="date" name="txtFechaPublicacion" id="txtFechaPublicacion" required />
                </p>
                <p class="block">
                    <label for="txtFechaCierre">Fecha de Cierre</label>
                    <input type="date" name="txtFechaCierre" id="txtFechaCierre" required />
                </p>
                <p>
                    <label for="txtDireccionVacante">Direccion</label>
                    <input type="text" name="txtDireccionVacante" id="txtDireccionVacante" required />
                </p>
                <p>
                    <label for="txtEstadoVacante">Estado</label>
                    <select name="txtEstadoVacante" id="txtEstadoVacante">
                        <option value="1">Activa</option>
                        <option value="2">Inactiva</option>
                    </select>
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