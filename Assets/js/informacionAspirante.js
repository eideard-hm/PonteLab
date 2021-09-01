//variables constante de los elementos html
const estrellasNivelHabilidad = document.querySelectorAll('.nivel-hab');
const botonAgregarPuntuacion = document.querySelectorAll('.boton_add_puntuacion');
const listaIdiomas = document.querySelector('#lista_idiomas');
const listaHabilidades = document.querySelector('#lista_habilidades');
const template = document.querySelector('#template-lista_puntuacion').content;
const fragment = document.createDocumentFragment();
const estrellas = document.querySelectorAll('.estrellas .puntuacion');
const listSelectIdiomas = document.getElementById('select-idiomas-list');
//formularios
const formInfoPersona = document.querySelector('#info-persona');
const formPuestoInteres = document.getElementById('perfil-laboral');
const formIdioma = document.querySelector('#idiomas');


let arrListaIdiomas = [];
let arrListaHabilidades = [];
let i = 1;

const listIdiomas = new Set();
const selectIdiomas = new Set();

document.addEventListener('DOMContentLoaded', () => {
    routesAspirante();
    refreshIdiomasAspirante();
    refreshPuestoInteres();

    if (document.querySelector('#list_PuestoInteres')) {
        const listSectores = document.querySelector('#list_PuestoInteres');
        listSectores.addEventListener('click', e => seleccionarPuestoInteres(e));
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
    if (data.get(`txt${name}`) === '') {
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
        insertHabilidad(data);
        pintarPuntuacion(listaHabilidades, arrListaHabilidades);
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

const seleccionarIdioma = () => {
    document.querySelectorAll('#txtListIdioma .opciones-idiomas').forEach(option => {
        if (option.selected) {
            selectIdiomas.add(option.value);
        }
    })
    let strSelectIdiomas = '';
    const setIdIdioma = new Set();
    const valoresAceptados = /^[0-9]+$/;

    [...selectIdiomas].forEach(idioma => strSelectIdiomas += idioma + '-')

    const arrIdiomas = strSelectIdiomas.split('-')
    listSelectIdiomas.innerHTML = '';
    arrIdiomas.forEach(item => {
        if (item !== '') {
            if (valoresAceptados.test(item)) {
                setIdIdioma.add(item)
                document.querySelector('#idSelectIdioma').value = [...setIdIdioma];
            }

            if (!(valoresAceptados.test(item))) {
                listSelectIdiomas.innerHTML += `
                    <li>${item}</li>
                `;
            }
        }
    })
}

if (listSelectIdiomas) {
    document.querySelector('#txtListIdioma').addEventListener('change', seleccionarIdioma)
}

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
        } else {
            listPuestoInteres.add(e.target.dataset.id);
            e.target.classList.add('active');
        }
    }
    console.log(listPuestoInteres)
}

document.querySelector('#btn-puesto-interes').addEventListener('click', e => {
    e.preventDefault();
    document.querySelector('#txtPuesto').value = [...listPuestoInteres];
})

//insertar el puesto de interes desde el input
const insertPuestoInteres = async (e) => {
    e.preventDefault();
    const namePuesto = document.querySelector('#txtOtroPuesto');

    //validar que el campo no venga vació
    if (namePuesto.value.trim() === '' || namePuesto.value.length <= 3) {
        sweetAlert("Campos obligatorios!!", "Atención, debe de rellenar correctamente el campo.", "warning");
        return false;
    } else {
        const formData = new FormData(formPuestoInteres);

        const url = `${base_url}Aspirante/savePuestoInteres`;

        try {
            const req = await fetch(url, {
                method: 'POST',
                body: formData
            });
            const { status, msg } = await req.json();

            if (status) {
                refreshPuestoInteres();
                formPuestoInteres.reset();
                document.querySelector('#grupo-puesto-otro_puesto').checked = true;
                mostrarInputOtroPuestoInteres();
                swal("Puesto interes", msg, "success");
                document.querySelector('.btn-disable').removeAttribute('disabled');
            } else {
                swal("Error", msg, "warning");
            }
        } catch (error) {
            swal("Error", error, "error");
        }
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
                swal({
                    title: "Puesto de interes",
                    text: msg,
                    icon: "success",
                    buttons: ["Ok", "Continuar"],
                    dangerMode: false,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            siguientePagina('-50%');
                        } else {
                            siguientePagina('-50%');
                        }
                    });
            } else {
                sweetAlert("Error", msg, "error");
            }
        } catch (error) {
            sweetAlert("Error", error, "error");
        }
    }
}

const refreshPuestoInteres = async () => {
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

document.querySelector('#boton_add_puesto').addEventListener('click', (e) => insertPuestoInteres(e));
document.querySelector('#boton_add_puesto').addEventListener('click', (e) => refreshPuestoInteres);

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
listSelectIdiomas.addEventListener('click', insertIdiomaAspirante);

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
            listIdiomas.add(id);
            swal("Idioma", msg, "success");
            array.push(puntuacion);
            form.reset();
            puntuacionEstrellas(0, campo);
            pintarPuntuacion(listaIdiomas, arrListaIdiomas);
            refreshIdiomasAspirante();
            document.querySelector('#grupo-puesto-otro_idioma').checked = true;
            mostrarInputOtroIdioma();
        } else {
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
                    <option value="${item['idIdioma']}-${item['nombreIdioma']}" class="opciones-idiomas">${item['nombreIdioma']}</option>
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

const insertHabilidad = async (formData) => {
    // formData.forEach(idioma => console.log(idioma))

    const url = `${base_url}Aspirante/setHabilidad`;

    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });

        const { status, msg } = await req.json();
        if (status) {
            sweetAlert("Habilidad", msg, "success");
            arrListaHabilidades = [];
            pintarPuntuacion(listaHabilidades, arrListaHabilidades);
            mostrarInputOtroIdioma();
        } else {
            sweetAlert("Error", msg, "warning");
        }
    } catch (error) {
        sweetAlert("Error", error, "error");
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