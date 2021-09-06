//variables constante de los elementos html
const estrellasNivelHabilidad = document.querySelectorAll('.nivel-hab');
const botonAgregarPuntuacion = document.querySelectorAll('.boton_add_puntuacion');
const listaIdiomas = document.querySelector('#lista_idiomas');
const listaHabilidades = document.querySelector('#lista_habilidades');
const template = document.querySelector('#template-lista_puntuacion').content;
const fragment = document.createDocumentFragment();
const estrellas = document.querySelectorAll('.estrellas .puntuacion');
const listSelectIdiomas = document.getElementById('select-idiomas-list');
const listSelectHabilidades = document.getElementById('select-habilidad-list');
//formularios
const formInfoPersona = document.querySelector('#info-persona');
const formPuestoInteres = document.getElementById('perfil-laboral');
const formIdioma = document.querySelector('#idiomas');
const formHabilidad = document.querySelector('#habilidades');


let arrListaIdiomas = [];
let arrListaHabilidades = [];
let i = 1;

const listIdiomas = new Set();
const selectIdiomas = new Set();

document.addEventListener('DOMContentLoaded', () => {
    routesAspirante();
    refreshIdiomasAspirante();
    refreshPuestoInteres();
    refreshHabilidadAspirante();

    if (document.querySelector('#list_PuestoInteres')) {
        const listSectores = document.querySelector('#list_PuestoInteres');
        listSectores.addEventListener('click', e => {
            seleccionarPuestoInteres(e);
        });
    }
})

/*
===================== SISTEMA DE ESTRELLAS =============================
*/
const puntuacionEstrellas = (puntuacion, campo) => {
    for (i = 1; i <= 5; i++) {
        if (i <= puntuacion) {
            document.getElementById(`${i}${campo}`).classList.add('active');
        } else {
            document.getElementById(`${i}${campo}`).classList.remove('active');
        }
    }
}

estrellas.forEach(elemento => {
    elemento.addEventListener('click', e => {
        if (e.target.classList.contains('idioma')) {
            puntuacionEstrellas(e.target.id[0], 'idioma');
        } else if (e.target.classList.contains('habilidad')) {
            puntuacionEstrellas(e.target.id[0], 'habi');
        }
    })
})

/*
===================== AGREGAR LISTA DE PUNTUACION =============================
*/

botonAgregarPuntuacion.forEach(puntuacion => {
    puntuacion.addEventListener('click', e => {
        e.preventDefault();
        if (e.target.classList.contains('boton_add_idioma')) {
            setPuntuacion(idiomas, 'Idioma', 'idioma', arrListaIdiomas);
        } else if (e.target.classList.contains('boton_add_habilidad')) {
            setPuntuacion(habilidades, 'Habilidades', 'habi', arrListaHabilidades);
        }
    })
})

const setPuntuacion = async (form, name, campo, array) => {
    const data = new FormData(form);

    if (data.get(`txt${name}`) === '' || data.get(`txtNivel${name}`) === null) {
        swal("Error", "Debe de ingresar el nombre del idioma y el nivel considera tiene del mismo.", "warning");
        return false;
    }
    //crear un objeto
    const puntuacion = {
        nombre: data.get(`txt${name}`),
        puntuacion: data.get(`txtNivel${name}`)
    }

    if (name === 'Idioma') {
        insertNewIdioma(data, puntuacion, campo, array, form);
    } else if (name === 'Habilidades') {
        insertHabilidad(data, puntuacion, campo, array, form);
    }
}

const pintarPuntuacion = (lista, array = []) => {
    lista.innerHTML = '';
    array.forEach(puntuacion => {
        const clone = template.cloneNode(true);
        clone.querySelector(`.contenedor-grupo__lista #contenedor-grupo__p`).textContent = puntuacion.nombre;
        clone.querySelector(`.contenedor-grupo__icono #contenedor-grupo__puntuacion`).textContent = puntuacion.puntuacion;
        clone.querySelector(`.contenedor-grupo__icono .contenedor-grupo__eliminar`).dataset.name = puntuacion.nombre;
        fragment.appendChild(clone);
    })
    lista.appendChild(fragment);
}

/*
===================== ELIMINAR LISTA DE PUNTUACION =============================
*/
listaIdiomas.addEventListener('click', e => {
    eliminarPuntuacion(e, arrListaIdiomas, 'Idioma');
})

listaHabilidades.addEventListener('click', e => {
    eliminarPuntuacion(e, arrListaHabilidades, 'Habilidad');
})

const eliminarValorPuntuacion = (arr, item, campo) => {
    let i = arr.indexOf(item);

    if (i !== -1) {
        arr.splice(i, 1);
        swal(`${campo} eliminado correctamente.`, {
            icon: "success",
        });
        if (campo === 'Idioma') {
            pintarPuntuacion(listaIdiomas, arrListaIdiomas);
        } else if (campo === 'Habilidad') {
            pintarPuntuacion(listaHabilidades, arrListaHabilidades);
        }
    }
}

