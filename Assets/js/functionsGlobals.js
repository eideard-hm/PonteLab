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
 * Función para bloquear y desbloquear los iconos de editar y modificar
 * 
 * @param {string} formulario Nombre que tiene el data-id de cada icono de las diferentes secciones
 */

const lockIconRegister = (formulario) => {
    document.querySelector(`#data-id${formulario}`).style.display = 'none';
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

export {
    sweetAlert,
    lockIconRegister,
    changeNameBtn,
    formDataElement,
    campos
}
