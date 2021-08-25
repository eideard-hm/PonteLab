<?php
class Perfil_Contratante extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        // //isset : verifica que la varible de sesion si exista
        if (!isset($_SESSION['login'])) {
            header('Location:' . URL . 'Login');
        }
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Aspirante') {
            header('Location:' . URL . 'Menu');
        }
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Perfil_Contratante()
    {
        $data['list_tipodoc'] = $this->model->selectTipoDoc();
        $data['list_barrio'] = $this->model->selectBarrio();
        $data['titulo_pagina'] = 'Perfil Contratante | PonsLabor.';
        $this->views->getView($this, 'Perfil_Contratante', $data);
    }
    public function updatePerfilContratante()
    {
        if ($_POST) {
            if (
                empty($_POST['txtNombre']) || empty($_POST['tipoDoc']) || empty($_POST['numDoc'])
                || empty($_POST['mobile']) || empty($_POST['phone']) || empty($_POST['Barrio'])
                || empty($_POST['Dirección'])
            ) {
                $arrResponse = ['statusUser' => false, 'msg' => 'Atención, Todos los campos son obligatorios.'];
            } else {
                $idUsuario = intval($_SESSION['user-data']['idUsuario']);
                $nombreUsuario = limpiarCadena($_POST['txtNombre']);
                $TipoDoc = intval($_POST['tipoDoc']);
                $numDoc = limpiarCadena($_POST['numDoc']);
                $numMobil = limpiarCadena($_POST['mobile']);
                $numPhone = limpiarCadena($_POST['phone']);
                $Barrio = intval($_POST['Barrio']);
                $direccion = limpiarCadena($_POST['Dirección']);
                $option = 2;
                $request = $this->model->updateUser(
                    $idUsuario,
                    $nombreUsuario,
                    $TipoDoc,
                    $numDoc,
                    $numMobil,
                    $numPhone,
                    $Barrio,
                    $direccion
                );
                if ($request > 0) {
                    $arrResponse = ['statusUser' => true, 'msg' => 'Los datos se actualizaron correctamente', 'value' => $request];
                } elseif ($request === 'exits') {
                    $arrResponse = ['statusUser' => false, 'msg' => 'Atención, los datos ya existen', 'value' => $request];
                } else {
                    $arrResponse = ['statusUser' => false, 'msg' => 'Atención, los datos no se actualizaron correctamente', 'value' => $request];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }
    public function inactivarCuenta()
    {
        if ($_POST) {
            $idUsuario = intval(limpiarCadena($_POST['idUsuario']));
            $estadoUsuario = 1;
            $request = $this->model->inactivarCuenta($idUsuario, $estadoUsuario);

            if ($request > 0) {
                $arrResponse = ['statusUser' => true, 'msg' => 'Usuario inactivado correctamente.'];
            } else {
                $arrResponse = ['statusUser' => false, 'msg' => 'Ha ocurrido un error en el servidor'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