const eliminarPuntuacion = (e, array, campo) => {
    if (e.target.classList.contains('contenedor-grupo__eliminar')) {
        array.find(element => {
            if (element.nombre === e.target.dataset.name || element.listElementos === e.target.dataset.listElementos) {
                swal({
                    title: element.nombre ? `Eliminar ${campo} ${element.nombre}` : `Eliminar ${campo} ${element.listElementos}`,
                    text: `¿ Esta seguro de eliminar el campo ${campo} ?`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            if (array === arrListaIdiomas) {
                                eliminarValorPuntuacion(arrListaIdiomas, element, campo);
                            } else if (array === arrListaHabilidades) {
                                eliminarValorPuntuacion(arrListaHabilidades, element, campo);
                            }
                        } else {
                            swal(`No has eliminado el campo ${campo}`, "Sus datos estan ha salvo!", "success");
                        }
                    });
            }
        })
    }
}

/*
===================== LÓGICA PARA SELECCIONAR VARIOS IDIOMAS =============================
*/
//objeto que va a renderizar
let arrObjIdiomas = [];

const seleccionarIdioma = async () => {
    const setIdIdioma = new Set();
    const formData = new FormData(formIdioma);
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
            puntuacionEstrellas(0, 'idioma');
            return false;
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

/*
===================== LÓGICA CRUD ASPIRANTE =============================
*/

const saveDataAspirante = async () => {
    tinyMCE.triggerSave();
    const formData = new FormData(formInfoPersona);
    formData.delete('txtNombre');

    const url = `${base_url}Aspirante/setAspirante`;

    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        })

        const { status, msg } = await req.json();

        if (!status) {
            swal("Error", msg, "error");
            return false;
        } else {
            sweetAlert("Aspirante", msg, "success");
            siguientePagina('-25%');
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}

// formInfoPersona.addEventListener('submit', saveDataAspirante);

/*
===================== LÓGICA CRUD PUESTO INTERES =============================
*/

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

/*
===================== LÓGICA CRUD PARA INSERTAR UN NUEVO IDIOMA =============================
*/
//insertar los elementos que vienen desde la lista
const insertIdiomaAspirante = async () => {
    const url = `${base_url}Aspirante/setIdiomaAspirante`;
    const formData = new FormData(formIdioma);

    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });

        const { status, msg } = await req.json();

        if (status) {
            sweetAlert("Idioma aspirante", msg, "success");
        } else {
            sweetAlert("Error", msg, "warning");
        }
    } catch (error) {
        sweetAlert("Error", error, "error");
    }
}

//insertar el elemento que viene desde el input
const insertNewIdioma = async (formData, puntuacion, campo, array, form) => {
    const url = `${base_url}Aspirante/setIdioma`;

    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });

        const { status, msg, id } = await req.json();
        if (status) {
            // listIdiomas.add(id);
            swal("Idioma", msg, "success");
            await refreshIdiomasAspirante();
            document.querySelectorAll('#txtListIdioma option').forEach(item => {
                if (parseInt(item.dataset.id) === parseInt(id)) {
                    item.classList.add('active', 'disabled');
                    item.setAttribute('disabled', 'disabled');
                }
            })
            array.push(puntuacion);
            form.reset();
            puntuacionEstrellas(0, campo);
            pintarPuntuacion(listaIdiomas, arrListaIdiomas);
            document.querySelector('#grupo-puesto-otro_idioma').checked = true;
            mostrarInputOtroIdioma();
        } else {
            pintarPuntuacion(listaIdiomas, arrListaIdiomas);
            swal("Error", msg, "warning");
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}

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
        } else {
            swal("Error", data, "error");
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}

/*
===================== LÓGICA CRUD PARA INSERTAR UNA HABILIDAD =============================
*/

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
            formHabilidad.reset();
            puntuacionEstrellas(0, 'habi');
            return false;
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

//insertar los elementos que vienen desde la lista
const inserHabilidadAspirante = async () => {
    const url = `${base_url}Aspirante/setHabilidadAspirante`;
    const formData = new FormData(formHabilidad);

    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });

        const { status, msg } = await req.json();

        if (status) {
            sweetAlert("Habilidad aspirante", msg, "success");
        } else {
            sweetAlert("Error", msg, "warning");
        }
    } catch (error) {
        sweetAlert("Error", error, "error");
    }
}

const insertHabilidad = async (formData, puntuacion, campo, array, form) => {
    const url = `${base_url}Aspirante/setHabilidad`;

    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });

        const { status, msg, id } = await req.json();
        if (status) {
            // listIdiomas.add(id);
            swal("Idioma", msg, "success");
            await refreshHabilidadAspirante();
            document.querySelectorAll('#txtListHabilidad option').forEach(item => {
                if (parseInt(item.dataset.id) === parseInt(id)) {
                    item.classList.add('active', 'disabled');
                    item.setAttribute('disabled', 'disabled');
                }
            })
            array.push(puntuacion);
            form.reset();
            puntuacionEstrellas(0, campo);
            pintarPuntuacion(listaHabilidades, arrListaIdiomas);
            document.querySelector('#grupo-puesto-otra_habilidad').checked = true;
            mostrarInputOtraHabilidad();
        } else {
            pintarPuntuacion(listaHabilidades, arrListaIdiomas);
            swal("Error", msg, "warning");
        }
    } catch (error) {
        sweetAlert("Error", error, "error");
    }
}

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
        } else {
            swal("Error", data, "error");
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}

const routesAspirante = async () => {
    const url = `${base_url}Aspirante/routesAspirante`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        console.log(status)
        console.log(data)
        if (!status && data === 'no') {
            if (document.querySelector('.enlaces-aspirante')) {
                document.querySelectorAll('.nav .enlaces-aspirante').forEach(enlace => enlace.href = '#')
            }
        } else {
            console.log(data)
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}
