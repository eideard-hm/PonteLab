<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
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

    <div class="contenedor-formulario">
        <header>
            <h2 class="title-principal">Registro información Aspirante</h2>
            <div class="progress-bar">
                <div class="paso">
                    <p>Datos <br />Personales</p>
                    <div class="num">
                        <span>1</span>
                    </div>
                    <i class="fas fa-check check"></i>
                </div>

                <div class="paso">
                    <p>Puesto<br />Interés</p>
                    <div class="num">
                        <span>2</span>
                    </div>
                    <i class="fas fa-check check"></i>
                </div>

                <div class="paso">
                    <p>Idiomas<br /><br /></p>
                    <div class="num">
                        <span>3</span>
                    </div>
                    <i class="fas fa-check check"></i>
                </div>

                <div class="paso">
                    <p>Habilidades<br /><br /></p>
                    <div class="num">
                        <span>4</span>
                    </div>
                    <i class="fas fa-check check"></i>
                </div>
            </div>
        </header>
        <div class="wrap">
            <div id="form" class="form">
                <!-- PAGINA 1 -->
                <div class="pagina movPag">
                    <form action="#" id="info-persona" class="contenedor-form">
                        <h2 class="title-form">Información personal Aspirante</h2>

                        <div class="contenedor-grupo w50" id="grupo-nombre">
                            <label for="txtNombre">Nombre</label>
                            <input type="text" name="txtNombre" id="txtNombre" placeholder="Jhon" autofocus />
                            <i class="estado-input fa fa-times-circle"></i>
                            <p class="leyenda-input">
                                El nombre no debe contener números y debe tener mínimo 3
                                letras.
                            </p>
                        </div>

                        <div class="contenedor-grupo w50" id="grupo-apellido">
                            <label for="txtApellido">Apellidos</label>
                            <input type="text" name="txtApellido" id="txtApellido" placeholder="Azaustre" />
                            <i class="estado-input fa fa-times-circle"></i>
                            <p class="leyenda-input">
                                Los apellidos no debe contener numeros y debe tener mínimo 3
                                letras.
                            </p>
                        </div>

                        <div class="contenedor-grupo w100" id="grupo-perfil">
                            <label for="txtPerfil">Perfil laboral</label>
                            <div id="editor"></div>
                        </div>

                        <div class="contenedor-grupo w100" id="grupo-estado">
                            <label for="txtEstado">Estado laboral</label>
                            <select name="txtEstado" id="txtEstado">
                                <option value="0">Primer empleo</option>
                                <option value="1" selected>Desempleado</option>
                                <option value="2">Empleado</option>
                                <option value="3">Independiente</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo btn-enviar">
                            <button class="btns siguiente sig-p2">
                                Siguiente<i class="fas fa-chevron-right icon-btn"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- PAGINA 2 -->
                <div class="pagina">
                    <form action="#" id="perfil-laboral" class="contenedor-form">
                        <h2 class="title-form">Puesto interés.</h2>

                        <div class="contenedor-grupo w100" id="grupo-puesto">
                            <label for="txtPuesto">Puesto interés</label>
                            <select name="txtPuesto" id="txtPuesto">
                                <option value="0">Desarrollador de software web.</option>
                                <option value="1">Desarrollador front-end</option>
                                <option value="2">Desarrollador back-end</option>
                                <option value="3">Secretaria/o</option>
                            </select>
                        </div>

                        <div class="contenedor-grupo w100" id="grupo-otro_puesto">
                            <input type="checkbox" id="grupo-puesto-otro_puesto" />
                            <label for="grupo-puesto-otro_puesto">Otro puesto de interés.</label>
                        </div>

                        <div class="contenedor-grupo w100" id="grupo-otro_puesto_interes">
                            <label for="txtNombre">Otro puesto interés</label>
                            <input type="text" name="txtOtroPuesto" id="txtOtroPuesto" placeholder="Desarrollador frontend con React" />
                            <i class="estado-input fa fa-times-circle"></i>
                            <p class="leyenda-input">
                                El puesto de interés no debe contener números y debe tener mínimo 3
                                letras.
                            </p>
                        </div>

                        <div class="contenedor-grupo btn-enviar">
                            <button class="btns atras atras-p1">
                                <i class="fas fa-chevron-left icon-btn-atras"></i>
                                Atrás
                            </button>
                            <button class="btns siguiente sig-p3">
                                Siguiente<i class="fas fa-chevron-right icon-btn"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- PAGINA 3 -->
                <div class="pagina">
                    <form action="#" id="idiomas" class="contenedor-form">
                        <h2 class="title-form">Idiomas</h2>

                        <div class="contenedor-grupo w50" id="grupo-idioma">
                            <div class="agrupar-estrellas" id="agrupar-estrellas-select">
                                <label for="txtListIdiomas" id="grupo-idioma-idioma">Idiomas</label>
                                <select name="txtListIdiomas" id="txtListIdiomas">
                                    <option value="Inglés">Inglés</option>
                                    <option value="Chino mandarín">Chino mandarín</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Español">Español</option>
                                    <option value="Francés">Francés</option>
                                    <option value="Árabe">Árabe</option>
                                    <option value="Bengalí">Bengalí</option>
                                    <option value="Ruso">Ruso</option>
                                    <option value="Portugués">Portugués</option>
                                    <option value="Indonesio">Indonesio</option>
                                </select>
                                <label for="txtIdioma" id="grupo-idioma-otro_idioma" style="display: none;">Otro idioma</label>
                                <input type="text" name="txtIdioma" id="txtIdioma" placeholder="Inglés" autofocus style="display: none;" />
                                <i class="estado-input fa fa-times-circle" style="display: none"></i>
                                <p class="leyenda-input" id="grupo-idioma-leyenda">
                                    El nombre del idioma no debe contener números.
                                </p>
                            </div>
                            <span class="estrellas" id="grupo-idioma-estrellas">
                                <label class="fas fa-star puntuacion idioma" id="1idioma">
                                    <input type="radio" name="txtNivelIdioma" class="input-radio" id="1idioma" checked value="1">
                                </label>
                                <label class="fas fa-star puntuacion idioma" id="2idioma">
                                    <input type="radio" name="txtNivelIdioma" class="input-radio" id="2idioma" value="2">
                                </label>
                                <label class="fas fa-star puntuacion idioma" id="3idioma">
                                    <input type="radio" name="txtNivelIdioma" class="input-radio" id="3idioma" value="3">
                                </label>
                                <label class="fas fa-star puntuacion idioma" id="4idioma">
                                    <input type="radio" name="txtNivelIdioma" class="input-radio" id="4idioma" value="4">
                                </label>
                                <label class="fas fa-star puntuacion idioma" id="5idioma">
                                    <input type="radio" name="txtNivelIdioma" class="input-radio" id="5idioma" value="5">
                                </label>
                            </span>
                        </div>

                        <div class="contenedor-grupo w100" id="grupo-otro_idioma">
                            <input type="checkbox" id="grupo-puesto-otro_idioma" />
                            <label for="grupo-puesto-otro_idioma">Otro idioma.</label>
                        </div>

                        <div class="add-puntuacion">
                            <button class="boton_add_idioma boton_add_puntuacion" id="boton_add_idioma">
                                <i class="fas fa-plus"></i>
                                Agregar nuevo idioma
                            </button>
                        </div>

                        <div class="contenedor-grupo w100" id="lista_idiomas">
                        </div>

                        <div class="contenedor-grupo btn-enviar">
                            <button class="btns atras atras-p4">
                                <i class="fas fa-chevron-left icon-btn-atras"></i>
                                Atrás
                            </button>
                            <button class="btns siguiente sig-p6">
                                Siguiente<i class="fas fa-chevron-right icon-btn"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- PAGINA 4 -->
                <div class="pagina">
                    <form action="#" id="habilidades" class="contenedor-form">
                        <h2 class="title-form">Habilidades</h2>

                        <div class="contenedor-grupo w100" id="grupo-habilidad">
                            <div class="agrupar-estrellas">
                                <label for="txtHabilidad">Habilidad</label>
                                <input type="text" name="txtHabilidades" id="txtHabilidad" placeholder="JavaScript" autofocus />
                                <i class="estado-input fa fa-times-circle" style="display: none"></i>
                                <p class="leyenda-input">
                                    El nombre de la habilidad no debe contener números.
                                </p>
                            </div>
                            <span class="estrellas">
                                <label class="fas fa-star puntuacion habilidad" id="1habi">
                                    <input type="radio" name="txtNivelHabilidades" class="input-radio" id="1habi" checked value="1">
                                </label>
                                <label class="fas fa-star puntuacion habilidad" id="2habi">
                                    <input type="radio" name="txtNivelHabilidades" class="input-radio" id="2habi" value="2">
                                </label>
                                <label class="fas fa-star puntuacion habilidad" id="3habi">
                                    <input type="radio" name="txtNivelHabilidades" class="input-radio" id="3habi" value="3">
                                </label>
                                <label class="fas fa-star puntuacion habilidad" id="4habi">
                                    <input type="radio" name="txtNivelHabilidades" class="input-radio" id="4habi" value="4">
                                </label>
                                <label class="fas fa-star puntuacion habilidad" id="5habi">
                                    <input type="radio" name="txtNivelHabilidades" class="input-radio" id="5habi" value="5">
                                </label>
                            </span>
                        </div>

                        <div class="add-puntuacion">
                            <button class="boton_add_habilidad boton_add_puntuacion" id="boton_add_habilidad">
                                <i class="fas fa-plus"></i>
                                Agregar nueva habilidad
                            </button>
                        </div>

                        <div class="contenedor-grupo w100" id="lista_habilidades">
                        </div>

                        <div class="contenedor-grupo btn-enviar">
                            <button class="btns atras atras-p5">
                                <i class="fas fa-chevron-left icon-btn-atras"></i>
                                Atrás
                            </button>
                            <button type="submit" class="btns siguiente enviar">
                                Enviar<i class="fas fa-paper-plane icon-btn"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <template id="template-lista_puntuacion">
        <div class="contenedor-grupo__lista">
            <p id="contenedor-grupo__p"></p>
            <span class="contenedor-grupo__icono">
                <span id="contenedor-grupo__puntuacion"></span>
                <i class="fas fa-trash-alt contenedor-grupo__eliminar"></i>
            </span>
        </div>
    </template>

    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
    <script src="<?= URL; ?>Assets/js/informacionAspirante.js"></script>
</body>

</html>