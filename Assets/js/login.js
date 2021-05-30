document.getElementById('valida').addEventListener('click', validar);
document.getElementById('valida').addEventListener('click', validarFormulario);

function validarFormulario() {
  const usuario = document.getElementById('Usuario').value;
  const password = document.getElementById('Contraseña').value;
  if (usuario.length == 0 && password.length < 6) {
    alert('No has escrito nada en el Usurario y la Contraseña');
    return;
  }else if(usuario.length == 0){
    alert('No has escrito nada en el Usurario');
    return;
  }else if(password.length < 6){
    alert('La Contraseña no es válida');
    return;
  }
}

function validar() {

  const usuario = document.getElementById('Usuario');
  const password = document.getElementById('Contraseña');

  if (usuario.value == "yesenia@gmail.com" && password.value == "123456") {
    alert("Bien")
    window.location = "menu.html";
  } else {
    alert("yuquita")
  }
}