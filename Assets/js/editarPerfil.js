import { sweetAlert, formDataElement, divLoading } from "./functionsGlobals.js";

const btnGuardar = document.getElementById("guardar");
const btnCancelar = document.getElementById("cancelar");
const btnEdit = document.getElementById("edit");
// constante que nos permite traer el formulario principal que corresponde a este ID
const formUser = document.querySelector("#formPrincipal");
const formChangePass = document.querySelector("#change-password");

const listPerfilesAspirante = document.querySelector("#perfiles-aspirante");

if (document.querySelector("#edit")) {
  document.querySelector("#edit").addEventListener("click", (e) => {
    e.preventDefault();
    document.querySelector("#txtNombre").removeAttribute("disabled");
    document.querySelector("#tipoDoc").removeAttribute("disabled");
    document.querySelector("#numDoc").removeAttribute("disabled");
    document.querySelector("#mobile").removeAttribute("disabled");
    document.querySelector("#phone").removeAttribute("disabled");
    document.querySelector("#Barrio").removeAttribute("disabled");
    document.querySelector("#Direccion").removeAttribute("disabled");
    btnGuardar.style.display = "inline-block";
    btnCancelar.style.display = "inline-block";
    document.querySelector("#edit").setAttribute("disabled", "disabled");
    btnEdit.style.display = "none";
    // btnInhabilitar.style.display ='none';
  });
}

if (btnCancelar) {
  btnCancelar.style.display = "none";
}
if (btnGuardar) {
  btnGuardar.style.display = "none";
}

const editPerfil = async () => {
  //enviar los datos mediante una petición fetch
  let formData = new FormData(formUser);
  //formData.forEach(item => console.log(item))
  const url = `${base_url}Contratante/updatePerfilContratante`;
  try {
    divLoading.style.display = "flex";
    const res = await fetch(url, {
      method: "POST",
      body: formData,
    });
    const { statusUser, msg } = await res.json();
    if (statusUser) {
      swal({
        title: "Contratante",
        text: msg,
        icon: "success",
        timer: 9000,
      }).then(function () {
        window.location.href = `${base_url}Contratante/Edit_Perfil_Contratante`;
      });
    } else {
      sweetAlert("Error", msg, "error"); //mostrar la alerta
    }
    divLoading.style.display = "none";
  } catch (error) {
    console.log(error);
  }
};
//campos vacio

document.addEventListener("DOMContentLoaded", () => {
  if (formUser) {
    formUser.addEventListener("submit", validateFormEdit);
  }
  if (listPerfilesAspirante) {
    getProfilesAspirantes();
  }
});

const validateFormEdit = (e) => {
  e.preventDefault();
  const nombre = document.querySelector("#txtNombre").value;
  const tipoDoc = document.querySelector("#tipoDoc").value;
  const numDoc = document.querySelector("#numDoc").value;
  const mobile = document.querySelector("#mobile").value;
  const phone = document.querySelector("#phone").value;
  const Barrio = document.querySelector("#Barrio").value;
  const Dirección = document.querySelector("#Direccion").value;
  if (
    nombre == "" ||
    tipoDoc == "" ||
    numDoc == "" ||
    mobile == "" ||
    phone == "" ||
    Barrio == "" ||
    Dirección == ""
  ) {
    sweetAlert("Atención", "Todos los campos son obligatorios", "error");
    return false;
  } else if (nombre.length > 70) {
    sweetAlert("Atención", "El nombre es muy largo", "error");
  } else if (numDoc.length > 10) {
    sweetAlert(
      "Atención",
      "El número de documento no debe ser mayor a 10 caracteres",
      "error"
    );
  } else if (isNaN(mobile)) {
    swal("Atención", "El número de Documento no contener letras ", "error");
  } else if (mobile.length > 10) {
    sweetAlert(
      "Atención",
      "El número de telefónico no debe ser mayor a 10 caracteres",
      "error"
    );
  } else if (isNaN(mobile)) {
    swal("Atención", "El número de telefónico no contener letras ", "error");
  } else if (phone.length > 7) {
    sweetAlert(
      "Atención",
      "El número de teléfono no debe ser mayor a 10 caracteres",
      "error"
    );
  } else if (isNaN(mobile)) {
    sweetAlert(
      "Atención",
      "El número de teléfono no contener letras ",
      "error"
    );
  } else {
    editPerfil();
  }
};

const btnInhabilitar = document.querySelector("#inhabilitar");
if (btnInhabilitar) {
  btnInhabilitar.addEventListener("click", (e) => {
    e.preventDefault();
    inactivarCuenta();
  });
}

