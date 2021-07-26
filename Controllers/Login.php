<?php

class Login extends Controllers
{
    public function __construct()
    {
        session_start();
        // //isset : verifica que la varible de sesion si exista
        // if (isset($_SESSION['login'])) {
        //     header('Location: http://localhost/PonsLabor/Menu');
        // }
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Login()
    {
        $data['titulo_pagina'] = 'Iniciar Sesión | PonsLabor.';
        $this->views->getView($this, 'Login', $data);
    }

    public function loginUser()
    {
        if ($_POST) {
            if (empty($_POST['Usuario']) || empty($_POST['Password'])) {
                $arrResponse = array('statusLogin' => false, 'msg' => 'Todos los campos son obligatorios.');
            } else {
                $Usuario = strtolower(limpiarCadena($_POST['Usuario'])); //convertir todas las letras en minusculas
                $Password = limpiarCadena($_POST['Password']);

                $request = $this->model->validatePassword($Usuario, $Password);

                if ($request) {
                    $arrData = $this->model->loginUser($Usuario, $Password);
                    if (!empty($arrData)) {
                        if ($arrData['estadoUsuario'] == 0) {
                            $_SESSION['id'] = $arrData['idUsuario'];
                            $_SESSION['login'] = true;
                            $_SESSION['user-data'] = $arrData;

                            $arrResponse = array('statusLogin' => true, 'msg' => 'ok', 'rol' => $_SESSION['rol']);
                        } else {
                            $arrResponse = array('statusLogin' => false, 'msg' => 'El usuario se encuentra inhabilitado!.');
                        }
                    } else {
                        $arrResponse = array('statusLogin' => false, 'msg' => 'El usuario no se encuentra registrado. Puedes crear una cuenta es gratis!!', 'data' => $arrData);
                    }
                } elseif ($request === 'error' || $request === false) {
                    $arrResponse = array('statusLogin' => false, 'msg' => 'El email o la contraseña ingresados son incorrectos.');
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getImgProfile(int $id){
        $idUser = intval(limpiarCadena($id));

        if ($idUser > 0 || !empty($idUser)) {
            $arrData = $this->model->selectImgProfile($idUser);
            if (empty($arrData)) {
                $arrResponse = array('statusImg' => false, 'msg' => 'No se encontró una imagen asociada a ese usuario.');
            } else {
                $arrResponse = array('statusImg' => true, 'data' => $arrData);
            }
            echo base64_encode($arrData['imagenUsuario']);
        }
    }
}
