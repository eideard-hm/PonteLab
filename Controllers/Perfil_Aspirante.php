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
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Perfil_Aspirante()
    {
        $data['titulo_pagina'] = 'Perfil Aspirante | PonsLabor.';
        $this->views->getView($this, 'Perfil_Aspirante', $data);
    }

    public function inhabilitarA ()
    {
        $estadoUsuario = intvalt ("0");
        $idUsuario=intval($_SESSION['user-data']['idUsuario']);
        $request = $this->model->updateState($estadoUsuario, 
        $idUsuario);
    }
    
    public function updatePerfilAspirante(){
        if($_POST){
            if(empty($_POST['nombreApellido'])||empty($_POST['titulo'])||empty($_POST['posicion'])
            ||empty($_POST['educacion'])||empty($_POST['idioma'])||empty($_POST['ciudad'])
            ||empty($_POST['numCel'])||empty($_POST['direccion'])){
                $arrResponse=['statusUser' => false,'msg'=>'¡ERROR!, Debe llenar todo los campos.'];
            }

            else{
                $idUsuario=intval($_SESSION['user-data']['idUsuario']);
                $nombreApellido=limpiarCadena($_POST['nombreApellido']);
                $titulo=limpiarCadena($_POST['titulo']);
                $posicion=limpiarCadena($_POST['posicion']);
                $educacion=limpiarCadena($_POST['educacion']);
                $idioma=limpiarCadena($_POST['idioma']);
                $ciudad =limpiarCadena($_POST['ciudad']);
                $numCel=intval($_POST['numCel']);
                $direccion=limpiarCadena($_POST['direccion']);

                $option = 2;
                $request = $this->model->updateUser(
                    $idUsuario,
                    $nombreApellido,
                    $titulo,
                    $posicion,
                    $educacion,
                    $idioma,
                    $ciudad,
                    $numCel,
                    $direccion
    
                ); 
            }
        }
        
            $arrDataAsp = $this->model->selectOneUser($request);
            if (!empty($arrDataAsp)) {
                $_SESSION['user-data'] = $arrDataAsp;        
        
        }
    
    }

}