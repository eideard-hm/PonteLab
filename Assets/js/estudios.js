const formEstudios = document.getElementById('estudios');

formEstudios.addEventListener('submit', e => {
    e.preventDefault();

    const nombreInstitucion = document.getElementById('input-institucion');
    const tituloObtenido = document.getElementById('input-titulo');
    const ciudad = document.getElementById('txtCiudad');
    const gradoEstudio = document.getElementById('txtGradoEst');
    const sector = document.getElementById('txtSector');
    const anioInicio = document.getElementById('txtAnioIni');
    const mesInicio = document.getElementById('txtMesIni');
    const anioFin = document.getElementById('txtAnioFin');
    const mesFin = document.getElementById('txtMesFin');

    if (nombreInstitucion.value.trim() === '' || tituloObtenido.value.trim() === '' || ciudad.value.trim() === ''
        || gradoEstudio.value.trim() === '' || sector.value.trim() === '' || anioInicio.value.trim() === '' || mesInicio.value.trim() === ''
        || anioFin.value.trim() === '' || mesFin.value.trim() === '') {
        swal("Error", "Todos los campos son obligatorios!!", "error");
    } else if (parseInt(anioFin.value) < parseInt(anioInicio.value)) {
        swal("Datos incorrectos", "Apreciado usuario el año de finalización de sus estudios no puede ser menor al año de inicio.", "warning");
    } else if ((parseInt(anioInicio.value) === parseInt(anioFin.value) &&
        parseInt(mesInicio.value) > parseInt(mesFin.value))) {
        swal("Datos incorrectos", "Apreciado usuario el mes de finalización de sus estudios no puede ser menor al mes de inicio.", "warning");
    } else {
        insertEstudio();
    }
})

const insertEstudio = async () => {
    const formData = new FormData(formEstudios);
    const url = `${base_url}Estudios/insertEstudios`;
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
                title: "Estudios aspirante",
                text: `${msg}. Apreciado aspirante desea registrar otro estudio ?`,
                icon: "success",
                buttons: ["No", "Si, registrar otro"],
                dangerMode: false,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        formEstudios.reset();
                    } else {
                        window.location.href = `${base_url}Experiencia`;
                    }
                });
        } else {
            swal("Estudios aspirante", msg, "warning");
        }
    } catch (error) {
        swal("Error", error, "error");
    }
}