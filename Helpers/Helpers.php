<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('vendor/autoload.php');

//retorna la url del proyecto
function base_url()
{
    return URL;
}

//funciones para encriptar la contraseña
function encriptarPassword(string $password)
{
    return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
}

// función para subir las fotos al servidor

function uploadImages(array $foto, string $nameFoto)
{
    $url_tmp = $foto['tmp_name'];
    $destino = "Assets/img/uploads/{$nameFoto}";
    $move = move_uploaded_file($url_tmp, $destino);
    return $move;
}

//función para el envió de correos electronicos
/*
    @var $data = array con los datos para el envió del correo
    @var $template = nombre de una plantilla para enviar el correo
*/
function sendEmail(array $data, $template)
{
    $asunto = $data['asunto'];
    $emailDestino = $data['email'];
    $nombreDestino = $data['nombreUsuario'];
    $empresa = NOMBRE_REMITENTE;
    $remitente = EMAIL_REMITENTE;
    $emailDefault = EMAIL_DEFAULT;

    $email = new PHPMailer(true);

    try {
        //configuraciones del SMTP
        //SMTP: Simple Mail Transfer Protocol (Protocolo para transferencia simple de correo)
        // $email->SMTPDebug = SMTP::DEBUG_SERVER;
        $email->isSMTP();
        $email->Host = 'smtp.gmail.com';
        $email->SMTPAuth = true;
        $email->Username = 'team.pontelab@gmail.com';
        $email->Password = 'Pontelab2021';
        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $email->Port = 587;

        //envió
        //setFrom() -> direccion desde donde se van a enviar los correos
        // addAddress() -> direccion a la cual se va a enviar el correo
        $email->setFrom($remitente, $empresa);
        $email->addAddress($emailDestino, $nombreDestino);
        $email->addCC($emailDefault);

        //enviar archivos en el correo
        // $email->addAttachment('archivo', nombre);

        //tipos de correo a enviar
        //isHTML(true) -> definir que vamos a colocar elementos HTML dentro del archivo
        $email->isHTML(true);
        $email->Subject = $asunto;
        ob_start();
        require_once("Views/Components/Email/{$template}.php");
        $body = ob_get_clean();
        $email->Body = $body;

        return $email->send();
    } catch (Exception $e) {
        echo $email->ErrorInfo . ' ' . $e;
    }
}

//función para generar un token
function token()
{
    $r1 = bin2hex(random_bytes(10));
    $r2 = bin2hex(random_bytes(10));
    $r3 = bin2hex(random_bytes(10));
    $r4 = bin2hex(random_bytes(10));
    return $r1 . $r2 . $r3 . $r4;
}

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
