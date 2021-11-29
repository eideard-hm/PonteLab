import {
  divLoading,
  initTextEditorTinymce,
  lockIconRegister,
  sweetAlert,
} from "./functionsGlobals.js";

const formContractor = document.querySelector("#form-contractor");
const bntSubmit = document.getElementById("btn_submit");
const dataPerfilContratante = document.querySelector("#perfil-contratante");

/*  RECEPCION DE VALOR DEL ELEMENTO DEFINIDO btn_submit, previniendo el evento por defecto en
caso de ser este btn clicado y ejecutanfdo el metodo validateFormUser*/

const insertContractor = async () => {
  //enviar los datos mediante una petición fetch
  tinyMCE.triggerSave();
  let formData = new FormData(formContractor);
  const url = `${base_url}Contratante/setContractor`;

  try {
    divLoading.style.display = "flex";
    const res = await fetch(url, {
      method: "POST",
      body: formData,
    });
    const { statusUser, msg, value } = await res.json();
    if (statusUser) {
      sweetAlert("Contratante", msg, "success");

      await getDataContractor();
      document.querySelector("#idContractor").value = value;
      tinymce.activeEditor.setContent("");
      document.querySelector("#especificaciones").value = "";
    } else {
      sweetAlert("Error", msg, "error"); //mostrar la alerta
    }
    divLoading.style.display = "none";
  } catch (error) {
    console.log(error);
  }
};

const validateFormContractor = () => {
  // const id = document.querySelector('#idContractor').value;
  tinyMCE.triggerSave();
  const especificaciones = document.querySelector("#especificaciones").value;
  // const idUsuarioFK = '';

  if (especificaciones.trim() === "") {
    sweetAlert("Error", "Debe ingresar una descripción...", "error");
    return false;
  } else {
    insertContractor();
  }
};

const getDataContractor = async () => {
  const url = `${base_url}Contratante/getDataContractor`;
  try {
    divLoading.style.display = "flex";
    const res = await fetch(url);
    const { status, data, msg } = await res.json();
    if (status) {
      lockIconRegister("Contratante");
      dataPerfilContratante.innerHTML = `
            <div class="row d-flex align-items-center justify-content-around">                                     
                <div class="col-11">
                    ${data.descripcionContratante}
                </div>
                <a class="btn col-1 text-right" role="button" id="edit-Contratante">
                    <i class="las la-pen" data-toggle="modal" data-target="#informacion-personal" data-idcontratante="${data.idContratante}"></i>
                </a>
            </div>   
      `;
      document.querySelector("#idContractor").value = data.idContratante;
    } else {
      dataPerfilContratante.innerHTML = `
        <div class="alert text-white bg-warning" role="alert">
            <div class="iq-alert-icon">
                <i class="las la-exclamation-triangle"></i>
            </div>
            <div class="iq-alert-text"><b>${msg}</b></div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ri-close-line"></i>
            </button>
       </div>
      `;
    }
    if (document.querySelector("#edit-Contratante")) {
      document
        .querySelector("#edit-Contratante")
        .addEventListener("click", async (e) => {
          await loadDataEditPersonalDescription(e);
        });
    }
    divLoading.style.display = "none";
  } catch (error) {
    console.log(error);
  }
};

const loadDataEditPersonalDescription = async (e) => {
  initTextEditorTinymce("especificaciones");
  const url = `${base_url}Contratante/getDataContractor`;
  try {
    divLoading.style.display = "flex";
    const req = await fetch(url);
    const { status, data, msg } = await req.json();
    if (status) {
      document.querySelector("#idContractor").value = data.idContratante;
      tinymce.activeEditor.setContent(data.descripcionContratante);
      document.querySelector("#especificaciones").value =
        data.descripcionContratante;
    } else {
      sweetAlert("Error", msg, "error");
    }
    divLoading.style.display = "none";
  } catch (error) {
    console.error(error);
  }
};

document.addEventListener("DOMContentLoaded", async () => {
  await getDataContractor();

  if (document.querySelector("#data-idContratante")) {
    document
      .querySelector("#data-idContratante")
      .addEventListener("click", () => {
        initTextEditorTinymce("especificaciones");
      });
  }

  bntSubmit.addEventListener("click", (e) => {
    e.preventDefault();

    validateFormContractor();
  });
});
