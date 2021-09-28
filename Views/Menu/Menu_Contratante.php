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
                    echo date('d F  Y h:i:s A');?>                                                                       
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
              <br>
              <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                      <h4 class="card-title">Información usuario</h4>
                    </div>
                  </div>
                  <div class="iq-card-body">
                    <div class="card-deck">
                      <div class="col-12 col-md-6 col-xl-5">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <img src="../../../assets/images/placeholder.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                      <div class="card">
                        <img src="../../../assets/images/placeholder.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                      <div class="card">
                        <img src="../../../assets/images/placeholder.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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