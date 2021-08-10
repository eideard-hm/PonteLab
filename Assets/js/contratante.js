const formContractor = document.querySelector('#form-contractor');
const bntSubmit = document.getElementById('btn_submit');

/*  RECEPCION DE VALOR DEL ELEMENTO DEFINIDO btn_submit, previniendo el evento por defecto en
caso de ser este btn clicado y ejecutanfdo el metodo validateFormUser*/

bntSubmit.addEventListener('click', e => {
    e.preventDefault();

    /*validateFormVacancy();*/
    insertContractor();
});

const insertContractor = async () => {
    //enviar los datos mediante una petición fetch
    tinyMCE.triggerSave();
    let formData = new FormData(formContractor);
    const url = 'http://localhost/PonsLabor/Contratante/setContractor';

    try {
        const res = await fetch(url, {
            method: 'POST',
            body: formData
        })
        const { statusUser, msg } = await res.json();

        if (statusUser ) {
            swal("Contratante", msg, "success");              
        }
        else {
            swal("Error", msg, "error");//mostrar la alerta
        }
    } 
    catch (error) {
        swal("Error", error, "error");
    }
}

const validateFormContractor = () => {
    const id = document.querySelector('#idContractor').value;
    const especificaciones = document.querySelector('#especificaciones').value;
    const idUsuarioFK = '';

    if (especificaciones === '') {
        swal(
            'Error',
            'Todos los campos son obligatorios.',
            'error'
        )
        return false;
    }
    else {
        insertContractor();
    }
}