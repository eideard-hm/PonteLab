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

<body>        
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

    <div class="content">    
      <div class="vac-form">
        <h2 class="name"><span>Registro</span> Vacante</h2>

        <form action="">
          <p>
            <label for="">Nombre</label>
            <input minlength="1" maxlength="10" pattern="[a-zA-Z]+" type="text" name="nombre" id="" placeholder="Nombre..." required />
          </p>
          <p>
            <label for="">Cantidad de Vacantes</label>
            <input minlength="4" maxlength="10" pattern="[0-9]+" type="number" name="cantidad" id="" placeholder="Cantida de Vacantes..." required />
          </p>
          <p class="block">
            <label for="" >Especificaciones </label>
            <textarea name="especificaciones" id="" rows="1" placeholder="Especificaciones..." required></textarea>
          </p>          
          <p class="block">
            <label for="">Perfil del Trabajador</label>
            <textarea type="text" name="perfil" id="" rows="1" placeholder="Perfil del Trabajador..." required></textarea>
          </p>
          <p>
            <label for="">Tipo de Contrato</label>
            <select>
              <option value="1">Contrato por Obra o Labor</option> 
              <option value="2">Contrato a Termino Fijo</option> 
              <option value="3">Contrato a Termino Indefinido</option>
              <option value="4">Contrato de Aprendizaje</option> 
              <option value="5">Contrato Temporal, Ocacional o Accidental</option> 
            </select>
          </p>
          <p>
            <label for="">Sueldo</label>
            <input type="number" name="sueldo" id="" placeholder="Sueldo..." required />
          </p>
          <p class="block">
            <label for="">Fecha de Publicacion</label>
            <input type="date" name="fechapublicacion" id="" required />
          </p>
          <p class="block">
            <label for="">Fecha de Cierre</label>
            <input type="date" name="fechacierre" id="" required />
          </p>
          <p>
            <label for="">Direccion</label>
            <input type="text" name="direccion" id="" placeholder="Dirección..." required />
          </p>
          <p>
            <label for="">Estado</label>
            <select name="estado" id=""  required>
              <option value="1">Activo</option> 
              <option value="2">Inactivo</option>
            </select>
          </p>          
          <p class="block">
            <button type="submit">Registrar</button>
          </p>
          <p class="block">
            <button type="submit">Modificar</button>
          </p>
          <p class="block">
            <button type="submit">Consultar</button>
          </p>
        </form>
      </div>
    </div>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
</body>

</html>