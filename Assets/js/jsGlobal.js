/*
    * Aqui van las funciones o script que se van a utilizar en todos los archivos
    * del programa
*/

/*========================= MODO OSCURO =========================*/
btnSwitch = document.getElementById('switch');

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