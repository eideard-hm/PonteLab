/**
 * En este archivo se escribir la logica para hacer los procesos crud relacionados
 * con el rol del aspirante.
 */
/*-----------------------------------------------------------------------------
                    Importaciones
------------------------------------------------------------------------------*/
import {
    sweetAlert, lockIconRegister, changeNameBtn, formDataElement, mostrarInputOtroPuestoInteres,
    inputOtroPuestoInteres, campos, mostrarInputOtroIdioma, mostrarInputOtraHabilidad, initTextEditorTinymce,
    unLockIconRegister
}
    from './functionsGlobals.js';

/*-----------------------------------------------------------------------------
                    Declaración de variables globales
------------------------------------------------------------------------------*/
//formularios
const formDescripcionPersonal = document.querySelector('#info-persona');
const formPuestoInteres = document.getElementById('perfil-laboral');
const formIdioma = document.querySelector('#form-idiomas');
const formHabilidad = document.querySelector('#form-habilidades');
const formEstudios = document.getElementById('estudios');
const experienciaLaboral = document.getElementById('form-experiencia-laboral');
//botones

const listSelectIdiomas = document.getElementById('select-idiomas-list');
const listSelectHabilidades = document.getElementById('select-habilidad-list');
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
            changeNameBtn('Aspirante')
            lockIconRegister('Aspirante');

            //función para cargar los datos que acaba de ingresar el usuario
            await loadPersonalDescription();
        }
    } catch (error) {
        console.error(error);
    }
}

/**
 * Función para cargar los datos del aspirante que se van a poder editar.
 * 
 * @param {Event} e Información donde se desencadena el evento 
 */
const loadDataEditPersonalDescription = async (e) => {
    initTextEditorTinymce('especificaciones');
    const id = e.target.dataset.idaspirante;
    const url = `${base_url}Aspirante/getOneDataAspirante/${id}`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (status) {
            document.querySelector('#idAspirante').value = data.idAspirante;
            tinymce.activeEditor.setContent(data.descripcionPersonalAspirante);
            document.querySelector('#especificaciones').value = data.descripcionPersonalAspirante;
            document.querySelector('#txtEstado').value = data.idEstadoLaboralAspiranteFK;
        }
    } catch (error) {
        console.error(error);
    }
}

/**
 * Función para renderizar la descripción personal del aspirante
 * 
 * @param {object} data  Datos que se va a renderizar en la vista luego de que el usuario los registre
 */
