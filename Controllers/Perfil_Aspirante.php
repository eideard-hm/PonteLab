<?php

class Perfil_Aspirante extends Controllers
{


    public function __construct()
    {
        parent::__construct();
        session_start();
        // //isset : verifica que la varible de sesion si exista
        if (!isset($_SESSION['login'])) {
            header('Location: http://localhost/PonsLabor/Login');
        }
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            header('Location: http://localhost/PonsLabor/Menu/Menu_Contratante');
        }
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Perfil_Aspirante()
    {
        $data['titulo_pagina'] = 'Perfil Aspirante | PonsLabor.';
        $data['list_tipodoc'] = $this->model->selectTipoDoc();
        $data['list_barrio'] = $this->model->selectBarrio();
        $this->views->getView($this, 'Perfil_Aspirante', $data);
    }
    
    public function inhabilitarA ()
    {
        $idUsuario=intval($_SESSION['user-data']['idUsuario']);
        $estadoUsuario=intval($_POST['estado']);
        $request = $this->model->updateState($idUsuario,$estadoUsuario 
        );
    }

    public function updatePerfilAspirante()
    {
        if($_POST){
            if(
            empty($_POST['nombreApellido']) || empty($_POST['titulo']) || empty($_POST['posicion'])
            || empty($_POST['idioma']) || empty($_POST['numDoc']) || empty($_POST['direccion']) || empty($_POST['Barrio'])
            ) {
                $arrResponse=['statusUser' => false, 'msg' => '¡ERROR!, Debe llenar todo los campos.'];
            } else {
                $idUsuario=intval($_SESSION['user-data']['idUsuario']);
                $nombreApellido=limpiarCadena($_POST['nombreApellido']);
                $titulo=intval($_POST['titulo']);
                $posicion=intval($_POST['posicion']);
                $idioma=intval($_POST['idioma']);
                $numDoc=intval($_POST['numDoc']);
                $direccion=limpiarCadena($_POST['direccion']);
                $Barrio=limpiarCadena($_POST['Barrio']);

                $option = 2;
                $request = $this->model->updateUser(
                    $idUsuario,
                    $nombreApellido,
                    $titulo,
                    $posicion,
                    $idioma,
                    $numDoc,
                    $direccion,
                    $Barrio
                );
                
                if ($option === 2) {
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
    
        
           /* $arrDataAsp = $this->model->selectOneUser($request);
            if (!empty($arrDataAsp)) {
                $_SESSION['user-data'] = $arrDataAsp;        
        
        }*/
    
    }
}
