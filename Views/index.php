<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <title><?= $data['titulo_pagina'] ?></title>
    <link rel="shortcut icon" href="<?= URL; ?>/Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/index.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />

    
</head>

<body>
    <?php
    require_once('./Views/Components/Navbar.php');
    ?>

    <div class="img-slider">
        <div class="slide active">
            <br><br><br><br><br><img src="<?= URL; ?>/Assets/img/image.jpg" align="right" width="480" height="480" alt="">
            <div class="info">

             <br><br><br><br><br><br><br><br>
                <h2 align="left">¡Que esperas para <br> registrarte!</h2>
                <br>
                <p align="left">¡Hola!, ¿aun no has logrado conseguir empleo?, no hay problema con PonsLabor muéstrale al mundo todos tus conocimientos y potencial, te ayudamos a conseguir tu trabajo deseado.</p>
            </div>
        </div>

        <div class="slide">
        <br><br><br><br><br> <img src="<?= URL; ?>/Assets/img/image2.jpg" align="right" width="480" height="480" alt="">
            <div class="info">

            <br><br><br><br><br><br><br><br>
                <h2 align="left">¿Buscas Trabajo?</h2>
                <br>
                <p align="left">Te presentamos a PonsLabor una nueva y actualiza plataforma que te ayudara en tu valiosa búsqueda de empleo, creando un perfil y una hoja de vida para que las grandes empresas vean todo tu potencial, que esperas prepárate para conquistar tu empleo ideal con PonsLabor.</p>
            </div>
        </div>

        <div class="slide">
        <br><br><br><br><br> <img src="<?= URL; ?>/Assets/img/image3.jpg" align="right" width="480" height="480" alt="">
            <div class="info">

            <br><br><br><br><br><br><br><br>
                <h2>¿Buscas personal?</h2>
                <br>
                <p>¡Bienvenido!, con PonsLabor has que tu negocio crezca cada dia mas
                    dando la oportunidad a todos nuestros aspirantes disponibles con todas las ganas de explotar
                    ese maravilloso potencial, que esperas para iniciar tu busqueda.
                </p>
            </div>
        </div>

        
        <div class="navigation">
            <div class="btn active"></div>
            <div class="btn"></div>
            <div class="btn"></div>
        </div>
        </br>
    </div>
    <br><br><br><br>

    <hr width ="" size="6">
 

    <h1> ¡HOLA! </h1>
<p style="font-size: 25px;"> Somos un equipo de desarrolladores que trabajamos de manera remota, nos encanta la tecnologia y es por ello que hemos construido
    PonsLabor una pagina enfocada en el cumplimiento de sueños laborales, ayudando a contratantes pequeños y grandes a formar su gran equipo
    asi como tambien ayudaremos a esos trabajores con ganas de salir adelante cada dia.
<br><br>
    Nuestra finalidad es realizar un trabajo real para nuestros clientes. <br>
    Nos centramos en el buen y correcto diseño de este sistema para poder satifascer a todos los usuarios. 
 </p>
<h1 class="title">OBJETIVOS PONSLABOR </h1>
<br>
<div class="container">
<div class="card">
<img src="<?= URL; ?>/Assets/img/Rapidez.jpg" alt="">
<h4>Rapidez</h4>
<p>Solo encontrar una oferta de empleo, envia tu curriculum de forma inmediata
    tambien contacta con la empresa o intermediario. 
</p>
</div>
<div class="card">
<img src="<?= URL; ?>/Assets/img/Reduccion.jpg" alt="">
<h4>Reduccion</h4>
<p>Respecto a la búsqueda convencional ya no mas gastar papel, correspondencia, desplazamientos en coche y muchas cosas mas.
</p>
</div>
<div class="card">
<img src="<?= URL; ?>/Assets/img/Facilidad.jpg" alt="">
<h4>Mas Facilidad</h4>
<p>Cientos de ofertas por diversos canales. Con PonteLab se multiplican las vías de acceso a ofertas de trabajo
    
</p>
</div>
<div class="card">
<img src="<?= URL; ?>/Assets/img/Busque.jpg" width="200" height="200" alt="">
<h4>Mejor Busqueda</h4>
<p> Se adecua entre el perfil profesional del candidato y el perfil que demanda la empresa ajustándose a los requisitos de la oferta.
</p>
</div>
</div>

