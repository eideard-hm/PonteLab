<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>/Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/index.css" />
</head>

<body>
    <header class="menu_header">
        <div class="contenedor barra">
            <a href="#" class="content-logo">
                <img src="<?= URL; ?>Assets/img/Logo_ponslabor.png" alt="PonsLabor" class="logo" />
                <h2>Pons<span>Labor.</span></h2>
            </a>
            <nav class="navbar_menu">
                <a href="#"><i class="fas fa-home" style="margin-right: 5px;"></i>Inicio</a>
                <a href="#"><i class="fas fa-business-time" style="margin-right: 5px;"></i>Proyectos</a>
                <a href="#">
                    <button class="switch" id="switch">
                        <i class="fas fa-sun sol"></i>
                        <i class="fas fa-moon luna"></i>
                        <span class="circulo"></span>
                    </button>
                </a>
                <a href="Login" class="btn-init iniciar">Iniciar sesión</a>
                <a href="Registro" class="btn-init registro">Registrarse</a>
            </nav>
        </div>
    </header>

    <section class="slider-img">
        <div class="slider contenedor active">
            <img src="<?= URL; ?>/Assets/img/image.jpg" alt="Front-end" />
            <div class="info-slider">
                <h2>¡Que esperas para <br> registrarte!</h2>
                <p>
                    ¡Hola!, ¿aun no has logrado conseguir empleo?, no hay problema
                    con PonsLabor muéstrale al mundo todos tus conocimientos y
                    potencial, te ayudamos a conseguir tu trabajo deseado.
                </p>
            </div>
        </div>

        <div class="slider contenedor">
            <img src="<?= URL; ?>/Assets/img/image2.jpg" alt="Frameworks de js" />
            <div class="info-slider">
                <h2>¿Buscas Trabajo?</h2>
                <p>
                    Te presentamos a PonsLabor una nueva y actualizada plataforma que te
                    ayudara en tu valiosa búsqueda de empleo, creando un perfil y una
                    hoja de vida para que las grandes empresas vean todo tu potencial,
                    que esperas prepárate para conquistar tu empleo ideal con PonsLabor.
                </p>
            </div>
        </div>

        <div class="slider contenedor">
            <img src="<?= URL; ?>/Assets/img/image3.jpg" alt="React" />
            <div class="info-slider">
                <h2>¿Buscas personal?</h2>
                <p>
                    ¡Bienvenido!, con PonsLabor has que tu negocio crezca cada dia mas
                    dando la oportunidad a todos nuestros aspirantes disponibles con todas las ganas de explotar
                    ese maravilloso potencial, que esperas para iniciar tu busqueda.
                </p>
            </div>
        </div>

        <div class="slider contenedor">
            <img src="<?= URL; ?>/Assets/img/image3.jpg" alt="Desarrollador" />
            <div class="info-slider">
                <h2>Sección 4</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur
                    praesentium quia porro velit voluptatibus quam accusantium obcaecati
                    sint? Expedita, quasi.
                </p>
            </div>
        </div>

        <div class="slider contenedor">
            <img src="<?= URL; ?>/Assets/img/work.svg" alt="Programador" />
            <div class="info-slider">
                <h2>Sección 5</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur
                    praesentium quia porro velit voluptatibus quam accusantium obcaecati
                    sint? Expedita, quasi.
                </p>
            </div>
        </div>

        <div class="btns">
            <div class="btn active"></div>
            <div class="btn"></div>
            <div class="btn"></div>
            <div class="btn"></div>
            <div class="btn"></div>
        </div>
    </section>

    <section class="section-welcome contenedor">
        <div class="section-welcome__welcome">
            <div class="welcome-title">
                <h2>¡Te damos la bienvenida a tu comunidad profesional!</h2>
                <img src="<?= URL; ?>Assets/img/welcome.svg" alt="welcome">
            </div>
            <ul class="list_categories">
                <li><a href="#">Buscar empleo<i class="fas fa-chevron-right"></i></a></li>
                <li><a href="#">Publicar ofertas de empleo<i class="fas fa-chevron-right"></i></a></li>
            </ul>
        </div>
        <div class="section_welcome__img">
            <img src="<?= URL; ?>Assets/img/co-working.svg" alt="co-working">
        </div>
    </section>

    <section class="section-aspirantes contenedor">
        <h2>La forma más fácil de encontrar tu trabajo ideal</h2>
        <div class="section-aspirante__card">
            <div class="card-aspirante card">
                <div class="img-search img">
                    <img src="<?= URL; ?>/Assets/img/search.svg" alt="Buscador">
                </div>
                <div class="info-search info">
                    <h4>Buscador de empleo</h4>
                    <p>Registrese y encuentre las ofertas laborales de todos los
                        prestadores de Bogotá D.C.</p>
                    <a href="#">Ir</a>
                </div>
            </div>
            <div class="card-contratante card">
                <div class="img-bussiness img">
                    <img src="<?= URL; ?>/Assets/img/businessman.svg" alt="Bussiness">
                </div>
                <div class="info-contratante info">
                    <h4>Publicar u ofertar vacantes</h4>
                    <p>Registre sus vacantes y encuentre el perfil más adecuado a su necesidad.</p>
                    <a href="#">Ir</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-contratante contenedor">
        <h2>Nunca habia sido tan fácil</h2>
        <div class="section-contratante__container">
            <div class="section-contratante__aspirante">
                <h3>Conseguir tu empleo ideal</h3>
            </div>
            <div class="section-contratante__contratante">
                <h3> Registrar sus vacantes y encontrar el perfil más adecuado a sus necesidades</h3>
            </div>
        </div>
    </section>

    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
</body>

</html>