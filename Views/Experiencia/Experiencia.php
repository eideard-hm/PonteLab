<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/aspirante.css" />
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
            <nav class="nav nav_menu">
                <a href="Menu"><i class="fas fa-home"></i>Inicio</a>
                <a href="Aspirante"><i class="fas fa-user-tie"></i>Aspirante</a>
                <a href="Estudios"><i class="fas fa-graduation-cap"></i>Estudios</a>
                <a href="#" class="active"><i class="fas fa-briefcase"></i>Experiencia</a>
                <a href="HojaVida"><i class="fas fa-folder"></i>Hoja de vida</a>
                <button class="switch" id="switch">
                    <i class="fas fa-sun sol" title="Modo claro"></i>
                    <i class="fas fa-moon luna" title="Modo oscuro"></i>
                    <span class="circulo"></span>
                </button>
                <div class="imagen-persona">
                    <img src="<?= URL; ?>Assets/img/upload.png" alt="" />
                </div>
            </nav>
        </div>
        <div class="info-persona">
            <h3>Edier Heraldo<br /><span>Desarrollador de software web.</span></h3>
            <ul>
                <li><i class="fas fa-user-edit"></i><a href="Perfil_Aspirante">Editar perfil</a></li>
                <li><i class="fas fa-user-circle"></i><a href="Perfil_Aspirante">Cambiar foto</a></li>
                <li><i class="fas fa-key"></i><a href="Recuperar_Password">Cambiar contraseña</a></li>
                <li>
                    <i class="fas fa-sign-in-alt"></i><a href="Login">Cerrar sesión</a>
                </li>
            </ul>
        </div>
        <div class="contenedor-responsive">
            <ul class="contenedor-responsive-lista">
                <li><a href="Contratante">Contratante</a></li>
                <li><a href="Vacante">Vacante</a></li>
                <li><a href="Aspirante">Aspirante</a></li>
                <li><a href="HojaVida">Hoja de Vida</a></li>
                <li><a href="Estudios">Estudios</a></li>
                <li><a href="Experiencia">Experiencia</a></li>
            </ul>
        </div>
    </header>

    <div class="contenedor-formulario">
        <div class="wrap">
            <div id="form" class="form">
                <!-- PAGINA 4 -->
                <div class="pagina">
                    <form action="#" id="experiencia-laboral" class="contenedor-form">
                        <h2 class="title-form">Experiencia laboral</h2>

                        <div class="contenedor-grupo w50" id="grupo-empresa">
                            <label for="txtEmpresa">Empresa laboró</label>
                            <input type="text" name="txtEmpresa" id="txtEmpresa" autofocus placeholder="Microsoft" />
                            <i class="estado-input fa fa-times-circle"></i>
                            <p class="leyenda-input">
                                El nombre de la empresa en la cual laboró no debe contener
                                números, guines ni carácteres espciales.
                            </p>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-sectorex">
                            <label for="txtSectorExp">Sector laboró</label>
                            <select name="txtSectorExp" id="txtSectorExp">
                                <option value="0">Actividades con las TICS</option>
                                <option value="1">Actividades Inmobiliarias</option>
                                <option value="2">Educación</option>
                                <option value="3">Construcción</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-ciudadlab">
                            <label for="txtCiudadLab">Ciudad</label>
                            <select name="txtCiudadLab" id="txtCiudadLab">
                                <option value="0">Bogotá D.C</option>
                                <option value="1">Medellin</option>
                                <option value="2">Cali</option>
                                <option value="3">Barranquilla</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-tipoexp">
                            <label for="txtTipoExp">Tipo experiencia</label>
                            <select name="txtTipoExp" id="txtTipoExp">
                                <option value="0">Asalariado</option>
                                <option value="1">Idependiente</option>
                                <option value="2">Pasantías</option>
                                <option value="3">Práctica laboral</option>
                                <option value="4">Aprendiz</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo w100" id="grupo-puesto">
                            <label for="txtPuesto">Puesto desempeñado</label>
                            <input type="text" name="txtPuesto" id="txtPuesto" placeholder="Desarollador de software frontend" />
                            <i class="estado-input fa fa-times-circle"></i>
                            <p class="leyenda-input">
                                El nombre del puesto que desempeño no debe contener números, guines, carácteres
                                especiales.
                            </p>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-anioiniexp">
                            <label for="txtAnioIniExp">Año inicio</label>
                            <select name="txtAnioIniExp" id="txtAnioIniExp">
                                <option value="0">1900</option>
                                <option value="1">2000</option>
                                <option value="2">2001</option>
                                <option value="3">2002</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-mesiniExp">
                            <label for="txtMesIniExp">Mes inicio</label>
                            <select name="txtMesIniExp" id="txtMesIniExp">
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

                        <div class="contenedor-grupo w50" id="grupo-aniofinexp">
                            <label for="txtAnioFinExp">Año finalización</label>
                            <select name="txtAnioFinExp" id="txtAnioFinExp">
                                <option value="0">1900</option>
                                <option value="1">2000</option>
                                <option value="2">2001</option>
                                <option value="3">2002</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-mesfinexp">
                            <label for="txtMesFinExp">Mes finalización</label>
                            <select name="txtMesFinExp" id="txtMesFinExp">
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

                        <div class="contenedor-grupo w100" id="grupo-funcion">
                            <label for="txtFuncion">Funciones</label>
                            <div id="editor"></div>
                        </div>

                        <div class="contenedor-grupo btn-enviar">
                            <button class="btns siguiente sig-p5">
                                Siguiente<i class="fas fa-chevron-right icon-btn"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL; ?>Assets/js/experienciaLaboral.js"></script>
    <script src="<?= URL; ?>Assets/js/validacionCampos.js"></script>
</body>

</html>