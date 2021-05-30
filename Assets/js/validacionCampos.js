/*
===================== MOVIEMIENTO ENTRE PÁGINAS =============================
*/
//seleccionar los elementos
const movPagina = document.querySelector(".movPag");
//seleccionar los botones
const enviar = document.querySelector(".enviar");
const sigPagina = document.querySelectorAll('.siguiente');
const antPagina = document.querySelectorAll('.atras');

/*
===================== VALIDACIÓN DE FORMULARIO =============================
*/
const infoPersona = document.getElementById('info-persona');
const perfilLaboral = document.getElementById('perfil-laboral');
const estudios = document.getElementById('estudios');

const idiomas = document.getElementById('idiomas');
const habilidades = document.getElementById('habilidades');

const inputsInfoPersona = document.querySelectorAll('#info-persona .contenedor-grupo input');
const inputsEstudios = document.querySelectorAll('#estudios .contenedor-grupo input');
const inputsExperienciaLaboral = document.querySelectorAll('#experiencia-laboral .contenedor-grupo input');
const inputsIdiomas = document.querySelectorAll('#idiomas .contenedor-grupo input');
const inputsHabilidades = document.querySelectorAll('#habilidades .contenedor-grupo input');


const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{3,50}$/, // Letras y espacios, pueden llevar acentos.    
    // telefono: /^\d{7,10}$/, // 7 a 10 numeros.
    idioma: /^[a-zA-ZÀ-ÿ\s]{1,50}$/,
    puntuacion: /^[a-zA-ZÀ-ÿ\s]{1,50}/,
    // perfil: /^[a-zA-ZÀ-ÿ\s0-9]{4,1000}/,
}

const campos = {
    nombre: false,
    apellido: false,
    institucion: false,
    titulo: false,
    empresa: false,
    puesto: false,
    funcion: false,
    idioma: false,
    habilidad: false
}

//crear la función para validar el formulario
const validarFormulario = (e) => {
    switch (e.target.name) {
        case "txtNombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
            break;
        case "txtApellido":
            validarCampo(expresiones.nombre, e.target, 'apellido');
            break;
        case "txtInstitucion":
            validarCampo(expresiones.nombre, e.target, 'institucion');
            break;
        case "txtTitulo":
            validarCampo(expresiones.nombre, e.target, 'titulo');
            break;
        case "txtEmpresa":
            validarCampo(expresiones.nombre, e.target, 'empresa');
            break;
        case "txtPuesto":
            validarCampo(expresiones.nombre, e.target, 'puesto');
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
            if (campos.nombre === false || campos.apellido === false) {
                sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
            } else {
                siguientePagina('-25%');
            }
        } else if (boton.classList.contains('sig-p3')) {
            let contenidoEditorTexto = quill.container.firstChild.innerHTML;
            if (contenidoEditorTexto === '<p><br></p>' || contenidoEditorTexto === '') {
                sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
            } else {
                siguientePagina('-50%');
            }
        } else if (boton.classList.contains('sig-p4')) {
            if (campos.institucion === false || campos.titulo === false) {
                sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
            }
        } else if (boton.classList.contains('sig-p5')) {
            let contenidoEditorTexto = quill.container.firstChild.innerHTML;
            if (campos.empresa === false || campos.puesto === false || contenidoEditorTexto === '<p><br></p>' || contenidoEditorTexto === '') {
                sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
            }
        } else if (boton.classList.contains('sig-p6')) {
            if (campos.idioma === false) {
                sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
            } else {
                siguientePagina('-75%');
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

antPagina.forEach(boton => {
    boton.addEventListener('click', e => {
        e.preventDefault();
        if (boton.classList.contains('atras-p1')) {
            anteriorPagina('0%');
        } else if (boton.classList.contains('atras-p4')) {
            anteriorPagina('-25%')
        } else if (boton.classList.contains('atras-p5')) {
            anteriorPagina('-50%')
        }
    })
})

const anteriorPagina = valor => {
    movPagina.style.marginLeft = valor;
    numero[contador - 1].classList.remove('active');
    icono[contador - 1].classList.remove('active');
    parrafo[contador - 1].classList.remove('active');
    contador -= 1;
}

//enviar los datos
enviar.addEventListener('click', e => {
    e.preventDefault();
    if (campos.habilidad === false) {
        sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
    }
    // let data = new FormData(habilidades);
    // console.log(data.get('txtHabilidad'))
    // console.log(data.get('nivel_habilidad'))
})