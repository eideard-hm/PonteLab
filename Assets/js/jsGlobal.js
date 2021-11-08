import { divLoading } from "./functionsGlobals.js";

/*
 * Aqui van las funciones o script que se van a utilizar en todos los archivos
 * del programa
 */
const tableAplicacionVacantes = document.querySelector("#lista-vacantes");

document.addEventListener("DOMContentLoaded", () => {
  if (tableAplicacionVacantes) {
    applyVacant();
  }
  if (
    document.querySelector("#link-cv") ||
    document.querySelector("#hoja-vida")
  ) {
    getDataAspirante();
  }

  if (document.getElementById("cv-1") || document.getElementById("cv-2")) {
    changeTemplateCv();
  }

  if (document.querySelector("#generar-pdf")) {
    document.querySelector("#generar-pdf").addEventListener("click", () => {
      generarPdf();
    });
  }
});

/*========================= MODO OSCURO =========================*/
const btnSwitch = document.getElementById("switch");

if (btnSwitch) {
  btnSwitch.addEventListener("click", () => {
    document.body.classList.toggle("dark");
    btnSwitch.classList.toggle("active");

    //guardamos el modo actual en el que estamos
    //classList.contains: permite saber si la clase contiene
    if (document.body.classList.contains("dark")) {
      localStorage.setItem("dark-mode", "true");
    } else {
      localStorage.setItem("dark-mode", "false");
    }
  });

  //obtener el modo actual en el que estamos

  if (localStorage.getItem("dark-mode") === "true") {
    document.body.classList.add("dark");
    btnSwitch.classList.add("active");
  } else {
    document.body.classList.remove("dark");
    btnSwitch.classList.remove("active");
  }
}

/**===========================================================================
 *                             HOJA DE VIDA
 =============================================================================*/

/**
 *
 * @param {Element} elemento Elemento al cual se le va a agregar la clase
 * @param {String} claseAgregar  Nombre de la clase que le vamos a agregar al elemento
 */
const addClass = (elemento, claseAgregar) => {
  elemento.classList.add(claseAgregar);
};

/**
 *
 * @param {Element} elemento Elemento al cual se le va a remover la clase
 * @param  {...String} claseRemove Arreglo de clases que le vamos a quitar al elemento
 */
const removeClass = (elemento, ...claseRemove) => {
  let arrClasesRemove = claseRemove;
  arrClasesRemove.forEach((clase) => elemento.classList.remove(clase));
};

