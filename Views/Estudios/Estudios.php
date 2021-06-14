<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet" />
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
                    <img src="<?= URL; ?>Assets/img/Logo_ponslabor.png" alt="PonsLabor" class="logo-empresa" />
                    <h2>Pons<span>Labor.</span></h2>
                </span>
            </span>
            <nav class="nav">
                <a href="Menu">Inicio</a>
                <a href="Aspirante">Aspirante</a>
                <a href="Estudios" class="active">Estudios</a>
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
    </header>

    <div class="contenedor-formulario">
        <div class="wrap">
            <div id="form" class="form">
                <!-- PAGINA 3 -->
                <div class="pagina">
                    <form action="#" id="estudios" class="contenedor-form">
                        <h2 class="title-form">Estudios</h2>

                        <div class="contenedor-grupo w50" id="grupo-institucion">
                            <label for="input-institucion">Institución</label>
                            <input type="text" name="txtInstitucion" id="input-institucion" placeholder="Universidad Nacional de Colombia" />
                            <i class="estado-input fa fa-times-circle"></i>
                            <p class="leyenda-input">
                                El nombre de la institución no puede contener numeros.
                            </p>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-titulo">
                            <label for="input-titulo">Titulo obtenido</label>
                            <input type="text" name="txtTitulo" id="input-titulo" placeholder="Ingeniero/a de sistemas y computación" />
                            <i class="estado-input fa fa-times-circle"></i>
                            <p class="leyenda-input">
                                El nombre del titulo obtenido no puede contener numeros.
                            </p>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-ciudad">
                            <label for="txtCiudad">Ciudad</label>
                            <select name="txtCiudad" id="txtCiudad">
                                <option value="0">Bogotá D.C</option>
                                <option value="1">Medellin</option>
                                <option value="2">Cali</option>
                                <option value="3">Barranquilla</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-gradoest">
                            <label for="txtGradoEst">Grado estudio</label>
                            <select name="txtGradoEst" id="txtGradoEst">
                                <option value="0">Preescolar</option>
                                <option value="1">Básica Primaria (1-5)</option>
                                <option value="2">Básica secundaria (6-9)</option>
                                <option value="3">Media (10-11)</option>
                                <option value="4">Técnico</option>
                                <option value="5">Tecnólogo</option>
                                <option value="6">Pregrado</option>
                                <option value="7">Especialización</option>
                                <option value="8">Maestria</option>
                                <option value="9">Doctorado</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo w100" id="grupo-sector">
                            <label for="txtSector">Sector</label>
                            <select name="txtSector" id="txtSector">
                                <option value="0">Actividades con las TICS</option>
                                <option value="1">Actividades Inmobiliarias</option>
                                <option value="2">Educación</option>
                                <option value="3">Construcción</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-anioini">
                            <label for="txtAnioIni">Año inicio</label>
                            <select name="txtAnioIni" id="txtAnioIni">
                                <option value="0">1900</option>
                                <option value="1">2000</option>
                                <option value="2">2001</option>
                                <option value="3">2002</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-mesini">
                            <label for="txtMesIni">Mes inicio</label>
                            <select name="txtMesIni" id="txtMesIni">
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-aniofin">
                            <label for="txtAnioFin">Año finalización</label>
                            <select name="txtAnioFin" id="txtAnioFin">
                                <option value="0">1900</option>
                                <option value="1">2000</option>
                                <option value="2">2001</option>
                                <option value="3">2002</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-mesfin">
                            <label for="txtMesFin">Mes finalización</label>
                            <select name="txtMesFin" id="txtMesFin">
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo btn-enviar">
                            <button class="btns siguiente sig-p4">
                                Siguiente<i class="fas fa-chevron-right icon-btn"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script>
        const imgPersona = document.querySelector('.imagen-persona');
        const opcionesInfo = document.querySelector('.info-persona');

        imgPersona.addEventListener('click', () => {
            opcionesInfo.classList.toggle('active');
        })
    </script>
    <script src="<?= URL; ?>Assets/js/validacionCampos.js"></script>
</body>

</html>