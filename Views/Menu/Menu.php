<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>/Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>Assets/css/aspirante.css">
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
</head>

<body id="menu">
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
                <a href="Aspirante">Aspirante</a>
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
    </header>

    <div class="contenedor-card">
        <div class="imagenes">
            <img src="<?= URL; ?>Assets/img/perfil.png" alt="Perfil de empleado" />
            <img src="<?= URL; ?>Assets/img/perfil.png" alt="Perfil de empleado" />
            <div class="informacion-trabajador">
                <h4>Nombre:</h4>
                <b>Edier Heraldo Hernandez Molano</b>
                <h4>Edad:</h4>
                <span>17 años</span>
                <h4>Profesión:</h4>
                <span>Desarrollador de software</span>
                <h4>Estado:</h4>
                <span>Buscando empleo</span>
            </div>
        </div>
        <div class="info-card">
            <div class="detalles-persona">
                <h2>
                    Edier Hernandez <br />
                    <span>Desarrollador web</span>
                </h2>

                <div class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="contenedor-card">
        <div class="imagenes">
            <img src="<?= URL; ?>Assets/img/image2.jpg" alt="Perfil de empleado" />
            <img src="<?= URL; ?>Assets/img/image2.jpg" alt="Perfil de empleado" />
            <div class="informacion-trabajador">
                <h4>Nombre:</h4>
                <b>Edier Heraldo Hernandez Molano</b>
                <h4>Edad:</h4>
                <span>17 años</span>
                <h4>Profesión:</h4>
                <span>Desarrollador de software</span>
                <h4>Estado:</h4>
                <span>Buscando empleo</span>
            </div>
        </div>
        <div class="info-card">
            <div class="detalles-persona">
                <h2>
                    Edier Hernandez <br />
                    <span>Desarrollador web</span>
                </h2>

                <div class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="contenedor-card">
        <div class="imagenes">
            <img src="<?= URL; ?>Assets/img/image.jpg" alt="Perfil de empleado" />
            <img src="<?= URL; ?>Assets/img/image.jpg" alt="Perfil de empleado" />
            <div class="informacion-trabajador">
                <h4>Nombre:</h4>
                <b>Edier Heraldo Hernandez Molano</b>
                <h4>Edad:</h4>
                <span>17 años</span>
                <h4>Profesión:</h4>
                <span>Desarrollador de software</span>
                <h4>Estado:</h4>
                <span>Buscando empleo</span>
            </div>
        </div>
        <div class="info-card">
            <div class="detalles-persona">
                <h2>
                    Edier Hernandez <br />
                    <span>Desarrollador web</span>
                </h2>

                <div class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="contenedor-card">
        <div class="imagenes">
            <img src="<?= URL; ?>Assets/img/image3.jpg" alt="Perfil de empleado" />
            <img src="<?= URL; ?>Assets/img/image3.jpg" alt="Perfil de empleado" />
            <div class="informacion-trabajador">
                <h4>Nombre:</h4>
                <b>Edier Heraldo Hernandez Molano</b>
                <h4>Edad:</h4>
                <span>17 años</span>
                <h4>Profesión:</h4>
                <span>Desarrollador de software</span>
                <h4>Estado:</h4>
                <span>Buscando empleo</span>
            </div>
        </div>
        <div class="info-card">
            <div class="detalles-persona">
                <h2>
                    Edier Hernandez <br />
                    <span>Desarrollador web</span>
                </h2>

                <div class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
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