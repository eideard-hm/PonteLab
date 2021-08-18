<?php

class Registro extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        // //isset : verifica que la varible de sesion si exista
        if (isset($_SESSION['login'])) {
            if ($_SESSION['user-data']['nombreRol'] === 'Contratante') {
                header('Location: http://localhost/PonsLabor/Menu/Menu_Contratante');
            } else {
                header('Location: http://localhost/PonsLabor/Menu');
            }
        }
    }

    //======================== ENVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Registro()
    {
        $data['list_tipodoc'] = $this->model->selectTipoDoc();
        $data['list_rol'] = $this->model->selectRol();
        $data['list_barrio'] = $this->model->selectBarrio();
        $data['list_sector'] = $this->model->selectAllSector();
        $data['titulo_pagina'] = 'Registrarme | PonsLabor.';
        $this->views->getView($this, 'Registro', $data);
    }

    //Método contralador para obtener todos los usuarios
    public function getAllUsers()
    {
        $arrData = $this->model->selectAllUsers();
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Método controlador para obtener un unico usuario por el id
    public function getOneUser(int $id)
    {
        $idUser = intval(limpiarCadena($id));

        if ($idUser > 0 || !empty($idUser)) {
            $arrData = $this->model->selectOneUser($idUser);
            if (empty($arrData)) {
                $arrResponse = array('estadoUser' => false, 'msg' => 'Datos no encontrado');
            } else {
                $arrResponse = array('estadoUser' => true);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    //Método controlador para insertar y/o editar usuarios
    public function setUser()
    {
        if ($_POST) {
            //verificar que los campos no vengan vacios
            if (
                empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['documento'])
                || empty($_POST['numDoc']) || empty($_POST['numCel']) || empty($_POST['numFijo'])
                || empty($_POST['rol']) || empty($_POST['barrio'])
                || empty($_POST['direccion'])
            ) {
                $arrResponse = ['statusUser' => false, 'msg' => 'Todos los campos son obligatorios, completelos correctamente e intente nuevamente!!'];
            }
            /*
            1. Se crean variables para almacenar los datos enviados en la petición
            2. Se va hacer el proceso de insertar, y lo comprobamos si el id del usuario viene vacio 
            */
            $intId = intval($_POST['idUsuario']);
            $strNombre = "";
            $strEmail = strtolower(limpiarCadena($_POST['email'])); //strtolower(convertir todos las letras en minusculas)
            $strPass = limpiarCadena($_POST['pass']);
            $intTipoDoc = intval($_POST['documento']);
            $strNumDoc = limpiarCadena($_POST['numDoc']);
            $strNumTel = limpiarCadena($_POST['numCel']);
            $strNumTelFijo = limpiarCadena($_POST['numFijo']);
            $intEstado = 1;
            $intRol = intval($_POST['rol']);
            $intBarrio = intval($_POST['barrio']);
            $strDireccion = limpiarCadena($_POST['direccion']);

            if ($intRol === 1) {
                $strNombre = ucwords(limpiarCadena($_POST['nombre']));
            } else {
                $strNombre = ucwords(limpiarCadena($_POST['nombre'])) . ' ' . ucwords(limpiarCadena($_POST['apellido'])); //ucwords (convierte las inciales de cada palabra en mayusculas)
            }

            //guardar datos de la foto
            $foto = $_FILES['foto'];
            $nameFoto = $foto['name'];
            $imgPerfil = 'upload.png';

            if (!empty($nameFoto)) {
                $imgPerfil = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
            }

            /*================== INSERTAR USUARIO =======================*/

            //encriptar la contraseña ingresada
            $strPass = encriptarPassword($strPass);
            if ($intId === 0 || empty($intId)) {
                $option = 1;
                $request = $this->model->insertUser(
                    $strNombre,
                    $strEmail,
                    $strPass,
                    $intTipoDoc,
                    $strNumDoc,
                    $strNumTel,
                    $strNumTelFijo,
                    $intEstado,
                    $intRol,
                    $intBarrio,
                    $strDireccion,
                    $imgPerfil
                );
            } else {
                /*================== EDITAR USUARIO =======================*/
                $option = 2;
                $request = $this->model->updateUser(
                    $intId,
                    $strEmail,
                    $strPass,
                    $intTipoDoc,
                    $strNumDoc,
                    $strNumTel,
                    $strNumTelFijo,
                    $intEstado,
                    $intRol,
                    $intBarrio,
                    $strDireccion,
                    $imgPerfil
                );
            }

            if ($request > 0 && is_numeric($request)) {
                if ($option === 1) {                    //cargar y guardar la imagen en el servidor
                    //Almacenar la imagen en la carpeta del servidor
                    if (!empty($nameFoto)) {
                        uploadImages($foto, $imgPerfil);
                    }

                    //lógica para enviar el correo electronico de confirmación de cuenta
                    $token = token();
                    $url_recovery = URL . "Registro/confirmUser/{$request}/{$token}";
                    $rolUsuario = "";
                    if ($intRol === 1) {
                        $rolUsuario = 'Contratante';
                    } else {
                        $rolUsuario = 'Aspirante';
                    }

                    //arreglo con los datos para el envió del correo electronico
                    $dataUsuario = [
                        'idUsuario' => $request,
                        'nombreUsuario' => $strNombre,
                        'email' => $strEmail,
                        'asunto' => 'Activar cuenta para el usuario con el ID: ' . $request . ' y rol: ' . $rolUsuario . ' - ' . NOMBRE_REMITENTE,
                        'url_recovery' => $url_recovery
                    ];

                    $sendEmail = sendEmail($dataUsuario, 'email_ConfirmarCuenta');
                    if ($sendEmail) {
                        $arrResponse = ['statusUser' => true, 'msg' => 'ok'];
                    } else {
                        $arrResponse = ['statusUser' => false, 'msg' => 'Correo no enviado'];
                    }
                } elseif ($option === 2) {
                    $arrResponse = ['statusUser' => true, 'msg' => 'Los datos del usuario han sido modificado existosamente :)', 'value' => $request];
                }
            } elseif ($request === 'exits') {
                $arrResponse = array('statusUser' => false, 'msg' => '!Atención! el usuario ya se encuentra registrado!!. Intenta con otro', 'value' => $request);
            } else {
                $arrResponse = array('statusUser' => false, 'msg' => 'No es posible almacenar los datos :(', 'value' => $request);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    //Método para activar la cuenta
    public function confirmUser()
    {
        $arrUrl =  explode('/', implode($_GET));
        $idUser = intval($arrUrl[2]);

        //Peticion para modificar el estado del usuario y activar la cuenta
        $intEstado = 0;
        $request = $this->model->setEstadoUser(intval($idUser), $intEstado);
        if (!empty($request)) {
            //petición para traer los datos del usuario y crear las variables
            //de sesión

            //cargar las variables de sesión
            $arrData = $this->model->selectOneUser($idUser);
            if (!empty($arrData)) {
                $_SESSION['id'] = $arrData['idUsuario'];
                $_SESSION['login'] = true;
                $_SESSION['user-data'] = $arrData;

                //petición para cargar la imagen del usuario
                $imgProfile = $this->model->selectImgProfile($_SESSION['id']);
                $_SESSION['imgProfile'] = URL . "Assets/img/uploads/{$imgProfile['imagenUsuario']}";
            }

            $arrResponse = ['statusUser' => true, 'msg' => 'Cuenta activada correctamente. Gracias por preferir nuestros servicios :)'];

            if ($arrData['nombreRol'] === 'Contratante') {
                header('Location:' . URL . 'Menu/Menu_Contratante');
            } else {
                header('Location:' . URL . 'Menu');
            }
        } else {
            $arrResponse = ['statusUser' => false, 'msg' => 'Ha fallado la activación de la cuenta. Intenta más tarde :c'];
        }
        json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
}