if (document.querySelector("#change-bg-cv")) {
  /**
   * Plantilla 1 -> cambiar colores
   */
  if (document.getElementById("cv-1").classList.contains("active")) {
    const header = document.querySelector("#template-1 .resume-header");
    const subtitle = document.querySelectorAll(
      ".template-1 .resume-section-title"
    );
    const iconContact = document.querySelectorAll(".template-1 .icon");
    const progressBar = document.querySelectorAll(".template-1 .progress-bar");
    document
      .getElementById("btn-change-bg-primary")
      .addEventListener("click", () => {
        addClass(header, "bg-primary");
        removeClass(header, "bg-secondary");
        removeClass(header, "bg-success");
        removeClass(header, "bg-danger");
        removeClass(header, "bg-warning");
        removeClass(header, "bg-info");
        removeClass(header, "bg-dark");

        subtitle.forEach((element) => {
          addClass(element, "text-primary");
          removeClass(
            element,
            "text-secondary",
            "text-success",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });

        iconContact.forEach((element) => {
          addClass(element, "text-primary");
          removeClass(
            element,
            "text-secondary",
            "text-success",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });

        progressBar.forEach((element) => {
          addClass(element, "bg-primary");
          removeClass(
            element,
            "text-secondary",
            "text-success",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });
      });
    document
      .getElementById("btn-change-bg-secondary")
      .addEventListener("click", () => {
        addClass(header, "bg-secondary");
        removeClass(
          header,
          "bg-primary",
          "bg-success",
          "bg-danger",
          "bg-warning",
          "bg-info",
          "bg-dark"
        );

        subtitle.forEach((element) => {
          addClass(element, "text-secondary");
          removeClass(
            element,
            "text-primary",
            "text-success",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });

        iconContact.forEach((element) => {
          addClass(element, "text-secondary");
          removeClass(
            element,
            "text-primary",
            "text-success",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });

        progressBar.forEach((element) => {
          addClass(element, "bg-secondary");
          removeClass(
            element,
            "text-primary",
            "text-success",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });
      });
    document
      .getElementById("btn-change-bg-success")
      .addEventListener("click", () => {
        addClass(header, "bg-success");
        removeClass(
          header,
          "bg-primary",
          "bg-secondary",
          "bg-danger",
          "bg-warning",
          "bg-info",
          "bg-dark"
        );

        subtitle.forEach((element) => {
          addClass(element, "text-success");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });

        iconContact.forEach((element) => {
          addClass(element, "text-success");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });

        progressBar.forEach((element) => {
          addClass(element, "bg-success");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });
      });
    document
      .getElementById("btn-change-bg-warning")
      .addEventListener("click", () => {
        addClass(header, "bg-warning");
        removeClass(
          header,
          "bg-primary",
          "bg-secondary",
          "bg-danger",
          "bg-success",
          "bg-info",
          "bg-dark"
        );

        subtitle.forEach((element) => {
          addClass(element, "text-warning");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-info",
            "text-dark"
          );
        });

        iconContact.forEach((element) => {
          addClass(element, "text-warning");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-info",
            "text-dark"
          );
        });

        progressBar.forEach((element) => {
          addClass(element, "bg-warning");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-info",
            "text-dark"
          );
        });
      });
    document
      .getElementById("btn-change-bg-info")
      .addEventListener("click", () => {
        addClass(header, "bg-info");
        removeClass(
          header,
          "bg-primary",
          "bg-secondary",
          "bg-danger",
          "bg-success",
          "bg-warning",
          "bg-dark"
        );

        subtitle.forEach((element) => {
          addClass(element, "text-info");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-warning",
            "text-dark"
          );
        });

        iconContact.forEach((element) => {
          addClass(element, "text-info");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-warning",
            "text-dark"
          );
        });

        progressBar.forEach((element) => {
          addClass(element, "bg-info");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-warning",
            "text-dark"
          );
        });
      });
    document
      .getElementById("btn-change-bg-dark")
      .addEventListener("click", () => {
        addClass(header, "bg-dark");
        removeClass(
          header,
          "bg-primary",
          "bg-secondary",
          "bg-danger",
          "bg-success",
          "bg-warning",
          "bg-info"
        );

        subtitle.forEach((element) => {
          addClass(element, "text-dark");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-warning",
            "text-info"
          );
        });

        iconContact.forEach((element) => {
          addClass(element, "text-dark");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-warning",
            "text-info"
          );
        });

        progressBar.forEach((element) => {
          addClass(element, "bg-dark");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-warning",
            "text-info"
          );
        });
      });
  }

  /**
   * Plantilla 2 -> cambiar colores
   */
  if (document.getElementById("cv-2").style.display !== "none") {
    const titleName = document.querySelector("#template-2 .resume-name");
    const subtitle = document.querySelectorAll(
      "#template-2 .resume-section-heading"
    );
    const iconContact = document.querySelectorAll("#template-2 .icon");
    document
      .getElementById("btn-change-bg-primary")
      .addEventListener("click", () => {
        addClass(titleName, "text-primary");
        removeClass(
          titleName,
          "text-secondary",
          "text-success",
          "text-danger",
          "text-warning",
          "text-info",
          "text-dark"
        );

        subtitle.forEach((element) => {
          addClass(element, "text-primary");
          removeClass(
            element,
            "text-secondary",
            "text-success",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });

        iconContact.forEach((element) => {
          addClass(element, "text-primary");
          removeClass(
            element,
            "text-secondary",
            "text-success",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });
      });
    document
      .getElementById("btn-change-bg-secondary")
      .addEventListener("click", () => {
        addClass(titleName, "text-secondary");
        removeClass(
          titleName,
          "text-primary",
          "text-success",
          "text-danger",
          "text-warning",
          "text-info",
          "text-dark"
        );

        subtitle.forEach((element) => {
          addClass(element, "text-secondary");
          removeClass(
            element,
            "text-primary",
            "text-success",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });

        iconContact.forEach((element) => {
          addClass(element, "text-secondary");
          removeClass(
            element,
            "text-primary",
            "text-success",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });
      });
    document
      .getElementById("btn-change-bg-success")
      .addEventListener("click", () => {
        addClass(titleName, "text-success");
        removeClass(
          titleName,
          "text-primary",
          "text-secondary",
          "text-danger",
          "text-warning",
          "text-info",
          "text-dark"
        );

        subtitle.forEach((element) => {
          addClass(element, "text-success");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });

        iconContact.forEach((element) => {
          addClass(element, "text-success");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-warning",
            "text-info",
            "text-dark"
          );
        });
      });
    document
      .getElementById("btn-change-bg-warning")
      .addEventListener("click", () => {
        addClass(titleName, "text-warning");
        removeClass(
          titleName,
          "text-primary",
          "text-secondary",
          "text-danger",
          "text-success",
          "text-info",
          "text-dark"
        );

        subtitle.forEach((element) => {
          addClass(element, "text-warning");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-info",
            "text-dark"
          );
        });

        iconContact.forEach((element) => {
          addClass(element, "text-warning");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-info",
            "text-dark"
          );
        });
      });
    document
      .getElementById("btn-change-bg-info")
      .addEventListener("click", () => {
        addClass(titleName, "text-info");
        removeClass(
          titleName,
          "text-primary",
          "text-secondary",
          "text-danger",
          "text-success",
          "text-warning",
          "text-dark"
        );

        subtitle.forEach((element) => {
          addClass(element, "text-info");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-warning",
            "text-dark"
          );
        });

        iconContact.forEach((element) => {
          addClass(element, "text-info");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-warning",
            "text-dark"
          );
        });
      });
    document
      .getElementById("btn-change-bg-dark")
      .addEventListener("click", () => {
        addClass(titleName, "text-dark");
        removeClass(
          titleName,
          "text-primary",
          "text-secondary",
          "text-danger",
          "text-success",
          "text-warning",
          "text-info"
        );

        subtitle.forEach((element) => {
          addClass(element, "text-dark");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-warning",
            "text-info"
          );
        });

        iconContact.forEach((element) => {
          addClass(element, "text-dark");
          removeClass(
            element,
            "text-primary",
            "text-secondary",
            "text-danger",
            "text-success",
            "text-warning",
            "text-info"
          );
        });
      });
  }
}

