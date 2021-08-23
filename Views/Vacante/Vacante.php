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
    <div class="vac-form">
      <h2 class="name"><span>Registro</span> Vacante</h2>

      <form method="POST" id="form-vacancy">
        <input type="hidden" id="idVacancy" name="idVacancy" value="">
        <p>
          <label for="nombre"> Nombre</label>
          <input minlength="1" maxlength="10" pattern="[a-zA-Z]+" type="text" name="nombre" id="nombre" placeholder="Nombre..." required />
        </p>
        <p>
          <label for="cantidad"> Cantidad de Vacantes</label>
          <input minlength="1" maxlength="10" pattern="[0-9]+" type="number" name="cantidad" id="cantidad" placeholder="Cantida de Vacantes..." required />
        </p>
        <p class="block">
          <label for="especificaciones"> Especificaciones </label>
          <br>
          <textarea name="especificaciones" id="especificaciones" rows="1" placeholder="Especificaciones..." required></textarea>
        </p>
        <p class="block">
          <label for="perfil"> Perfil del Trabajador</label>
          <textarea type="text" name="perfil" id="perfil" rows="1" placeholder="Perfil del Trabajador..." required></textarea>
        </p>
        <p>
          <label for="tipoContrato"> Tipo de Contrato</label>
          <select name="tipoContrato" id="tipoContrato" required>
            <option value="" disabled selected>Seleccion Tipo de Contranto</option>
            <option value="1">Contrato por Obra o Labor</option>
            <option value="2">Contrato a Termino Fijo</option>
            <option value="3">Contrato a Termino Indefinido</option>
            <option value="4">Contrato de Aprendizaje</option>
            <option value="5">Contrato Temporal, Ocacional o Accidental</option>
          </select>
        </p>
        <p>
          <label for="sueldo">Sueldo</label>
          <input type="number" name="sueldo" id="sueldo" placeholder="Sueldo..." required />
        </p>
        <p class="block">
          <label for="fechapublicacion"> Fecha de Publicacion</label>
          <input type="datetime-local" name="fechapublicacion" id="fechapublicacion" required />
        </p>
        <p class="block">
          <label for="fechacierre"> Fecha de Cierre</label>
          <input type="datetime-local" name="fechacierre" id="fechacierre" required />
        </p>
        <p>
          <label for="direccion"> Dirección</label>
          <input type="text" name="direccion" id="direccion" placeholder="Dirección..." required />
        </p>
        <p>
          <label for="estado">Estado</label>
          <select name="estado" id="estado" required>
            <option value="" disabled selected>Seleccion Estado</option>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
          </select>
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
    <div class="req-form">
      <form method="POST" id="form-requirement">
        <input type="hidden" id="idRequisitosVacante" name="idRequisitosVacante" value="0">
        <p class="block">
          <label for="especificaciones"> Especificaciones </label>
          <br>
          <textarea name="especificaciones" id="especificaciones" rows="1" placeholder="Especificaciones..." required></textarea>
        </p>
        <p class="block">
            <button type="submit" id="btn_submit_">Registrar Requerimiento</button>
        </p>
        <p class="block">
            <button type="submit" id="btn_modify_">Modificar Requerimiento</button>
        </p>
        <p class="block">
            <button type="submit" id="btn_srch_">Consultar Requerimiento</button>
        </p>
      </form>
    </div>
  </div>

  <script src="https://cdn.tiny.cloud/1/x2oub1u70xqw4t9bxdur2k98oz7jsin9tx0vewhh6zf7pc68/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <?php
  require_once('./Views/Components/ScriptsJs.php');
  ?>
  <script src="<?= URL ?>Assets/js/vacante.js"></script>
</body>

</html>