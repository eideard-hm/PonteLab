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
