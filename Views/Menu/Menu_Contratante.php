<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $data['titulo_pagina'] ?></title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= assets_url_img(); ?>Logo_ponslabor.ico" type="image/x-icon" />
  <!-- CSS -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= assets_url_css(); ?>bootstrap.min.css">
  <!-- Style CSS -->
  <link rel="stylesheet" href="<?= assets_url_css(); ?>stylesMenu.css">
  <link rel="stylesheet" href="<?= assets_url_css(); ?>stylesGlobal.css">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="<?= assets_url_css(); ?>responsive.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

</head>

<body class="right-column-fixed" id="menu">
  <!-- loader Start -->
  <div id="loading">
    <div id="loading-center"></div>
  </div>
  <!-- wrapper -->
  <div class="wrapper">
    <!-- Menu de navegación -->
    <?php
    require_once('./Views/Components/LoadingForms.php');
    require_once('./Views/Components/LayoutC.php');
    ?>

    <!-- Page Content  -->
    <div id="page-content" class="content-page">
      
      <div class="container">
         <div>
          <h3 class="mb-3 align-center">Menú Contratante | Perfiles Laborales</h3>
          <h5 class="mb-3 align-center">Bienvenido <strong><?= $_SESSION['user-data']['nombreRol'] ?></strong> <b><?= $_SESSION['user-data']['nombreUsuario'] ?></b></h5>
        </div>
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div class="alert alert-primary" role="alert">
            <div class="iq-alert-icon">
              <i class="fas fa-business-time"></i>
            </div>
            <div class="iq-alert-text">
              <?php
              // Definicion de la zona horaria
              date_default_timezone_set('America/Bogota');
              // Obteniendo la fecha actual con hora, minutos y segundos en PHP
              echo date('d F  Y h:i:s A');
              ?>
            </div>
          </div>
          <div class="alert alert-info" role="alert">
            <div class="iq-alert-icon">
              <a href="<?= URL ?>Vacante/Vacante" class="iq-alert-text">
                <i class="far fa-plus-square"></i>
              </a>
            </div>
            <a href="<?= URL ?>Vacante/Vacante" class="iq-alert-text">
              <strong>
                Crear | Publicar Vacante
              </strong>
            </a>
          </div>
          <div class="alert alert-warning" role="alert">
            <div class="iq-alert-icon">
              <a href="<?= URL ?>Contratante/Perfil_Contratante" class="iq-alert-text">
                <i class="fas fa-pen-fancy"></i>
              </a>
            </div>
            <a href="<?= URL ?>Contratante/Perfil_Contratante" class="iq-alert-text">
              <strong>
                Añadir Descripción Empresarial
              </strong>
            </a>
          </div>
        </div>
        <br>
        <div class="row" id="perfiles-aspirante">
        </div>
      </div>
    </div>
  </div>
  <!-- Wrapper END -->
  <!-- Footer -->
  <?php
  require_once('./Views/Components/Footer.php');
  ?>
  <!-- Scripts  -->
  <?php
  require_once('./Views/Components/ScriptsJs.php');
  ?>
  <script src="<?= assets_url_js(); ?>editarPerfil.js" type="module" defer></script>
</body>

</html>