<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Mobile viewport optimized -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <!-- Meta Tags - Description for Search Engine purposes -->
    <meta name="description" content="Bolsa de Empleo PonteLab">
    <meta name="keywords" content="Bolsa de Empleo PonteLab">
    <meta name="author" content="GnoDesign">
    <!-- Website Title -->
    <title>Bolsa de Empleo PonteLab</title>
    <link rel="shortcut icon" href="<?= URL; ?>/Assets/img/index/Logo_ponslabor.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="<?= URL; ?>/Assets/img/index/Logo_ponslabor.ico">

    <link rel="stylesheet" href="<?= URL; ?>Assets/css/index.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/bootstrapIndex.min.css" />
</head>

<body>
    <header class="header1">
        <nav class="navbar navbar-default navbar-static-top fluid_header centered">
            <div class="container">
                <div class="col-md-2 col-sm-6 col-xs-8 nopadding">
                    <a class="navbar-brand nomargin" href="index.html"><img src="<?= URL; ?>/Assets/img/Logo_ponslabor.png" width="150" height="750"></a>
                </div>
                <div class="col-md-10 col-sm-6 col-xs-4 nopadding">
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle toggle-menu menu-right push-body" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="main-nav">
                        <ul class="nav navbar-nav pull-right">
                            <li class="mobile-title">
                                <h4>main menu</h4>
                            </li>
                            <li class="dropdown simple-menu active">
                                <a href="#Inicio" class="dropdown-toggle" data-toggle="dropdown" role="button">Inicio</a>
                            </li>
                            <li class="dropdown simple-menu">
                                <a href="#categories" class="dropdown-toggle" data-toggle="dropdown" role="button">Categorías</a>
                            </li>
                            <li class="dropdown simple-menu">
                                <a href="#about" class="dropdown-toggle" data-toggle="dropdown" role="button">ACERCA
                                    DE</a>
                            </li>

                            <li class="dropdown simple-menu">
                                <a href="#testimonials" class="dropdown-toggle" data-toggle="dropdown" role="button">MÓDULOS</a>
                            </li>

                            <li class="dropdown simple-menu">
                                <a href="#fucionalidades" class="dropdown-toggle" data-toggle="dropdown" role="button">FUNCIONALIDADES</a>
                            </li>

                            <li class="dropdown simple-menu">
                                <a href="#about2" class="dropdown-toggle" data-toggle="dropdown" role="button">Beneficios</a>
                            </li>
                            <li class="menu-item login-btn">
                                <a id="modal_trigger" href="Login" role="button"><i class="fa fa-lock"></i>Iniciar Sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section class="main2">
        <div class="swiper-container">
            <div class="swiper-wrapper" id="Inicio">
                <div class="swiper-slide overlay-black" style="background: url('Assets/img/index/Buscatrabajo.jpg'); background-size: cover; background-position: 50% 50%;">
                    <div class="slider-content container">
                        <div class="col-md-6 col-md-offset-6 col-xs-12 text-center">
                            <div class="section-title">
                                <h2 class="text-white">¿Buscas Trabajo?</h2>
                            </div>
                            <p class="text-white">Te presentamos a PonteLab una nueva y actualizada plataforma que te
                                ayudara en tu valiosa búsqueda de empleo, creando un perfil y una hoja de vida para que
                                las grandes empresas vean todo tu potencial, que esperas prepárate para conquistar tu
                                empleo ideal con PonteLab.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide overlay-black" style="background: url('Assets/img/index/BuscaEmpleo2.jpg'); background-size: cover; background-position: 50% 50%;">
                    <div class="slider-content container">
                        <div class="col-md-6 col-xs-12 text-center">
                            <div class="section-title">
                                <h2 class="text-white">¿Buscas personal?</h2>
                            </div>
                            <p class="text-white">¡Bienvenido!, con PonteLab has que tu negocio crezca cada dia mas
                                dando la oportunidad a todos nuestros aspirantes disponibles con todas las ganas de
                                explotar ese maravilloso potencial, que esperas para iniciar tu busqueda.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide overlay-black" style="background: url('Assets/img/index/QueEsperas.jpg'); background-size: cover; background-position: 50% 50%;">
                    <div class="slider-content container">
                        <div class="col-md-6 col-xs-12 text-center">
                            <div class="section-title">
                                <h2 class="text-white">¡Que esperas para registrarte!</h2>
                            </div>
                            <p class="text-white">¡Hola!, ¿aun no has logrado conseguir empleo?, no hay problema con
                                PonteLab muéstrale al mundo todos tus conocimientos y potencial, te ayudamos a conseguir
                                tu trabajo deseado.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
            <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
        </div>
    </section>
    <section class="job-search ptb40">
        <div class="container">

            <!-- Start of Form -->
            <form class="job-search-form row" action="#" method="get">

                <!-- Start of keywords input -->
                <div class="col-md-6 col-sm-12 search-keywords">
                    <label for="search-keywords">Palabra Clave</label>
                    <input type="text" name="search-keywords" id="search-keywords" placeholder="Palabra Clave">
                </div>

                <!-- Start of category input -->
                <div class="col-md-4 col-sm-12 search-categories">
                    <label for="search-categories">Categoría </label>
                    <select name="search-categories" class="selectpicker" id="search-categories" data-live-search="true" title="Categoría" data-size="5" data-container="body">
                        <option value="1">Accountance</option>
                        <option value="2">Banking</option>
                        <option value="3">Design & Art</option>
                        <option value="4">Developement</option>
                        <option value="5">Insurance</option>
                        <option value="6">IT Engineer</option>
                        <option value="7">Healthcare</option>
                        <option value="8">Marketing</option>
                        <option value="9">Management</option>
                    </select>
                </div>
                <!-- Start of submit input -->
                <div class="col-md-2 col-sm-12  search-categories search-submit">
                    <button type="submit" class="btn btn-blue btn-effect btn-large"><i class="fas fa-search"></i>Buscar</button>
                </div>

            </form>
            <!-- End of Form -->

        </div>
    </section>
    <section class="ptb60" id="categories">
        <div class="container">
            <div class="section-title">
                <h2 style="color: #43B5DD;"><strong>Categorías</strong></h2>
            </div>
            <BR> <BR> <BR> <BR>
            <div class="row nomargin">
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Finanzas</a>
                        </div>
                        <br>
                        <div class="category-descr">
                            <span>El sector financiero es un sector económico formado por el conjunto
                                de entidades que ofrecen servicios financieros.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                            <i class="fa fa-university"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Ingeniería</a>
                        </div>
                        <br>
                        <div class="category-descr">
                            <span>En cuanto al campo laboral, suele trabajar en consultorías, grandes fábricas, empresas
                                dedicadas
                                al desarrollo de maquinaria.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Arte y diseño</a>
                        </div>
                        <br>
                        <div class="category-descr">
                            <span>Pueden trabajar en agencias de Diseño y
                                Publicidad, empresas del área web y multimedia, editoriales.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Marketing</a>
                        </div>
                        <br>
                        <div class="category-descr">
                            <span>Trabaja con estrategias de comunicación y ventas en una empresa.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt40 nomargin">
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                            <i class="fa fa-desktop"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Tecnologías</a>
                        </div>
                        <div class="category-descr">
                            <span>Está compuesto por los sectores manufactureros y de servicios cuya actividad principal
                                está ligada al desarrollo, producción, comercialización y uso intensivo de las
                                mismas.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Asistente administrativo</a>
                        </div>
                        <div class="category-descr">
                            <span>Encargados de cerciorar el correcto funcionamiento de una empresa u oficina, llevando
                                a cabo labores
                                de área administrativa como, planificar, archivar, coordinar actividades, etc.</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <!-- Category Info - Title -->
                        <div class="category-info pt20">
                            <a href="#">Salud</a>
                        </div>
                        <br>
                        <!-- Category Description -->
                        <div class="category-descr">
                            <span>Proporcionar protección social
                                de la salud e igualdad de acceso a una atención de salud de calidad .</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Control de calidad</a>
                        </div>
                        <br>
                        <div class="category-descr">
                            <span> Jefe de control de calidad tiene la función de conocer las normas establecidas en la
                                industria para cumplir los estándares de calidad en los productos,.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt60 text-center">
                <a href="Categorias" class="btn btn-blue btn-effect nomargin">Ver Más..</a>
            </div>
        </div>
    </section>
    <br> <br> <br>
    <br> <br> <br>
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 ms-3" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="<?= URL; ?>/Assets/img/index/descripcion.png" class="rounded img-fluid d-block mx-auto" alt="App" style="width: 700px; height: 600px;position: relative;
                    top: -80px; right: 30px;">
                </div>
                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading" style="position: relative;
                    top: 100px;">
                        <h2 style="color: #43B5DD;"> <strong>PonteLab</strong></h2>
                    </div>
                    <br>
                    <div class="left-text" style="position: relative;
                    top: 100px;">
                        <p><strong>Ponte</strong> corresponde a Puente y <strong>Lab</strong> es un acrónimo de Laborum
                            que hace referencia a la palabra "trabajo" en griego, siendo así un sistema de
                            información
                            donde encontraras ofertas y perfiles laborales de todo tipo</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="" id="testimonials">
        <div class="container">
            <div class="section-title">
                <h2 class="text-white" style="color: #43B5DD;"><strong>Módulos</strong></h2>
            </div>
            <div class="owl-carousel testimonial">
                <div class="item">
                    <div class="review">
                        <blockquote>Este modulo permitira a los contratantes visualizar los perfiles de los apirates, de
                            igual
                            manera le permitira publicar vacantes y realizar una breve descripcionde su empresa.
                        </blockquote>

                    </div>
                    <div class="customer">
                        <img src="<?= URL; ?>/Assets/img/index/businessman.svg" alt="">
                        <h4 class="uppercase pt20" style="color: #8A8E8E;">Contratante</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="review">
                        <blockquote>Este módulo les permitirá a los aspirantes visualizar las vacantes disponibles, de
                            igual manera le permitirá registrar su información personal, información de estudios,
                            experiencia laboral y podrá general su hoja de vida.</blockquote>
                    </div>
                    <div class="customer">
                        <img src="<?= URL; ?>/Assets/img/index/search_work.svg" alt="">
                        <h4 class="uppercase pt20" style="color: #8A8E8E;">Aspirantes</h4>
                    </div>
                </div>
            </div>
    </section>
    <br> <br> <br>
    <br> <br> <br>
    <section class="section" id="about2">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix">
                    <div class="left-heading">
                        <h5 style="color: #43B5DD;">Beneficios de <strong>PonteLab</strong></h5>
                    </div>
                    <p>Con <strong>Pontelab </strong>encontraran los siguientes beneficios a la hora de buscar su
                        trabajo ideal .</p>
                    <ul>
                        <li>
                            <img src="<?= URL; ?>/Assets/img/index/beneficio 01.png" alt="">
                            <div class="text">
                                <h6 style="color: #8A8E8E;">Filtro </h6>
                                <p>En <strong>PonteLab</strong> utilizamos un filtro de búsqueda para que encuentres
                                    más rápido la vácate que deseas y consultes en ella todos sus datos.</p>
                            </div>
                        </li>
                        <li>
                            <img src="<?= URL; ?>/Assets/img/index/beneficio 02.png" a alt="">
                            <div class="text">
                                <h6 style="color: #8A8E8E;">Seguridad </h6>
                                <p>En <strong>PonteLab</strong> tus datos están mas seguros y con la versión Premium tus
                                    vacantes y perfiles laborales saldrán en las primeras opciones.</p>
                            </div>
                        </li>
                        <li>
                            <img src="<?= URL; ?>/Assets/img/index/beneficio 03.png" alt="">
                            <div class="text">
                                <h6 style="color: #8A8E8E;">Sin experiencia laboral </h6>
                                <p><strong>PonteLab</strong> acepta aspirantes sin experiencia laboral previa ya que
                                    podrá
                                    encontrar de todo tipo de vacantes.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right-image col-lg-7 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="<?= URL; ?>/Assets/img/index/beneficio-general.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
    <BR> <BR> <BR> <BR>
    <div class="wrapper row3" id="fucionalidades">
        <main class="hoc container clear">
            <div class="center btmspace-80">
                <h2 style="color: #43B5DD;"><strong>FUNCIONALIDADES</strong></h2>
            </div>
            <ul class="nospace group overview btmspace-80">
                <li class="one_third">
                    <article>
                        <div class="clear"><a href="#"><i class="fas fa-newspaper"></i></a>
                            <h6 class="heading">Generar Hoja de vida</h6>
                        </div>
                        <p>Con nuestra plataforma podrán generar sus propias de vida.</p>
                    </article>
                </li>
                <li class="one_third">
                    <article>
                        <div class="clear"><a href="#"><i class="fas fa-filter"></i></a>
                            <h6 class="heading">Filtro de vacantes</h6>
                        </div>
                        <p>Con Pontelab podrán filtrar las vacantes que más se adapten a sus necesidades. </p>
                    </article>
                </li>
                <li class="one_third">
                    <article>
                        <div class="clear"><a href="#"><i class="fas fa-search"></i></a>
                            <h6 class="heading">Filtro de perfiles laborales</h6>
                        </div>
                        <p>Con Pontelab podrán buscar los perfiles laborales que más se adapte a su compañía.</p>
                    </article>
                </li>

            </ul>

        </main>
    </div>
    <BR> <BR> <BR> <BR>
    <footer class="footer1">
        <div class="copyright ptb40">
            <div class="container">
                <div class="col-md-8 col-sm-8 col-xs-12" style="color: ffff;">
                <!-- © Copyright 2021 <a href="#">Belay Software Solution</a> Todos los derechos reservados. -->
                    <span>© Copyright 2021 &copy; <a href="#">PonteLab</a>.  Todos los derechos reservados.</span>
                </div>
           
        </div>
    </footer>
   
    <script src="https://kit.fontawesome.com/ff77c957bf.js" crossorigin="anonymous"></script>
    <script src="<?= URL ?>Assets/js/jsindex/jquery-min.js"></script>
    <script src="<?= URL ?>Assets/js/jsindex/bootstrap01.min.js"></script>
    <script src="<?= URL ?>Assets/js/jsindex/bootstrap-select.min.js"></script>
    <script src="<?= URL ?>Assets/js/jsindex/swiper.js"></script>
</body>

</html>