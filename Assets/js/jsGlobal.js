/*
    * Aqui van las funciones o script que se van a utilizar en todos los archivos
    * del programa
*/

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('#link-cv') || document.querySelector('#hoja-vida')) {
        getDataAspirante();
    }

    if (document.querySelector('#generar-pdf')) {
        document.querySelector('#generar-pdf').addEventListener('click', () => {
            generarPdf();
        });
    }
})

/*========================= MODO OSCURO =========================*/
const btnSwitch = document.getElementById('switch');

if (btnSwitch) {
    btnSwitch.addEventListener('click', () => {
        document.body.classList.toggle('dark');
        btnSwitch.classList.toggle('active');

        //guardamos el modo actual en el que estamos
        //classList.contains: permite saber si la clase contiene
        if (document.body.classList.contains('dark')) {
            localStorage.setItem('dark-mode', 'true');
        } else {
            localStorage.setItem('dark-mode', 'false');
        }
    });

    //obtener el modo actual en el que estamos

    if (localStorage.getItem('dark-mode') === 'true') {
        document.body.classList.add('dark');
        btnSwitch.classList.add('active');
    } else {
        document.body.classList.remove('dark');
        btnSwitch.classList.remove('active');
    }
}

/**===========================================================================
 *                             HOJA DE VIDA
 =============================================================================*/

/**
 * Función que sirve para cambiar el color de fonfo del contenedor de la hoja de vida
 * 
 * @param {string} background Color de fondo que va a tomar el contenedor del cv
 */
const changeBackgroundColorContenedorCv = (background) => {
    document.querySelector('#contenedor-cv').classList.add(background);
}

const removeClassBackgroundColorCv = (background) => {
    document.querySelector('#contenedor-cv').classList.remove(background);
}

if (document.querySelector('#change-bg-cv')) {
    document.getElementById('btn-change-bg-primary').addEventListener('click', () => {
        changeBackgroundColorContenedorCv('primary');
        removeClassBackgroundColorCv('secondary');
        removeClassBackgroundColorCv('success');
        removeClassBackgroundColorCv('warning');
        removeClassBackgroundColorCv('info');
        removeClassBackgroundColorCv('light');
        removeClassBackgroundColorCv('dark');
    });
    document.getElementById('btn-change-bg-secondary').addEventListener('click', () => {
        changeBackgroundColorContenedorCv('secondary');
        removeClassBackgroundColorCv('primary');
        removeClassBackgroundColorCv('success');
        removeClassBackgroundColorCv('warning');
        removeClassBackgroundColorCv('info');
        removeClassBackgroundColorCv('light');
        removeClassBackgroundColorCv('dark');
    });
    document.getElementById('btn-change-bg-success').addEventListener('click', () => {
        changeBackgroundColorContenedorCv('success');
        removeClassBackgroundColorCv('primary');
        removeClassBackgroundColorCv('secondary');
        removeClassBackgroundColorCv('warning');
        removeClassBackgroundColorCv('info');
        removeClassBackgroundColorCv('light');
        removeClassBackgroundColorCv('dark');
    });
    document.getElementById('btn-change-bg-warning').addEventListener('click', () => {
        changeBackgroundColorContenedorCv('warning');
        removeClassBackgroundColorCv('primary');
        removeClassBackgroundColorCv('secondary');
        removeClassBackgroundColorCv('success');
        removeClassBackgroundColorCv('info');
        removeClassBackgroundColorCv('light');
        removeClassBackgroundColorCv('dark');
    });
    document.getElementById('btn-change-bg-info').addEventListener('click', () => {
        changeBackgroundColorContenedorCv('info');
        removeClassBackgroundColorCv('primary');
        removeClassBackgroundColorCv('secondary');
        removeClassBackgroundColorCv('success');
        removeClassBackgroundColorCv('warning');
        removeClassBackgroundColorCv('light');
        removeClassBackgroundColorCv('dark');
    });
    document.getElementById('btn-change-bg-light').addEventListener('click', () => {
        changeBackgroundColorContenedorCv('light');
        removeClassBackgroundColorCv('primary');
        removeClassBackgroundColorCv('secondary');
        removeClassBackgroundColorCv('success');
        removeClassBackgroundColorCv('warning');
        removeClassBackgroundColorCv('info');
        removeClassBackgroundColorCv('dark');
    });
    document.getElementById('btn-change-bg-dark').addEventListener('click', () => {
        changeBackgroundColorContenedorCv('dark');
        removeClassBackgroundColorCv('primary');
        removeClassBackgroundColorCv('secondary');
        removeClassBackgroundColorCv('success');
        removeClassBackgroundColorCv('warning');
        removeClassBackgroundColorCv('info');
        removeClassBackgroundColorCv('light');
    });
}

const generarPdf = () => {
    const documentoAConvertir = document.querySelector('#contenedor-cv');
    const fileName = document.querySelector('#generar-pdf').dataset.user;
    html2pdf()
        .set({
            margin: 0,
            filename: `${fileName}.pdf`,
            image: {
                type: 'jpeg',
                quiality: 0.98
            },
            html2canvas: {
                scale: 2,
                letterRendering: true
            },
            jsPDF: {
                unit: "in",
                format: "letter",
                orientation: 'Portrait'
            }
        })
        .from(documentoAConvertir)
        .save()
        .catch(err => console.log(err));
}

/**===========================================================================
 *                             ICONO DE HOJA DE VIDA
 =============================================================================*/

const getDataAspirante = async () => {
    const url = `${base_url}Aspirante/getDataAspirante`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        if (!status && data === 'no') {
            if (document.querySelector('#hoja-vida')) {
                document.querySelector('#hoja-vida').setAttribute('disabled', 'disabled');
                document.querySelector('#link-hoja-vida').setAttribute('href', '#');
            }
            if (document.querySelector('#list-cv')) {
                document.querySelector('#list-cv').setAttribute('disabled', 'disabled');
                document.querySelector('#link-cv').setAttribute('href', '#');
            }
        }
    } catch (error) {
        console.error(error);
    }
}