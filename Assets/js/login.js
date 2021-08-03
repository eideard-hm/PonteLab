//función para ver contraseña
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

//validación del formulario de Login

// document.getElementById('valida').addEventListener('click', validar);
// document.getElementById('valida').addEventListener('click', validarFormulario);
// let contador = 0;

// function validar() {
//   let usuario = document.getElementById('Usuario');
//   let password = document.getElementById('Contraseña');
//   if (usuario.value == "yesenia@gmail.com" && password.value == 123456) {
//     alert("Bien")
//     window.location = "Menu";
//   } else {
//     alert("yuquita")
//   }
// }

// function validarFormulario() {
//   let usuario = document.getElementById('Usuario').value;
//   let password = document.getElementById('Contraseña').value;
//   if (usuario.length == 0 && password.length < 6) {
//     alert('No has escrito nada en el Usurario y la Contraseña');
//     return;
//   } else if (usuario.length == 0) {
//     alert('No has escrito nada en el Usurario');
//     return;
//   } else if (password.length < 6) {
//     alert('La Contraseña no es válida');
//     return;
//   }

// }

/* =============== INICIO DE SESIÓN ===================== */
const form = document.querySelector('#form-login');

const signIn = async (e) => {
  e.preventDefault();
  const formData = new FormData(form);

  //peticion mediante la API de fetch, peticion de tipo post
  const url = 'http://localhost/PonsLabor/Login/loginUser';

  try {
    const res = await fetch(url, {
      method: 'POST',
      body: formData
    })
    const { statusLogin, msg, rol } = await res.json();
    console.log(rol);
    if (statusLogin && msg === 'ok') {
      if (rol === 'Contratante') {
        window.location.href = 'Menu_Contratante';
      } else {
        window.location.href = 'Menu';
      }
    } else {
      form.reset();
      swal("Error", msg, "error");//mostrar la alerta
    }
  } catch (error) {
    swal("Error", error, "error");
  }
}

form.addEventListener('submit', signIn);
<<<<<<< HEAD

/* ========================= MOSTRAR IMAGEN DE PERFIL ====================== */

if (document.querySelector('#imagen_perfil')) {
  showImgProfile();
}

const showImgProfile = async() => {
  const imgPerfil = document.querySelector('#imagen_perfil');

  //peticion mediante la API de fetch, peticion de tipo get
  const url = 'http://localhost/PonsLabor/Login/getImgProfile';

  try {
    const res = await fetch(url, {
      method: 'GET',
      headers: {
        'Content-type': 'Content-type: image/jpeg',
        'Content-type': 'Content-type: image/png'
      }
    })
    const data = await res.blob();
    imgPerfil.src = URL.createObjectURL(data)
  } catch (error) {
    swal("Error", error, "error");
  }
}
=======
>>>>>>> bf8f7ac3394ed49fe2ba6320cdbdf6619120bf47
