document.addEventListener('DOMContentLoaded', () => {
    /*======================= FUNCIÓN PARA MOSTRAR LA IMAGEN =============== */
    if (document.querySelector("#foto")) {
        let foto = document.querySelector("#foto");
        foto.onchange = function (e) {
            let uploadFoto = document.querySelector("#foto").value;
            let fileimg = document.querySelector("#foto").files;
            let nav = window.URL || window.webkitURL;
            let contactAlert = document.querySelector('#form_alert');
            if (uploadFoto != '') {
                let type = fileimg[0].type;
                let name = fileimg[0].name;
                if (type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png') {
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
                    if (document.querySelector('#img')) {
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.add("notBlock");
                    foto.value = "";
                    return false;
                } else {
                    contactAlert.innerHTML = '';
                    if (document.querySelector('#img')) {
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                    let objeto_url = nav.createObjectURL(this.files[0]);
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objeto_url + ">";
                }
            } else {
                alert("No selecciono foto");
                if (document.querySelector('#img')) {
                    document.querySelector('#img').remove();
                }
            }
        }
    }

    if (document.querySelector(".delPhoto")) {
        let delPhoto = document.querySelector(".delPhoto");
        delPhoto.onclick = function (e) {
            removePhoto();
        }
    }

    const removePhoto = () => {
        document.querySelector('#foto').value = "";
        document.querySelector('.delPhoto').classList.add("notBlock");
        document.querySelector('#img').remove();
    }

    //ver contraseña
    if (document.getElementById("spanMostrar")) {
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
    }

    if (document.querySelector('#list_sectores')) {
        const listSectores = document.querySelector('#list_sectores');
        listSectores.addEventListener('click', seleccionarSector);
    }
})

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


/* ==================== MÉTODOS PARA HACER TRANSACCIONES EN LA DB ============= */

const listSectores = new Set();

const seleccionarSector = e => {
    if (e.target.tagName === 'LI') {
        if (e.target.classList.contains('active')) {
            listSectores.delete(e.target.dataset.id);
            e.target.classList.remove('active');
        } else {
            listSectores.add(e.target.dataset.id);
            e.target.classList.add('active');
        }
        console.log(listSectores)
    }
}

const formUser = document.querySelector('#msform');
const btnSector = document.querySelector('#btn_sector');
const bntSubmit = document.getElementById('btn_submit');
/*  FUNCIONALIDAD DEL REGISTRO SEGUN ROL SOBRE EL NOMBRE */
document.querySelector('#rol').addEventListener('change', () => {
    if (document.querySelector('#rol').value === '1') {
        document.querySelector('#nombre').placeholder = "PonsLabor";
        document.querySelector('#apellido').type = "hidden";
    } else {
        document.querySelector('#nombre').placeholder = "Carlos";
        document.querySelector('#apellido').type = "text";
    }
});
/*  RECEPCION DE VALOR DEL ELEMENTO DEFINIDO btn_submit, previniendo el evento por defecto en
caso de ser este btn clicado y ejecutanfdo el metodo validateFormUser*/

const validateFormUser = (e) => {
    e.preventDefault();

    const id = document.querySelector('#idUsuario').value;
    const nombre = document.querySelector('#nombre').value;
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#inputPassword').value;
    const confirmPass = document.querySelector('#pass2').value;
    const tipoDoc = document.querySelector('#documento').value;
    const numDoc = document.querySelector('#numDoc').value;
    const numCel = document.querySelector('#numCel').value;
    const numFijo = document.querySelector('#numFijo').value;
    const rol = document.querySelector('#rol').value;
    const barrio = document.querySelector('#barrio').value;
    const direccion = document.querySelector('#direccion').value;

    if (nombre === '' || email === '' || password === '' || tipoDoc === '' || numDoc === '' || numCel === ''
        || numFijo === '' || rol === '' || barrio === '' || direccion === '') {
        swal(
            'Ha ocurrido un error',
            'Todos los campos son obligatorios.',
            'error'
        )
        return false;
    } else if (password !== confirmPass) {
        swal(
            'Error!! Contraseñas incorrectas',
            'Las contraseñas no coinciden, por favor intente nuevamente!!',
            'error'
        )
        return false;
    } else {
        insertUser();
    }
}

if (bntSubmit) {
    bntSubmit.addEventListener('click', validateFormUser);
}


const insertUser = async () => {
    //enviar los datos mediante una petición fetch
    let formData = new FormData(formUser);
    formData.delete('pass2');
    if (document.querySelector('#apellido').value === '' || document.querySelector('#apellido').value === null) {
        formData.delete('apellido');
    }

    const url = 'http://localhost/PonsLabor/Registro/setUser';

    try {
        const res = await fetch(url, {
            method: 'POST',
            body: formData
        })
        const { statusUser, msg } = await res.json();

        if (statusUser && msg === 'ok') {
            bntSubmit.classList.add('next');
            bntSubmit.setAttribute('id', 'btn_submit-sig');
            bntSubmit.removeEventListener('click', validateFormUser)
            bntSubmit.textContent = 'Siguiente';
            formUser.reset();
            swal("Usuario", "Para continuar debe de confirmar su cuenta a través de su correo electronico. Gracias por preferir nuestros servicios :)", "success");

            $("#btn_submit-sig").click(function (e) {
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

        } else {
            swal("Error", msg, "error");//mostrar la alerta
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}
