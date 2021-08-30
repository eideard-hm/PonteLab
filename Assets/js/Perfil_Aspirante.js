const btnGuardar = document.getElementById('guardar');
const btnCancelar = document.getElementById('cancelar');
const btnInhabilitar = document.getElementById('inhabilitar');
if (document.querySelector('#editar')) {
    document.querySelector('#editar').addEventListener('click', (e) => {
        e.preventDefault();

        const nombre = document.querySelector('#nombreApellido');
        nombre.removeAttribute('disabled');
        const titulo = document.querySelector('#titulo');
        titulo.removeAttribute('disabled');
        const posicion = document.querySelector('#posicion');
        posicion.removeAttribute('disabled');
        const idioma = document.querySelector('#idioma');
        idioma.removeAttribute('disabled');
        const numDoc = document.querySelector('#numDoc');
        numDoc.removeAttribute('disabled');
        const direccion = document.querySelector('#direccion');
        direccion.removeAttribute('disabled');
        const Barrio = document.querySelector('#Barrio');
        Barrio.removeAttribute('disabled');
        btnGuardar.style.display = 'block';
        btnCancelar.style.display = 'block';
        document.querySelector('#editar').setAttribute('disabled', 'disabled');
    })
}

btnCancelar.style.display = 'none';
btnGuardar.style.display = 'none';
const formUser = document.querySelector('#form-aspirante');

const editPerfil = async () => {
    //enviar los datos mediante una petición fetch
    let formData = new FormData(formUser);
    //formData.forEach(item => console.log(item))
    const url = `${base_url}Perfil_Aspirante/updatePerfilAspirante`;

    try {
        const res = await fetch(url, {
            method: 'POST',
            body: formData
        })
        const { statusUser, msg } = await res.json();

        if (statusUser) {
            swal("Aspirante", msg, "success");
        }
        else {
            swal("Error", msg, "error");//mostrar la alerta
        }
    }
    catch (error) {
        swal("Error", error, "error");
    }
}


    document.addEventListener('DOMContentLoaded', () => {

        formUser.onsubmit = function (e) {
            e.preventDefault();
            var nombre = document.querySelector('#nombreApellido').value;
            var titulo = document.querySelector('#titulo').value;
            var posicion = document.querySelector('#posicion').value;
            var idioma = document.querySelector('#idioma').value;
            var numDoc = document.querySelector('#numDoc').value;
            var direccion = document.querySelector('#direccion').value;
            var Barrio = document.querySelector('#Barrio').value;
            if (nombre == '' || titulo == '' || posicion == '' || idioma == '' || numDoc == '' || direccion == '' || Barrio == '') {
                swal("Atención", "Todos los campos son obligatorios", "error");
                return false;
            } else {
                editPerfil();
            }
        }
    })


if (document.querySelector('#inhabilitar')) {
    document.querySelector('#inhabilitar').addEventListener('click', (e) => {
        e.preventDefault();
        inhabilitarA();
    })
   

const inhabilitarA = async () => {
    const url = `${base_url}Perfil_Aspirante/inhabilitarA`;
    let formData = new FormData(formUser);
    //swal("Atención", "Usuario inhabilitado correctamente", "error", timer= '1500');
    /* swal({
     title: "Completado!",
     text: "Usuario inhabilitado correctamente.",
     type: "success",
     timer: 9000}).then(function(){
         window.location = 'http://localhost/PonsLabor/logout';
     });*/

    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        })
        swal({
            title: "Completado!",
            text: "Usuario inhabilitado correctamente.",
            type: "success",
            timer: 9000
        }).then(function () {
            window.location.href = `${base_url}logout`;
        });
        const data = await req.json();
        console.log(error);
    } catch (error) {
        console.log(error);
    }

    //window.location = `${base_url}logout`; 

    /*try {
        
        const url = `${base_url}Perfil_Aspirante/inhabilitarA`;
        const res = await url;
        const { statusUser, msg } = await res.json();
        if (statusUser) {
            swal("Aspirante", msg, "success");
        }
        else {
            swal("Error", msg, "error");//mostrar la alerta
        }
    } catch (error) {
        swal("Error", error, "error");
    }*/


}

if (btnInhabilitar) {
    btnInhabilitar.addEventListener('click', e => {
        e.preventDefault();
        inhabilitarA();
    })
    
}
}
