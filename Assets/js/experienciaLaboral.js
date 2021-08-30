const experienciaLaboral = document.getElementById('experiencia-laboral');

experienciaLaboral.addEventListener('submit', e => {
    e.preventDefault();
    tinyMCE.triggerSave();
    const empresa = document.getElementById('txtEmpresa');
    const sectorLaboro = document.getElementById('txtSectorExp');
    const ciudad = document.getElementById('txtCiudadLab');
    const tipoExperiencia = document.getElementById('txtTipoExp');
    const puestoDesempeño = document.getElementById('txtPuesto');
    const anioInicio = document.getElementById('txtAnioIniExp');
    const mesInicio = document.getElementById('txtMesIniExp');
    const anioFin = document.getElementById('txtAnioFinExp');
    const mesFin = document.getElementById('txtMesFinExp');
    const funcionDesempeño = document.getElementById('especificaciones');

    if (empresa.value.trim() === '' || sectorLaboro.value.trim() === '' || ciudad.value.trim() === ''
        || tipoExperiencia.value.trim() === '' || puestoDesempeño.value.trim() === '' || anioInicio.value.trim() === '' || mesInicio.value.trim() === ''
        || anioFin.value.trim() === '' || mesFin.value.trim() === '' || funcionDesempeño.value.trim() === '') {
        swal("Error", "Todos los campos son obligatorios!!", "error");
    } else if (parseInt(anioFin.value) < parseInt(anioInicio.value)) {
        swal("Datos incorrectos", "Apreciado usuario el año de finalización laboral no puede ser menor al año de inicio.", "warning");
    } else if ((parseInt(anioInicio.value) === parseInt(anioFin.value) &&
        parseInt(mesInicio.value) > parseInt(mesFin.value))) {
        swal("Datos incorrectos", "Apreciado usuario el mes de finalización laboral no puede ser menor al mes de inicio.", "warning");
    } else {
        insertExperienciaLaboral();
    }
})

const insertExperienciaLaboral = async () => {
    tinyMCE.triggerSave();
    const formData = new FormData(experienciaLaboral);

    const url = `${base_url}Experiencia/insertExperiencia`;
    try {
        const req = await fetch(url, {
            method: 'POST',
            body: formData
        });
        const { status, msg } = await req.json();
        console.log(status)
        console.log(msg)
        if (status) {
            swal({
                title: "Experiencia laboral aspirante",
                text: `${msg}. Apreciado aspirante desea registrar otro experiencia laboral ?`,
                icon: "success",
                buttons: ["No", "Si, registrar otra"],
                dangerMode: false,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        experienciaLaboral.reset();
                    } else {
                        window.location.href = `${base_url}Menu`;
                    }
                });
        } else {
            swal("Experiencia laboral aspirante", msg, "warning");
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}