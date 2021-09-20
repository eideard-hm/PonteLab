/**
 * En este archivo se escribir la logica para hacer los procesos crud relacionados
 * con el rol del aspirante.
 */
/*-----------------------------------------------------------------------------
                    Importaciones
------------------------------------------------------------------------------*/
import { sweetAlert, lockIconRegister, changeNameBtn, formDataElement, campos } from './functionsGlobals.js';

/*-----------------------------------------------------------------------------
                    Declaración de variables globales
------------------------------------------------------------------------------*/
//formularios
const formDescripcionPersonal = document.querySelector('#info-persona');
const formPuestoInteres = document.getElementById('perfil-laboral');
const formIdioma = document.querySelector('#idiomas');
const formHabilidad = document.querySelector('#habilidades');
//botones



/*-----------------------------------------------------------------------------
                    Descripción personal
------------------------------------------------------------------------------*/
/**
 * Función para guardar los datos de la información personal del aspirante
 * @returns success si se inserto correctamente o error si ocurrio un error
 * @author Edier Heraldo Hernández Molano
 */
const saveDataAspirante = async () => {
    tinyMCE.triggerSave();
    const formData = new FormData(formDescripcionPersonal);
    const url = `${base_url}Aspirante/setAspirante`;

    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        })
        const { status, msg, value } = await req.json();
        if (!status) {
            sweetAlert("Error", msg, "error");
            return false;
        } else {
            sweetAlert("Aspirante", msg, "success");
            formDescripcionPersonal.reset();
            changeNameBtn('Aspirante')
            lockIconRegister('Aspirante');

            //función para cargar los datos que acaba de ingresar el usuario
            showPersonalDescription(value)
        }
    } catch (error) {
        sweetAlert("Error", error, "error");
    }
}

const loadDataEditPersonalDescription = async (e) => {
    tinyMCE.triggerSave();
    const id = e.target.dataset.idaspirante;
    const url = `${base_url}Aspirante/getOneDataAspirante/${id}`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (status) {
            document.querySelector('#idAspirante').value = data.idAspirante;
            document.querySelector('#especificaciones').value = data.descripcionPersonalAspirante;
            document.querySelector('#txtEstado').value = data.idEstadoLaboralAspiranteFK;
            tinymce.activeEditor.setContent(data.descripcionPersonalAspirante);
        }
    } catch (error) {
        sweetAlert("Error", error, "error");
    }
}

/**
 * Función para renderizar la descripción personal del aspirante
 * 
 * @param {object} data  Datos que se va a renderizar en la vista luego de que el usuario los registre
 */
const showPersonalDescription = (data) => {
    const perfilLaboralAspirante = document.querySelector('#perfil-laboral-aspirante');

    perfilLaboralAspirante.innerHTML = `
        <div class="col-11">
            ${data.descripcionPersonalAspirante}
        </div>
        <a class="btn col-1 text-right" role="button" id="edit-Aspirante">
            <i class="las la-pen" data-toggle="modal" data-target="#informacion-personal" data-idaspirante="${data.idAspirante}"></i>
        </a>
    `;
}

/*-----------------------------------------------------------------------------
                    Puesto interés
------------------------------------------------------------------------------*/
const listPuestoInteres = new Set();

const seleccionarPuestoInteres = e => {
    if (e.target.tagName === 'LI') {
        if (e.target.classList.contains('active')) {
            listPuestoInteres.delete(e.target.dataset.id);
            e.target.classList.remove('active');
            document.querySelector('#txtPuesto').value = [...listPuestoInteres];
        } else {
            listPuestoInteres.add(e.target.dataset.id);
            e.target.classList.add('active');
            document.querySelector('#txtPuesto').value = [...listPuestoInteres];
        }
    }
}

//insertar el puesto de interes desde el input
const insertPuestoInteres = async (e) => {
    e.preventDefault();
    const formData = new FormData(formPuestoInteres);
    const url = `${base_url}Aspirante/savePuestoInteres`;

    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });
        const { status, msg, data } = await req.json();
        if (status) {
            await refreshPuestoInteres();
            formPuestoInteres.reset();
            document.querySelector('#grupo-puesto-otro_puesto').checked = true;
            mostrarInputOtroPuestoInteres();
            swal("Puesto interes", msg, "success");
            document.querySelectorAll('#list_PuestoInteres li').forEach(item => {
                if (parseInt(item.dataset.id) === parseInt(data)) {
                    item.classList.add('active');
                    item.classList.add('disabled');
                    item.removeEventListener('click', seleccionarPuestoInteres)
                }
            })
            listPuestoInteres.delete(data);
            document.querySelector('.btn-disable').removeAttribute('disabled');
        } else {
            swal("Error", msg, "warning");
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}

//insertar el puesto de interes desde el select
const insertPuestoInteresAspirante = async () => {

    if (document.getElementById('txtPuesto').value.trim() === '') {
        swal("Campo obligatorio", "Por favor, seleccione un puesto de interés !!", "info");
    } else {

        const formData = new FormData(formPuestoInteres);
        const url = `${base_url}Aspirante/insertPuestoInteresAspirante`;

        try {
            const req = await fetch(url, {
                method: 'POST',
                body: formData
            });
            const { status, msg } = await req.json();
            if (status) {
                sweetAlert("Puesto interes aspirante", msg, "success");
                siguientePagina('-50%');
            } else {
                sweetAlert("Error", msg, "error");
            }
        } catch (error) {
            sweetAlert("Error", error, "error");
        }
    }
}

const refreshPuestoInteres = async (e) => {
    const selectListPuestoInteres = document.querySelector('#list_PuestoInteres');
    const url = `${base_url}Aspirante/getAllPuestoInteres`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (status) {
            selectListPuestoInteres.innerHTML = '';
            data.forEach(item => {
                selectListPuestoInteres.innerHTML += `
                    <li data-id="${item['idPuestoInteres']}">${item['nombrePuesto']}</li>
                `;
            });
        } else {
            swal("Error", data, "error");
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}

document.querySelector('#boton_add_puesto').addEventListener('click', (e) => {
    insertPuestoInteres(e)
    refreshPuestoInteres(e)
});

/*-----------------------------------------------------------------------------
                    Idiomas
------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------
                    Habilidades
------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------
                    Educación
------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------
                    Experiencia laboral
------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------
                    Validación antes de enviar el formulario
------------------------------------------------------------------------------*/

const validateFormPersonalInformation = async (e) => {
    e.preventDefault();
    tinyMCE.triggerSave();
    if (document.querySelector('#especificaciones').value === '' || document.querySelector('#txtEstado').value === '') {
        sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
    } else {
        await saveDataAspirante();
    }
}

/**
 * Función que sirve para verificar si el usuario ya tiene información registrada y cargarla a la vista
 */
const loadPersonalDescription = async () => {
    const url = `${base_url}Aspirante/getDataAspirante`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (status) {
            showPersonalDescription(data[0]);
            lockIconRegister('Aspirante');
        }
    } catch (error) {
        sweetAlert("Error", error, "error");
    }
}

/*-----------------------------------------------------------------------------
                    Declaración de eventos
------------------------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', async () => {
    await loadPersonalDescription();
    if (document.querySelector('#edit-Aspirante')) {
        document.querySelector('#edit-Aspirante').addEventListener('click', (e) => loadDataEditPersonalDescription(e));
    }
})

/**
 * Evento que se ejecuta cuando se le da en enviar al formulario de descripción personal
 */
formDescripcionPersonal.addEventListener('submit', validateFormPersonalInformation);