const changeTemplateCv = () => {
  document.getElementById("cv-1").addEventListener("click", () => {
    document
      .getElementById("css-cv")
      .setAttribute("href", `${base_url}Assets/css/cv/styleCv-1.css`);
    document.getElementById("cv-1").classList.add("active");
    document.getElementById("cv-2").classList.remove("active");
  });

  document.getElementById("cv-2").addEventListener("click", () => {
    document
      .getElementById("css-cv")
      .setAttribute("href", `${base_url}Assets/css/cv/styleCv-2.css`);
    document.getElementById("cv-2").classList.add("active");
    document.getElementById("cv-1").classList.remove("active");
  });
};

const generarPdf = () => {
  let documentoAConvertir;
  if (document.getElementById("cv-1").classList.contains("active")) {
    documentoAConvertir = document.getElementById("template-1");
  }

  if (document.getElementById("cv-2").classList.contains("active")) {
    documentoAConvertir = document.getElementById("template-2");
  }

  const fileName = document.querySelector("#generar-pdf").dataset.user;
  html2pdf()
    .set({
      margin: [0.5, 0, 1, 0],
      filename: `${fileName}.pdf`,
      image: {
        type: "jpeg",
        quiality: 0.98,
      },
      html2canvas: {
        scale: 2,
        letterRendering: true,
      },
      jsPDF: {
        unit: "in",
        format: "A4",
        orientation: "Portrait",
      },
    })
    .from(documentoAConvertir)
    .save()
    .catch((err) => console.log(err));
};

/**===========================================================================
 *                             ICONO DE HOJA DE VIDA
 =============================================================================*/

const getDataAspirante = async () => {
  const url = `${base_url}Aspirante/getDataAspirante`;
  try {
    const req = await fetch(url);
    const { status, data } = await req.json();
    if (!status && data === "no") {
      if (document.querySelector("#hoja-vida")) {
        document
          .querySelector("#hoja-vida")
          .setAttribute("disabled", "disabled");
        document.querySelector("#link-hoja-vida").setAttribute("href", "#");
      }
      if (document.querySelector("#list-cv")) {
        document.querySelector("#list-cv").setAttribute("disabled", "disabled");
        document.querySelector("#link-cv").setAttribute("href", "#");
      }
    }
  } catch (error) {
    console.error(error);
  }
};

/**===========================================================================
 *                        CARGAR INFORMACIÓN APLICACION VACANTES
 =============================================================================*/
const applyVacant = async () => {
  const url = `${base_url}Vacante/getApplyVacancys`;
  try {
    divLoading.style.display = "flex";
    const req = await fetch(url);
    const { status, data } = await req.json();

    if (status && data.length > 0) {
      tableAplicacionVacantes.innerHTML = "";
      data.forEach((vacante) => {
        tableAplicacionVacantes.innerHTML += `
        <tr>
          <td>${vacante.idAplicacionVacante}</td>
          <td>${vacante.nombreVacante}</td>
          <td>${vacante.nombreUsuario}</td>
          <td>${vacante.estadoAplicacionVacante}</td>
        </tr>
        `;
      });
    } else {
      tableAplicacionVacantes.innerHTML = `<tr>
            <td colspan="5" class="text-center">
                <h6>No ha aplicado a ninguna vacante puede aplicar <a href="${base_url}Vacante/ListaEmpleos" class="link-info">aquí.</a></h6>
            </td>
        </tr>`;
    }
    divLoading.style.display = "none";
  } catch (error) {
    console.error(error);
  }
};
