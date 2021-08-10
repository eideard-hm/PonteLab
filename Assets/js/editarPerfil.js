
// document.getElementById('edit').onclick= function btnEdit (){
//     window.location.href = "EditarPerfil";
// }

const btnGuardar = document.getElementById('guardar');

if (document.querySelector('#edit')) {
    document.querySelector('#edit').addEventListener('click', (e) => {
        e.preventDefault();

        const nombre = document.querySelector('#txtNombre');
        nombre.removeAttribute('disabled');
        const nomDoc = document.querySelector('#numDoc');
        nomDoc.removeAttribute('disabled');
        const tipoDoc = document.querySelector('#tipoDoc');
        tipoDoc.removeAttribute('disabled')
        const phoneF = document.querySelector('#phoneF');
        phoneF.removeAttribute ('disabled')
        const mobileP = document.querySelector('#mobileP');
        mobileP.removeAttribute ('disabled')
        const Barrio = document.querySelector('#Barrio');
        Barrio.removeAttribute ('disabled')
        const Dirección = document.querySelector('#Dirección');
        Dirección.removeAttribute ('disabled')
        btnGuardar.style.display = 'block';
        document.querySelector('#edit').setAttribute('disabled', 'disabled');
    })
}

btnGuardar.style.display = 'none';