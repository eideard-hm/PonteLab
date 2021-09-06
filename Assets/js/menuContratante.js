const contenedorBarraBusqueda = document.querySelector('.content-search #icon-search');
const inputBusquedaP = document.querySelector('#txtSearchPerfiles');
const barraBusqueda = document.querySelector('.content-bar-search');
const coverContenedorBusqueda = document.querySelector('#menu .cover-ctn-search');
const limpiarInputBuscador = document.querySelector('#borrar-contenido');
const listaAutocompletar = document.querySelector('.list_vacantes');

let contenedorCardsPerfiles = document.getElementById('contenedor card');
// let contenedorCardsAspirantes = document.getElementById('contenedor-card');

let arrNombrePerfiles = new Set();
let arregloSugerenciasPerfiles = [];

// const switchBtn = document.getElementById('filtro');

// document.addEventListener('DOMContentLoaded', () => {
//     routesAspirante();
// })

/*=========================== BUSCADOR VACANTE =========================*/
if (contenedorBarraBusqueda) {
    contenedorBarraBusqueda.addEventListener('click', () => {
        mostrarBarraBusqueda();
    });
}

if (coverContenedorBusqueda) {
    coverContenedorBusqueda.addEventListener('click', () => {
        ocultarBarraBusqueda();
    });
}

if (limpiarInputBuscador) {
    limpiarInputBuscador.addEventListener('click', () => {
        inputBusquedaP.value = '';
        inputBusquedaP.focus();
    });
}

if (barraBusqueda) {
    barraBusqueda.addEventListener('submit', e => {
        e.preventDefault();
    })
}

const mostrarBarraBusqueda = () => {
    barraBusqueda.style.top = '65px';
    barraBusqueda.style.opacity = '1';
    coverContenedorBusqueda.style.display = 'block';
    inputBusquedaP.focus();
    listaAutocompletar.style.display = 'block';
}

const ocultarBarraBusqueda = () => {
    barraBusqueda.style.top = '-10px';
    barraBusqueda.style.opacity = '0';
    coverContenedorBusqueda.style.display = 'none';
    listaAutocompletar.style.display = 'none'
}


/*============ IMPLEMENTAR BUSCADOR Y AUTOCOMPLETADO ==========*/

let indexFocus = -1;

const autocompletar = (arreglo) => {
    const inputBusquedaPerfiles = document.querySelector('#txtSearchPerfiles');

    inputBusquedaPerfiles.addEventListener('input', (e) => {
        const busquedaValue = inputBusquedaPerfiles.value.trim();
        if (e.target.value === '') {
            cerrarLista();
            return false;
        } else {
            listaAutocompletar.style.display = 'block';
        }

        //crear la lista de sugerencias
        if (arreglo.length === 0) return false;

        listaAutocompletar.innerHTML = '';
        arreglo.forEach(item => {
            const regex = new RegExp(item.substr(0, busquedaValue.length), "gi");
            const comparison = regex.test(busquedaValue)
            if (comparison) {
                listaAutocompletar.innerHTML += `
                    <li class="list_vacantes-item"><strong>${item.substr(0, busquedaValue.length)}</strong>${item.substr(busquedaValue.length)}</li>
                `;
                listaAutocompletar.addEventListener('click', e => {
                    if (e.target.tagName === 'LI') {
                        inputBusquedaPerfiles.value = e.target.textContent;
                        cerrarLista();
                        return false;
                    }
                })
            }
        })
    });

    inputBusquedaPerfiles.addEventListener('keydown', e => {
        if (listaAutocompletar) {
            const listSugeridos = listaAutocompletar.querySelectorAll('.list_vacantes-item');
            switch (e.keyCode) {
                case 40: //tecla de abajo
                    indexFocus++;
                    if (indexFocus > listSugeridos.length - 1) indexFocus = listSugeridos.length - 1;
                    break;
                case 38: //tecla de arriba
                    indexFocus--;
                    if (indexFocus < 0) indexFocus = 0;
                    break;
                case 13: //tecla de enter
                    e.preventDefault();
                    listSugeridos.forEach(item => {
                        if (item.classList.contains('active')) {
                            inputBusquedaPerfiles.value = item.textContent;
                            cerrarLista();
                        }
                    })
                    indexFocus = -1;
                    break;

                default:
                    break;
            }
            seleccionar(listSugeridos, indexFocus);
            return false;
        }
    })
}

const seleccionar = (listSugeridos, indexFocus) => {
    if (!listSugeridos || indexFocus === -1) return false;
    listSugeridos.forEach(item => item.classList.remove('active'));
    listSugeridos[indexFocus].classList.add('active');
}


const cerrarLista = () => {
    listaAutocompletar.style.display = 'none';
}

// autocompletar(["java", "react", "vue", "python", " javascript", "spring", "angular"])

/*============ TRAER LA LISTA DE VACANTES ==========*/
if (inputBusquedaP) {
    inputBusquedaP.addEventListener('input', e => {
        getArregloPerfiles(e.target.value)
    })
}

