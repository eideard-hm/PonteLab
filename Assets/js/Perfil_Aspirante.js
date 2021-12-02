import { sweetAlert, formDataElement, divLoading } from "./functionsGlobals.js";

const btnInhabilitar = document.querySelector("#inhabilitar");

const formUser = document.querySelector("#form-aspirante");
const formChangePass = document.querySelector("#change-password");

if (document.getElementById("attachment")) {
  document.getElementById("attachment").addEventListener("click", function () {
    document.getElementById("file-input").click();
  });
}

document.addEventListener("DOMContentLoaded", () => {
  formUser.addEventListener("submit", validateFormEdit);
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
    swal("Atención", "Todos los campos son obligatorios", "error");
    return false;
  } else if (nombre.length > 70) {
    swal("Atención", "El nombre es muy largo", "error");
  } else if (numDoc.length > 10) {
    swal(
      "Atención",
      "El número de documento no debe ser mayor a 10 caracteres",
      "error"
    );
  } else if (isNaN(mobile)) {
    swal("Atención", "El número de Documento no contener letras ", "error");
  } else if (mobile.length > 10) {
    swal(
      "Atención",
      "El número de telefónico no debe ser mayor a 10 caracteres",
      "error"
    );
  } else if (isNaN(mobile)) {
    swal("Atención", "El número de telefónico no contener letras ", "error");
  } else if (phone.length > 7) {
    swal(
      "Atención",
      "El número de teléfono no debe ser mayor a 10 caracteres",
      "error"
    );
  } else if (isNaN(mobile)) {
    swal("Atención", "El número de teléfono no contener letras ", "error");
  } else {
    editPerfil();
  }
};

const editPerfil = async () => {
  //enviar los datos mediante una petición fetch
  let formData = formDataElement(formUser);
  const url = `${base_url}Aspirante/updatePerfilAspirante`;
  try {
    divLoading.style.display = "flex";
    const res = await fetch(url, {
      method: "POST",
      body: formData,
    });
    const { statusUser, msg } = await res.json();
    if (statusUser) {
      swal({
        title: "Aspirante",
        text: msg,
        icon: "success",
        timer: 9000,
      }).then(function () {
        window.location.href = `${base_url}Aspirante/Edit_Profile_Aspirante`;
      });
    } else {
      sweetAlert("Error", msg, "error");
    }
    divLoading.style.display = "none";
  } catch (error) {
    console.log(error);
  }
};

const changePassword = async () => {
  const formData = formDataElement(formChangePass);
  const url = `${base_url}Aspirante/changePassword`;
  try {
    divLoading.style.display = "flex";
    const req = await fetch(url, {
      method: "POST",
      body: formData,
    });
    const { status, msg } = await req.json();
    if (status) {
      swal({
        title: "Cambio de contraseña",
        text: msg,
        icon: "success",
        timer: 9000,
      }).then(function () {
        formChangePass.reset();
        window.location.href = `${base_url}logout`;
      });
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

formChangePass.addEventListener("submit", validatePasswordsChange);

if (btnInhabilitar) {
  btnInhabilitar.addEventListener("click", (e) => {
    e.preventDefault();
    inhabilitarAs();
  });
}

const inhabilitarAs = async () => {
  const formData = new FormData(formUser);
  formData.forEach((item) => console.log(item));
  // console.log(formData.get('estadoUsuarios'));
  const url = `${base_url}Aspirante/inhabilitarA`;
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
      swal("Error", msg, "error"); //mostrar la alerta
    }
  } catch (error) {
    console.log(error);
  }
};

function Cancelar() {
  alert("Actualizacion cancelada correctamente");
  //swal("Correcto!", "Actualizacion cancelada correctamente", "success");
  window.location.href = `${base_url}Perfil_Aspirante`;
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

document.querySelector("#foto").addEventListener("change", fileValidation);