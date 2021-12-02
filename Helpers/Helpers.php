<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('vendor/autoload.php');

/**
 * Función que retorna la ruta raiz del proyecto
 * 
 * @return string Ruta raiz del proyecto
 */
function base_url()
{
    return URL;
}
/**
 * Función que retorna la ruta de los archivos css del proyecto
 * @return string Ruta raiz del proyecto
 */
function assets_url_css()
{
    return URL . 'Assets/css/';
}

/**
 * Función que retorna la ruta de los javascript del proyecto
 * @return string Ruta raiz del proyecto
 */
function assets_url_js()
{
    return URL . 'Assets/js/';
}

/**
 * Función que retorna la ruta de las imagenes del proyecto.
 * @return string Ruta raiz del proyecto
 */
function assets_url_img()
{
    return URL . 'Assets/img/';
}

function dep($data)
{
    $format  = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('<pre>');
    return $format;
}
/**
 * Función para encriptar contraseñas
 * 
 * @return void Retorna la contraseña encriptada
 * @param string $password Cadena de caracteres que se quiere encriptar
 * @author Edier Heraldo Hernandez Molano
 */
function encriptarPassword(string $password)
{
    return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
}

/**
 * Función para subir las fotos al servidor
 * 
 * @return boolean true si se ha movido correctamente la imagen a la carpeta al servidor
 * @param array $foto Arreglo con las especificaciones de la imagen
 * @param string $nameFoto Nombre con el que se va a guardar la imagen
 * @author Edier Heraldo Hernandez Molano
 */
function uploadImages(array $foto, string $nameFoto)
{
    $url_tmp = $foto['tmp_name'];
    $destino = "Assets/img/uploads/{$nameFoto}";
    return move_uploaded_file($url_tmp, $destino);
}

/** 
 * Función para eliminar un archivo del servidor.
 * @param string $nameFoto Nombre del archivo que se va a eliminar.
 * @return boolean true si se ha eliminado correctamente el archivo
 * @author Edier Heraldo Hernandez Molano
 */
function deleteImage(string $nameFoto)
{
    $destino = "Assets/img/uploads/{$nameFoto}";
    return unlink($destino);
}

/**
 * Función para el envió de correos electronicos con PHPMailer
 * 
 * @return boolean true si se envió el correo correctamente
 * @param array $data arreglo con los datos para el envió del correo
 * @param string $template nombre de una plantilla para enviar el correo
 * @author Edier Heraldo Hernandez Molano
 */
function sendEmail(array $data, $template)
{
    $empresa = NOMBRE_REMITENTE;
    $remitente = EMAIL_REMITENTE;
    $emailDefault = EMAIL_DEFAULT;

    $email = new PHPMailer(true);
    $envioEmail = false;

    try {
        //configuraciones del SMTP
        //SMTP: Simple Mail Transfer Protocol (Protocolo para transferencia simple de correo)
        // $email->SMTPDebug = SMTP::DEBUG_SERVER;
        $email->isSMTP();
        $email->SMTPSecure = 'tls';
        $email->Host = HOST;
        $email->SMTPAuth = true;
        $email->Username = USER_NAME;
        $email->Password = PASSWORD;
        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $email->Port = PORT;

        // Activo condificacción utf-8
        $email->CharSet = 'UTF-8';

        //envió
        //setFrom() -> direccion desde donde se van a enviar los correos
        // addAddress() -> direccion a la cual se va a enviar el correo
        $email->setFrom($remitente, $empresa);
        $email->addAddress($data['email'], $data['nombreUsuario']);
        // $email->addCC($emailDefault);

        //enviar archivos en el correo
        // $email->addAttachment('archivo', nombre);

        //tipos de correo a enviar
        //isHTML(true) -> definir que vamos a colocar elementos HTML dentro del archivo
        $email->isHTML(true);
        $email->Subject = $data['asunto'];
        ob_start();
        require_once("Views/Components/Email/{$template}.php");
        $body = ob_get_clean();
        $email->Body = $body;

        if ($email->send()) {
            $envioEmail = true;
        } else {
            $envioEmail = false;
        }
    } catch (Exception $e) {
        // echo $email->ErrorInfo . ' ' . $e;
        $envioEmail = false;
    }
    return $envioEmail;
}

/**
 * Generar un token de forma aleatoria
 * 
 * @return string Token aleatorio 
 * @author Edier Heraldo Hernandez Molano
 */

function token()
{
    $r1 = bin2hex(random_bytes(10));
    $r2 = bin2hex(random_bytes(10));
    $r3 = bin2hex(random_bytes(10));
    $r4 = bin2hex(random_bytes(10));
    return $r1 . $r2 . $r3 . $r4;
}

/**
 * Función para limpiar datos provenientes de inputs, ayuda a prevenir inyecciones
 * SQL o código que pueda alterar el funcionamiento del programa
 * 
 * @return string[]|string Cadena limpia o arreglo de cadenas
 * @param string $strCadena Campo que se quiere limpiar
 * @author Edier Heraldo Hernandez Molano
 */

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

    $cadena = str_ireplace("--", "", $cadena); //no queremos que ingresen dobles guiones
    $cadena = str_ireplace("^", "", $cadena); //no queremos que ingresen el sibolo de exponente
    $cadena = str_ireplace("[", "", $cadena); //no queremos que ingresen corchetes
    $cadena = str_ireplace("]", "", $cadena); //no queremos que ingresen corchetes
    $cadena = str_ireplace("==", "", $cadena); //no queremos que ingresen dobles iguales
    $cadena = str_ireplace(";", "", $cadena); //no queremos que ingresen punto y coma
    return $cadena;
}
