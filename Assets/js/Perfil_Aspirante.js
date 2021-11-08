const btnGuardar = document.getElementById("guardar");
const btnCancelar = document.getElementById("cancelar");
const btnInhabilitar = document.getElementById("inhabilitar");

document.getElementById("attachment").addEventListener('click', function() {
    document.getElementById("file-input").click();
});

let formUser = document.getElementById('form-aspirante');

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
            method: 'POST'
            
        })
        swal({
            title: "Completado!",
            text: "Usuario inhabilitado correctamente.",
            type: "success",
            timer: 9000
        }).then(function () {
            window.location.href = `${base_url}logout`;
        });
        const data = await req.json();
        console.log(error);
    } catch (error) {
        console.log(error);
    }
};
    document.addEventListener('DOMContentLoaded', () => {

        formUser.onsubmit = function (e) {
            e.preventDefault();
            var nombre = document.querySelector('#nombreApellido').value;
            var titulo = document.querySelector('#titulo').value;
            var posicion = document.querySelector('#posicion').value;
            var idioma = document.querySelector('#idioma').value;
            var numDoc = document.querySelector('#numDoc').value;
            var direccion = document.querySelector('#direccion').value;
            var Barrio = document.querySelector('#Barrio').value;
            if (nombre == '' || titulo == '' || posicion == '' || idioma == '' || numDoc == '' || direccion == '' || Barrio == '') {
                swal("Atención", "Todos los campos son obligatorios", "error");
                return false;
            } else {
                editPerfil();
            }
        }
    })

   
    document.querySelector('#inhabilitar').addEventListener('click', (e) => {
        e.preventDefault();
    inhabilitarAs();
    })
    

document.querySelector("#inhabilitar").addEventListener("click", (e) => {
  e.preventDefault();
  inhabilitarAs();
});

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

/*$("i").click(function () {
    $("input[type='file']").trigger('click');
  });
  
  $('input[type="file"]').on('change', function() {
    var val = $(this).val();
    $(this).siblings('span').text(val);
  })*/
