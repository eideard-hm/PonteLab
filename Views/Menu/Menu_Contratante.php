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
    <!-- loader END -->
    <!-- wrapper -->
    <div class="wrapper">
        <!-- Menu de navegación -->
        <?php
        require_once('./Views/Components/LayoutC.php');
        ?>

        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container">
              <div class="row" id="row" name="row">
                <!-- card 1 -->
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
                <!-- card 2 -->
                <div class="col-12 col-md-6 col-xl-4 grid-margin grid-margin-md-0">
                  <div class="card">
                      <img  src="<?= URL ?>Assets/img/upload.png" class="card-img-top" alt="...">
                    
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text mb-1">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
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
    <script src="<?= URL ?>Assets/js/menuContratante.js"></script>
    </body>
</html>
<!-- 
<body class="body-vacs" id="menu">
  
  <form class="content-bar-search">
        <input type="search" id="txtSearchPerfiles" name="txtSearchPerfiles" autocomplete="off" placeholder="Ingrese lo que desea buscar" autofocus>
        <button id="icono-buscar"><i class="fas fa-search" title="Buscar"></i></button>
        <i class="fas fa-times" id="borrar-contenido" title="Borrar"></i>
    </form>
    
    <ul class="list_vacantes">
    </ul>

    <div class="cover-ctn-search"></div>


  <div class="contenedor card" id="contenedor card" name="contenedor card">
  <div class="contenedor-card">
      <div class="contenedor-card__header contenedor-card__padding">
        <div class="header-img">
          <img src="<?= URL ?>Assets/img/upload.png" alt="Uplopad">
        </div>
        <div class="header-name">
          <h3>Joeylene Rivera</h3>
          <span>Web Developer</span>
        </div>
      </div>
      <div class="contenedor-card__body">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni accusamus eos enim consequatur deserunt! Minus, nulla at a sapiente tempora mollitia sint quo possimus repellat, saepe ex aliquid nesciunt nostrum earum facere, maxime harum ea eius unde in similique. Alias unde atque officia accusamus placeat, porro facere distinctio esse cumque.</p>
      </div>
      <div class="contenedor-card__footer">
        <a href="#">Ver más</a>
      </div>
    </div> -->
<!-- 
    <div class="contenedor-card">
      <pre>
          <?php
          print_r($_SESSION['user-data']);
          ?>
      </pre>
    </div>

  </div>
  <?php
  require_once('./Views/Components/ScriptsJs.php');
  ?>
  <script src="<?= URL ?>Assets/js/menuContratante.js"></script> -->