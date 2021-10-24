//función para ver contraseña
if (document.getElementById("spanMostrar")) {
  document.getElementById("spanMostrar").addEventListener("click", function () {
    let elementInput = document.getElementById("Contraseña");
    let elementIcon = document.getElementById("iconMostrar");
    if (elementIcon.classList.contains("active")) {
      elementIcon.classList.remove("active");
      elementIcon.innerHTML = "visibility";
      elementInput.type = "password";
    } else {
      elementIcon.classList.add("active");
      elementIcon.innerHTML = "visibility_off";
      elementInput.type = "text";
    }
  });
}
/* =============== INICIO DE SESIÓN ===================== */
const form = document.querySelector('#form-login');
const signIn = async (e) => {
  e.preventDefault();
  const formData = new FormData(form);
  //peticion mediante la API de fetch, peticion de tipo post
  const url = `${base_url}Login/loginUser`;
  try {
    const res = await fetch(url, {
      method: 'POST',
      body: formData
    })
    const { statusLogin, msg, rol } = await res.json();
    if (statusLogin && msg === 'ok') {
      if (rol === 'Contratante') {
        window.location.href = `${base_url}Menu/Menu_Contratante`;
      } else {
        window.location.href = `${base_url}Menu`;
      }
    } else {
      form.reset();
      swal("Error", msg, "error");//mostrar la alerta
    }
  } catch (error) {
    swal("Error", error, "error");
  }

}
if (form) {
  form.addEventListener('submit', signIn);
}

/*============================RESTABLECER CONTRASEÑA==================*/
const recoverPassword = () => {
  console.log('entro')
  if (document.querySelector("#formRecetPass")) {
    let strEmail = document.querySelector("#txtEmailReset").value;
    if (strEmail == "") {
      swal("Por favor", "Escriba su correo electrónico.", "error")
      return false;
    } else {
      var request = (window.XMLHttpRequest) ?
        new XMLHttpRequest() :
        new ActiveXObject(Microsoft.XMLHttP)

      var ajaxUrl = base_url + 'Login/resetPass';
      var formData = new FormData(formRecetPass)
      request.open("POST", ajaxUrl, true);
      request.send(formData);
      request.onreadystatechange = function () {
        console.log(request);
        if (request.readyState != 4) return;
        if (request.status == 200) {
          var objData = JSON.parse(request.responseText);
          if (objData.status) {
            swal({
              title: "",
              text: objData.msg,
              icon: "success",
              buttons: ["Aceptar!", "Cancelar!"],
              dangerMode: true,
            })
              .then((willDelete) => {
                if (willDelete) {
                  window.location.href = `${base_url}Login`;
                  console.log(base_url)
                }
              });
          } else {
            swal("Atención", objData.msg, "error")
          }
          } else {
          swal("Atención","Error en el proceso", "error");
        } 
        return false;
        }
    }
  }
}
let formRecetPass = document.querySelector("#formRecetPass");
if (formRecetPass) {
  formRecetPass.onsubmit = function (e) {
    e.preventDefault();
    recoverPassword();
  }
}

