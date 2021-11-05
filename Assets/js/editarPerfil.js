const btnGuardar = document.getElementById("guardar");
const btnCancelar = document.getElementById("cancelar");
const btnEdit = document.getElementById("edit");
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
    btnGuardar.style.display = "block";
    btnCancelar.style.display = "block";
    document.querySelector("#edit").setAttribute("disabled", "disabled");
    btnEdit.style.display = "none";
    // btnInhabilitar.style.display ='none';
  });
}

btnCancelar.style.display = "none";
btnGuardar.style.display = "none";
// constante que nos permite traer el formulario principal que corresponde a este ID
const formUser = document.querySelector("#formPrincipal");

const editPerfil = async () => {
  //enviar los datos mediante una petición fetch
  let formData = new FormData(formUser);
  //formData.forEach(item => console.log(item))
  const url = `${base_url}Contratante/updatePerfilContratante`;
  try {
    const res = await fetch(url, {
      method: "POST",
      body: formData,
    });
    const { statusUser, msg, session } = await res.json();
    console.log(session);
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
      swal("Error", msg, "error"); //mostrar la alerta
    }
  } catch (error) {
    console.log(error);
  }
};
//campos vacio

document.addEventListener("DOMContentLoaded", () => {
  formUser.onsubmit = function (e) {
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
});

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
        type: "success",
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
  window.location.href = `${base_url}Contratante/Edit_Perfil_Contratante`;
}
