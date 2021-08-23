const contenedorBarraBusqueda = document.querySelector('.content-search #icon-search');
const inputBusqueda = document.querySelector('#txtSearchVacantes');
const barraBusqueda = document.querySelector('.content-bar-search');
const coverContenedorBusqueda = document.querySelector('#menu .cover-ctn-search');
const limpiarInputBuscador = document.querySelector('#borrar-contenido');
const listaAutocompletar = document.querySelector('.list_vacantes');

let contenedorCardsVacantes = document.getElementById('form-vacs');
let contenedorCardsAspirantes = document.getElementById('contenedor-card');

let arrNombreVacantes = new Set();
let arregloSugerenciasVacantes = [];
// //Evento para cargar las card cuando de carge por completo el documento HTML
document.addEventListener('DOMContentLoaded', () => {
    //     getListAspirantes();
    if (document.querySelector('#form-vacs')) {
        getAllVacantes();
    }
})

/*=========================== BUSCADOR =========================*/
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
        inputBusqueda.value = '';
        inputBusqueda.focus();
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
    inputBusqueda.focus();
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
    const inputBusquedaVacantes = document.querySelector('#txtSearchVacantes');

    inputBusquedaVacantes.addEventListener('input', (e) => {
        const busquedaValue = inputBusquedaVacantes.value.trim();
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
                        inputBusquedaVacantes.value = e.target.textContent;
                        cerrarLista();
                        return false;
                    }
                })
            }
        })
    });

    inputBusquedaVacantes.addEventListener('keydown', e => {
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
                            inputBusquedaVacantes.value = item.textContent;
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
if (inputBusqueda) {
    inputBusqueda.addEventListener('input', e => {
        getArregloVacantes(e.target.value)
    })
}

const getArregloVacantes = async (busqueda) => {
    const url = `${base_url}Vacante/getArregloVacantes/${busqueda}`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();

        data.forEach(vacante => {
            if (vacante['nombreVacante'].search(inputBusqueda) || vacante['descripcionVacante'].search(inputBusqueda)) {
                arrNombreVacantes.add(vacante['nombreVacante'], vacante['descripcionVacante']);
                arrNombreVacantes.add(vacante['descripcionVacante']);
            }
        });
        arregloSugerenciasVacantes = [...arrNombreVacantes];
        autocompletar(arregloSugerenciasVacantes);
        contenedorCardsVacantes.innerHTML = '';

        if (status) {
            data.forEach(vacante => {
                contenedorCardsVacantes.innerHTML += `
                    <div class="card">
                        <div class="circle">
                            <h2>${vacante['nombreVacante']}</h2>
                        </div>
                        <div class="card-content">
                            <p>
                                <br>
                                BOGOTA D.C. - BOGOTA
                                <br>
                                Vacantes: ${vacante['cantidadVacante']}
                                <br>
                                Fecha de creación: ${vacante['fechaHoraPublicacion']}
                                <br>
                                Fecha de cierre: ${vacante['fechaHoraCierre']}
                                <br>
                            </p>
                            <a type="">Ver | Aplicar</a>
                        </div>
                    </div>
                    `
            });
        } else {
            getAllVacantes();
        }
    } catch (error) {
        console.log('Error' + error)
    }
}

const getAllVacantes = async () => {
    const url = `${base_url}Vacante/getAllVacantes`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();

        contenedorCardsVacantes.innerHTML = '';

        if (status) {
            data.forEach(vacante => {
                contenedorCardsVacantes.innerHTML += `
                    <div class="card">
                        <div class="circle">
                            <h2>${vacante['nombreVacante']}</h2>
                        </div>
                        <div class="card-content">
                            <p>
                                <br>
                                BOGOTA D.C. - BOGOTA
                                <br>
                                Vacantes: ${vacante['cantidadVacante']}
                                <br>
                                Fecha de creación: ${vacante['fechaHoraPublicacion']}
                                <br>
                                Fecha de cierre: ${vacante['fechaHoraCierre']}
                                <br>
                            </p>
                            <a type="">Ver | Aplicar</a>
                        </div>
                    </div>
                    `
            });
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}


/*============ TRAER LA LISTA DE ASPIRANTES ==========*/
// const getListAspirantes = async () => {
//     const url = 'http://localhost/PonsLabor/Aspirante/getListAspirantes';
//     try {
//         const req = await fetch(url);
//         const { status, data } = await req.json();

//         console.log(status, data);

//         // if (status) {
//         //     contenedorCardsAspirantes.innerHTML = '';
//         //     data.forEach(aspirante => {
//         //         contenedorCardsAspirantes.innerHTML = `
//         //             <div class="contenedor-card">
//         //                 <div class="contenedor-card__header contenedor-card__padding">
//         //                     <div class="header-img">
//         //                         <img src="http://localhost/PonsLabor/Assets/img/uploads/${aspirante['imagenUsuario']}" alt="${aspirante['nombreUsuario']}">
//         //                     </div>
//         //                     <div class="header-name">
//         //                         <h3>${aspirante['nombreUsuario']}</h3>
//         //                         <span>Web Developer</span>
//         //                     </div>
//         //                 </div>
//         //                 <div class="contenedor-card__body">
//         //                     <p>${aspirante['descripcionPersonalAspirante']}</p>
//         //                 </div>
//         //                 <div class="contenedor-card__footer">
//         //                     <a href="#">Ver más</a>
//         //                 </div>
//         //             </div>
//         //             `
//         //     })
//         // } else {
//         //     swal("Lista aspirantes", data, "error");
//         // }
//     } catch (error) {
//         swal("Error", error, "error");
//     }
// }
