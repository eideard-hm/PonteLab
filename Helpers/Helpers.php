<?php

//limpar las cadenas de texto para evitar inyecciones sql
function limpiarCadena($strCadena)
{
    $cadena = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $strCadena); //limpiar el exceso de espacios
    $cadena = trim($cadena); //eliminar espacios al inicio y al final de la cande de texto
    $cadena = stripslashes($cadena); //eliminar eslasches hacia atras \
    $cadena = str_ireplace("<script>", "", $cadena); //reemplazar el el valor del script
    $cadena = str_ireplace("</script>", "", $cadena); //reemplazar el el valor del script
    $cadena = str_ireplace("<script src", "", $cadena); //reemplazar el el valor del script
    $cadena = str_ireplace("<script type=", "", $cadena); //reemplazar el el valor del script
    //limipar las consultas SQL
    $cadena = str_ireplace("SELECT * FROM", "", $cadena); //limpiar el tipo de consulta
    $cadena = str_ireplace("DELETE FROM", "", $cadena); //limpiar el tipo de consulta
    $cadena = str_ireplace("INSERT INTO", "", $cadena); //limpiar el tipo de consulta
    $cadena = str_ireplace("UPDATE SET", "", $cadena); //limpiar el tipo de consulta

    $cadena = str_ireplace("--", "", $cadena); //no queremos qie ingresen dobles guiones
    $cadena = str_ireplace("^", "", $cadena); //no queremos que ingresen el sibolo de exponente
    $cadena = str_ireplace("[", "", $cadena); //no queremos que ingresen corchetes
    $cadena = str_ireplace("]", "", $cadena); //no queremos que ingresen corchetes
    $cadena = str_ireplace("==", "", $cadena); //no queremos que ingresen dobles iguales
    $cadena = str_ireplace(";", "", $cadena); //no queremos que ingresen punto y coma
    return $cadena;
}