<br><br>
<h1> NUESTRO EQUIPO </h1>
<div class="contenedor">
<figure>
<img src="<?= URL; ?>/Assets/img/Yesenia.jpeg" width="400" height="400" alt="">
    <div class="capa">
        <h2>Yesenia Rodriguez</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quisquam!</p>
    </div>
</figure>

<figure>
<img src="<?= URL; ?>/Assets/img/Luisa.jpeg" width="400" height="400"  alt="">
    <div class="capa">
        <h2>Luisa <br> Garzon</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quisquam!</p>
    </div>
</figure>

<figure>
<img src="<?= URL; ?>/Assets/img/Edier.jpeg" width="400" height="400"  alt="">
    <div class="capa">
        <h2>Edier <br> Hernandez</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quisquam!</p>
    </div>
</figure>

<figure>
<img src="<?= URL; ?>/Assets/img/Santiago.jpeg" width="400" height="400"  alt="">
    <div class="capa">
        <h2>Santiago <br> Becerra</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quisquam!</p>
    </div>
</figure>

</div>


<p> Lorem ipsum dolor sit amet. Est assumenda velit et tempore molestiae eum molestias autem aut atque ducimus! A tenetur commodi nam galisum voluptatem quo magni galisum ut harum vero.

Qui asperiores recusandae et inventore commodi et delectus minima rem tempora quaerat ab sunt dolore ab esse voluptas id explicabo aliquam. Eum nobis temporibus 33 omnis dolorum et fuga earum. Cum repudiandae velit deleniti optio 33 architecto architecto est facere nobis aut provident perspiciatis At voluptatem eligendi hic provident obcaecati.

Et veritatis nulla ea rerum debitis ex sunt praesentium. Cum nobis veritatis a quidem adipisci aut dolores debitis! </p>

    <script type="text/javascript">
        var slides = document.querySelectorAll('.slide');
        var btns = document.querySelectorAll('.btn');
        let currentSlide = 1;

        //JavaScript for image slider manual navigation
        var manualNav = function(manual) {
            slides.forEach((slide) => {
                slide.classList.remove('active');

                btns.forEach((btn) => {
                    btn.classList.remove('active');
                });
            });

            slides[manual].classList.add('active');
            btns[manual].classList.add('active');
        }

        btns.forEach((btn, i) => {
            btn.addEventListener("click", () => {
                manualNav(i);
                currentSlide = i;
            });
        });

        //  JavaScript for image slider autoplay navigation
        var repeat = function(activeClass) {
            let active = document.getElementsByClassName('active');
            let i = 1;

            var repeater = () => {
                setTimeout(function() {
                    [...active].forEach((activeSlide) => {
                        activeSlide.classList.remove('active');
                    });


                    slides[i].classList.add('active');
                    btns[i].classList.add('active');
                    i++;


                    if (slide.length == i) {
                        i = 0;
                    }
                    if (i >= slides.length) {
                        return;
                    }
                    repeater();
                }, 10000);
            }
            repeater();
        }
        repeat();
    </script>


<footer class="footer">
    <div class="row">
        <div class="col-sm-6 col-md-4 footer-navegacion">
            <h3>Pons<span>Labor</span></h3>
            <p class="grupo">© Copyright TEAM BELAY SOFTWARE SOLUTION 2021</p>
        </div>
        <div class="col-sm-6 col-md-4 footer-contactos">
            <div><i class="fa fa-phone footer-contactos-icono"></i>
                <p class="footer-center-info email text-left"> +57 3195696021</p>
            </div>
            <div><i class="fa fa-envelope footer-contactos-icono"></i>
                <p> <a target="_blank">PonsLabor.2021@gmail.com </a></p>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4 footer-nosotros">
            <h4>Mas sobre nosotros</h4>
            <p>Queremos ayudar a personas de todas partes a lograr sus metas de trabajo</p>
        <div class="clearfix"></div>
            <div class="social-redes social-icons">
                <a href="https://www.instagram.com/ponslabor/"><i class="fa fa-instagram"></i></a>
                <a href="https://www.linkedin.com/in/pons-labor-131760217/"><i class="fa fa-linkedin"></i></a>
                <a href="https://github.com/eideard-hm/proyecto-ponslabor.git"><i class="fa fa-github"></i></a></div>
        </div>
    </div>
</footer>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
                    
                                <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
</body>

</html>