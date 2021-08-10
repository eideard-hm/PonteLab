const contenedorBarraBusqueda = document.querySelector('.content-search #icon-search');
const inputBusqueda = document.querySelector('#txtSearchAspirante');
const barraBusqueda = document.querySelector('.content-bar-search');
const coverContenedorBusqueda = document.querySelector('#menu .cover-ctn-search');
const limpiarInputBuscador = document.querySelector('#borrar-contenido');

let contenedorCardsVacantes = document.getElementById('form-vacs');
let contenedorCardsAspirantes = document.getElementById('contenedor-card');

// //Evento para cargar las card cuando de carge por completo el documento HTML
document.addEventListener('DOMContentLoaded', () => {
    //     getListAspirantes();
    getAllVacantes();
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
}

const ocultarBarraBusqueda = () => {
    barraBusqueda.style.top = '-10px';
    barraBusqueda.style.opacity = '0';
    coverContenedorBusqueda.style.display = 'none';
}

/*============ IMPLEMENTAR BUSCADOR Y AUTOCOMPLETADO ==========*/


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

/*============ TRAER LA LISTA DE VACANTES ==========*/
const getAllVacantes = async () => {
    const url = 'http://localhost/PonsLabor/Vacante/getAllVacantes';
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