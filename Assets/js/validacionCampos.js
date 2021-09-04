/*
===================== MOVIEMIENTO ENTRE PÁGINAS =============================
*/
//seleccionar los elementos
const movPagina = document.querySelector(".movPag");
//seleccionar los botones
const enviar = document.querySelector(".enviar");
const sigPagina = document.querySelectorAll('.siguiente');

/*
===================== VALIDACIÓN DE FORMULARIO =============================
*/
const inputsInfoPersona = document.querySelectorAll('#info-persona .contenedor-grupo input');
const inputsPuestoInteres = document.querySelectorAll('#perfil-laboral .contenedor-grupo input');
const inputsEstudios = document.querySelectorAll('#estudios .contenedor-grupo input');
const inputsExperienciaLaboral = document.querySelectorAll('#experiencia-laboral .contenedor-grupo input');
const inputsIdiomas = document.querySelectorAll('#idiomas .contenedor-grupo input');
const inputsHabilidades = document.querySelectorAll('#habilidades .contenedor-grupo input');

const checkOtroPuestoInteres = document.querySelector('#grupo-puesto-otro_puesto');
const inputOtroPuestoInteres = document.getElementById('grupo-otro_puesto_interes');
const checkOtroIdioma = document.querySelector('#grupo-puesto-otro_idioma');

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{3,50}$/, // Letras y espacios, pueden llevar acentos.    
    // telefono: /^\d{7,10}$/, // 7 a 10 numeros.
    idioma: /^[a-zA-ZÀ-ÿ\s]{1,50}$/,
    puntuacion: /^[a-zA-ZÀ-ÿ\s]{1,50}/,
    // perfil: /^[a-zA-ZÀ-ÿ\s0-9]{4,1000}/,
}

const campos = {
    institucion: false,
    titulo: false,
    empresa: false,
    otro_puesto_interes: false,
    funcion: false,
    idioma: false,
    habilidad: false
}

//crear la función para validar el formulario
const validarFormulario = (e) => {
    switch (e.target.name) {
        case "txtInstitucion":
            validarCampo(expresiones.nombre, e.target, 'institucion');
            break;
        case "txtTitulo":
            validarCampo(expresiones.nombre, e.target, 'titulo');
            break;
        case "txtEmpresa":
            validarCampo(expresiones.nombre, e.target, 'empresa');
            break;
        case "txtOtroPuesto":
            validarCampo(expresiones.nombre, e.target, 'otro_puesto_interes');
            break;
        case "txtIdioma":
            validarCampo(expresiones.idioma, e.target, 'idioma');
            break;
        case "txtHabilidad":
            validarCampo(expresiones.puntuacion, e.target, 'habilidad');
            break;
    }
}

//función para reutilizar código

const validarCampo = (expresion, input, campo) => {
    //validar y comparar con la expresión regualar
    //test(), sirve para comparar dos cosas
    if (expresion.test(input.value)) {
        const tipoInput = document.getElementById(`grupo-${campo}`);
        tipoInput.classList.add('correcto');
        tipoInput.classList.remove('incorrecto');
        //quitar el icono de error y poner el de exito
        const estadoInput = document.querySelector(`#grupo-${campo} .estado-input`);
        estadoInput.classList.remove('fa-times-circle');
        estadoInput.classList.add('fa-check-circle');

        //quitar la leyenda
        const leyenda = document.querySelector(`#grupo-${campo} .leyenda-input`);
        leyenda.classList.remove('active');
        campos[campo] = true;
    } else {
        const tipoInput = document.getElementById(`grupo-${campo}`);
        tipoInput.classList.remove('correcto');
        tipoInput.classList.add('incorrecto');

        //quitar el icono de check y poner el de erro
        const estadoInput = document.querySelector(`#grupo-${campo} .estado-input`);
        estadoInput.classList.add('fa-times-circle');
        estadoInput.classList.remove('fa-check-circle');

        //mostrar la leyenda
        const leyenda = document.querySelector(`#grupo-${campo} .leyenda-input`);
        leyenda.classList.add('active');

        campos[campo] = false;
    }
}

