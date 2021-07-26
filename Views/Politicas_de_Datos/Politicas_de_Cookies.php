<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['titulo_pagina'] ?></title>
  <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
  <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="<?= URL; ?>Assets/css/index.css" />
  <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
</head>

<body>
  <?php
  require_once('./Views/Components/Navbar.php');
  ?>
  <input type="radio" id="menu_trigger" name="menu_close">
  <nav class="side_nav">
    <span class="close_icon">+
      <input type="radio" name="menu_close">
    </span>
    <ul>
      <li><a href="index.html">Pagina de incio</a></li>
      <li><a href="login.html">Iniciar Sesion</a></li>
      <li><a href="registro.html">Crear Cuenta</a></li>
      <li><a href="#">Contactanos</a></li>
    </ul>
  </nav>

  <br><br><br><br><br><br><br>
  <h1>
    <center>Politica de Cookies</center>
  </h1>
  <br>
  <p>
    <center>En cumplimiento con lo dispuesto en el artículo 22.2 de la Ley 34/2002, de 11 de julio, de Servicios de la
      Sociedad de la Información y de Comercio Electrónico, esta página web le informa, <br>en esta sección, sobre la
      política de recogida y tratamiento de cookies.</center>
  </p>
  <br>
  <h1>
    <center>¿Que son las Cookies?</center>
  </h1>
  <br>
  <p>
    <center>Una cookie es un fichero que se descarga en su ordenador al acceder a determinadas páginas web. Las cookies
      permiten a una página web, entre otras cosas, almacenar y recuperar información <br>sobre los hábitos de
      navegación de un usuario o de su equipo y, dependiendo de la información que contengan y de la forma en que
      utilice su equipo, pueden utilizarse para reconocer al usuario. </center>
  </p>
  <br>
  <h1>
    <center>Desactivar las Cookies</center>
  </h1>
  <br>
  <p>
    <center>Puede usted permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuración de
      las opciones del navegador instalado en su ordenador.<br>

      En la mayoría de los navegadores web se ofrece la posibilidad de permitir, bloquear o eliminar las cookies
      instaladas en su equipo.<br><br>
      <a href="https://support.google.com/chrome/answer/95647?hl=es">Configurar cookies en Google Chrome</a><br>
      <a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias?redirectlocale=es&redirectslug=habilitar-y-deshabilitar-cookies-que-los-sitios-we">Configurar
        cookies en Mozilla Firefox</a><br>
      <a href="https://support.apple.com/es-es/HT201265">Configurar cookies en Safari (Apple)</a>
    </center>
  </p>
  <br>
  <h1>
    <center>Advertencia sobre eliminar las Cookies</center>
  </h1>
  <br>
  <p>
    <center>Usted puede eliminar y bloquear todas las cookies de este sitio, pero parte del sitio no funcionará o la
      calidad de la página web puede verse afectada.<br>

      Si tiene cualquier duda acerca de nuestra política de cookies, puede contactar con esta página web a través de
      nuestros canales de Contacto.</center>
  </p>
  <?php
  require_once('./Views/Components/ScriptsJs.php');
  ?>
</body>

</html>