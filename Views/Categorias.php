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
    <title><?= $data['titulo_pagina'] ?></title>
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
                                <a href="index #categories" class="dropdown-toggle" data-toggle="dropdown" role="button">Categor??as</a>
                            </li>
                            <li class="dropdown simple-menu">
                                <a href="index #about" class="dropdown-toggle" data-toggle="dropdown" role="button">ACERCA
                                    DE</a>
                            </li>

                            <li class="dropdown simple-menu">
                                <a href="index #testimonials" class="dropdown-toggle" data-toggle="dropdown" role="button">M??DULOS</a>
                            </li>

                            <li class="dropdown simple-menu">
                                <a href="index #fucionalidades" class="dropdown-toggle" data-toggle="dropdown" role="button">FUNCIONALIDADES</a>
                            </li>

                            <li class="dropdown simple-menu">
                                <a href="index #about2" class="dropdown-toggle" data-toggle="dropdown" role="button">Beneficios</a>
                            </li>
                            <li class="menu-item login-btn">
                                <a id="modal_trigger" href="<?= URL ?>Login" role="button"><i class="fa fa-lock"></i>Iniciar Sesi??n</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section class="ptb60" id="categories">
        <div class="container">
            <div class="section-title">
                <h2 style="color: #43B5DD;"><strong>Categor??as</strong></h2>
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
                            <span>El sector financiero es un sector econ??mico formado por el conjunto
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
                            <a href="#">Ingenier??a</a>
                        </div>
                        <br>
                        <div class="category-descr">
                            <span>En cuanto al campo laboral, suele trabajar en consultor??as, grandes f??bricas, empresas
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
                            <a href="#">Arte y dise??o</a>
                        </div>
                        <br>
                        <div class="category-descr">
                            <span>Pueden trabajar en agencias de Dise??o y
                                Publicidad, empresas del ??rea web y multimedia, editoriales.</span>
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
                            <span>Trabaja con estrategias de comunicaci??n y ventas en una empresa.</span>
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
                            <a href="#">Tecnolog??as</a>
                        </div>
                        <div class="category-descr">
                            <span>Est?? compuesto por los sectores manufactureros y de servicios cuya actividad principal
                                est?? ligada al desarrollo, producci??n, comercializaci??n y uso intensivo de las
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
                                de ??rea administrativa como, planificar, archivar, coordinar actividades, etc.</span>
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
                            <span>Proporcionar protecci??n social
                                de la salud e igualdad de acceso a una atenci??n de salud de calidad .</span>
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
                            <span> Jefe de control de calidad tiene la funci??n de conocer las normas establecidas en la
                                industria para cumplir los est??ndares de calidad en los productos,.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt40 nomargin">
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Desarrollo empresarial</a>
                        </div>
                        <div class="category-descr">
                            <span>El desarrollo empresarial es un proceso mediante el cual el empresari@ y
                                su equipo, adquieren o fortalecen habilidades y
                                destrezas que favorecen la gesti??n eficiente de su negocio.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Empleado de tienda</a>
                        </div>
                        <div class="category-descr">
                            <span> procedimientos de funcionamiento para la tienda,
                                siguiendo las directrices de la empresa.
                                Planificar y organizar las actividades de tienda.
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-headset"></i>
                        </div>
                        <!-- Category Info - Title -->
                        <div class="category-info pt20">
                            <a href="#">Servicio de atenci??n al cliente</a>
                        </div>
                        <br>
                        <!-- Category Description -->
                        <div class="category-descr">
                            <span>se refiere a todas las acciones
                                implementadas para los clientes antes,
                                durante y despu??s de la compra.
                                se realiza para cumplir con la satisfacci??n de un producto
                                o servicio.
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fab fa-redhat"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Operaciones</a>
                        </div>
                        <br>
                        <div class="category-descr">
                            <span> Establecer la estrategia de desarrollo de los productos en los mercados,
                                tanto si son tradicionales como otros a los que la empresa aspire a ingresar.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt40 nomargin">
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fab fa-font-awesome"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Recursos humanos</a>
                        </div>
                        <div class="category-descr">
                            <span>resuelve los problemas laborales y negocia con los representantes
                                sindicales de los trabajadores. Esto aborda temas con la contrataci??n,
                                pol??tica salarial.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-user-md"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Servicios sanitarios</a>
                        </div>
                        <div class="category-descr">
                            <span>las organizaciones que prestan servicios sanitarios
                                hospitales, centros de salud, funcionarios profesionales y servicios de salud p??blica
                                as?? como otras redes, sectores, instituciones.</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-balance-scale-left"></i>
                        </div>
                        <!-- Category Info - Title -->
                        <div class="category-info pt20">
                            <a href="#">Ventas</a>
                        </div>
                        <br>
                        <!-- Category Description -->
                        <div class="category-descr">
                            <span>Vender los bienes, productos y servicios de la empresa para obtener ingresos:
                                Buscar clientes y compradores potenciales.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-tasks"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#"> Gesti??n de programas y proyectos </a>
                        </div>
                        <br>
                        <div class="category-descr">
                            <span> Gestionar el inicio y la evoluci??n de un proyecto;
                                Controlar y responder ante problemas que surjan durante
                                un proyecto; Facilitar la finalizaci??n y aprobaci??n del
                                proyecto.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt40 nomargin">
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-sort-numeric-up"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Contabilidad</a>
                        </div>
                        <div class="category-descr">
                            <span> registrar todas las operaciones econ??micas que
                                se lleven a cabo en la empresa, esto incluye el
                                registro de gastos e ingresos.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-users"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Servicios sociales y comunitarios</a>
                        </div>
                        <div class="category-descr">
                            <span>Aconsejar y proporcionar ayuda a personas que viven en
                                hogares y sedes intermedias y supervisar sus actividades.
                                La intervenci??n en casos de crisis o emergencia y servicios.
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-handshake"></i>
                        </div>
                        <!-- Category Info - Title -->
                        <div class="category-info pt20">
                            <a href="#">Consultor??a</a>
                        </div>
                        <br>
                        <!-- Category Description -->
                        <div class="category-descr">
                            <span>
                                es aquella persona que brinda estrategias espec??ficas
                                a los negocios con el objetivo de lograr una meta.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Educaci??n </a>
                        </div>
                        <br>
                        <div class="category-descr">
                            <span> incorpora en el proceso de formaci??n integral del
                                estudiante, el m??todo del aprendizaje activo, reflexivo
                                y vivencial y a partir de la pr??ctica promueve procesos
                                de producci??n.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt40 nomargin">
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fab fa-slideshare"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Liderazgo </a>
                        </div>
                        <div class="category-descr">
                            <span>Escucha consejos de quienes le rodean para resolver
                                problemas de forma creativa.
                                Conf??a en las personas de su entorno.
                                Delega responsabilidades.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-balance-scale"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Jur??dico </a>
                        </div>
                        <div class="category-descr">
                            <span>Asistir en atenci??n a juramentos, expedir comparendos,
                                citaciones, ??rdenes judiciales, programar audiencias,
                                velar por el mantenimiento de archivos y expedientes.</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-rss"></i>
                        </div>
                        <!-- Category Info - Title -->
                        <div class="category-info pt20">
                            <a href="#">Medios de comunicaci??n</a>
                        </div>
                        <br>
                        <!-- Category Description -->
                        <div class="category-descr">
                            <span>El prop??sito principal de los medios de comunicaci??n es, precisamente,
                                comunicar con objetividad, pero seg??n su tipo de ideolog??a
                                pueden especializarse en: informar, educar, etc.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-male"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Servicios militares y de protecci??n</a>
                        </div>
                        <br>
                        <div class="category-descr">
                            <span> armamentos y todo aquello que integre directa
                                e inseparablemente de un ej??rcito o de unas fuerzas
                                armadas..</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt40 nomargin">
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fab fa-product-hunt"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Gesti??n de productos </a>
                        </div>
                        <div class="category-descr">
                            <span> es una funci??n organizativa que gu??a cada etapa del
                                ciclo de vida de un producto: desde el desarrollo,
                                hasta el posicionamiento y la fijaci??n de su precio,
                                centr??ndose en el producto.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="category-info pt20">
                            <a href="#">Compras </a>
                        </div>
                        <div class="category-descr">
                            <span>Estudiar las tendencias del mercado.
                                Analizar los env??os de los proveedores.
                                Buscar alternativas para optimizar los
                                costos de la empresa.</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-seedling"></i>
                        </div>
                        <!-- Category Info - Title -->
                        <div class="category-info pt20">
                            <a href="#">Agricultura</a>
                        </div>
                        <br>
                        <!-- Category Description -->
                        <div class="category-descr">
                            <span>Ees el conjunto de operaciones que se hacen
                                en el campo, por raz??n de cultivos u obras de
                                transformaci??n o bonificaci??n territorial,
                                o en la ganader??a y aprovechamiento forestal..</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 cat-wrapper">
                    <div class="category ptb30">
                        <div class="category-icon">
                        <i class="fas fa-tools"></i>

                        </div>
                        <div class="category-info pt20">
                            <a href="#">Minas y canteras</a>
                        </div>
                        <br>
                        <div class="category-descr">
                            <span> es el conjunto de actividades que se llevan a cabo
                                en un yacimiento para obtener recursos de una mina,
                                a trav??s de la explotaci??n
                                o extracci??n de los minerales acumulados en el
                                suelo,</span>
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
                    <!-- ?? Copyright 2021 <a href="#">Belay Software Solution</a> Todos los derechos reservados. -->
                    <span>?? Copyright 2021 &copy; <a href="#">Belay Software Solution</a>.</span>
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