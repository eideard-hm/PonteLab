<!DOCTYPE html>
<html lang="en">

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
                Añadir Descripcion Empresarial
              </strong>
            </a>
          </div>
        </div>
        <br>
        <div class="col-12 col-xl-12 grid-margin stretch-card">
          <br>
          <div class="card-columns">
            <div class="card">
              <img src="<?= URL ?>Assets/img/uploads/spacex-logo-featured.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Programador FrontEnd</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="#" class="btn btn-primary">Ver Perfil</a>
              </div>
            </div>
            <div class="card p-3">
              <blockquote class="blockquote mb-0 card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">
                  <small class="text-muted">
                    Someone famous in <cite title="Source Title">Source Title</cite>
                  </small>
                </footer>
              </blockquote>
            </div>
            <div class="card">
              <img src="<?= URL ?>Assets/img/uploads/spacex-logo-featured.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Diseñador 3D</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="#" class="btn btn-primary">Ver Perfil</a>
              </div>
            </div>
            <div class="card bg-primary text-white text-center p-3">
              <blockquote class="blockquote mb-0">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                <footer class="blockquote-footer text-white">
                  <small>
                    Someone famous in <cite title="Source Title">Source Title</cite>
                  </small>
                </footer>
              </blockquote>
            </div>
            <div class="card text-center">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has a regular title and short paragraphy of text below it.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
            <div class="card">
              <img src="<?= URL ?>Assets/img/brands/Ubi.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="#" class="btn btn-primary">Ver Perfil</a>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is another card with title and supporting text below. This card has some additional content to make it slightly taller overall.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
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