/*
    * Aqui van las funciones o script que se van a utilizar en todos los archivos
    * del programa
*/

/* ======================== EDITOR DE TEXTO - SANTIAGO ================== */

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('#especificaciones')) {
        tinymce.init({
            selector: '#especificaciones',
            width: "100%",
            height: 400,
            statubar: true,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
        });
    }
    if (document.querySelector('#especficacionRequisitos')) {
        tinymce.init({
            selector: '#especficacionRequisitos',
            width: "100%",
            height: 400,
            statubar: true,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
        });
    }
    if (document.querySelector('#perfil')) {
        tinymce.init({
            selector: '#perfil',
            width: "100%",
            height: 400,
            statubar: true,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
        });
    }
})

/*========================= MODO OSCURO =========================*/
const btnSwitch = document.getElementById('switch');

if (btnSwitch) {
    btnSwitch.addEventListener('click', () => {
        document.body.classList.toggle('dark');
        btnSwitch.classList.toggle('active');

        //guardamos el modo actual en el que estamos
        //classList.contains: permite saber si la clase contiene
        if (document.body.classList.contains('dark')) {
            localStorage.setItem('dark-mode', 'true');
        } else {
            localStorage.setItem('dark-mode', 'false');
        }
    });

    //obtener el modo actual en el que estamos

    if (localStorage.getItem('dark-mode') === 'true') {
        document.body.classList.add('dark');
        btnSwitch.classList.add('active');
    } else {
        document.body.classList.remove('dark');
        btnSwitch.classList.remove('active');
    }
}