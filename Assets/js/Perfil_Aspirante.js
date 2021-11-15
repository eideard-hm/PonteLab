import { sweetAlert, formDataElement, divLoading } from "./functionsGlobals.js";

const btnGuardar = document.getElementById("guardar");
const btnCancelar = document.getElementById("cancelar");
const btnInhabilitar = document.getElementById("inhabilitar");
const formChangePass = document.querySelector('#change-password');


const changePassword = async () => {
  const formData = formDataElement(formChangePass);
  const url = `${base_url}Aspirante/changePassword`;
  try {
    divLoading.style.display = 'flex';
    const req = await fetch(url, {
      method: 'POST',
      body: formData
    });
    const { status, msg } = await req.json();
    if (status) {
      sweetAlert('Cambio de contraseña', msg, 'success');
      formChangePass.reset();
    } else {
      sweetAlert('Error', msg, 'error');
    }
    divLoading.style.display = 'none';
  } catch (error) {
    console.error(error);
  }
}



const validatePasswordsChange = (e) => {
  e.preventDefault();

  const currentPass = document.querySelector('#actual');
  const newPass = document.querySelector('#nueva');
  const confirmPass = document.querySelector('#verificar');

  if (currentPass.value.trim() === '' || newPass.value.trim() === ''
    || confirmPass.value.trim() === '') {
    sweetAlert("Campos obligatorios !!", "Debe de completar todos los campos correctamente.", "error");
  } else if (newPass.value !== confirmPass.value) {
    sweetAlert("Las contraseñas no coinciden.", "Las contraseñas ingresadas nos coinciden. Por favor intenta nuevamente !!", "error");
  } else {
    changePassword();
  }
}

formChangePass.addEventListener('submit', validatePasswordsChange)


if (document.getElementById("attachment")) {
  document.getElementById("attachment").addEventListener("click", function () {
    document.getElementById("file-input").click();
  });
}


let formUser = document.getElementById("form-aspirante");

const editPerfil = async () => {
  //enviar los datos mediante una petición fetch
  let formData = new FormData(formUser);
  //formData.forEach(item => console.log(item))
  const url = `${base_url}Aspirante/updatePerfilAspirante`;

  try {
    const res = await fetch(url, {
      method: "POST",
      body: formData,
    });
    const { statusUser, msg } = await res.json();

    if (statusUser) {
      //   swal("Aspirante", msg, "success" );

      swal({
        title: "Aspirante",
        text: "exito",
        type: "success",
        timer: 9000,
      }).then(function () {
        window.location.href = `${base_url}Perfil_Aspirante`;
      });
    } else {
      swal("Error", "falla", "error"); //mostrar la alerta
    }
  } catch (error) {
    swal("Error", error, "error");
  }
};

const inhabilitarAs = async () => {
  const url = `${base_url}Aspirante/inhabilitarA`;

  try {
    const req = await fetch(url, {
      method: "POST",
    });
    swal({
      title: "Completado!",
      text: "Usuario inhabilitado correctamente.",
      type: "success",
      timer: 9000,
    }).then(function () {
      window.location.href = `${base_url}logout`;
    });
    const data = await req.json();
    console.log(error);
  } catch (error) {
    console.log(error);
  }
};
document.addEventListener("DOMContentLoaded", () => {
  if (formUser) {
    formUser.onsubmit = function (e) {
      e.preventDefault();
      var nombre = document.querySelector("#nombreApellido").value;
      var titulo = document.querySelector("#titulo").value;
      var posicion = document.querySelector("#posicion").value;
      var idioma = document.querySelector("#idioma").value;
      var numDoc = document.querySelector("#numDoc").value;
      var direccion = document.querySelector("#direccion").value;
      var Barrio = document.querySelector("#Barrio").value;
      if (
        nombre == "" ||
        titulo == "" ||
        posicion == "" ||
        idioma == "" ||
        numDoc == "" ||
        direccion == "" ||
        Barrio == ""
      ) {
        swal("Atención", "Todos los campos son obligatorios", "error");
        return false;
      } else {
        editPerfil();
      }
    };
  }
});

if (document.querySelector("#inhabilitar")) {
  document.querySelector("#inhabilitar").addEventListener("click", (e) => {
    e.preventDefault();
    inhabilitarAs();
  });
}

function Cancelar() {
  alert("Actualizacion cancelada correctamente");
  //swal("Correcto!", "Actualizacion cancelada correctamente", "success");
  window.location.href = `${base_url}Perfil_Aspirante`;
}

const actualizarImagen = async () => {
  const url = `${base_url}Edit_Profile_Aspirante/actualizarImagen`;
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
      method: "POST",
      body: formData,
    });
    swal({
      title: "Completado!",
      text: "Imagen Actualizada correctamente.",
      type: "success",
      timer: 9000,
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
  };