const getArregloPerfiles = async (busqueda) => {
    const url = `${base_url}Vacante/getArregloPerfiles/${busqueda}`;
    console.log(url);
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        console.log(data);
        data.forEach(perfil => {
            if (perfil['nombreUsuario'].search(inputBusquedaP) ||
            perfil['descripcionPersonalAspirante'].search(inputBusquedaP) ||
            perfil['nombreEstado'].search(inputBusquedaP))
            console.log(data)
            {
                arrNombrePerfiles.add(perfil['nombreUsuario'], perfil['descripcionPersonalAspirante']);
                arrNombrePerfiles.add(perfil['descripcionPersonalAspirante']);
            }
        });
        arregloSugerenciasPerfiles = [...arrNombrePerfiles];
        autocompletar(arregloSugerenciasPerfiles);
        contenedorCardsPerfiles.innerHTML = '';

        if (status) {
            data.forEach(perfil => {
                contenedorCardsPerfiles.innerHTML += `
                    <div class="contenedor-card">
                        <div class="contenedor-card__header contenedor-card__padding">
                            <div class="header-img">
                            <img src="http://localhost/Pontelab/Assets/img/upload.png" alt="Uplopad">
                            </div>
                            <div class="header-name">
                            <h3>${perfil['nombreUsuario']}</h3>
                            <span>${perfil['nombreEstado']}</span>
                            </div>
                        </div>
                        <div class="contenedor-card__body">
                            <p>${perfil['descripcionPersonalAspirante']}</p>
                        </div>
                        <div class="contenedor-card__footer">
                            <a href="#">Ver más</a>
                        </div>
                    </div>
                    `
            });
        } else {
            getAllPerfiles();
        }
    } catch (error) {
        console.log('Error' + error)
    }
}

const getVacantesSector = async () => {
    const url = `${base_url}Aspirante/getListAspirantes`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();

        contenedorCardsPerfiles.innerHTML = '';

        if (status) {
            data.forEach(perfil => {
                contenedorCardsPerfiles.innerHTML += `
                <div class="contenedor-card">
                    <div class="contenedor-card__header contenedor-card__padding">
                        <div class="header-img">
                        <img src="http://localhost/Pontelab/Assets/img/upload.png" alt="Uplopad">
                        </div>
                        <div class="header-name">
                        <h3>${perfil['nombreUsuario']}</h3>
                        <span>${perfil['nombreEstado']}</span>
                        </div>
                    </div>
                    <div class="contenedor-card__body">
                        <p>${perfil['descripcionPersonalAspirante']}</p>
                    </div>
                    <div class="contenedor-card__footer">
                        <a href="#">Ver más</a>
                    </div>
                </div>
                `
            });
        } else {
            getAllPerfiles();
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}


document.addEventListener('DOMContentLoaded', () => {
        getAllPerfiles();
})

const getAllPerfiles = async () => {
    const url = `${base_url}Vacante/getAllPerfiles`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();

        contenedorCardsPerfiles.innerHTML = '';

        if (status) {
            data.forEach(perfil => {
                contenedorCardsPerfiles.innerHTML += `
                <div class="contenedor-card">
                    <div class="contenedor-card__header contenedor-card__padding">
                        <div class="header-img">
                        <img src="http://localhost/Pontelab/Assets/img/upload.png" alt="Uplopad">
                        </div>
                        <div class="header-name">
                        <h3>${perfil['nombreUsuario']}</h3>
                        <span>${perfil['nombreEstado']}</span>
                        </div>
                    </div>
                    <div class="contenedor-card__body">
                        <p>${perfil['descripcionPersonalAspirante']}</p>
                    </div>
                    <div class="contenedor-card__footer">
                        <a href="#">Ver más</a>
                    </div>
                </div>
                `
            });
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}
/*
- Esta función sirve para cargar la variable de sesión que contiene los datos o la información
  del o de los sectores que el usuario selecciono para de esa forma poder hacerle recomendaciones
  o filtros
*/
const getUserVacanteSector = async () => {
    const url = `${base_url}Vacante/getUserVacanteSector`;
    try {
        const req = await fetch(url);
        const { status, msg } = await req.json();

        if (!status && msg === 'no') {
            getAllPerfiles();
        } else {
            getVacantesSector();
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}

/*============ APLICAR UN FILTRO DE VACANTES SEGUN EL SECTOR ==========*/

// if (switchBtn) {
//     switchBtn.addEventListener('click', () => {
//         document.body.classList.toggle('filtro');
//         switchBtn.classList.toggle('active');

//         //guardamos el modo actual en el que estamos
//         //classList.contains: permite saber si la clase contiene
//         if (document.body.classList.contains('filtro')) {
//             localStorage.setItem('filtro-vacante', 'true');
//             getAllVacantes();
//         } else {
//             localStorage.setItem('filtro-vacante', 'false');
//             // getVacantesSector();
//             getUserVacanteSector();
//         }
//     });

//     //obtener el modo actual en el que estamos

//     if (localStorage.getItem('filtro-vacante') === 'true') {
//         document.body.classList.add('filtro');
//         switchBtn.classList.add('active');
//         getAllVacantes();
//     } else {
//         document.body.classList.remove('filtro');
//         switchBtn.classList.remove('active');
//         // getVacantesSector();
//         getUserVacanteSector();
//     }
// }

/*
- Función que sirve para habilitar o inhabilitar las opciones de experiencia,
  estudios y hoja de vida en caso de que aun no se haya registrado nigun aspirante.
*/

const routesAspirante = async () => {
    const url = `${base_url}Aspirante/routesAspirante`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (!status && data === 'no') {
            if (document.querySelector('.enlaces-aspirante')) {
                document.querySelectorAll('.nav .enlaces-aspirante').forEach(enlace => enlace.href = '#')
                contenedorBarraBusqueda.style.display = 'none';
            }
        } else {
            contenedorBarraBusqueda.style.display = 'block';
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}