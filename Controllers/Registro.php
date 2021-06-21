<?php

class Registro extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Registro()
    {
        $data['titulo_pagina'] = 'Registrarme | PonsLabor.';
        $this->views->getView($this, 'Registro', $data);
    }

    public function setUser()
    {
        if ($_POST) {
            //verificar que ningun campo este vació
            if (
                empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['rol'])
                || empty($_POST['fechaFinAnuncio']) ||
                empty($_POST['estadoAnuncio'])
            ) {
                $arrResponse = array("estadoUser" => false, "msg" => "Los datos ingresado son incorrectos :(");
            } else {
                $intIdAnuncio = intval($_POST['idAnuncio']);
                $strTitulo = ucfirst((limpiarCadena($_POST['tituloAnuncio'])));
                $strCuerpo = limpiarCadena($_POST['cuerpoAnuncio']);
                $strInicio = limpiarCadena($_POST['fechaInicioAnuncio']);
                $strFin = limpiarCadena($_POST['fechaFinAnuncio']);
                $strImagen = addslashes(file_get_contents($_FILES['imagenAnuncio']['tmp_name']));
                $strEstadoA = ($_POST['estadoAnuncio']);

                //método par actualizar e insertar
                if ($intIdAnuncio == 0) {
                    /*-----------------INSERTAR USUARIO ---------------*/
                    $option = 1;
                    //INSERTAR LOS DATOS EN EL MODELO DEL USUARIO
                    $request_anuncio = $this->model->insertUser(
                        $strTitulo,
                        $strCuerpo,
                        $strInicio,
                        $strFin,
                        $strImagen,
                        $strEstadoA
                    );
                } else {
                    /*-----------------------------ACTUALIZAR ANUNCIO---------- */
                    $option = 2;

                    //INSERTAR LOS DATOS EN EL MODELO DEL ANUNCIO
                    $request_anuncio = $this->model->updateAnuncio(
                        $intIdAnuncio,
                        $strTitulo,
                        $strCuerpo,
                        $strInicio,
                        $strFin,
                        $strImagen,
                        $strEstadoA
                    );
                }

                //evaluar si la respuesta es mayor a cero, quiero decir que si se inserto
                if ($request_anuncio > 0) {
                    if ($option == 1) {
                        $arrResponse = array('estadoUser' => true, 'msg' => 'Datos almacenados correctamente :)');
                    } elseif ($option == 2) {
                        $arrResponse = array('estadoUser' => true, 'msg' => 'Datos actualizados correctamente :)');
                    }
                } elseif ($request_anuncio == 'exits') {
                    $arrResponse = array('estadoUser' => false, 'msg' => '!Atención! el anuncio ya existe. Intenta con otro');
                } else {
                    $arrResponse = array('estadoUser' => false, 'msg' => 'No es posible almacenar los datos :(');
                }
            }
            //retornar el valor de array en formato json
            print_r(json_encode($arrResponse, JSON_UNESCAPED_UNICODE));
        }
        die(); //detener o cerrar el proceso
    }
}
