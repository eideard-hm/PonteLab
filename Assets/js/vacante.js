import {
  formDataElement,
  sweetAlert,
  initTextEditorTinymce,
  divLoading,
} from "./functionsGlobals.js";

const refresh_vacancies = document.getElementById("refresh-vacancies");


const formVacancy = document.querySelector("#form-vacancy");
const bntSubmit = document.getElementById("btn_submit");
const listVacantes = document.querySelector("#list-vacantes");
const formApplyVacancy = document.querySelector("#form-aplicar-vacante");
//elementos de la barra de busqueda
const inputBusqueda = document.querySelector("#txtSearchVacantes");

/*  RECEPCION DE VALOR DEL ELEMENTO DEFINIDO btn_submit, previniendo el evento por defecto en
caso de ser este btn clicado y ejecutanfdo el metodo validateFormUser*/

document.addEventListener("DOMContentLoaded", async () => {
  initTextEditorTinymce("especificaciones");
  initTextEditorTinymce("perfil");
  initTextEditorTinymce("especficacionRequisitos");
});

if (bntSubmit) {
  bntSubmit.addEventListener("click", (e) => {
    e.preventDefault();

    validateFormVacancy();
  });
}

const insertVacancy = async () => {
  //enviar los datos mediante una petición fetch
  tinyMCE.triggerSave();
  let formData = new FormData(formVacancy);
  const url = `${base_url}Vacante/setVacante`;

  try {
    divLoading.style.display = "flex";
    const res = await fetch(url, {
      method: "POST",
      body: formData,
    });
    const { statusUser, msg } = await res.json();

    if (statusUser) {
      sweetAlert("Vacante", msg, "success");
      bntSubmit.style.display = "none";
      refresh_vacancies.style.display = "block";
      document.querySelector("#ant-p2").style.display = "none";
    } else {
      sweetAlert("Error", msg, "error"); //mostrar la alerta
    }
    divLoading.style.display = "none";
  } catch (error) {
    console.log(error);
  }
};

const validateFormVacancy = () => {
  tinyMCE.triggerSave();
  const id = document.querySelector("#idVacancy").value;
  const nombre = document.querySelector("#nombre").value;
  const cantidad = document.querySelector("#cantidad").value;
  const especificaciones = document.querySelector("#especificaciones").value;
  const perfil = document.querySelector("#perfil").value;
  const tipoContrato = document.querySelector("#tipoContrato").value;
  const sueldo = document.querySelector("#sueldo").value;
  const fechapublicacion = document.querySelector("#fechapublicacion").value;
  const fechacierre = document.querySelector("#fechacierre").value;
  const direccion = document.querySelector("#direccion").value;
  const estado = document.querySelector("#estado").value;
  const sector = document.querySelector("#idSectorFK").value;

  if (
    nombre === "" ||
    cantidad === "" ||
    especificaciones === "" ||
    perfil === "" ||
    tipoContrato === "" ||
    sueldo === "" ||
    fechapublicacion === "" ||
    fechacierre === "" ||
    direccion === "" ||
    estado === "" ||
    sector === ""
  ) {
    sweetAlert(
      "Ha ocurrido un error",
      "Todos los campos son obligatorios.",
      "error"
    );
    return false;
  }
  else if (fechapublicacion>fechacierre){
    sweetAlert(
      "Datos erroneos",
      "La fecha de cierre no puede ser anterior a la de publicación",
      "error"
    )
  }
  else {
    insertVacancy();
  }
};

const formRequirements = document.querySelector("#form-requirements");
const bntSub = document.getElementById("btn_sub");

const insertRequirements = async () => {
  //enviar los datos mediante una petición fetch
  tinyMCE.triggerSave();
  let formD = new FormData(formRequirements);
  const url = `${base_url}Vacante/setRequirements`;
  try {
    const res = await fetch(url, {
      method: "POST",
      body: formD,
    });
    const { statusUser, msg } = await res.json();

    if (statusUser) {
      sweetAlert("Registro exitoso !!", msg, "success");
      document.querySelector("#name-reque").style.display = "none";
      document.querySelector("#especificaciones-req").style.display = "block";
    } else {
      sweetAlert("Error", msg, "error"); //mostrar la alerta
    }
  } catch (error) {
    console.log(error);
  }
};

if (bntSub) {
  bntSub.addEventListener("click", (e) => {
    e.preventDefault();
    validateFormRequirements();
  });
}
const validateFormRequirements = () => {
  tinyMCE.triggerSave();
  const nombreRequisitos = document.querySelector("#nombreRequisitos").value;
  if (
    nombreRequisitos === "" ||
    nombreRequisitos === "null" ||
    nombreRequisitos === "0"
  ) {
    sweetAlert(
      "Ha ocurrido un error",
      "Todos los campos son obligatorios.",
      "error"
    );
    return false;
  } else {
    insertRequirements();
  }
};

