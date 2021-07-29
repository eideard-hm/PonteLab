const contenedorBarraBusqueda = document.querySelector('.content-search #icon-search');
const inputBusqueda = document.querySelector('#txtSearchAspirante');
const barraBusqueda = document.querySelector('.content-bar-search');
const coverContenedorBusqueda = document.querySelector('#menu .cover-ctn-search');
const limpiarInputBuscador = document.querySelector('#borrar-contenido');

/*=========================== BUSCADOR =========================*/
contenedorBarraBusqueda.addEventListener('click', () => {
    mostrarBarraBusqueda();
});

coverContenedorBusqueda.addEventListener('click', () => {
    ocultarBarraBusqueda();
});

limpiarInputBuscador.addEventListener('click', () => {
    inputBusqueda.value = '';
    inputBusqueda.focus();
});

barraBusqueda.addEventListener('submit', e => {
    e.preventDefault();
})

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

/* ========================= MOSTRAR IMAGEN DE PERFIL ====================== */

const showImgProfile = async (id) => {
    const imgPerfil = document.querySelector('#imagen_perfil');

    //peticion mediante la API de fetch, peticion de tipo get
    const url = `http://localhost/PonsLabor/Menu/getImgProfile/${id}`;

    try {
        const res = await fetch(url, {
            method: 'GET',
            headers: {
                'Content-type': 'image/jpeg',
                'Content-type': 'image/png'
            }
        })
        const img = await res.blob();
        imgPerfil.src = URL.createObjectURL(img);
    } catch (error) {
        swal("Error", error, "error");
    }
}

if (document.querySelector('#imagen_perfil')) {
    showImgProfile(parseInt(document.querySelector('#imagen_perfil').dataset.id));
}