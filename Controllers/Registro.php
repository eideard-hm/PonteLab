<?php

class Registro extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== ENVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Registro()
    {
        $data['list_tipodoc'] = $this->model->selectTipoDoc();
        $data['list_rol'] = $this->model->selectRol();
        $data['list_barrio'] = $this->model->selectBarrio();
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
                $arrResponse = array('estadoUser' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    //Método controlador para insertar y/o editar usuarios
    public function setUser()
    {
        if ($_POST) {
            //verificar que ningun campo este vació
            if (
                empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['documento'])
                || empty($_POST['numDoc']) || empty($_POST['numCel']) || empty($_POST['numFijo'])
                || empty($_POST['estado']) || empty($_POST['rol']) || empty($_POST['barrio'])
                || empty($_POST['direccion'])
            ) {
                $arrResponse = array("estadoUser" => false, "msg" => "Los datos ingresado son incorrectos :(");
            } else {
                $intIdUsuario = intval($_POST['idUsuario']);
                $strEmail = strtolower(limpiarCadena($_POST['email'])); //strtolower(convertir todos las letras en minusculas)
                $strPass = limpiarCadena($_POST['pass']);
                $strTipoDoc = intval(limpiarCadena($_POST['documento']));
                $strNumDoc = limpiarCadena($_POST['numDoc']);
                $strNumTel = limpiarCadena($_POST['numCel']);
                $strNumTelFijo = limpiarCadena($_POST['numFijo']);
                $strEstado = intval(limpiarCadena($_POST['estado']));
                $rol = intval(limpiarCadena($_POST['rol']));
                $barrio = intval(limpiarCadena($_POST['barrio']));
                $direccion =  limpiarCadena($_POST['direccion']);
                $strImagen = addslashes(file_get_contents($_FILES['foto']['tmp_name']));

                //método par actualizar e insertar
                if ($intIdUsuario === 0 || $intIdUsuario === '' || $intIdUsuario === null) {
                    /*-----------------INSERTAR USUARIO ---------------*/
                    $option = 1;
                    //INSERTAR LOS DATOS EN EL MODELO DEL USUARIO
                    $request_user = $this->model->insertUser(
                        $strEmail,
                        $strPass,
                        $strTipoDoc,
                        $strNumDoc,
                        $strNumTel,
                        $strNumTelFijo,
                        $strEstado,
                        $rol,
                        $barrio,
                        $direccion,
                        $strImagen
                    );
                } else {
                    /*-----------------------------ACTUALIZAR USUARIO---------- */
                    $option = 2;
                    //INSERTAR LOS DATOS EN EL MODELO DEL ANUNCIO
                    $request_user = $this->model->updateUser(
                        $intIdUsuario,
                        $strEmail,
                        $strPass,
                        $strTipoDoc,
                        $strNumDoc,
                        $strNumTel,
                        $strNumTelFijo,
                        $strEstado,
                        $rol,
                        $barrio,
                        $direccion,
                        $strImagen
                    );
                }

                //evaluar si la respuesta es mayor a cero, quiero decir que si se inserto
                if ($request_user > 0) {
                    if ($option == 1) {
                        $arrResponse = array('estadoUser' => true, 'msg' => 'Datos almacenados correctamente :)');
                    } elseif ($option == 2) {
                        $arrResponse = array('estadoUser' => true, 'msg' => 'Datos actualizados correctamente :)');
                    }
                } elseif ($request_user == 'exits') {
                    $arrResponse = array('estadoUser' => false, 'msg' => '!Atención! el usuario ya existe. Intenta con otro!');
                } else {
                    $arrResponse = array('estadoUser' => false, 'msg' => 'No es posible almacenar los datos :(');
                }
            }
            //retornar el valor de array en formato json
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die(); //detener o cerrar el proceso
    }
}
