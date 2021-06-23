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
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/index.css" />
    <link rel="stylesheet" href="<?= URL; ?>Assets/css/stylesGlobal.css" />
</head>

<body>
    <?php
    require_once('./Views/Components/Navbar.php');
    ?>

    <div class="img-slider">
        <div class="slide active">
            <br><img src="<?= URL; ?>/Assets/img/image.jpg" align="right" width="480" height="480" alt="">
            <div class="info">
                <br><br><br><br><br>
                <h2 align="left">¡Que esperas para <br> registrarte!</h2>
                <br>
                <p align="left">¡Hola!, ¿aun no has logrado conseguir empleo?, no hay problema con PonsLabor muéstrale al mundo todos tus conocimientos y potencial, te ayudamos a conseguir tu trabajo deseado.</p>
            </div>
        </div>

        <div class="slide">
            <br> <img src="<?= URL; ?>/Assets/img/image2.jpg" align="right" width="480" height="480" alt="">
            <div class="info">

                <br><br><br><br><br>
                <h2 align="left">¿Buscas Trabajo?</h2>
                <br>
                <p align="left">Te presentamos a PonsLabor una nueva y actualiza plataforma que te ayudara en tu valiosa búsqueda de empleo, creando un perfil y una hoja de vida para que las grandes empresas vean todo tu potencial, que esperas prepárate para conquistar tu empleo ideal con PonsLabor.</p>
            </div>
        </div>

        <div class="slide">
            <br> <img src="<?= URL; ?>/Assets/img/image3.jpg" align="right" width="480" height="480" alt="">
            <div class="info">

                <br><br><br><br><br>
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

    <footer id="footer-index">
        <div class="text-center text-white" style="background-color: #1e1e62;">
            © Copyright TEAM BELAY SOFTWARE SOLUTION 2021: <br>
            <a id="textRef" class="text-white" href="#">Realizado por: Luisa Brigith Garzón Martin, Yesenia Rodriguez
                Florez<br>
                Santiago Andres Becerra Espitia, Edier Heraldo Hernandez Molano</a>
        </div>
    </footer>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
</body>

</html>