/**
 * Declaración de variables globales
 */
const checkOtroPuestoInteres = document.querySelector('#grupo-puesto-otro_puesto');
const checkOtroIdioma = document.querySelector('#grupo-puesto-otro_idioma');
export const inputOtroPuestoInteres = document.getElementById('grupo-otro_puesto_interes');
const checkOtraHabilidad = document.querySelector('#grupo-puesto-otra_habilidad');

/**
 * Función para ejecutar una alerta de sweet alert
 * @param {string} titulo Titulo que va a tener la alerta
 * @param {string} cuerpo Mensaje que va a contener la alerta
 * @param {string} boton El tipo de alerta, ejm: success, error, warning, info
 * @author Edier Heraldo Hernández Molano
 */
const sweetAlert = (titulo, cuerpo, boton) => {
    swal({
        title: titulo,
        text: cuerpo,
        icon: boton,
    });
}

/**
 * Función para bloquear los iconos de editar y modificar
 * 
 * @param {string} formulario Nombre que tiene el data-id de cada icono de las diferentes secciones
 */

const lockIconRegister = (formulario) => {
    document.querySelector(`#data-id${formulario}`).style.display = 'none';
}

/**
 * Función para desbloquear los iconos de editar y modificar
 * 
 * @param {string} formulario Nombre que tiene el data-id de cada icono de las diferentes secciones
 */

const unLockIconRegister = (formulario) => {
    document.querySelector(`#data-id${formulario}`).style.display = 'block';
}

/**
 * Función para cambiar el nombre del boton de cancelar a cerrar cuando se haya registrado la información
 * 
 * @param {string} formulario Nombre de la ventana a la cual va a cambiar el nombre
 */
const changeNameBtn = (formulario) => {
    document.querySelector(`.change-name-btn-${formulario}`).textContent = 'Cerrar';
}

/**
 * Función para crear objetos del tipo FormData
 * 
 * @param {Element} form Elemento de formulario del cual se quiere crear el objeto
 */
const formDataElement = (form) => {
    return new FormData(form);
}

/**
 * Función que sirve para mostrar u ocultar el input para agregar un nuevo puesto interés 
 */
const mostrarInputOtroPuestoInteres = () => {
    if (checkOtroPuestoInteres.checked) {
        inputOtroPuestoInteres.style.display = 'block';
        document.querySelector('#boton_add_puesto').style.display = 'block';
        document.querySelector('#btn-puesto-interes').style.display = 'none';
    } else {
        inputOtroPuestoInteres.style.display = 'none';
        document.querySelector('#boton_add_puesto').style.display = 'none';
        document.querySelector('#btn-puesto-interes').style.display = 'block';
    }
}

/**
 * Función que sirve para mostrar u ocultar el input para agregar un nuevo idioma
 */
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

/**
 * Función que sirve para mostrar u ocultar el input para agregar nueva habilidad
 */
const mostrarInputOtraHabilidad = () => {
    if (checkOtraHabilidad.checked) {
        document.getElementById('grupo-idioma-otra_habilidad').style.display = 'block';
        document.getElementById('txtHabilidad').style.display = 'block';

        document.getElementById('grupo-idioma-habilidad').style.display = 'none';
        document.getElementById('txtListHabilidad').style.display = 'none';

        document.getElementById('boton_add_habilidad').style.display = 'block';
        document.getElementById('agregar_habilidad').style.display = 'none';
    } else {
        document.getElementById('grupo-idioma-otra_habilidad').style.display = 'none';
        document.getElementById('txtHabilidad').style.display = 'none';

        document.getElementById('grupo-idioma-habilidad').style.display = 'block';
        document.getElementById('txtListHabilidad').style.display = 'block';

        document.getElementById('boton_add_habilidad').style.display = 'none';
        document.getElementById('agregar_habilidad').style.display = 'block';

        document.getElementById(`grupo-habilidad`).classList.remove('incorrecto');
        //quitar la leyenda
        document.querySelector('#grupo-habilidad .leyenda-input').classList.remove('active');
    }
}

/**
 * Función que sirve para implementar el sistema de puntuación mediante estrellas
 * 
 * @param {Number} puntuacion Valor de la puntuación que proviene desde la vista
 * @param {String} campo Sirve para identificar a que campo se le va a aplicar el efecto de la puntuación
 */
const puntuacionEstrellas = (puntuacion, campo) => {
    for (let i = 1; i <= 5; i++) {
        if (i <= puntuacion) {
            document.getElementById(`${i}${campo}`).classList.add('active');
        } else {
            document.getElementById(`${i}${campo}`).classList.remove('active');
        }
    }
}

const estrellas = document.querySelectorAll('.estrellas .puntuacion');

estrellas.forEach(elemento => {
    elemento.addEventListener('click', e => {
        if (e.target.classList.contains('idioma')) {
            puntuacionEstrellas(e.target.id[0], 'idioma');
        } else if (e.target.classList.contains('habilidad')) {
            puntuacionEstrellas(e.target.id[0], 'habi');
        }
    })
})

/**
 * Función que sirve para inicializar el editor de texto dentro del sitio
 * 
 * @param {string} selector Elemento al cual se le va a aplicar o inializar el editor 
 */
const initTextEditorTinymce = (selector) => {
    if (document.querySelector(`#${selector}`)) {
        tinymce.init({
            selector: `#${selector}`,
            language: 'es',
            encoding: 'UTF-8',
            entity_encoding: 'raw',
            width: "100%",
            height: 300,
            statubar: true,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
        });
    }
}


/**
 * Función para validar los campos de los formularios
 */
const inputsPuestoInteres = document.querySelectorAll('#perfil-laboral .contenedor-grupo input');
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
    institucion: false,
    titulo: false,
    empresa: false,
    puesto: false,
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
        case "txtPuesto":
            validarCampo(expresiones.nombre, e.target, 'puesto');
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

inputsPuestoInteres.forEach(input => {
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

export {
    sweetAlert,
    lockIconRegister,
    unLockIconRegister,
    changeNameBtn,
    formDataElement,
    mostrarInputOtroPuestoInteres,
    mostrarInputOtroIdioma,
    mostrarInputOtraHabilidad,
    initTextEditorTinymce,
    campos
}
