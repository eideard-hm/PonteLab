import { sweetAlert } from "./functionsGlobals.js";

const formVacancy = document.querySelector('#form-vacancy');
const bntSubmit = document.getElementById('btn_submit');

const listVacantes = document.querySelector('#list-vacantes');

/*  RECEPCION DE VALOR DEL ELEMENTO DEFINIDO btn_submit, previniendo el evento por defecto en
caso de ser este btn clicado y ejecutanfdo el metodo validateFormUser*/

document.addEventListener('DOMContentLoaded', async () => {
    if (listVacantes) {
        await getAllVacantes();
    }
})

if (bntSubmit) {
    bntSubmit.addEventListener('click', e => {
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
        const res = await fetch(url, {
            method: 'POST',
            body: formData
        })
        const { statusUser, msg } = await res.json();

        if (statusUser) {
            sweetAlert("Vacante", msg, "success");
        }
        else {
            sweetAlert("Error", msg, "error");//mostrar la alerta
        }
    }
    catch (error) {
        sweetAlert("Error", error, "error");
    }
}

const validateFormVacancy = () => {
    tinyMCE.triggerSave();
    const id = document.querySelector('#idVacancy').value;
    const nombre = document.querySelector('#nombre').value;
    const cantidad = document.querySelector('#cantidad').value;
    const especificaciones = document.querySelector('#especificaciones').value;
    const perfil = document.querySelector('#perfil').value;
    const tipoContrato = document.querySelector('#tipoContrato').value;
    const sueldo = document.querySelector('#sueldo').value;
    const fechapublicacion = document.querySelector('#fechapublicacion').value;
    const fechacierre = document.querySelector('#fechacierre').value;
    const direccion = document.querySelector('#direccion').value;
    const estado = document.querySelector('#estado').value;
    const sector = document.querySelector('#idSectorFK').value;


    if (nombre === '' || cantidad === '' || especificaciones === '' || perfil === '' || tipoContrato === ''
        || sueldo === '' || fechapublicacion === '' || fechacierre === '' || direccion === '' || estado === '' || sector === '') {
        sweetAlert(
            'Ha ocurrido un error',
            'Todos los campos son obligatorios.',
            'error'
        )
        return false;
    }
    else {
        insertVacancy();
    }
}

const formRequirement = document.querySelector('#form-requirement');
const bntSubmit_ = document.getElementById('btn_submit_');

/*  RECEPCION DE VALOR DEL ELEMENTO DEFINIDO btn_submit, previniendo el evento por defecto en
caso de ser este btn clicado y ejecutanfdo el metodo validateFormUser*/

if (bntSubmit_) {
    bntSubmit_.addEventListener('click', e => {
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
            method: 'POST',
            body: formData_
        })
        const { statusUser, msg } = await res.json();

        if (statusUser) {
            swal("Requisito Vacante", msg, "success");
        }
        else {
            swal("Error", msg, "error");//mostrar la alerta
        }
    }
    catch (error) {
        swal("Error", error, "error");
    }
}

const validateFormRequirement = () => {
    tinyMCE.triggerSave();
    const idVacanteFK = document.querySelector('#idVacanteFK').value;
    const idRequisitosFK = document.querySelector('#idRequisitosFK').value;
    const especficacionRequisitos = document.querySelector('#especficacionRequisitos').value;
    if (especficacionRequisitos === '' || idRequisitosFK === '' || idVacanteFK === '') {
        sweetAlert(
            'Ha ocurrido un error',
            'Todos los campos son obligatorios.',
            'error'
        )
        return false;
    }
    else {
        insertRequirement();
    }
}

/**
 * Función que carga toda la lista de vacantes registradas
 */
const getAllVacantes = async () => {
    const url = `${base_url}Vacante/getAllVacantes`;
    try {
        const req = await fetch(url);
        const { status, data } = await req.json();
        let imagenUsuario = '';

        listVacantes.innerHTML = '';
        if (status) {
            data.forEach(vacante => {
                if (vacante.imagenUsuario === null) {
                    imagenUsuario = 'upload.svg';
                } else {
                    imagenUsuario = vacante.imagenUsuario;
                }

                listVacantes.innerHTML += `
                <div class="single-job-post row nomargin" data-idVacante="${vacante.idVacante}">
                    <!-- Job Company -->
                    <div class="col-md-2 col-xs-3">
                        <div class="job-company">
                            <a href="${base_url}Vacante/DetallesVacante/${vacante.idVacante}" data-idVacante="${vacante.idVacante}">
                                <img src="${base_url}Assets/img/${imagenUsuario}" alt="${vacante.nombreUsuario}" class="img-fluid" />
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
        }
    } catch (error) {
        sweetAlert("Error", error, "error");
    }
}