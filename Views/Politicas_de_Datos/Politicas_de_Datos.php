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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="<?= URL; ?>Assets/css/index.css" />
  <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
</head>

<body>
  <?php
  require_once('./Views/Components/NabvarInicio.php');
  ?>

  <br><br><br><br>
  <h1>
    <center>Politica de Datos</center>
  </h1>
  <br>
  <p>
    <center>PonteLab te informa sobre su Política de Privacidad respecto del tratamiento y protección de los datos de carácter personal de los usuarios y clientes que puedan ser recabados por la navegación<br> o contratación de servicios a través del sitio Web DIRECCIÓN-WEB.

      En este sentido, PonteLab garantiza el cumplimiento de la normativa vigente en materia de protección de datos personales,<br>
      reflejada en la Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y de Garantía de Derechos Digitales (LOPD GDD).<br> Cumple también con el Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo de 27 de abril de 2016 relativo a la protección de las personas físicas (RGPD).</center>
  </p>

  <br>
  <h1>
    <center>Principios aplicados en el tratamiento de datos</center>
  </h1>
  <br>
  <p>
    <center>En el tratamiento de tus datos personales, PonteLab aplica los siguientes principios que se ajustan a las exigencias del nuevo reglamento europeo de protección de datos: <br><br>
      <b>* Principio de licitud, lealtad y transparencia: </b>PONLABOR siempre requerirá el consentimiento para el tratamiento de tus datos personales que puede ser para uno o varios fines específicos <br>sobre los que te informará previamente con absoluta transparencia.
      <br><b>*Principio de minimización de datos:</b> PonteLab te solicitará solo los datos estrictamente necesarios para el fin o los fines que los solicita.
      <br><b>* Principio de integridad y confidencialidad:</b>Tus datos serán tratados de tal manera que su seguridad, confidencialidad e integridad esté garantizada. Debes saber que PonteLab toma las precauciones<br> necesarias para evitar el acceso no autorizado o uso indebido de los datos de sus usuarios por parte de terceros.
    </center>

    <br>
  <h1>
    <center>Tus derechos</center>
  </h1>
  <br>
  <p>
    <center>PonteLab te informa que sobre tus datos personales tienes derecho a: <br>
      <b>* </b>Solicitar el acceso a los datos almacenados.<br>
      <b>*</b> Solicitar una rectificación o la cancelación.<br>
      <b>*</b> Solicitar la limitación de su tratamiento.<br>
      <b>*</b> Oponerte al tratamiento.<br>
      <b>*</b> Solicitar la portabilidad de tus datos.<br>
    </center>
  </p>
  <?php
  require_once('./Views/Components/ScriptsJs.php');
  ?>
</body>

</html>