//recorrer los inputs
inputsInfoPersona.forEach(input => {
    // console.log(input);
    //por cada input recorrio vamos a agregar un evento
    /*
    *Evento 'keyup', se ejecuta cada vez que el usuario oprime un tecla y la suelta
    *Evento 'blur', se ejecuta cada vez que se da click fuera del input
    */
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

inputsPuestoInteres.forEach(input => {
    // console.log(input);
    //por cada input recorrio vamos a agregar un evento
    /*
    *Evento 'keyup', se ejecuta cada vez que el usuario oprime un tecla y la suelta
    *Evento 'blur', se ejecuta cada vez que se da click fuera del input
    */
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

inputsEstudios.forEach(input => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

inputsExperienciaLaboral.forEach(input => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

inputsIdiomas.forEach(input => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

inputsHabilidades.forEach(input => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
})

if (document.getElementById('grupo-otro_puesto')) {
    document.getElementById('grupo-otro_puesto').addEventListener('click', () => {
        mostrarInputOtroPuestoInteres();
    });
}
if (document.getElementById('grupo-otro_idioma')) {
    document.getElementById('grupo-otro_idioma').addEventListener('click', () => {
        mostrarInputOtroIdioma();
    });
}

const mostrarInputOtroPuestoInteres = () => {
    if (checkOtroPuestoInteres.checked) {
        inputOtroPuestoInteres.style.display = 'block';
        document.querySelector('#boton_add_puesto').style.display = 'block';
        document.querySelector('.btn-disable').setAttribute('disabled', 'disabled')
    } else {
        inputOtroPuestoInteres.style.display = 'none';
        document.querySelector('#boton_add_puesto').style.display = 'none';
        document.querySelector('.btn-disable').removeAttribute('disabled');
    }
}

const mostrarInputOtroIdioma = () => {
    if (checkOtroIdioma.checked) {
        document.getElementById('grupo-idioma-otro_idioma').style.display = 'block';
        document.getElementById('txtIdioma').style.display = 'block';

        document.getElementById('grupo-idioma-idioma').style.display = 'none';
        document.getElementById('txtListIdioma').style.display = 'none';

        document.getElementById('boton_add_idioma').style.display = 'block';
        document.getElementById('agregar_idioma').style.display = 'none';
    } else {
        document.getElementById('grupo-idioma-otro_idioma').style.display = 'none';
        document.getElementById('txtIdioma').style.display = 'none';

        document.getElementById('grupo-idioma-idioma').style.display = 'block';
        document.getElementById('txtListIdioma').style.display = 'block';

        document.getElementById('boton_add_idioma').style.display = 'none';
        document.getElementById('agregar_idioma').style.display = 'block';

        document.getElementById(`grupo-idioma`).classList.remove('incorrecto');
        //quitar la leyenda
        document.querySelector('#grupo-idioma .leyenda-input').classList.remove('active');
    }
}

/*
=================== CÓDIGO PARA LAS ANIMACIONES DEL HEADER =========================
*/

const parrafo = document.querySelectorAll(".paso p");
const numero = document.querySelectorAll(".paso .num");
const icono = document.querySelectorAll(".paso .check");
let contador = 0;

/* ======================== PÁGINA 1 ================== */

//función para ejecutar la alertar
const sweetAlert = (titulo, cuerpo, boton) => {
    swal({
        title: titulo,
        text: cuerpo,
        icon: boton,
    });
}

/* ======================== FUNCIÓN PARA IR ADELANTE ================== */
sigPagina.forEach(boton => {
    boton.addEventListener('click', e => {
        e.preventDefault();
        if (boton.classList.contains('sig-p2')) {
            tinyMCE.triggerSave();
            if (document.querySelector('#especificaciones').value === '' || document.querySelector('#txtEstado').value === '') {
                sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
            } else {
                swal({
                    title: "¿ Esta seguro de querer continuar ?",
                    text: "Señor/a aspirante después de aceptar continuar no va a poder regresar para cambiar algun dato. Por favor asegurese de que sean correctos.",
                    icon: "info",
                    buttons: ["Esperar", "Continuar"]
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            saveDataAspirante();
                        }
                    });
            }
        } else if (boton.classList.contains('sig-p3')) {
            if (inputOtroPuestoInteres.style.display === 'block') {
                if (campos.otro_puesto_interes === false) {
                    sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
                }
            } else if (inputOtroPuestoInteres.style.display === 'none' || inputOtroPuestoInteres.style.display === '') {
                swal({
                    title: "¿ Esta seguro de querer continuar ?",
                    text: "Señor/a aspirante después de aceptar continuar no va a poder regresar para cambiar algun dato. Por favor asegurese de que sean correctos.",
                    icon: "info",
                    buttons: ["Esperar", "Continuar"]
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            insertPuestoInteresAspirante();
                        }
                    });
            }

        } else if (boton.classList.contains('sig-p6')) {
            if (document.getElementById('txtIdioma').style.display === 'block') {
                if (campos.idioma === false) {
                    sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
                }
            } else if (document.getElementById('txtIdioma').style.display === 'none' || document.getElementById('txtIdioma').style.display === '') {
                swal({
                    title: "¿ Esta seguro de querer continuar ?",
                    text: "Señor/a aspirante después de aceptar continuar no va a poder regresar para agregar un nuevo idioma. Por favor asegurese que haya agregado lo que considera pertinentes.",
                    icon: "info",
                    buttons: ["Esperar", "Continuar"]
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            siguientePagina('-75%');
                        }
                    });
            }
        }
    })
})

const siguientePagina = valor => {
    movPagina.style.marginLeft = valor;
    numero[contador].classList.add('active');
    icono[contador].classList.add('active');
    parrafo[contador].classList.add('active');
    contador += 1;
}

//enviar los datos
if (enviar) {
    enviar.addEventListener('click', e => {
        e.preventDefault();
        if (campos.habilidad === false) {
            sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
        }
    })
}