const formRequirement = document.querySelector("#form-requirement");
const bntSubmit_ = document.getElementById("btn_submit_");
/*  RECEPCION DE VALOR DEL ELEMENTO DEFINIDO btn_submit, previniendo el evento por defecto en
caso de ser este btn clicado y ejecutanfdo el metodo validateFormUser*/

if (bntSubmit_) {
  bntSubmit_.addEventListener("click", (e) => {
    e.preventDefault();
    validateFormRequirement();
  });
}

const insertRequirement = async () => {
  //enviar los datos mediante una petición fetch
  tinyMCE.triggerSave();
  let formData_ = new FormData(formRequirement);
  const url = `${base_url}Vacante/setRequirement`;
  try {
    const res = await fetch(url, {
      method: "POST",
      body: formData_,
    });
    const { statusUser, msg } = await res.json();

    if (statusUser) {
      swal({
        title: "Requisito Vacante",
        text: msg,
        icon: "success",
        dangerMode: false,
      }).then((willDelete) => {
        if (willDelete) {
          window.location.href = `${base_url}Menu/Menu_Contratante`;
        }
      });
    } else {
      swal("Error", msg, "error"); //mostrar la alerta
    }
  } catch (error) {
    console.log(error);
  }
};

const validateFormRequirement = () => {
  tinyMCE.triggerSave();
  const especficacionRequisitos = document.querySelector(
    "#especficacionRequisitos"
  ).value;
  if (especficacionRequisitos === "") {
    sweetAlert(
      "Ha ocurrido un error",
      "Todos los campos son obligatorios.",
      "error"
    );
    return false;
  } else {
    insertRequirement();
  }
};

/*============ TRAER LA LISTA DE VACANTES ==========*/
if (inputBusqueda && listVacantes) {
  inputBusqueda.addEventListener("input", (e) => {
    e.preventDefault();
    const formData = formDataElement(document.querySelector("#searchbox"));
    getArregloVacantes(formData);
  });
}

/**
 *
 * @param {string} busqueda Palabras claves por las cuales se va hacer la busqueda o filtro
 */
const getArregloVacantes = async (busqueda) => {
  const url = `${base_url}Vacante/getArregloVacantes`;
  let imagenUsuario = "";
  try {
    divLoading.style.display = "flex";
    const req = await fetch(url, {
      method: "POST",
      body: busqueda,
    });
    const { status, data } = await req.json();
    listVacantes.innerHTML = "";
    if (status && data !== "no") {
      data.forEach((vacante) => {
        if (vacante.imagenUsuario === null) {
          imagenUsuario = "upload.svg";
        } else {
          imagenUsuario = vacante.imagenUsuario;
        }

        listVacantes.innerHTML += `
                <div class="single-job-post row nomargin" data-idVacante="${vacante.idVacante}">
                    <!-- Job Company -->
                    <div class="col-md-2 col-xs-3">
                        <div class="job-company">
                            <a href="${base_url}Vacante/DetallesVacante/${vacante.idVacante}" data-idVacante="${vacante.idVacante}">
                                <img src="${base_url}Assets/img/uploads/${imagenUsuario}" alt="${vacante.nombreUsuario}" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Job Title & Info -->
                    <div class="col-md-7 col-xs-6 ptb20">
                        <div class="job-title">
                            <a href="${base_url}Vacante/DetallesVacante/${vacante.idVacante}" data-idVacante="${vacante.idVacante}">${vacante.nombreVacante}</a>
                        </div>
                        <div class="job-info">
                            <span class="company"><i class="fa fa-building-o"></i>${vacante.nombreUsuario}</span>
                            <span class="location"><i class="fa fa-map-marker"></i>${vacante.direccionVacante}</span>
                        </div>
                    </div>
                    <!-- Job Category -->
                    <div class="col-md-3 col-xs-3 ptb30">
                        <div class="job-category">
                            <a href="${base_url}Vacante/DetallesVacante/${vacante.idVacante}" class="btn btn-success capitalize" data-idVacante="${vacante.idVacante}">full time</a>
                        </div>
                    </div>
                </div>
                `;
      });
    } else {
      listVacantes.innerHTML = `
                                        <h5 class="text-center mt-3">No se encontró nigún resultado con esa busqueda ${busqueda.get(
                                          "txtSearchVacantes"
                                        )}.</h5>
                                    `;
    }
    divLoading.style.display = "none";
  } catch (error) {
    console.error(error);
  }
};

const applyVacancy = async () => {
  const formData = formDataElement(formApplyVacancy);
  const url = `${base_url}Vacante/applyVacancy`;
  try {
    divLoading.style.display = "flex";
    const req = await fetch(url, {
      method: "POST",
      body: formData,
    });
    const { status, msg } = await req.json();
    if (status) {
      sweetAlert("Aplicación a la vacante exitosa", msg, "success");
    } else {
      sweetAlert("Error al aplicar a la vacante", msg, "error");
    }
    divLoading.style.display = "none";
  } catch (error) {
    console.error(error);
  }
};

if (document.getElementById("apply-vacancy")) {
  document
    .getElementById("apply-vacancy")
    .addEventListener("click", applyVacancy);
}
