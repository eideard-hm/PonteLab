<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
                <a href="Estudios">Estudios</a>
                <a href="Experiencia">Experiencia</a>
                <a href="HojaVida" class="active">Hoja de vida</a>
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
                <li><i class="fas fa-user-circle"></i><a href="Perfil_Aspirante">Perfil</a></li>
                <li><i class="fas fa-user-edit"></i><a href="Perfil_Aspirante">Editar perfil</a></li>
                <li>
                    <i class="fas fa-sign-in-alt"></i><a href="Login">Cerrar sesión</a>
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

    <div class="contenedor-cv">
        <!-- seccion de nombre y foto -->
        <div class="nombre-foto ">
            <h2 class="nombre-aspirante">Edier Heraldo Hernández Molano</h2>
            <img src="<?= URL; ?>Assets/img/perfil.png" alt="Edier Heraldo Hernandez Molano" class="imagen-aspirante" />
        </div>

        <!-- profesion y perfil laboral -->
        <div class="profesion-perfil ">
            <h3 class="profesion">Desarrollador de software web</h3>
            <p class="perfil-laboral">
                Desarrollador de software web, con gran capacidad de aprendizaje y adaptación sobre nuevas tecnologías
                de forma autónoma
                y autodidacta. Técnico en programación de software, con características y habilidades de trabajo en
                equipo , comunicación asertiva,
                autodidacta, proactivo, comprometido y responsable. Cada día intento mejorar, aprender nuevas cosas para
                ponerlas en práctica
                en pro de hacer un mejor trabajo, aportar de manera positiva y exponencial en mis labores.
            </p>
        </div>

        <!-- ============================================================================ -->
        <div class="contenedor-informacion">

            <!-- CONTENEDOR PARA LOS ELEMENTOS DE ANCHO DE 30% -->

            <div class="contenedor-w30">
                <!-- perfil aspirante -->
                <div class="perfil">
                    <div class="encabezado-perfil encabezado">
                        <i class="fas fa-user-circle icono-encabezado"></i>
                        <h4 class="titulo-encabezado">Perfil</h4>
                    </div>
                    <div class="datos-perfil mt">
                        <div class="datos">
                            <span>Email</span>
                            <p>ehhernandez81@misena.edu.co</p>
                        </div>
                        <div class="datos">
                            <span>Teléfono</span>
                            <p>3134387765</p>
                            <p>754443</p>
                        </div>
                        <div class="datos">
                            <span>Dirección</span>
                            <p>Calle 1c sur #8c-27</p>
                        </div>
                    </div>
                </div>

                <!-- habilidades del aspirante -->
                <div class="habilidades">
                    <div class="encabezado-habilidades encabezado">
                        <i class="fas fa-bolt icono-encabezado"></i>
                        <h4 class="titulo-encabezado">Habilidades</h4>
                    </div>

                    <div class="habilidad mt">
                        <div class="habi df">
                            <span>PHP</span>
                            <span class="estrellas">
                                <i class="fas fa-star" style="color: orange"></i>
                                <i class="fas fa-star" style="color: orange"></i>
                                <i class="fas fa-star" style="color: orange"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <div class="habi df">
                            <span>JavaScript</span>
                            <span class="estrellas">
                                <i class="fas fa-star" style="color: orange"></i>
                                <i class="fas fa-star" style="color: orange"></i>
                                <i class="fas fa-star" style="color: orange"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <div class="habi df">
                            <span>React</span>
                            <span class="estrellas">
                                <i class="fas fa-star" style="color: orange"></i>
                                <i class="fas fa-star" style="color: orange"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- idiomas -->

                <div class="idiomas ">
                    <div class="encabezado-idioma encabezado">
                        <i class="fas fa-language icono-encabezado"></i>
                        <h4 class="titulo-encabezado">Idiomas</h4>
                    </div>

                    <div class="idioma mt">
                        <div class="idi df">
                            <span>Inglés</span>
                            <span class="estrellas">
                                <i class="fas fa-star" style="color: orange"></i>
                                <i class="fas fa-star" style="color: orange"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <div class="idi df">
                            <span>Frances</span>
                            <span class="estrellas">
                                <i class="fas fa-star" style="color: orange"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!--        CONTENEDOR PARA LOS ELEMENTOS DEL ANCHO 70% -->
            <div class="contenedor-w70">
                <!-- Educación del aspirante -->
                <div class="educacion">
                    <div class="encabezado-educacion encabezado">
                        <i class="fas fa-graduation-cap icono-encabezado"></i>
                        <h4 class="titulo-encabezado">Educación</h4>
                    </div>
                    <div class="estudios-realizados mt">
                        <div class="estudios">
                            <div class="fechas contenedor-w30">
                                <p class="inicio-estudio">Enero 2019 -</p>
                                <p class="fin-estudio">Diciembre 2020</p>
                            </div>
                            <div class="infor-estudios contenedor-w70">
                                <h4 class="entidad">Servicio Nacional de Aprendizaje</h4>
                                <p class="programa">Técnico en programación de software</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- experiencia del usuario -->

                <div class="experiencia-laboral">
                    <div class="encabezado-experiencia encabezado">
                        <i class="fas fa-briefcase icono-encabezado"></i>
                        <h4 class="titulo-encabezado">Experiencia laboral</h4>
                    </div>

                    <div class="info-experiencia mt">
                        <div class="experiencia">
                            <div class="fechas contenedor-w30">
                                <p class="inicio-estudio">Enero 2019 -</p>
                                <p class="fin-estudio">Diciembre 2020</p>
                            </div>
                            <div class="informacion-experiencia contenedor-w70">
                                <h5 class="puesto">Desarrollador de software</h5>
                                <p class="empresa">Microsoft, Estados unidos</p>
                                <ul>
                                    <li>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam nihil ratione
                                        saepe praesentium soluta perferendis id, eveniet dolore! Soluta, odio.
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const imgPersona = document.querySelector('.imagen-persona');
        const opcionesInfo = document.querySelector('.info-persona');

        imgPersona.addEventListener('click', () => {
            opcionesInfo.classList.toggle('active');
        })
    </script>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
</body>

</html>