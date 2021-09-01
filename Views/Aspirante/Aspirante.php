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
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/aspirante.css" />
</head>

<body>
    <header id="header_menu">
        <div class="contenedor barra">
            <?php
            require_once('./Views/Components/NabvarLogo.php');
            ?>
            <nav class="nav nav_menu">
                <a href="Menu"><i class="fas fa-home"></i>Inicio</a>
                <a href="#" class="active"><i class="fas fa-user-tie"></i>Aspirante</a>
                <a href="Estudios" class="enlaces-aspirante"><i class="fas fa-graduation-cap"></i>Estudios</a>
                <a href="Experiencia" class="enlaces-aspirante"><i class="fas fa-briefcase"></i>Experiencia</a>
                <a href="HojaVida" class="enlaces-aspirante"><i class="fas fa-folder"></i>Hoja de vida</a>
                <button class="switch" id="switch">
                    <i class="fas fa-sun sol" title="Modo claro"></i>
                    <i class="fas fa-moon luna" title="Modo oscuro"></i>
                    <span class="circulo"></span>
                </button>
                <div class="imagen-persona">
                    <img src="<?php echo $_SESSION['imgProfile']; ?>" id="imagen_perfil" data-id="<?php echo $_SESSION['id']; ?>" alt="<?php echo $_SESSION['user-data']['nombreUsuario'] ?>" />
                </div>
            </nav>
        </div>
        <div class="info-persona">
            <?php
            require_once('./Views/Components/NavbarInfoAspirante.php');
            ?>
        </div>
        <div class="contenedor-responsive">
            <?php
            require_once('./Views/Components/NabvarResponsive.php');
            ?>
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
                <div class="pagina movPag" style="margin-left: -50%;">
                    <form action="#" id="info-persona" class="contenedor-form">
                        <h2 class="title-form">Información personal Aspirante</h2>

                        <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $_SESSION['id'] ?>">

                        <div class="contenedor-grupo w100" id="grupo-nombre">
                            <label for="txtNombre">Nombre</label>
                            <input type="text" name="txtNombre" id="txtNombre" value="<?= $_SESSION['user-data']['nombreUsuario'] ?>" disabled />
                            <i class="estado-input fa fa-times-circle"></i>
                            <p class="leyenda-input">
                                El nombre no debe contener números y debe tener mínimo 3
                                letras.
                            </p>
                        </div>

                        <div class="contenedor-grupo w100" id="grupo-perfil">
                            <label for="txtPerfil">Perfil laboral</label>
                            <br>
                            <br>
                            <textarea name="textPerfilLab" id="especificaciones" rows="1" placeholder="Perfil laboral..."></textarea>
                        </div>

                        <div class="contenedor-grupo w100" id="grupo-estado">
                            <label for="txtEstado">Estado laboral</label>
                            <select name="txtEstado" id="txtEstado">
                                <option value="" disabled selected>Seleccione su estado laboral actual</option>
                                <?php foreach ($data['list_workStatus'] as $listStatus) : ?>
                                    <option value="<?= $listStatus['idEstadoLaboral'] ?>"><?= $listStatus['nombreEstado'] ?></option>
                                <?php endforeach ?>
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
                        <input type="hidden" name="idAspirante" value="<?= isset($_SESSION['data-aspirante']['idAspirante']) ? $_SESSION['data-aspirante']['idAspirante'] : 0 ?>">
                        <div class="contenedor-grupo w100" id="grupo-puesto">
                            <input type="hidden" name="txtPuesto" id="txtPuesto" value="">
                            <ul class="list_sectores" id="list_PuestoInteres">
                            </ul>
                        </div>

                        <div class="contenedor-grupo w100" id="grupo-otro_puesto">
                            <input type="checkbox" id="grupo-puesto-otro_puesto" name="grupo-puesto-otro_puesto" />
                            <label for="grupo-puesto-otro_puesto">Otro puesto de interés.</label>
                        </div>

                        <div class="contenedor-grupo w100" id="grupo-otro_puesto_interes">
                            <label for="txtOtroPuesto">Otro puesto interés</label>
                            <input type="text" name="txtOtroPuesto" id="txtOtroPuesto" placeholder="Desarrollador frontend con React" />
                            <i class="estado-input fa fa-times-circle"></i>
                            <p class="leyenda-input">
                                El puesto de interés no debe contener números y debe tener mínimo 3
                                letras.
                            </p>
                        </div>

                        <div class="add-puntuacion">
                            <button class="boton_add_puesto" id="boton_add_puesto">
                                <i class="fas fa-plus"></i>
                                Agregar puesto
                            </button>
                        </div>

                        <div class="contenedor-grupo btn-enviar">
                            <button class="btns atras atras-p1">
                                <i class="fas fa-chevron-left icon-btn-atras"></i>
                                Atrás
                            </button>
                            <button class="btns siguiente sig-p3 btn-disable" id="btn-puesto-interes">
                                Siguiente<i class="fas fa-chevron-right icon-btn"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- PAGINA 3 -->
                <div class="pagina">
                    <form action="#" id="idiomas" class="contenedor-form">
                        <input type="hidden" name="idIdioma" id="idIdioma" value="0">
                        <h2 class="title-form">Idiomas</h2>

                        <div class="contenedor-grupo w50" id="grupo-idioma">
                            <div class="agrupar-estrellas" id="agrupar-estrellas-select">
                                <label for="txtListIdioma" id="grupo-idioma-idioma">Idiomas</label>
                                <select name="txtListIdioma" id="txtListIdioma">
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
                            <button class="boton_add_puntuacion" id="agregar_idioma">
                                <i class="fas fa-plus"></i>
                                Agregar idioma
                            </button>
                            <button class="boton_add_idioma boton_add_puntuacion" id="boton_add_idioma">
                                <i class="fas fa-plus"></i>
                                Agregar nuevo idioma
                            </button>
                        </div>

                        <div class="contenedor-grupo w100" id="lista_idiomas">
                        </div>

                        <div class="contenedor-grupo w100" id="select-idiomas">
                            <input type="hidden" name="idSelectIdioma" id="idSelectIdioma" value="">
                            <ul id="select-idiomas-list">
                            </ul>
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
                        <input type="hidden" name="idHabilidad" id="idHabilidad" value="0">
                        <h2 class="title-form">Habilidades</h2>

                        <div class="contenedor-grupo w100" id="grupo-habilidad">
                            <div class="agrupar-estrellas">
                                <label for="txtHabilidad">Habilidad</label>
                                <input type="text" name="txtHabilidades" id="txtHabilidad" placeholder="JavaScript" />
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

    <script src="https://cdn.tiny.cloud/1/x2oub1u70xqw4t9bxdur2k98oz7jsin9tx0vewhh6zf7pc68/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL; ?>Assets/js/validacionCampos.js"></script>
    <script src="<?= URL; ?>Assets/js/informacionAspirante.js"></script>
</body>

</html>