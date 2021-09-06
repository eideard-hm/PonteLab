document.addEventListener('DOMContentLoaded', async () => {
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
        listSectores.addEventListener('click', e => seleccionarSector(e));
    }
})

//Funcionalidad botones

// let current_fs, next_fs, previous_fs;
// let left, opacity, scale;
// let animating;

// $(".next").click(function (e) {
//     e.preventDefault();
//     if (animating) return false;
//     animating = true;

//     current_fs = $(this).parent();
//     next_fs = $(this).parent().next();

//     $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//     next_fs.show();

//     current_fs.animate({ opacity: 0 }, {
//         step: function (now, mx) {
//             scale = 1 - (1 - now) * 0.2;
//             left = (now * 50) + "%";
//             opacity = 1 - now;
//             current_fs.css({
//                 'transform': 'scale(' + scale + ')',
//                 'position': 'absolute'
//             });
//             next_fs.css({ 'left': left, 'opacity': opacity });
//         },
//         duration: 800,
//         complete: function () {
//             current_fs.hide();
//             animating = false;
//         },
//         easing: 'easeInOutBack'
//     });
// });

let current_fs, next_fs, previous_fs;
let left, opacity, scale;
let animating;

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

const formUser = document.querySelector('#msform');
const btnSector = document.querySelector('#btn_sector');
const bntSubmit = document.getElementById('btn_submit');
/*  FUNCIONALIDAD DEL REGISTRO SEGUN ROL SOBRE EL NOMBRE */
document.querySelector('#rol').addEventListener('change', () => {
    if (document.querySelector('#rol').value === '1') {
        document.querySelector('#nombre').placeholder = "PonteLab";
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

document.getElementById('siguiente1').addEventListener('click', validarCampos);
function validarCampos() {


    let nombre = document.querySelector('#nombre').value;
    let email = document.querySelector('#email').value;
    let password = document.querySelector('#inputPassword').value;

    let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    let validnombre = /^[a-zA-ZÀ-ÿ\s]{3,50}$/;
    let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$%*&\-\_])[A-Za-z\d$@$%*&\-\_]{8,16}$/;
    
    if (nombre === '' || email === '' || password === '') {
        swal("Ups!", "Los datos estan vacios", "error");
    }
    else if (passwordRegex.test(password)==false) {
        swal("Ups!", "La contraseña ingresada debe tener mas de 8 caracteres, mayusculas, minusculas y caracter especial", "error");
    }
    else if (validnombre.test(nombre) == false) {
        swal("Ups!", "El nombre no cumple con la especificacion", "warning");

        if (validnombre.test(nombre) == true) {
            swal("Correcto!", "Especificaciones correctas", "success");
        }
    }
    else if (emailRegex.test(email) == false) {
        swal("Ups!", "Correo invalido", "warning");

        if (emailRegex.test(email) == true) {
            swal("Correcto!", "Email Valido", "success");
        }
    }
    else {
        $(".next").click(function (e) {
            e.preventDefault();
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            swal("Correcto!", "Siguiente para continuar con el formulario", "success");
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
        // }else{      
        //   sigForm();
        // }    
    }
}


document.getElementById('siguiente2').addEventListener('click', validarCamposFildset2);
function validarCamposFildset2() {

    let numDoc = document.getElementById('numDoc').value;
    let numCel = document.getElementById('numCel').value;
    let numFijo = document.getElementById('numFijo').value;

    let numDocRegex = /^\(?(\d{10})\)$/;
    let numCelRegex = /^\(?(\d{10})\)$/;
    let numFijoRegex = /^\(?(\d{7})\)$/;
    
    if (numDoc === '' || numCel === '' || numFijo === '') {
        swal("Ups!", "Los datos estan vacios", "error");
    }
    else if ((numDocRegex.test(numDoc)==false) && (numDoc.length != 10)) {
        swal("ERROR!", "El numero de documento es invalido", "error");
    }
    else if ((numCelRegex.test(numCel)==false) && (numCel.length != 10)) {
        swal("ERROR!", "El numero de celular es invalido", "error");
    }
    else if ((numFijoRegex.test(numFijo)==false) && (numFijo.length != 7)) {
        swal("ERROR!", "El numero fijo es invalio", "error");
    }
    else {
        $(".next2").click(function (e) {
            e.preventDefault();
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            swal("Correcto!", "Siguiente para continuar con el formulario", "success");
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
        // }else{      
        //   sigForm();
        // }    
    }
}




const insertUser = async () => {
    //enviar los datos mediante una petición fetch
    let formData = new FormData(formUser);
    formData.delete('pass2');
    if (document.querySelector('#apellido').value === '' || document.querySelector('#apellido').value === null) {
        formData.delete('apellido');
    }

    const url = `${base_url}Registro/setUser`;

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

const listSectores = new Set();

const seleccionarSector = async (e) => {
    if (e.target.tagName === 'LI') {
        if (e.target.classList.contains('active')) {
            listSectores.delete(e.target.dataset.id);
            e.target.classList.remove('active');
        } else {
            listSectores.add(e.target.dataset.id);
            e.target.classList.add('active');
        }
    }
}

document.querySelector('#btn_sector').addEventListener('click', e => {
    e.preventDefault();
    document.querySelector('#sectores').value = [...listSectores];
    saveSectorUser();
})

/*
- Función sirve para insertar el sector o los sectores a los usuarios. Esto es importante dado 
  que con esta información se va a poder hacer filtros o sugerencias.
*/
const saveSectorUser = async () => {
    const formData = new FormData(formUser);
    console.log(formData.get('sectores'))
    const url = `${base_url}Registro/saveSectorUser`;
    try {
        const res = await fetch(url, {
            method: 'POST',
            body: formData
        })
        const { status, msg } = await res.json();
        if (status) {
            swal("Usuario", msg, "success");
            setTimeout(() => {
                window.location.href = `${base_url}Login`;
                swal("Usuario", "No te olvides de confirmar tu cuenta a través de tu correo eletronico. Gracias por preferirnos; PonteLab tu mejor opción de bolsa de empleo.", "info");
            }, 5000)
        } else {
            swal("Error", msg, "error");
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}