const showPersonalDescription = async (data) => {
    const perfilLaboralAspirante = document.querySelector('#perfil-laboral-aspirante');

    perfilLaboralAspirante.innerHTML = `
        <div class="row d-flex align-items-center justify-content-around">                                     
            <div class="col-11">
                ${data.descripcionPersonalAspirante}
            </div>
            <a class="btn col-1 text-right" role="button" id="edit-Aspirante">
                <i class="las la-pen" data-toggle="modal" data-target="#informacion-personal" data-idaspirante="${data.idAspirante}"></i>
            </a>
        </div>
        <div class="row col-12">
            <h6 data-id="${data.idEstadoLaboral}">Estado laboral actual: <strong>${data.nombreEstado}</strong></h6>
        </div>
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

/**
 * Función que sirve para insertar el puesto de interes desde el input
 * @param {Event} e 
 */
const insertPuestoInteres = async (e) => {
    e.preventDefault();
    const formData = formDataElement(formPuestoInteres);
    const url = `${base_url}Aspirante/savePuestoInteres`;

    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });
        const { status, msg, data } = await req.json();
        if (status) {
            sweetAlert("Puesto interes", msg, "success");
            formPuestoInteres.reset();
            await refreshPuestoInteres();
            document.querySelector('#grupo-puesto-otro_puesto').checked = true;
            mostrarInputOtroPuestoInteres();
            document.querySelectorAll('#list_PuestoInteres li').forEach(item => {
                if (parseInt(item.dataset.id) === parseInt(data)) {
                    item.classList.add('active');
                    item.classList.add('disabled');
                }
            })
            document.querySelector('#data-idPuestoInteres i').classList.replace('la-plus', 'la-pen');
            listPuestoInteres.delete(data);
        } else {
            sweetAlert("Error", msg, "warning");
        }
    } catch (error) {
        console.error(error);
    }
}

/**
 * Función que sirve para insertar el puesto de interes desde el select
 * @returns {Promise<any>}
*/
const insertPuestoInteresAspirante = async () => {

    if (document.getElementById('txtPuesto').value.trim() === '') {
        sweetAlert("Campos obligatorio", "Por favor, seleccione un puesto de interés !!", "info");
    } else {

        const formData = formDataElement(formPuestoInteres);
        const url = `${base_url}Aspirante/insertPuestoInteresAspirante`;

        try {
            const req = await fetch(url, {
                method: 'POST',
                body: formData
            });
            const { status, msg } = await req.json();
            if (status) {
                sweetAlert("Puesto interes aspirante", msg, "success");
                await refreshPuestoInteres();
                formPuestoInteres.reset();
            } else {
                sweetAlert("Error", msg, "error");
            }
        } catch (error) {
            console.error(error);
        }
    }
}

/**
 * Función que sirve para renderizar la lista de puestos de interes dentro de la pagina modal
 * 
 * @param {Event} e Información donde se producio el evento
 */
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
            await showPuestoInteres();
        }
    } catch (error) {
        console.error(error);
    }
}

/**
 * Función que se encarga de renderizar en la página de perfil la lista de puesto seleccionados por el 
 * usuario
 */
const showPuestoInteres = async () => {
    const puestoInteres = document.getElementById('puesto-interes-aspirante');
    const url = `${base_url}Aspirante/getPuestoInteresAspirante`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (status) {
            if (document.querySelector('#data-idPuestoInteres i')) {
                document.querySelector('#data-idPuestoInteres i').classList.replace('la-plus', 'la-pen');
            }
            puestoInteres.innerHTML = '';
            data.forEach(puesto => {
                puestoInteres.innerHTML += `
                    <div class="row d-flex align-items-center justify-content-around">
                        <div class="col-11">
                            ${puesto.nombrePuesto}
                        </div>
                        <a class="btn col-1 text-right" role="button">
                            <i class="las la-pen" data-toggle="modal" data-target="#puesto-interes" data-idPuestoInteres="${puesto.idPuestoInteresFK}"></i>
                        </a>
                    </div>
                `;
            })
        } else {
            puestoInteres.innerHTML = `
                                        <p class="text-center">No hay puestos de interés asociados al usuario. Puedes registrarlo, es gratis. </p>
                                    `;
        }
    } catch (error) {
        console.error(error);
    }
}

/*-----------------------------------------------------------------------------
                    Idiomas
------------------------------------------------------------------------------*/
let arrObjIdiomas = [];

const seleccionarIdioma = async () => {
    const formData = formDataElement(formIdioma);
    const valoresAceptados = /^[0-9]+$/;
    let existeIdioma = false;
    let strNombreIdiomas = '';
    let arrNombreIdiomas = [];

    document.querySelectorAll('#txtListIdioma .opciones-idiomas').forEach(option => {
        if ((option.selected) && (formData.get('txtNivelIdioma') !== null) && (option.value !== '' && option.disabled === false)) {
            existeIdioma = arrObjIdiomas.some(item => item.nombre === option.value);
            if (existeIdioma) {
                swal("Error", "Aspirante ya tiene asociado este idioma.", "warning");
            }

            arrObjIdiomas.push(
                {
                    nombre: option.value,
                    nivel: formData.get('txtNivelIdioma')
                }
            )

            arrObjIdiomas.forEach(idioma => strNombreIdiomas += `${idioma.nombre}-`);
            arrNombreIdiomas = strNombreIdiomas.split('-');
            arrNombreIdiomas.forEach(item => {
                if (valoresAceptados.test(item)) {
                    document.querySelector('#idSelectIdioma').value = item;
                }
            })
            document.querySelector('#nivelIdioma').value = formData.get('txtNivelIdioma');

            option.classList.add('active');
            option.setAttribute('disabled', 'disabled');
            formIdioma.reset();
        } else {
            if (!option.classList.contains('active')) {
                option.classList.remove('active');
                option.removeAttribute('disabled');
            }
        }
    })

    listSelectIdiomas.innerHTML = '';
    document.querySelector('#nivelIdioma').value = '';
    arrObjIdiomas.forEach(item => {
        if (item !== '') {
            if (!(valoresAceptados.test(item))) {
                document.querySelector('#nivelIdioma').value = `${item['nivel']}`;
                listSelectIdiomas.innerHTML += `
                    <li>${item['nombre']} ---- <b>${item['nivel']}</b></li>
                `;
            }
        }
    })

    await insertIdiomaAspirante();
}

document.querySelector('#agregar_idioma').addEventListener('click', seleccionarIdioma);

/**
 * insertar los elementos que vienen desde la lista
*/
const insertIdiomaAspirante = async () => {
    const url = `${base_url}Aspirante/setIdiomaAspirante`;
    const formData = formDataElement(formIdioma);
    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });

        const { status, msg } = await req.json();

        if (status) {
            sweetAlert("Idioma aspirante", msg, "success");
            await refreshIdiomasAspirante();
            formIdioma.reset();
        } else {
            sweetAlert("Error", msg, "warning");
        }
    } catch (error) {
        console.error(error);
    }
}

/**
 * Insertar el elemento que viene desde el input
*/
const insertNewIdioma = async () => {
    const url = `${base_url}Aspirante/setIdioma`;
    const formData = formDataElement(formIdioma);
    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });

        const { status, msg, id } = await req.json();
        if (status) {
            // listIdiomas.add(id);
            sweetAlert("Idioma", msg, "success");
            await refreshIdiomasAspirante();
            formIdioma.reset();
            document.querySelectorAll('#txtListIdioma option').forEach(item => {
                if (parseInt(item.dataset.id) === parseInt(id)) {
                    item.classList.add('active', 'disabled');
                    item.setAttribute('disabled', 'disabled');
                }
            })
            document.querySelector('#grupo-puesto-otro_idioma').checked = true;
            mostrarInputOtroIdioma();
        } else {
            sweetAlert("Error", msg, "warning");
        }
    } catch (error) {
        console.error(error);
    }
}

/**
 * Función que se encarga de traer toda la lista de idiomas de la base de datos y posteriormente 
 * mostrarlas en el select
 */
const refreshIdiomasAspirante = async () => {
    const url = `${base_url}Aspirante/getAllIdiomas`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (status) {
            document.querySelector('#txtListIdioma').innerHTML = '<option value="" disabled selected>Seleccione un idioma</option>';
            data.forEach(item => {
                document.querySelector('#txtListIdioma').innerHTML += `
                    <option data-id="${item['idIdioma']}" value="${item['idIdioma']}-${item['nombreIdioma']}" class="opciones-idiomas">${item['nombreIdioma']}</option>
                `;
            });
            await showIdiomasSelected();
        } else {
            document.querySelector('#txtListIdioma').innerHTML += `
                    <option value="" disable selected>--Ha ocurrido un error al cargar la lista de idiomas --</option>
                `;
        }
    } catch (error) {
        console.error(error);
    }
}

/**
 * Función que se encarga de renderizar en la página de perfil la lista de idiomas seleccionados por el 
 * usuario
 */
const showIdiomasSelected = async () => {
    const listIdiomas = document.getElementById('idiomas-selected');
    const url = `${base_url}Aspirante/getIdiomasSelected`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (status && data !== 'no') {
            if (document.querySelector('#data-idIdiomas i')) {
                document.querySelector('#data-idIdiomas i').classList.replace('la-plus', 'la-pen');
            }
            listIdiomas.innerHTML = '';
            data.forEach(idioma => {
                listIdiomas.innerHTML += `
                <div class="d-flex align-items-center justify-content-around mb-2">
                    <div class="col-6 d-flex justify-content-between">
                        <span>${idioma.nombreIdioma}</span>
                        <span>${idioma.nivelIdioma}</span>
                    </div>
                    <a class="btn col-6 text-right" role="button" data-idestudio="${idioma.idIdioma}">
                        <i class="las la-pen" data-toggle="modal" data-target="#idiomas"></i>
                    </a>    
                </div>
                <hr/>
                `;
            })
        } else {
            listIdiomas.innerHTML = `
                                        <p class="text-center">No hay idiomas asociados al usuario. Puedes registrarlo, es gratis.</p>
                                    `;
        }
    } catch (error) {
        console.error(error);
    }
}

/*-----------------------------------------------------------------------------
                    Habilidades
------------------------------------------------------------------------------*/
let arrObjHabilidad = [];

const seleccionarHabilidad = async () => {
    const setIdIdioma = new Set();
    const formData = new FormData(formHabilidad);
    const valoresAceptados = /^[0-9]+$/;
    let existeHabilidad = false;
    let strNombrehabilidad = '';
    let arrNombreHabilidad = [];

    document.querySelectorAll('#txtListHabilidad .opciones-habilidad').forEach(option => {
        if ((option.selected) && (formData.get('txtNivelHabilidades') !== null) && (option.value !== '' && option.disabled === false)) {
            existeHabilidad = arrObjHabilidad.some(item => item.nombre === option.value);
            if (existeHabilidad) {
                swal("Error", "Aspirante ya tiene asociado este idioma.", "warning");
            }

            arrObjHabilidad.push(
                {
                    nombre: option.value,
                    nivel: formData.get('txtNivelHabilidades')
                }
            )

            arrObjHabilidad.forEach(idioma => strNombrehabilidad += `${idioma.nombre}-`);
            arrNombreHabilidad = strNombrehabilidad.split('-');
            arrNombreHabilidad.forEach(item => {
                if (valoresAceptados.test(item)) {
                    document.querySelector('#idSelectHabilidad').value = item;
                }
            })
            document.querySelector('#nivelHabilidad').value = formData.get('txtNivelHabilidades');

            option.classList.add('active');
            option.setAttribute('disabled', 'disabled');
        } else {
            if (!option.classList.contains('active')) {
                option.classList.remove('active');
                option.removeAttribute('disabled');
            }
        }
    })

    listSelectHabilidades.innerHTML = '';
    document.querySelector('#nivelHabilidad').value = '';
    arrObjHabilidad.forEach(item => {
        if (item !== '') {
            if (!(valoresAceptados.test(item))) {
                document.querySelector('#nivelHabilidad').value = `${item['nivel']}`;
                listSelectHabilidades.innerHTML += `
                    <li>${item['nombre']} ---- <b>${item['nivel']}</b></li>
                `;
            }
        }
    })

    await inserHabilidadAspirante();
}

document.querySelector('#agregar_habilidad').addEventListener('click', seleccionarHabilidad);

/**
 * insertar los elementos que vienen desde la lista
*/
const inserHabilidadAspirante = async () => {
    const url = `${base_url}Aspirante/setHabilidadAspirante`;
    const formData = formDataElement(formHabilidad);

    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });

        const { status, msg } = await req.json();

        if (status) {
            sweetAlert("Habilidad aspirante", msg, "success");
            await refreshHabilidadAspirante();
            formHabilidad.reset();
        } else {
            sweetAlert("Error", msg, "warning");
        }
    } catch (error) {
        console.error(error);
    }
}

/**
 * Función que sirve para insertar la habilidad que viene desde el input
 */
const insertHabilidad = async () => {
    const url = `${base_url}Aspirante/setHabilidad`;
    const formData = formDataElement(formHabilidad);
    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });

        const { status, msg, id } = await req.json();
        if (status) {
            // listIdiomas.add(id);
            sweetAlert("Habilidad aspirante", msg, "success");
            await refreshHabilidadAspirante();
            document.querySelectorAll('#txtListHabilidad option').forEach(item => {
                if (parseInt(item.dataset.id) === parseInt(id)) {
                    item.classList.add('active', 'disabled');
                    item.setAttribute('disabled', 'disabled');
                }
            })
            document.querySelector('#grupo-puesto-otra_habilidad').checked = true;
            mostrarInputOtraHabilidad();
        } else {
            pintarPuntuacion(listaHabilidades, arrListaIdiomas);
            sweetAlert("Error", msg, "warning");
        }
    } catch (error) {
        sweetAlert("Error", error, "error");
    }
}

/**
 * Muestra la lista de todas las habilidades registradas en la base de datos y que puede seleccionar el usuario
 */
const refreshHabilidadAspirante = async () => {
    const url = `${base_url}Aspirante/getAllHabilidades`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (status) {
            document.querySelector('#txtListHabilidad').innerHTML = '<option value="" disabled selected>Seleccione una habilidad</option>';
            data.forEach(item => {
                document.querySelector('#txtListHabilidad').innerHTML += `
                    <option data-id="${item['idHabilidad']}" value="${item['idHabilidad']}-${item['nombreHabilidad']}" class="opciones-habilidad">${item['nombreHabilidad']}</option>
                `;
            });
            await showHabilidadSelected();
        } else {
            document.querySelector('#txtListHabilidad').innerHTML += `
                    <option value="" disabled selected>-- No se ha podido cargar la lista de habilidades. --</option>
                `;
        }
    } catch (error) {
        console.log(error)
    }
}

/**
 * Función que se encarga de renderizar en la página de perfil la lista de habilidades seleccionadas por el 
 * usuario
 */
const showHabilidadSelected = async () => {
    const listHabilidades = document.getElementById('list-habilidades-selected');
    const url = `${base_url}Aspirante/getHabilidadesSelected`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (status && data !== 'no') {
            if (document.querySelector('#data-idHabilidades i')) {
                document.querySelector('#data-idHabilidades i').classList.replace('la-plus', 'la-pen');
            }
            listHabilidades.innerHTML = '';
            data.forEach(habilidad => {
                listHabilidades.innerHTML += `
                <div class="d-flex align-items-center justify-content- mb-2">
                    <div class="col-6 d-flex justify-content-between" data-id="${habilidad.idHabilidad}">
                        <span>${habilidad.nombrehabilidad}</span>
                        <span>${habilidad.nivelHabilidad}</span>
                    </div>
                    <a class="btn col-6 text-right" role="button">
                        <i class="las la-pen" data-toggle="modal" data-target="#habilidades"></i>
                    </a>
                </div>
                <hr/>
                `;
            })
        } else {
            listHabilidades.innerHTML = `
                                        <p class="text-center">No hay habilidades asociadas al usuario. Puedes registrarlo, es gratis.</p>
                                    `;
        }
    } catch (error) {
        console.error(error);
    }
}

/*-----------------------------------------------------------------------------
                    Educación
------------------------------------------------------------------------------*/

const insertEstudio = async () => {
    const formData = formDataElement(formEstudios);
    const url = `${base_url}Aspirante/insertEstudios`;
    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });
        const { status, msg } = await req.json();
        if (status) {
            sweetAlert('Estudios aspirante', msg, 'success');
            await showEstudios();
            formEstudios.reset();
        } else {
            sweetAlert("Error", msg, "warning");
        }
    } catch (error) {
        console.error(error);
    }
}

/**
 * Función que se encarga de renderizar en la página de perfil la lista de estudios registrados por el usuario.
 */
const showEstudios = async () => {
    const listEstudios = document.getElementById('list-estudios');
    const url = `${base_url}Aspirante/getEstudiosAspirante`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (status && data !== 'no') {
            // lockIconRegister('Educacion')
            listEstudios.innerHTML = '';
            data.forEach(estudio => {
                listEstudios.innerHTML += `
                <div class="d-flex align-items-center justify-content-around mb-2">
                    <div class="col-8">
                        <h5>${estudio.nombreInstitucion}</h5>
                        <h6>${estudio.nombreGrado}</h6>
                        <span>${estudio.tituloObtenido}</span>
                        <br />
                        <span>${estudio.nombreSector}</span>
                        <br>
                        <span>${estudio.añoInicio} / ${estudio.mesInicio} - ${estudio.añoFin} / ${estudio.mesFin}</span>
                    </div>
                    <a class="btn col-4 text-right estudio-aspirante" role="button" data-idestudio="${estudio.idEstudio}">
                        <i class="las la-pen" data-toggle="modal" data-target="#educacion" data-idestudio="${estudio.idEstudio}"></i>
                    </a>
                </div>
                <hr/>
                `;
            })
        } else {
            listEstudios.innerHTML = `
                                        <p class="text-center">No hay estudios asociados al usuario. Puedes registrarlo, es gratis.</p>
                                    `;
        }
    } catch (error) {
        console.error(error);
    }
}

/**
 * Función para cargar los datos de los estudios que se van a poder editar.
 * 
 * @param {Event} e Información donde se desencadena el evento 
 */
const loadDataEditEducation = async (e) => {
    const id = e.target.dataset.idestudio;
    const url = `${base_url}Aspirante/getEstudiosAspiranteEdit/${id}`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (status) {
            document.querySelector('#idEducacion').value = data.idEstudio;
            document.querySelector('#input-institucion').value = data.nombreInstitucion;
            document.querySelector('#input-titulo').value = data.tituloObtenido;
            document.querySelector('#txtCiudad').value = data.idCiudadEstudio;
            document.querySelector('#txtGradoEst').value = data.idGrado;
            document.querySelector('#txtSector').value = data.idSector;
            document.querySelector('#txtAnioIni').value = data.añoInicio;
            document.querySelector('#txtMesIni').value = data.mesInicio;
            document.querySelector('#txtAnioFin').value = data.añoFin;
            document.querySelector('#txtMesFin').value = data.mesFin;
        }
    } catch (error) {
        console.error(error);
    }
}

/*-----------------------------------------------------------------------------
                    Experiencia laboral
------------------------------------------------------------------------------*/
const insertExperienciaLaboral = async () => {
    tinyMCE.triggerSave();
    const formData = formDataElement(experienciaLaboral);
    const url = `${base_url}Aspirante/insertExperiencia`;

    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });
        const { status, msg } = await req.json();
        if (status) {
            sweetAlert('Experiencia laboral aspirante', msg, 'success');
            await showExperienciaLaboral();
            experienciaLaboral.reset();
        } else {
            sweetAlert("Experiencia laboral aspirante", msg, "warning");
        }
    } catch (error) {
        console.error(error);
    }
}

/**
 * Función que se encarga de renderizar en la página de perfil la lista de experiencia registrados por el usuario.
 */
const showExperienciaLaboral = async () => {
    const listExperiencia = document.getElementById('list-experiencia');
    const url = `${base_url}Aspirante/getExperienciaAspirante`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (status && data !== 'no') {
            listExperiencia.innerHTML = '';
            data.forEach(experiencia => {
                listExperiencia.innerHTML += `
                <div class="d-flex align-items-center justify-content-around mb-2">                              
                    <div class="col-11">
                        <h5>${experiencia.nombrePuestoDesempeño}</h5>
                        <p>${experiencia.empresaLaboro}</p>
                        <span>${experiencia.mesInicio} ${experiencia.añoInicio} - ${experiencia.mesFin} ${experiencia.añoFin}</span>
                        <p>${experiencia.nombreSector}</p>
                        <h6>Funciones desempeñadas:</h6>
                        ${experiencia.funcionDesempeño}
                    </div>
                    <a class="btn col-1 text-right estudio-experiencia" role="button" data-idexperiencia="${experiencia.idInfoLaboral}">
                        <i class="las la-pen" data-toggle="modal" data-target="#experiencia-laboral" data-idexperiencia="${experiencia.idInfoLaboral}"></i>
                    </a>
                </div>
                <hr/>
                `;
            })
        } else {
            listExperiencia.innerHTML = `
                                        <p class="text-center">No hay experiencia laboral asociada al usuario. Puedes registrarla, es gratis.</p>
                                    `;
        }
    } catch (error) {
        console.error(error);
    }
}

/**
 * Función para cargar los datos de la experiencia laboral que se van a poder editar.
 * 
 * @param {Event} e Información donde se desencadena el evento 
 */
const loadDataEditExperience = async (e) => {
    initTextEditorTinymce('funciones');
    const id = e.target.dataset.idexperiencia;
    const url = `${base_url}Aspirante/getExperienciaAspiranteEdit/${id}`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (status) {
            document.querySelector('#idExperiencia').value = data.idInfoLaboral;
            document.querySelector('#txtEmpresa').value = data.empresaLaboro;
            document.querySelector('#txtSectorExp').value = data.idSector;
            document.querySelector('#txtCiudadLab').value = data.idCiudadLaboroFK;
            document.querySelector('#txtTipoExp').value = data.idTipoExperiencia;
            document.querySelector('#txtPuestoDesempeñado').value = data.nombrePuestoDesempeño;
            document.querySelector('#txtAnioIniExp').value = data.añoInicio;
            document.querySelector('#txtMesIniExp').value = data.mesInicio;
            document.querySelector('#txtAnioFinExp').value = data.añoFin;
            document.querySelector('#txtMesFinExp').value = data.mesFin;
            tinymce.activeEditor.setContent(data.funcionDesempeño);
            document.querySelector('#funciones').value = data.funcionDesempeño;
        }
    } catch (error) {
        console.error(error);
    }
}
/*-----------------------------------------------------------------------------
                    Validación antes de enviar el formulario
------------------------------------------------------------------------------*/
/**
 * Función sirve para validar que los campos que provienen del formulario de aspirante no vengan vacios
 * 
 * @param {Event} e Información de donde se produce el envento
 * @author Edier Heraldo Hernández Molano
 */
const validateFormPersonalInformation = async (e) => {
    e.preventDefault();
    tinyMCE.triggerSave();
    if (document.querySelector('#especificaciones').value === '' || document.querySelector('#txtEstado').value === '') {
        sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
    } else {
        await saveDataAspirante();
    }
}

if (document.getElementById('grupo-otro_puesto')) {
    document.getElementById('grupo-otro_puesto').addEventListener('click', () => {
        mostrarInputOtroPuestoInteres();
    });
}
if (document.getElementById('grupo-otra_habilidad')) {
    document.getElementById('grupo-otra_habilidad').addEventListener('click', () => {
        mostrarInputOtraHabilidad();
    });
}

if (document.getElementById('grupo-otro_idioma')) {
    document.getElementById('grupo-otro_idioma').addEventListener('click', () => {
        mostrarInputOtroIdioma();
    });
}

/**
 * Función que sirve para validar la información que proviene del formulario de puesto de interés
 * 
 * @param {Event} e Información de donde se produce el envento
 * @author Edier Heraldo Hernández Molano
 */
const validateFormPuestoInteres = async (e) => {
    e.preventDefault();
    if (inputOtroPuestoInteres.style.display === 'block') {
        if (campos.otro_puesto_interes === false) {
            sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
        }
    } else {
        await insertPuestoInteresAspirante();
    }
}

/**
 * Función que sirve para verificar si el usuario ya tiene información registrada y cargarla a la vista
 */
const loadPersonalDescription = async () => {
    const personalDescription = document.querySelector('#perfil-laboral-aspirante');
    const url = `${base_url}Aspirante/getDataAspirante`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        /**
         * if status is true, then the user already register personal description
         */
        if (status && data !== 'no') {
            showPersonalDescription(data);
            lockIconRegister('Aspirante');
            unLockIconRegister('PuestoInteres');
            unLockIconRegister('Idiomas');
            unLockIconRegister('Habilidades');
            unLockIconRegister('Educacion');
            unLockIconRegister('Experiencia');

            //cargar los demas elementos
            /**
            * Función que se encargar de refrescar y traer todos los puestos de interes regitrados
            */
            await refreshPuestoInteres();
            await refreshIdiomasAspirante();
            await refreshHabilidadAspirante();
            await showEstudios();
            await showExperienciaLaboral();
        } else {
            lockIconRegister('PuestoInteres');
            lockIconRegister('Idiomas');
            lockIconRegister('Habilidades');
            lockIconRegister('Educacion');
            lockIconRegister('Experiencia');

            personalDescription.innerHTML = `
                                                <p class="text-center">No se ha registrado ninguna descripción personal para esta usuario</p>
                                            `;
        }
    } catch (error) {
        console.error(error);
    }
}

const validateFormIdiomas = (e) => {
    e.preventDefault();
    if (document.getElementById('txtIdioma').style.display == 'block') {
        if (campos.idioma === false) {
            sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
        } else {
            insertNewIdioma();
        }
    }
}

const validateFormHabilidad = (e) => {
    e.preventDefault();
    if (document.getElementById('txtHabilidad').style.display === 'block') {
        if (campos.habilidad === false) {
            sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
        } else {
            insertHabilidad();
        }
    }
}

const validateFormEstudios = (e) => {
    e.preventDefault();
    const nombreInstitucion = document.getElementById('input-institucion');
    const tituloObtenido = document.getElementById('input-titulo');
    const ciudad = document.getElementById('txtCiudad');
    const gradoEstudio = document.getElementById('txtGradoEst');
    const sector = document.getElementById('txtSector');
    const anioInicio = document.getElementById('txtAnioIni');
    const mesInicio = document.getElementById('txtMesIni');
    const anioFin = document.getElementById('txtAnioFin');
    const mesFin = document.getElementById('txtMesFin');

    if (nombreInstitucion.value.trim() === '' || tituloObtenido.value.trim() === '' || ciudad.value.trim() === ''
        || gradoEstudio.value.trim() === '' || sector.value.trim() === '' || anioInicio.value.trim() === '' || mesInicio.value.trim() === ''
        || anioFin.value.trim() === '' || mesFin.value.trim() === '') {
        sweetAlert("Error", "Todos los campos son obligatorios!!", "error");
    } else if (parseInt(anioFin.value) < parseInt(anioInicio.value)) {
        sweetAlert("Datos incorrectos", "Apreciado usuario el año de finalización de sus estudios no puede ser menor al año de inicio.", "warning");
    } else if ((parseInt(anioInicio.value) === parseInt(anioFin.value) &&
        parseInt(mesInicio.value) > parseInt(mesFin.value))) {
        sweetAlert("Datos incorrectos", "Apreciado usuario el mes de finalización de sus estudios no puede ser menor al mes de inicio.", "warning");
    } else {
        insertEstudio();
    }
}

const validateFormExperienciaLaboral = (e) => {
    e.preventDefault();
    tinyMCE.triggerSave();
    const empresa = document.getElementById('txtEmpresa');
    const sectorLaboro = document.getElementById('txtSectorExp');
    const ciudad = document.getElementById('txtCiudadLab');
    const tipoExperiencia = document.getElementById('txtTipoExp');
    const puestoDesempeño = document.getElementById('txtPuestoDesempeñado');
    const anioInicio = document.getElementById('txtAnioIniExp');
    const mesInicio = document.getElementById('txtMesIniExp');
    const anioFin = document.getElementById('txtAnioFinExp');
    const mesFin = document.getElementById('txtMesFinExp');
    const funcionDesempeño = document.getElementById('funciones');

    if (empresa.value.trim() === '' || sectorLaboro.value.trim() === '' || ciudad.value.trim() === ''
        || tipoExperiencia.value.trim() === '' || puestoDesempeño.value.trim() === '' || anioInicio.value.trim() === '' || mesInicio.value.trim() === ''
        || anioFin.value.trim() === '' || mesFin.value.trim() === '' || funcionDesempeño.value === '') {
        sweetAlert("Error", "Todos los campos son obligatorios!!", "error");
    } else if (parseInt(anioFin.value) < parseInt(anioInicio.value)) {
        sweetAlert("Datos incorrectos", "Apreciado usuario el año de finalización laboral no puede ser menor al año de inicio.", "warning");
    } else if ((parseInt(anioInicio.value) === parseInt(anioFin.value) &&
        parseInt(mesInicio.value) > parseInt(mesFin.value))) {
        sweetAlert("Datos incorrectos", "Apreciado usuario el mes de finalización laboral no puede ser menor al mes de inicio.", "warning");
    } else {
        insertExperienciaLaboral();
    }
}

/*-----------------------------------------------------------------------------
                    Declaración de eventos
------------------------------------------------------------------------------*/
/**
 * Evento que se ejecutar a lo que esta cargada completamente la página
 */
document.addEventListener('DOMContentLoaded', async () => {
    /**
     * Función que se encarga de cargar la información del aspirante
     */
    await loadPersonalDescription();

    if (document.querySelector('#edit-Aspirante')) {
        document.querySelector('#edit-Aspirante').addEventListener('click', (e) => loadDataEditPersonalDescription(e));
    }

    /**
     * Función que permite seleccionar los puestos de interés para el aspirante
     */
    if (document.querySelector('#list_PuestoInteres')) {
        const listSectores = document.querySelector('#list_PuestoInteres');
        listSectores.addEventListener('click', e => {
            seleccionarPuestoInteres(e);
        });
    }

    if (document.querySelector('.estudio-aspirante')) {
        document.querySelectorAll('.estudio-aspirante').forEach(element => element.addEventListener('click', (e) => loadDataEditEducation(e)));
    }

    if (document.querySelector('.estudio-experiencia')) {
        document.querySelectorAll('.estudio-experiencia').forEach(element => element.addEventListener('click', (e) => loadDataEditExperience(e)));
    }
})

/**
 * Evento que se ejecuta cuando se le da en enviar al formulario de descripción personal
 */
formDescripcionPersonal.addEventListener('submit', validateFormPersonalInformation);

formIdioma.addEventListener('submit', validateFormIdiomas);

formHabilidad.addEventListener('submit', validateFormHabilidad);

formEstudios.addEventListener('submit', validateFormEstudios);

experienciaLaboral.addEventListener('submit', validateFormExperienciaLaboral);

document.querySelector('#boton_add_puesto').addEventListener('click', insertPuestoInteres);

document.querySelector('#btn-puesto-interes').addEventListener('click', validateFormPuestoInteres);

/**
    * Inicializar el editor de texto
*/
if (document.querySelector('#data-idAspirante')) {
    document.querySelector('#data-idAspirante').addEventListener('click', () => {
        initTextEditorTinymce('especificaciones');
        formDescripcionPersonal.reset();
    })
}
if (document.querySelector('#data-idExperiencia')) {
    document.querySelector('#data-idExperiencia').addEventListener('click', () => initTextEditorTinymce('funciones'));
}