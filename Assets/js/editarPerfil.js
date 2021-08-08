
// document.getElementById('edit').onclick= function btnEdit (){
//     window.location.href = "EditarPerfil";
// }

const btnGuardar = document.getElementById('guardar');

if (document.querySelector('#edit')) {
    document.querySelector('#edit').addEventListener('click', (e) => {
        e.preventDefault();

        const nombre = document.querySelector('#txtNombre');
        nombre.removeAttribute('disabled');
        
        const nombre = document.querySelector('#txtNombre');
        btnGuardar.style.display = 'block';
        document.querySelector('#edit').setAttribute('disabled', 'disabled');
    })
}

btnGuardar.style.display = 'none';