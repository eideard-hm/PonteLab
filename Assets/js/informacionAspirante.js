const estrellasNivelHabilidad = document.querySelectorAll('.nivel-hab');
const botonAgregarPuntuacion = document.querySelectorAll('.boton_add_puntuacion');
const listaIdiomas = document.querySelector('#lista_idiomas');
const listaHabilidades = document.querySelector('#lista_habilidades');
const template = document.querySelector('#template-lista_puntuacion').content;
const fragment = document.createDocumentFragment();
const estrellas = document.querySelectorAll('.estrellas .puntuacion');
let arrListaIdiomas = [];
let arrListaHabilidades = [];
let i = 1;
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
===================== INICIALIZAR EL EDITOR DE TEXTO =============================
*/

const quill = new Quill('#editor', {
    theme: 'snow'
});

/*
===================== AGREGAR LISTA DE PUNTUACION =============================
*/

botonAgregarPuntuacion.forEach(puntuacion => {
    puntuacion.addEventListener('click', e => {
        e.preventDefault();
        if (campos.idioma === false) {
            sweetAlert("Campos obligatorios!", "Se debe  rellenar todos lo campos. Todos son obligatorios!", "error");
        } else {
            if (e.target.classList.contains('boton_add_idioma')) {
                setPuntuacion(idiomas, 'Idioma', 'idioma', arrListaIdiomas);
            } else if (e.target.classList.contains('boton_add_habilidad')) {
                setPuntuacion(habilidades, 'Habilidades', 'habi', arrListaHabilidades);
            }
        }
    })
})

const setPuntuacion = (form, name, campo, array) => {
    const data = new FormData(form);
    //crear un objeto
    const puntuacion = {
        nombre: data.get(`txt${name}`),
        puntuacion: data.get(`txtNivel${name}`)
    }

    array.push(puntuacion);
    form.reset();
    puntuacionEstrellas(0, campo);

    if (name === 'Idioma') {
        pintarPuntuacion(listaIdiomas, arrListaIdiomas);
    } else if (name === 'Habilidades') {
        pintarPuntuacion(listaHabilidades, arrListaHabilidades);
    }
}

const pintarPuntuacion = (lista, array) => {
    lista.innerHTML = '';
    array.map(puntuacion => {
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
            if (element.nombre === e.target.dataset.name) {
                swal({
                    title: `Eliminar ${campo} ${element.nombre}`,
                    text: `¿ Esta seguro de eliminar el campo ${campo} ${element.nombre} ?`,
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
                            swal(`No has eliminado el campo ${campo} ${element.nombre}`, "Sus datos estan ha salvo!", "success");
                        }
                    });
            }
        })
    }
}