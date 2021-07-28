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

document.getElementById('valida').addEventListener('click', validar);
document.getElementById('valida').addEventListener('click', validarFormulario);
let contador = 0;

function validar() {
  let usuario = document.getElementById('Usuario');
  let password = document.getElementById('Contraseña');
  if (usuario.value == "yesenia@gmail.com" && password.value == 123456) {
    alert("Bien")
    window.location = "Menu";
  } else {
    alert("yuquita")
  }
}

function validarFormulario() {
  let usuario = document.getElementById('Usuario').value;
  let password = document.getElementById('Contraseña').value;
  if (usuario.length == 0 && password.length < 6) {
    alert('No has escrito nada en el Usurario y la Contraseña');
    return;
  } else if (usuario.length == 0) {
    alert('No has escrito nada en el Usurario');
    return;
  } else if (password.length < 6) {
    alert('La Contraseña no es válida');
    return;
  }

}
/*
// ================================= VALIDACION CAMPOS ==============================
const formulario = document.getElementById('from-logi');
const inputs = document.querySelectorAll('#controls');

const expreciones = {
  Usuario: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  Contraseña: /^.{4,16}$/,//de 4 a 16 digitos
}

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "Usuario":
      validarCampo(expresiones.Usuario, e.target, 'Usuario');
      break;

    case "Contraseña":
      validarCampo(expresiones.Contraseña, e.target, 'Contraseña');
      break;
  }
}



const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`grupo__${campo}`).classList.remove('formulario_validacion-incorrecto');
    document.getElementById(`grupo__${campo}`).classList.add('formulario_validacion-correcto');
    document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
    document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__mensaje-activo');
    campos[campo] = true;
  } else {
    document.getElementById(`grupo__${campo}`).classList.add('formulario_validacion-incorrecto');
    document.getElementById(`grupo__${campo}`).classList.remove('formulario_validacion-correcto');
    document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
    document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__mensaje-activo');
    campos[campo] = false;
  }
}*/