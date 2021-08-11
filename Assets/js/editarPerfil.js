
// document.getElementById('edit').onclick= function btnEdit (){
//     window.location.href = "EditarPerfil";
// }

const btnGuardar = document.getElementById('guardar');
const btnCancelar = document.getElementById('cancelar');
if (document.querySelector('#edit')) {
    document.querySelector('#edit').addEventListener('click', (e) => {
        e.preventDefault();

        const nombre = document.querySelector('#txtNombre');
        nombre.removeAttribute('disabled');
        const tipoDoc = document.querySelector('#tipoDoc');
        tipoDoc.removeAttribute('disabled');
        const numDoc = document.querySelector('#numDoc');
        numDoc.removeAttribute('disabled');
        const mobile = document.querySelector('#mobile');
        mobile.removeAttribute('disabled');
        const phone = document.querySelector('#phone');
        phone.removeAttribute('disabled');
        const Barrio = document.querySelector('#Barrio');
        Barrio.removeAttribute('disabled');
        const Dirección = document.querySelector('#Dirección');
        Dirección.removeAttribute('disabled');
        btnGuardar.style.display = 'block';
        btnCancelar.style.display = 'block';
        document.querySelector('#edit').setAttribute('disabled', 'disabled');
    })
}
btnCancelar.style.display = 'none';
btnGuardar.style.display = 'none';
const formUser = document.querySelector('#formPrincipal');

const editPerfil = async () => {
    //enviar los datos mediante una petición fetch
    console.log('entro')
    return
    let formData = new FormData(formContractor);
    const url = 'http://localhost/PonsLabor/Contratante/setContractor';

    try {
        const res = await fetch(url, {
            method: 'POST',
            body: formData
        })
        const { statusUser, msg } = await res.json();

        if (statusUser) {
            swal("Contratante", msg, "success");
        }
        else {
            swal("Error", msg, "error");//mostrar la alerta
        }
    }
    catch (error) {
        swal("Error", error, "error");
    }
}

document.addEventListener('DOMContenLoaded'), function () {
    var formUsuario = document.querySelector('#formPrincipal');
    formUsuario.onsubmit = function (e) {
        e.preventDefault();
        var nombre = document.querySelector('#txtNombre').value;
        var tipoDoc = document.querySelector('#tipoDoc').value;
        var numDoc = document.querySelector('#numDoc').value;
        var mobile = document.querySelector('#mobile').value;
        var phone = document.querySelector('#phone').value;
        var Barrio = document.querySelector('#Barrio').value;
        var Dirección = document.querySelector('#Dirección').value;
        if (nombre == '' || tipoDoc == '' || numDoc == '' || mobile == '' || phone == '' || Barrio == '' || Dirección == '') {
            swal("Atención", "Todos los campos son obligatorios", "error");
            return false;
        } else {
            editPerfil();
        }


    }
}


