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
// constante que nos permite traer el formulario principal que corresponde a este ID
const formUser = document.querySelector('#formPrincipal');

const editPerfil = async () => {
    //enviar los datos mediante una petición fetch
    let formData = new FormData(formUser);
    //formData.forEach(item => console.log(item))
    const url = `${base_url}Perfil_Contratante/updatePerfilContratante`;

    try {
        const res = await fetch(url, {
            method: 'POST',
            body: formData
        })
        const { statusUser, msg } = await res.json();
        if (statusUser) {
            // swal("Contratante", msg, "success");
            swal({
                title: "Contratante",
                text: msg,
                type: "success",
                timer: 9000
            }).then(function () {
                window.location.href = `${base_url}Perfil_Contratante`;
            });
        }
        else {
            swal("Error", msg, "error");//mostrar la alerta
        }
    }
    catch (error) {
        swal("Error", error, "error");
    }
}
//campos vacio
document.addEventListener('DOMContentLoaded', () => {
    formUser.onsubmit = function (e) {
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
})

const btnInhabilitar = document.querySelector('#inhabilitar');

if (btnInhabilitar) {
    btnInhabilitar.addEventListener('click', e => {
        e.preventDefault();
        inactivarCuenta();
    })
}

const inactivarCuenta = async () => {
    const formData = new FormData(formUser);
     
    formData.forEach(item => console.log(item));
    // console.log(formData.get('estadoUsuarios'));

    const url = `${base_url}Perfil_Contratante/inactivarCuenta`;
    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        })
        swal({
            title: "Inactivar cuenta",
            text: "!Usuario Inhabilitado Correctamente!",
            type: "success",
            timer:9000}).then(function(){
                window.location.href = `${base_url}logout`;
            });
        const data = await req.json();
        console.log(data);
    } catch (error) {
        console.log(error);
    }
    
}

function Cancelar() {
    alert ("Actualizacion cancelada correctamente")
    window.location.href =  `${base_url}Perfil_Contratante`;
}
