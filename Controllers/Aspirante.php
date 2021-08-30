<?php

class Aspirante extends Controllers
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

    public function Aspirante()
    {
        $data['titulo_pagina'] = 'Aspirante | PonsLabor.';
        $data['list_workStatus'] = $this->model->getAllWorkStatus();
        $data['list_idiomas'] = $this->model->getAllIdiomas();
        $this->views->getView($this, 'Aspirante', $data);
    }

    //método para traer toda la lista de puestos de interés
    public function getAllPuestoInteres()
    {
        $request = $this->model->getAllPuestoInteres();
        if (!empty($request)) {
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'Ha ocurrido un error en el servidor.'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setAspirante()
    {
        if ($_POST) {
            if (empty($_POST['textPerfilLab']) || empty($_POST['idUsuario']) || empty($_POST['txtEstado'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos lo campos son obligatorios!!'];
            }

            $strDescription = $_POST['textPerfilLab'];
            $idUsuario = intval($_POST['idUsuario']);
            $idEstadoLab = intval($_POST['txtEstado']);

            $request = $this->model->insertAspirante(
                $strDescription,
                $idUsuario,
                $idEstadoLab
            );

            if ($request > 0 && is_numeric($request)) {
                //creamos unas variables con los datos del nuevo aspirante
                $ultimoAspiranteInsertado = $this->model->selectOneAspirante(intval($request));
                $_SESSION['data-aspirante'] = $ultimoAspiranteInsertado;
                $arrResponse = ['status' => true, 'msg' => 'Aspirante registrado correctamente :)', 'value' => $_SESSION['data-aspirante']];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'No es posible almacenar los datos :('];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    //Método para insertar un puesto de interés
    public function savePuestoInteres()
    {
        if ($_POST) {
            if (empty($_POST['txtOtroPuesto'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios!!'];
            } else {
                $strPuestoInteres = limpiarCadena(strtolower($_POST['txtOtroPuesto']));
                $strPuestoInteres = limpiarCadena(ucfirst($strPuestoInteres));

                $request = $this->model->insertOtroPuestoInteres($strPuestoInteres);

                if ($request > 0 && is_numeric($request)) {
                    // $puestoInteresAspirante = $this->model->puestoInteresAspirante(
                    //     intval($_SESSION['data-aspirante']['idAspirante']),
                    //     intval($request)
                    // );

                    // if (!empty($puestoInteresAspirante)) {
                    //     $sesionPuestoInteres = $this->model->getOnePuestoInteres(intval($puestoInteresAspirante));
                    //     $_SESSION['puestoInteres-aspirante'] = $sesionPuestoInteres;
                    // } else {
                    //     $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Intente más tarde !!'];
                    // }
                    $arrResponse = ['status' => true, 'msg' => 'Puesto insertado correctamente!!'];
                } elseif ($request === 'exists') {
                    $arrResponse = ['status' => false, 'msg' => 'El puesto ya se encuentra registrado. Lo puedes seleccionar la lista.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Intenta más tarde :('];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function insertPuestoInteresAspirante()
    {
        if ($_POST) {
            if (empty($_POST['txtPuesto'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios !!'];
            } else {
                $intPuestoInteres = limpiarCadena(intval($_POST['txtPuesto']));

                $request = $this->model->puestoInteresAspirante(
                    intval($_SESSION['data-aspirante']['idAspirante']),
                    $intPuestoInteres
                );

                if ($request > 0 && is_numeric($request)) {
                    $sesionPuestoInteres = $this->model->getOnePuestoInteres(intval($request));
                    $_SESSION['puestoInteres-aspirante'] = $sesionPuestoInteres;

                    $arrResponse = ['status' => true, 'msg' => 'Puesto de interés almacenado exitosamente :)', 'sesiones' => $_SESSION['puestoInteres-aspirante']];
                } elseif ($request === 'exists') {
                    $arrResponse = ['status' => false, 'msg' => 'El puesto ya se encuentra registrado. Lo puedes seleccionar la lista.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Intenta más tarde :('];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getListAspirantes()
    {
        $request = $this->model->selectAllAspirantes();
        if (!empty($request)) {
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'Ha ocurrido un error al intentar cargar la lista de aspirantes. Por favor intenta más tarde !!'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    //Método para insertar un idioma
    public function setIdioma()
    {
        if ($_POST) {
            if (empty($_POST['txtIdioma'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios !!'];
            } else {
                $idIdioma = intval($_POST['idIdioma']);
                $nameIdioma = limpiarCadena(ucfirst(strtolower($_POST['txtIdioma'])));

                if ($idIdioma == 0) {
                    $option = 1;

                    $request = $this->model->insertNewIdioma($nameIdioma);
                } else {
                    $option = 2;

                    $request = $this->model->updateIdioma(
                        $idIdioma,
                        $nameIdioma
                    );
                }
                if ($request > 0 && is_numeric($request)) {
                    $_SESSION['idIdioma'] = intval($request);
                    if ($option == 1) {
                        $arrResponse = ['status' => true, 'msg' => 'Idioma almacenado correctamente :)', 'id' => $request];
                    } else {
                        $arrResponse = ['status' => true, 'msg' => 'Idioma actualizado correctamente :)'];
                    }
                } elseif ($request == 'exists') {
                    $arrResponse = ['status' => false, 'msg' => 'El idioma ya se encuentra registrado. Seleccionalo en la lista !!'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Por favor intenta más tarde :('];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setIdiomaAspirante()
    {
        if ($_POST) {
            if (empty($_POST['txtNivelIdioma'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios !!'];
            } else {
                $idIdioma = intval($_POST['idIdioma']);
                $idIdiomaFK = $_SESSION['idIdioma'];
                $idAspiranteFK = intval($_SESSION['data-aspirante']['idAspirante']);
                $nivelIdioma = limpiarCadena($_POST['txtNivelIdioma']);

                if ($idIdioma == 0) {
                    $option = 1;

                    $request = $this->model->insertIdiomaAspirante(
                        $idAspiranteFK,
                        $idIdiomaFK,
                        $nivelIdioma
                    );
                } else {
                    $option = 2;

                    $request = $this->model->updateIdiomaAspirante(
                        $idIdioma,
                        $idIdiomaFK,
                        $idAspiranteFK,
                        $nivelIdioma
                    );
                }
                if ($request > 0 && is_numeric($request)) {
                    $_SESSION['idIdiomaAspirante'] = intval($request);
                    if ($option == 1) {
                        $arrResponse = ['status' => true, 'msg' => 'Idioma almacenado correctamente :)'];
                    } else {
                        $arrResponse = ['status' => true, 'msg' => 'Idioma actualizado correctamente :)'];
                    }
                } elseif ($request == 'exists') {
                    $arrResponse = ['status' => false, 'msg' => 'El idioma ya se encuentra registrado. Seleccionalo en la lista !!'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Por favor intenta más tarde :('];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    //Método para insertar una habilidad
    public function setHabilidad()
    {
        if ($_POST) {
            if (empty($_POST['txtHabilidades']) || empty($_POST['txtNivelHabilidades'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios !!'];
            } else {
                $idHabilidad = intval($_POST['idHabilidad']);
                $nameHabilidad = limpiarCadena(ucfirst(strtolower($_POST['txtHabilidades'])));
                $nivelHabilidad = limpiarCadena($_POST['txtNivelHabilidades']);
                $idAspiranteFK = intval($_SESSION['data-aspirante']['idAspirante']);

                if ($idHabilidad == 0) {
                    $option = 1;

                    $request = $this->model->insertHabilidad(
                        $nameHabilidad,
                        $nivelHabilidad,
                        $idAspiranteFK
                    );
                } else {
                    $option = 2;

                    $request = $this->model->updateHabilidad(
                        $idHabilidad,
                        $nameHabilidad,
                        $nivelHabilidad,
                        $idAspiranteFK
                    );
                }
                if ($request > 0 && is_numeric($request)) {
                    $_SESSION['idHabilidad'] = intval($request);
                    if ($option == 1) {
                        $arrResponse = ['status' => true, 'msg' => 'Habilidad almacenado correctamente :)'];
                    } else {
                        $arrResponse = ['status' => true, 'msg' => 'Habilidad actualizado correctamente :)'];
                    }
                } elseif ($request == 'exists') {
                    $arrResponse = ['status' => false, 'msg' => 'La habilidad ya se encuentra registrada.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Por favor intenta más tarde :('];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function routesAspirante()
    {
        if (isset($_SESSION['data-aspirante'])) {
            $arrResponse = ['status' => true, 'data' => 'ok'];
        } else {
            $arrResponse = ['status' => false, 'data' => 'no'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
