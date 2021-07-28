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
  <link rel="stylesheet" href="<?= URL; ?>Assets/css/aspirante.css" />
  <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
</head>
  <body class="body-vacs">
    <header id="header_menu">
      <div class="contenedor barra">
        <span href="#" class="content-logo">
          <a href="javascript:window.history.back();">
            <i class="fas fa-arrow-left" id="icono-regresar"></i>
          </a>
          <i class="fas fa-bars" id="icono-reponsive"></i>
          <span href="#" class="logo-nombre">
            <img
              src="<?= URL; ?>Assets/img/Logo_ponslabor.png"
              alt="PonsLabor"
              class="logo-empresa"
            />
            <h2>Pons<span>Labor.</span></h2>
          </span>
        </span>
        <nav class="nav">
          <a href="Menu">Inicio</a>
          <a href="Aspirante" class="active">Aspirante</a>
          <a href="Estudios">Estudios</a>
          <a href="Experiencia">Experiencia</a>
          <a href="HojaVida">Hoja de vida</a>
          <button class="switch" id="switch">
            <i class="fas fa-sun sol"></i>
            <i class="fas fa-moon luna"></i>
            <span class="circulo"></span>
          </button>
          <div class="imagen-persona">
            <img src="<?= URL; ?>Assets/img/Logo_ponslabor.png" alt="" />
          </div>
        </nav>
      </div>
      <div class="info-persona">
        <h3>Edier Heraldo<br /><span>Desarrollador de software web.</span></h3>
        <ul>
          <li><i class="fas fa-user-circle"></i><a href="#">Perfil</a></li>
          <li><i class="fas fa-user-edit"></i><a href="#">Editar perfil</a></li>
          <li>
            <i class="fas fa-sign-in-alt"></i><a href="#">Cerrar sesión</a>
          </li>
        </ul>
      </div>
      <div class="contenedor-responsive">
        <ul class="contenedor-responsive-lista">
          <li><a href="Menu">Inicio</a></li>
          <li><a href="Contratante">Contratante</a></li>
          <li><a href="Vacante">Vacante</a></li>
          <li><a href="Aspirante">Aspirante</a></li>
          <li><a href="HojaVida">Hoja de Vida</a></li>
          <li><a href="Estudios">Estudios</a></li>
          <li><a href="Experiencia">Experiencia</a></li>
        </ul>
      </div>
    </header>
    
    <h1 class="name">Vacantes</h1>
    <div class="content-vacs">
      <!--<div class="vacs-form">-->
        <form id="form-vacs" action="">
          <div class="card">
            <div class="circle">
              <h2>Impresiones Yoda S.A.S.</h2>
            </div>
            <div class="card-content">
              <p>
                <br>
                BOGOTA D.C. - BOGOTA
                <br>
                Vacantes: 8
                <br>
                Fecha de creación: 03/05/2022
                <br>
                Fecha de cierre: 31/07/2022
                <br>
              </p>
              <a type="">Ver | Aplicar</a>
            </div>
          </div>

          <div class="card">
            <div class="circle">
              <h2>ImproTech S.A.</h2>
            </div>
            <div class="card-content">
              <p>
                <br>
                BOGOTA D.C. - BOGOTA
                <br>
                Vacantes: 4
                <br>
                Fecha de creación: 06/07/2021
                <br>
                Fecha de cierre: 31/07/2021
                <br>
              </p>
              <a type="button">Ver | Aplicar</a>
            </div>
          </div>

          <div class="card">
            <div class="circle">
              <h2>Farmacol S.A.S.</h2>
            </div>
            <div class="card-content">
              <p>
                <br>
                BOGOTA D.C. - BOGOTA
                <br>
                Vacantes: 4
                <br>
                Fecha de creación: 06/07/2021
                <br>
                Fecha de cierre: 31/07/2021
                <br>
              </p>
              <a type="">Ver | Aplicar</a>
            </div>
          </div>

          <div class="card">
            <div class="circle">
              <h2>Qompaq S.A.S.</h2>
            </div>
            <div class="card-content">
              <p>
                <br>
                BOGOTA D.C. - BOGOTA
                <br>
                Vacantes: 16
                <br>
                Fecha de creación: 08/07/2021
                <br>
                Fecha de cierre: 01/12/2021
                <br>
              </p>
              <a type="">Ver | Aplicar</a>
            </div>
          </div>

        </form>
      <!--</div>-->
    </div>
  </body>
</html>