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
  <link rel="stylesheet" href="<?= URL; ?>Assets/css/aspirante.css" />
  <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
  <link rel="stylesheet" href="<?= URL; ?>Assets/css/contratante.css">
</head>

<body class="body-vacs" id="menu">
  <header id="header_menu">
    <div class="contenedor barra">
      <?php
      require_once('./Views/Components/NabvarLogo.php');
      ?>
      <nav class="nav nav_menu">
        <a href="<?= URL ?>Menu/Menu_Contratante" class="active"><i class="fas fa-home"></i>Inicio</a>
        <a href="<?= URL ?>Contratante"><i class="fas fa-user-tie"></i>Contratante</a>
        <a href="<?= URL ?>Vacante"><i class="fas fa-business-time"></i>Vacante</a>

        <button class="switch" id="switch">
          <i class="fas fa-sun sol"></i>
          <i class="fas fa-moon luna"></i>
          <span class="circulo"></span>
        </button>
        <div class="imagen-persona">
          <img src="<?php echo $_SESSION['imgProfile']; ?>" id="imagen_perfil" data-id="<?php echo $_SESSION['id']; ?>" alt="<?php echo $_SESSION['user-data']['nombreUsuario'] ?>" />
        </div>
      </nav>
    </div>
    <div class="info-persona">
      <?php
      require_once('./Views/Components/NabvarInfoContratante.php');
      ?>
    </div>
    <div class="contenedor-responsive">
      <?php
      require_once('./Views/Components/NabvarResponsiveContratante.php');
      ?>
    </div>
  </header>

  <div class="contenedor card">
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
    </div>

    <div class="contenedor-card">
      <pre>
                <?php
                print_r($_SESSION['user-data']);
                ?>
            </pre>
    </div>

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
    </div>

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
    </div>

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
    </div>
  </div>
  <?php
  require_once('./Views/Components/ScriptsJs.php');
  ?>
  <script src="<?= URL ?>Assets/js/menu.js"></script>
</body>

</html>