const inactivarCuenta = async () => {
  const formData = new FormData(formUser);
  formData.forEach((item) => console.log(item));
  // console.log(formData.get('estadoUsuarios'));
  const url = `${base_url}Contratante/inactivarCuenta`;
  try {
    const req = await fetch(url, {
      method: "POST",
      body: formData,
    });
    const { statusUser, msg } = await req.json();
    if (statusUser) {
      swal({
        title: "Inactivar cuenta",
        text: "!Usuario Inhabilitado Correctamente!",
        icon: "success",
        timer: 9000,
      }).then(function () {
        window.location.href = `${base_url}logout`;
      });
    } else {
      sweetAlert("Error", msg, "error"); //mostrar la alerta
    }
  } catch (error) {
    console.log(error);
  }
};

function Cancelar() {
  alert("Actualizacion cancelada correctamente");
  window.location.href = `${base_url}Contratante/Edit_Perfil_Contratante`;
}

const fileValidation = () => {
  const fileInput = document.getElementById("foto");
  const filePath = fileInput.value;
  const allowedExtensions = /(.jpg|.jpeg|.png|.svg)$/i;
  if (!allowedExtensions.exec(filePath)) {
    swal("Atención", "Solo se permiten imagenes.", "warning");
    fileInput.value = "";
    return false;
  } else {
    document.querySelector("#foto_remove").value = 1;
    // validateFormEdit();
  }
};

if (document.querySelector("#foto")) {
  document.querySelector("#foto").addEventListener("change", fileValidation);
}

const changePassword = async () => {
  const formData = formDataElement(formChangePass);
  const url = `${base_url}Contratante/changePassword`;
  try {
    divLoading.style.display = "flex";
    const req = await fetch(url, {
      method: "POST",
      body: formData,
    });
    const { status, msg } = await req.json();
    if (status) {
      sweetAlert("Cambio de contraseña", msg, "success");
      formChangePass.reset();
    } else {
      sweetAlert("Error", msg, "error");
    }
    divLoading.style.display = "none";
  } catch (error) {
    console.error(error);
  }
};

const validatePasswordsChange = (e) => {
  e.preventDefault();

  const currentPass = document.querySelector("#actual");
  const newPass = document.querySelector("#nueva");
  const confirmPass = document.querySelector("#verificar");

  if (
    currentPass.value.trim() === "" ||
    newPass.value.trim() === "" ||
    confirmPass.value.trim() === ""
  ) {
    sweetAlert(
      "Campos obligatorios !!",
      "Debe de completar todos los campos correctamente.",
      "error"
    );
  } else if (newPass.value !== confirmPass.value) {
    sweetAlert(
      "Las contraseñas no coinciden.",
      "Las contraseñas ingresadas nos coinciden. Por favor intenta nuevamente !!",
      "error"
    );
  } else {
    changePassword();
  }
};

if (formChangePass) {
  formChangePass.addEventListener("submit", validatePasswordsChange);
}

/*----------------------------------------------------------------------
                     Cargar perfiles de aspirantes
-----------------------------------------------------------------------*/

const getProfilesAspirantes = async () => {
  const url = `${base_url}Contratante/getProfilesAspirantes`;
  try {
    divLoading.style.display = "flex";
    const res = await fetch(url);
    const { status, profiles = [] } = await res.json();
    if (status) {
      let imagenUsuario = "";
      listPerfilesAspirante.innerHTML = "";
      profiles.forEach((profile) => {
        if (profile.imagenUsuario === null) {
          imagenUsuario = `${base_url}Assets/img/uploads/upload.svg`;
        } else {
          imagenUsuario = `${base_url}Assets/img/uploads/${profile.imagenUsuario}`;
        }
        listPerfilesAspirante.innerHTML += `
                <div class="card">
                    <img src="${imagenUsuario}" class="card-img-top" alt="${profile.nombreUsuario}">
                    <div class="card-body">
                        <h5 class="card-title">${profile.nombreUsuario}</h5>
                        <p class="card-text">${profile.descripcionPersonalAspirante}</p>
                        <p class="card-text"><span class="badge bg-primary">${profile.nombreEstado}</span></p>
                        <p class="card-text"><small class="text-muted">${profile.created_at}</small></p>
                        <a href="${base_url}Aspirante/Detail_Perfil_Aspirante" class="btn btn-primary">Ver Perfil</a>
                    </div>
                </div>
          `;
      });
    }
    divLoading.style.display = "none";
  } catch (error) {
    console.log(error);
  }
};
