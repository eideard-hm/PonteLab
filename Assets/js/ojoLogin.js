document.getElementById("spanMostrar").addEventListener("click", function(){
    var elementInput=document.getElementById("Contraseña");
    var elementIcon=document.getElementById("iconMostrar");
    if(elementIcon.classList.contains("active")){
        elementIcon.classList.remove("active");
        elementIcon.innerHTML = "visibility";
        elementInput.type="password";
    } else{
        elementIcon.classList.add("active");
        elementIcon.innerHTML  = "visibility_off";
        elementInput.type="text";
    }
});
