//ver contraseña

document.getElementById("spanMostrar").addEventListener("click", function () {
    const elementInput = document.getElementById("inputPassword");
    const elementIcon = document.getElementById("iconMostrar");
    if (elementIcon.classList.contains("active")) {
        elementIcon.classList.remove("active");
        elementIcon.innerHTML = "visibility";
        elementInput.type = "password";
    } else {
        elementIcon.classList.add("active");
        elementIcon.innerHTML = "visibility_off";
        elementInput.type = "text";
    }
});

const formUser = document.querySelector('#msform');
const bntSubmit = document.getElementById('btn_submit');

bntSubmit.addEventListener('click', e => {
    e.preventDefault();

    validateFormUser();
});

const insertUser = async () => {
    //enviar los datos mediante una petición fetch
    let formData = new FormData(formUser);
    formData.delete('pass2');
    const url = 'http://localhost/PonsLabor/Registro/setUser';

    try {
        const res = await fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'Content-Type': 'application/json'
            }
        })
        const data = await res.json();
        console.log(data.estadoUser);
        console.log(data.msg);
        console.log('La data es:', data);
    } catch (error) {
        console.log(error);
    }
}

const validateFormUser = () => {
    const id = document.querySelector('#idUsuario').value;
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#inputPassword').value;
    const confirmPass = document.querySelector('#pass2').value;
    const tipoDoc = document.querySelector('#documento').value;
    const numDoc = document.querySelector('#numDoc').value;
    const numCel = document.querySelector('#numCel').value;
    const numFijo = document.querySelector('#numFijo').value;
    const estado = document.querySelector('#estado').value;
    const rol = document.querySelector('#rol').value;
    const barrio = document.querySelector('#barrio').value;
    const direccion = document.querySelector('#direccion').value;

    if (email === '' || password === '' || tipoDoc === '' || numDoc === '' || numCel === ''
        || numFijo === '' || estado === '' || rol === '' || barrio === '' || direccion === '') {
        swal(
            'Ha ocurrido un error',
            'Todos los campos son obligatorios.',
            'error'
        )
        return false;
    } else {
        insertUser();
    }
}

//Funcionalidad botones

let current_fs, next_fs, previous_fs;
let left, opacity, scale;
let animating;

$(".next").click(function (e) {
    e.preventDefault();
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();


    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");


    next_fs.show();

    current_fs.animate({ opacity: 0 }, {
        step: function (now, mx) {
            scale = 1 - (1 - now) * 0.2;
            left = (now * 50) + "%";
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale(' + scale + ')',
                'position': 'absolute'
            });
            next_fs.css({ 'left': left, 'opacity': opacity });
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        easing: 'easeInOutBack'
    });
});

$(".previous").click(function (e) {
    e.preventDefault();
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    previous_fs.show();

    current_fs.animate({ opacity: 0 }, {
        step: function (now, mx) {
            scale = 0.8 + (1 - now) * 0.2;
            left = ((1 - now) * 50) + "%";
            opacity = 1 - now;
            current_fs.css({ 'left': left });
            previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        easing: 'easeInOutBack'
    });
});

// $(".submit").click(function () {
//     return false;
// })