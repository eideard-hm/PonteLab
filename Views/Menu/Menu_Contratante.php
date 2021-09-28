<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $data['titulo_pagina'] ?></title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
  <!-- <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" /> -->
  <!-- CSS -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= URL ?>Assets/css/bootstrap.min.css">
  <!-- Style CSS -->
  <link rel="stylesheet" href="<?= URL ?>Assets/css/stylesMenu.css">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="<?= URL ?>Assets/css/responsive.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

</head>

<body class="right-column-fixed" id="menu">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- wrapper -->
    <div class="wrapper">
        <!-- Menu de navegación -->
        <?php
        require_once('./Views/Components/LayoutC.php');
        ?>
        <!-- Page Content  -->
        <div id="page-content" class="content-page">
            <div class="container">
            <div>
              <h3 class="mb-3 align-center">Menú Principal | Perfiles Laborales</h3>
              <h5 class="mb-3 align-center">Bienvenido <strong><?= $_SESSION['user-data']['nombreRol'] ?></strong> <b><?= $_SESSION['user-data']['nombreUsuario'] ?></b></h5>
            </div>
            <br>
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
                    echo date('d F  Y h:i:s A');?>                                                                       
                </div>
              </div>
              <div class="alert alert-info" role="alert">
                <div class="iq-alert-icon">
                <i class="far fa-plus-square"></i>
                </div>
                <a href="<?= URL ?>Vacante/Vacante" class="iq-alert-text">
                  Crear | Publicar Vacante
                </a>
              </div>
              <div class="alert alert-warning" role="alert">
                <div class="iq-alert-icon">
                  <i class="fas fa-pen-fancy"></i>
                </div>
                <a href="<?= URL ?>Perfil_Contratante/Perfil_Contratante" class="iq-alert-text">
                  Añadir Descripcion Empresarial
                </a>
              </div>




              <!--
              <div class="row" id="row" name="row">
                 card 1 
                <div class="col-12 col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-header">
                      Card header Hola
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text mb-1">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                card 2 
                <div class="col-12 col-md-6 col-xl-4 grid-margin grid-margin-md-0">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text mb-1">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
              </div> -->
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
    <!-- <script src="<?= URL ?>Assets/js/menuContratante.js"></script> -->
    </body>
</html>