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
      <span href="#" class="content-logo">
        <!-- <a href="javascript:window.history.back();">
          <i class="fas fa-arrow-left" id="icono-regresar"></i>
        </a> -->
        <i class="fas fa-bars" id="icono-reponsive"></i>
        <span href="#" class="logo-nombre">
          <img src="<?= URL; ?>Assets/img/Logo_ponslabor.png" alt="PonsLabor" class="logo-empresa" />
          <h2>Pons<span>Labor.</span></h2>
        </span>
      </span>
      <nav class="nav nav_menu">
        <a href="Menu_Contratante" class="active"><i class="fas fa-home"></i>Inicio</a>
        <a href="Contratante"><i class="fas fa-user-tie"></i>Contratante</a>
        <a href="Vacante"><i class="fas fa-business-time"></i>Vacante</a>

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
      <h3><?php echo $_SESSION['user-data']['nombreUsuario'] ?><br /><span><?php echo $_SESSION['user-data']['nombreRol'] ?></span></h3>
      <ul>
        <li><i class="fas fa-user-edit"></i><a href="Perfil_Contratante"> Perfil</a></li>
        <li><i class="fas fa-user-circle"></i><a href="Perfil_Contratante">Cambiar foto</a></li>
        <li><i class="fas fa-key"></i><a href="Recuperar_Password">Cambiar contraseña</a></li>
        <li>
          <i class="fas fa-sign-in-alt"></i><a href="<?= URL ?>logout">Cerrar sesión</a>
        </li>
      </ul>
    </div>
    <div class="contenedor-responsive">
      <ul class="contenedor-responsive-lista">
        <li><a href="#">Inicio</a></li>
        <li><a href="Contratante">Contratante</a></li>
        <li><a href="Vacante">Vacante</a></li>
      </ul>
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
</body>

</html>