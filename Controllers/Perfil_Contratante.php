<?php

class Perfil_Contratante extends Controllers
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

    // public function Perfil_Contratante()
    // {
    //     $data['titulo_pagina'] = 'Perfil Contratante | PonsLabor.';
    //     $this->views->getView($this, 'Perfil_Contratante', $data);
    // }

    // public function Actualizar(){
        
    //     if($_GET){
    //         $id= $_GET["idUsuario"];
    //         $nombreUsuario =new Perfil_Contratante("nombreUsuario");
    //         $numDocUsuario =new Perfil_Contratante("numDocUsuario");
    //         $idTipoDocumentoFK =new Perfil_Contratante("idTipoDocumentoFK");
    //         $numTelUsuario =new Perfil_Contratante("numTelUsuario");
    //         $numTelFijo  =new Perfil_Contratante ("numTelFijo");
    //         $idBarrioFK =new Perfil_Contratante("idBarrioFK");
    //         $direccionUsuario =new Perfil_Contratante("direccionUsuario");
    //     };




    //     }
      
    // }
}
