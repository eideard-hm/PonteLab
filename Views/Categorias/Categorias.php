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
                                <h4>menu</h4>
                            </li>
                            <li class="dropdown simple-menu active">
                                <a href="index" class="dropdown-toggle" data-toggle="dropdown" role="button">Inicio</a>
                            </li>
                            <li class="dropdown simple-menu">
                                <a href="index #categories" class="dropdown-toggle" data-toggle="dropdown" role="button">Categorías</a>
                            </li>
                            <li class="dropdown simple-menu">
                                <a href="index #about" class="dropdown-toggle" data-toggle="dropdown" role="button">ACERCA
                                    DE</a>
                            </li>

                            <li class="dropdown simple-menu">
                                <a href="index #testimonials" class="dropdown-toggle" data-toggle="dropdown" role="button">MÓDULOS</a>
                            </li>

                            <li class="dropdown simple-menu">
                                <a href="index #fucionalidades" class="dropdown-toggle" data-toggle="dropdown" role="button">FUNCIONALIDADES</a>
                            </li>

                            <li class="dropdown simple-menu">
                                <a href="index #about2" class="dropdown-toggle" data-toggle="dropdown" role="button">Beneficios</a>
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

    <!-- <section class="job-search ptb40">
        <div class="container">
            <form class="job-search-form row" action="#" method="get">
<div class="col-md-6 col-sm-12 search-keywords">
                    <label for="search-keywords">Palabra Clave</label>
                    <input type="text" name="search-keywords" id="search-keywords" placeholder="Keywords">
                </div>
                <div class="col-md-4 col-sm-12 search-categories">
                    <label for="search-categories">Categoría </label>
                    <select name="search-categories" class="selectpicker" id="search-categories" data-live-search="true" title="Any Category" data-size="5" data-container="body">
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
                <div class="col-md-2 col-sm-12  search-categories search-submit">
                    <button type="submit" class="btn btn-blue btn-effect btn-large"><i class="fas fa-search"></i>Buscar</button>
                </div>
            </form>
        </div>
    </section> -->
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
        </div>
    </section>
    <br> <br> <br>
    <BR> <BR> <BR> <BR>
    <footer class="footer1">
        <div class="copyright ptb40">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-12" style="color: ffff;">
                    <!-- © Copyright 2021 <a href="#">Belay Software Solution</a> Todos los derechos reservados. -->
                    <span>© Copyright 2021 &copy; <a href="#">Belay Software Solution</a>.</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <ul class="social-btns list-inline text-right">
                        <li>
                            <a href="#" class="social-btn-roll facebook">
                                <div class="social-btn-roll-icons">
                                    <i class="social-btn-roll-icon fa fa-facebook"></i>
                                    <i class="social-btn-roll-icon fa fa-facebook"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-btn-roll twitter">
                                <div class="social-btn-roll-icons">
                                    <i class="social-btn-roll-icon fa fa-twitter"></i>
                                    <i class="social-btn-roll-icon fa fa-twitter"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-btn-roll google-plus">
                                <div class="social-btn-roll-icons">
                                    <i class="social-btn-roll-icon fa fa-google-plus"></i>
                                    <i class="social-btn-roll-icon fa fa-google-plus"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-btn-roll instagram">
                                <div class="social-btn-roll-icons">
                                    <i class="social-btn-roll-icon fa fa-instagram"></i>
                                    <i class="social-btn-roll-icon fa fa-instagram"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-btn-roll linkedin">
                                <div class="social-btn-roll-icons">
                                    <i class="social-btn-roll-icon fa fa-linkedin"></i>
                                    <i class="social-btn-roll-icon fa fa-linkedin"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-btn-roll rss">
                                <div class="social-btn-roll-icons">
                                    <i class="social-btn-roll-icon fa fa-rss"></i>
                                    <i class="social-btn-roll-icon fa fa-rss"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
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