<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>/Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
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
                <a href="#section-nosotros"><i class="fas fa-business-time" style="margin-right: 5px;"></i>Nosotros</a>
                <button class="switch dark-mode" id="switch">
                    <i class="fas fa-sun sol"></i>
                    <i class="fas fa-moon luna"></i>
                    <span class="circulo"></span>
                </button>
                <a href="Login" class="btn-init iniciar">Iniciar sesión</a>
                <a href="Registro" class="btn-init registro">Registrarse</a>
            </nav>
        </div>
    </header>

    <section class="slider-img">
        <div class="slider contenedor active">
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
            <img src="<?= URL; ?>/Assets/img/people_search.svg" alt="React" />
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
            <img src="<?= URL; ?>/Assets/img/register.svg" alt="Front-end" />
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
                <li><a href="#search-vacantes">Buscar empleo<i class="fas fa-chevron-right"></i></a></li>
                <li><a href="Registro">Publicar ofertas de empleo<i class="fas fa-chevron-right"></i></a></li>
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
                    <a href="#search-vacantes">Ir</a>
                </div>
            </div>
            <div class="card-contratante card">
                <div class="img-bussiness img">
                    <img src="<?= URL; ?>/Assets/img/businessman.svg" alt="Bussiness">
                </div>
                <div class="info-contratante info">
                    <h4>Publicar u ofertar vacantes</h4>
                    <p>Registre sus vacantes y encuentre el perfil más adecuado a su necesidad.</p>
                    <a href="#search-aspirantes">Ir</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-contratante contenedor">
        <h2>Nunca habia sido tan fácil conseguir tu empleo ideal
        </h2>
        <div class="section-contratante__container">
            <div class="section-contratante__aspirante">
                <h5>Lo puedes hacer en estos simples pasos:</h5>
                <ul>
                    <li><i class="fas fa-sign-in-alt icon-pasos"></i>Registrarte y ser parte de la famila PonsLabor, lo puedes hacer <a href="Registro">aquí.</a></li>
                    <li><i class="fas fa-edit icon-pasos"></i>Registrar tus estudios, experiencia, idiomas, habilidades...</li>
                    <li><i class="fas fa-eye icon-pasos"></i>Hacemos tu perfil visible para que las empresas te puedan contactar.</li>
                    <li><i class="fas fa-folder-open icon-pasos"></i>Nosotros te generamos una irresistible y elegante hoja de vida.</li>
                    <li><i class="fas fa-search icon-pasos"></i><a href="#search-vacantes">Buscar ofertas laborales</a> de acuerdo a tu perfil.</li>
                    <li><i class="fas fa-clipboard-check icon-pasos"></i>Elegir la que más se acople a tus habilidades y características.</li>
                    <li><i class="fas fa-paper-plane icon-pasos"></i>Puedes aplicar a dicha vacante.</li>
                </ul>
                <p>Todo esto lo puedes hacer desde la comodidad de tu casa <i class="fas fa-laptop-house icon-pasos"></i>, al mismo tiempo que ayudas a la conservación del planeta.</p>
            </div>
            <form class="section-contratante__contratante">
                <input type="search" placeholder="Desarrollador, frontend, backend, ingeniero..." name="" id="search-vacantes">
                <i class="fas fa-search"></i>

                <ul>
                    <li>Desarrollador JavaScript</li>
                    <li>Ingeniero en Sistemas</li>
                    <li>Manejo de Adoble Ilustration</li>
                </ul>
            </form>

        </div>
    </section>

    <section class="section-contratante-info contenedor">
        <h2>Nunca habia sido tan fácil registrar sus vacantes y <br> el perfil más adecuado a sus necesidades</h2>
        <div class="section-info__contratante">
            <div class="section-contratante-info__info">
                <h5>Lo puedes hacer en estos simples pasos:</h5>
                <ul>
                    <li><i class="fas fa-sign-in-alt icon-pasos"></i>Registrarte y ser parte de la famila PonsLabor, lo puedes hacer <a href="Registro">aquí.</a></li>
                    <li><i class="fas fa-laptop icon-pasos"></i><i class="fas fa-eye icon-pasos"></i>Registrar sus vacantes y publicarlas para que sean visibles para los aspirantes.</li>
                    <li><i class="fas fa-search icon-pasos"></i><a href="#search-aspirantes">Buscar tu trabajador ideal</a> para que desempeñe un vacante ofertada.</li>
                </ul>
            </div>
            <form class="section-contratante-search">
                <input type="search" placeholder="Desarrollador, web, Diseñador, Ingeniero..." name="" id="search-aspirantes">
                <i class="fas fa-search"></i>

                <ul>
                    <li>Desarrollador JavaScript</li>
                    <li>Ingeniero en Sistemas</li>
                    <li>Manejo de Adoble Ilustration</li>
                </ul>
            </form>
        </div>
    </section>

    <section class="section-nosotros contenedor" id="section-nosotros">

        <h2>Nosotros</h2>

        <div class="contenedor__card">
            <div class="card">
                <div class="img">
                    <img src="<?= URL ?>Assets/img/Edier.jpeg" alt="Edier">
                </div>
                <div class="info__description">
                    <h6>Edier Heraldo Hernández Molano</h6>
                    <ul>
                        <li>👉 Desarrollador fullstack</li>
                        <li>👉 Lider de proyecto</li>
                    </ul>

                    <a href="https://drive.google.com/file/d/1sg9x1VuLFnrx7pE6-aXLT2FsazvSCoFd/view?usp=sharing" target="_blank">Leer más<i class="far fa-hand-point-right" style="margin-left: 8px;"></i></a>
                </div>
            </div>

            <div class="card">
                <div class="img">
                    <img src="<?= URL ?>Assets/img/Yesenia.jpeg" alt="Yesenia">
                </div>
                <div class="info__description">
                    <h6>Yesenia Rodriguez Florez</h6>
                    <ul>
                        <li>✔ Administradora de base de datos.</li>
                        <li></li>
                    </ul>

                    <a href="#">Leer más<i class="far fa-hand-point-right" style="margin-left: 8px;"></i></a>
                </div>
            </div>

            <div class="card">
                <div class="img">
                    <img src="<?= URL ?>Assets/img/Santiago.jpeg" alt="Santiago">
                </div>
                <div class="info__description">
                    <h6>Santiago Andres Becerra Espitia</h6>
                    <ul>
                        <li>⏭ Diseñador UX</li>
                        <li>⏭ Documentador</li>
                    </ul>

                    <a href="#">Leer más<i class="far fa-hand-point-right" style="margin-left: 8px;"></i></a>
                </div>
            </div>

            <div class="card">
                <div class="img">
                    <img src="<?= URL ?>Assets/img/Luisa.jpeg" alt="Luisa">
                </div>
                <div class="info__description">
                    <h6>Luisa Brigith Garzon Martin</h6>
                    <ul>
                        <li>✅ Desarrollador Frontend</li>
                        <li>✅ Aseguradora de calidad</li>
                    </ul>

                    <a href="#">Leer más<i class="far fa-hand-point-right" style="margin-left: 8px;"></i></a>
                </div>
            </div>
        </div>
    </section>

    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
</body>

</html>