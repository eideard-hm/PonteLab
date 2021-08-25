/*
    * Aqui van las funciones o script que se van a utilizar en todos los archivos
    * del programa
*/

/*========================= MODO OSCURO =========================*/
btnSwitch = document.getElementById('switch');

btnSwitch.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    btnSwitch.classList.toggle('active');

    //guardamos el modo actual en el que estamos
    //classList.contains: permite saber si la clase contiene
    if (document.body.classList.contains('dark')) {
        localStorage.setItem('dark-mode', 'true');
    } else {
        localStorage.setItem('dark-mode', 'false');
    }
});

//obtener el modo actual en el que estamos

if (localStorage.getItem('dark-mode') === 'true') {
    document.body.classList.add('dark');
    btnSwitch.classList.add('active');
} else {
    document.body.classList.remove('dark');
    btnSwitch.classList.remove('active');
}

/* ===================================== CÓDIGO DE EL SLIDER =============================== */
const slider = document.querySelectorAll('.slider');
const btns = document.querySelectorAll('.btn');
let currentSlider = 1;

if (document.querySelector('.slider-img')) {

    const sliderManual = (index) => {

        slider.forEach(slides => {
            slides.classList.remove('active');

            btns.forEach(btn => {
                btn.classList.remove('active');
            });
        });

        slider[index].classList.add('active');
        btns[index].classList.add('active');
    }

    btns.forEach((btn, i) => {
        btn.addEventListener('click', () => {
            sliderManual(i);
            currentSlider = i;
        })
    })

    //slider automatico

    const sliderAuto = () => {
        const classActive = document.getElementsByClassName('active');
        let i = 1;

        const repetir = () => {
            setTimeout(() => {
                [...classActive].forEach(activeSlider => {
                    activeSlider.classList.remove('active');
                })

                slider[i].classList.add('active');
                btns[i].classList.add('active');
                i++;

                if (slider.length == i) {
                    i = 0;
                }
                if (i >= slider.length) {
                    return;
                }

                repetir();

            }, 10000)
        }
        repetir();
    }
    sliderAuto();
}

/* ======================== RESPONSIVE DESIGN ================== */
if (document.querySelector('#icono-reponsive')) {
    document.querySelector('#icono-reponsive').addEventListener('click', () => {
        mostrarBarraResponsive();
    });
}

const mostrarBarraResponsive = () => {
    document.querySelector('.contenedor-responsive').classList.toggle('active');
    document.querySelector('#icono-reponsive').classList.toggle('fa-bars');
    document.querySelector('#icono-reponsive').classList.toggle('fa-times');
}

/* ======================== IMAGEN PERFIL ================== */

const imgPersona = document.querySelector('.imagen-persona');
const opcionesInfo = document.querySelector('.info-persona');

if (imgPersona) {
    imgPersona.addEventListener('click', () => {
        opcionesInfo.classList.toggle('active');
    })
}

/* ======================== EDITOR DE TEXTO - SANTIAGO ================== */

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('#especificaciones')) {
        tinymce.init({
            selector: '#especificaciones',
            width: "100%",
            height: 400,
            statubar: true,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
        });
    }
    if (document.querySelector('#especficacionRequisitos')) {
        tinymce.init({
            selector: '#especficacionRequisitos',
            width: "100%",
            height: 400,
            statubar: true,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
        });
    }
    if (document.querySelector('#perfil')) {
        tinymce.init({
            selector: '#perfil',
            width: "100%",
            height: 400,
            statubar: true,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
        });
    }
})