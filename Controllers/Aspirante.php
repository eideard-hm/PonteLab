<?php

class Aspirante extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        // //isset : verifica que la varible de sesion si exista
        if (!isset($_SESSION['login'])) {
            header('Location:' . URL . 'Login');
        }
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================
    /**
     * Método que sirve para cargar la vista del perfil del aspirante
     */
    public function Perfil_Aspirante()
    {
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Aspirante') {
            $data['titulo_pagina'] = 'Perfil Aspirante | PonteLab.';
            $data['list_workStatus'] = $this->model->getAllWorkStatus();
            $data['list_gradoEstudio'] = $this->model->getAllGradoEstudio();
            $data['list_sectores'] = $this->model->getAllSectores();
            $data['list_tipoExperiencia'] = $this->model->getAllListExperiencia();
            $this->views->getView($this, 'Perfil_Aspirante', $data);
        } elseif (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            header('Location:' . URL . 'Menu/Menu_Contratante');
        } else {
            header('Location: ' . URL . 'Login');
        }
    }

    /**
     * Método para cargar la vista  de editar perfil del aspirante
     */
    public function Edit_Profile_Aspirante()
    {
        $data['titulo_pagina'] = 'Editar Perfil Aspirante | PonteLab.';
        $this->views->getView($this, 'Edit_Profile_Aspirante', $data);
    }


    public function inhabilitarA()
    {
        $idUsuario = intval($_SESSION['user-data']['idUsuario']);
        $estadoUsuario = intval($_POST['estado']);
        $request = $this->model->updateState(
            $idUsuario,
            $estadoUsuario
        );
    }

    public function updatePerfilAspirante()
    {
        if ($_POST) {
            if (
                empty($_POST['nombreApellido']) || empty($_POST['titulo']) || empty($_POST['posicion'])
                || empty($_POST['idioma']) || empty($_POST['numDoc']) || empty($_POST['direccion']) || empty($_POST['Barrio'])
            ) {
                $arrResponse = ['statusUser' => false, 'msg' => '¡ERROR!, Debe llenar todo los campos.'];
            } else {
                $idUsuario = intval($_SESSION['id']);
                $nombreApellido = limpiarCadena($_POST['nombreApellido']);
                $titulo = intval($_POST['titulo']);
                $posicion = intval($_POST['posicion']);
                $idioma = intval($_POST['idioma']);
                $numDoc = intval($_POST['numDoc']);
                $direccion = limpiarCadena($_POST['direccion']);
                $Barrio = limpiarCadena($_POST['Barrio']);

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
                    $arrData = $this->model->selectOneUser($idUsuario);
                    if (!empty($arrData)) {
                        $_SESSION['user-data'] = $arrData;
                        //header ('location: http/localhost/PonteLab/Perfil_Aspirante');
                        //echo '<script type="text/JavaScript"> location.reload(); </script>';
                    }
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

    //método para traer toda la lista de puestos de interés
    public function getPuestoInteresAspirante()
    {
        $request = $this->model->getOnePuestoInteres(intval($_SESSION['data-aspirante']['idAspirante']));
        if (!empty($request)) {
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'No se ha encontrado datos.'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * Función que sirve para guardar y modificar los datos del un aspirante. Si el idAspirante proveniente
     * de la vista es cero, entonces quiere decir que queremos insertar el aspirante, de lo contrario
     * significa que se va hacer una actualización.
     */
    public function setAspirante()
    {
        if ($_POST) {
            if (empty($_POST['textPerfilLab']) || empty($_POST['idUsuario']) || empty($_POST['txtEstado'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos lo campos son obligatorios!!'];
            }
            $idAspirante = intval(limpiarCadena($_POST['idAspirante']));
            $strDescription = limpiarCadena($_POST['textPerfilLab']);
            $idUsuario = intval($_POST['idUsuario']);
            $idEstadoLab = intval($_POST['txtEstado']);

            $Object = new DateTime();
            $Object->setTimezone(new DateTimeZone('America/Bogota'));
            $created_at = $Object->format("Y-m-d h:i:s");
            $update_at = $Object->format("Y-m-d h:i:s");

            if ($idAspirante === 0) {
                $option = 1;
                $request = $this->model->insertAspirante(
                    $strDescription,
                    $idUsuario,
                    $idEstadoLab,
                    $created_at,
                    $update_at
                );
            } else {
                $option = 2;
                $request = $this->model->updateAspirante(
                    $idAspirante,
                    $strDescription,
                    $idEstadoLab,
                    $update_at
                );
            }

            if (intval($request) > 0) {
                if ($option === 1) {
                    //creamos unas variables con los datos del nuevo aspirante
                    $ultimoAspiranteInsertado = $this->model->selectOneAspirante(intval($request));
                    $_SESSION['data-aspirante'] = $ultimoAspiranteInsertado;
                    $arrResponse = ['status' => true, 'msg' => 'Aspirante registrado correctamente :)', 'value' => $_SESSION['data-aspirante']];
                } else {
                    //creamos unas variables con los datos del nuevo aspirante
                    $ultimoAspiranteInsertado = $this->model->selectOneAspirante(intval($_SESSION['data-aspirante']['idAspirante']));
                    $_SESSION['data-aspirante'] = $ultimoAspiranteInsertado;
                    $arrResponse = ['status' => true, 'msg' => 'Aspirante modificado correctamente :)', 'value' => $_SESSION['data-aspirante']];
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'No es posible almacenar los datos :('];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getOneDataAspirante()
    {
        $idAspirante = explode('/', $_GET['url']);
        $idAspirante = $idAspirante[2];
        if ($idAspirante > 0) {
            $request = $this->model->selectOneAspirante($idAspirante);
            if (!empty($request)) {
                $arrResponse = ['status' => true, 'data' => $request];
            } else {
                $arrResponse = ['status' => false, 'data' => 'no'];
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
                    $puestoInteresAspirante = $this->model->puestoInteresAspirante(
                        intval($_SESSION['data-aspirante']['idAspirante']),
                        intval($request)
                    );

                    if (!empty($puestoInteresAspirante)) {
                        $arrResponse = ['status' => true, 'msg' => 'Puesto insertado correctamente!!', 'data' => $request];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ocurrio un error al intentar asociar el idioma al asipirante.'];
                    }
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
                $sesionPuestoInteres = limpiarCadena($_POST['txtPuesto']);
                $puestoInteres = limpiarCadena($_POST['txtPuesto']);
                $puestoInteres = explode(',', $puestoInteres);
                foreach ($puestoInteres as $puesto) {
                    $request = $this->model->puestoInteresAspirante(
                        intval($_SESSION['data-aspirante']['idAspirante']),
                        $puesto
                    );
                }

                if ($request > 0 && is_numeric($request)) {
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

    //método que retorna el arreglo con los perfiles
    public function getArregloPerfiles()
    {
        $arrUrl = explode('/', implode($_GET));
        $busqueda = limpiarCadena(strtolower($arrUrl[2]));

        $request = $this->model->getFiltroPerfiles($busqueda);
        $arrResponse = ['status' => true, 'data' => $request];
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    // método para traer todas los perfiles
    public function getAllPerfiles()
    {
        $request = $this->model->selectAllPerfiles();
        if (!empty($request)) {
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'Ha ocurrido un error interno. Por favor intenta más tarde !!'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function getAllIdiomas()
    {
        $request = $this->model->getAllIdiomas();
        if (!empty($request)) {
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'Ha ocurrido un error en el servidor.'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    //método para traer toda la lista de idiomas seleccionados por el usuario
    public function getIdiomasSelected()
    {
        $request = $this->model->getIdiomasSelected(intval($_SESSION['data-aspirante']['idAspirante']));
        if (!empty($request)) {
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'no'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Método para insertar un idioma
    public function setIdioma()
    {
        if ($_POST) {
            if (empty($_POST['txtIdioma'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios !!'];
            } else {
                $idIdioma = intval($_POST['idIdioma']);
                $idAspiranteFK = intval($_SESSION['data-aspirante']['idAspirante']);
                $nivelIdioma = intval(limpiarCadena($_POST['txtNivelIdioma']));

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
                    if ($option == 1) {
                        $idiomaAspirante = $this->model->insertIdiomaAspirante(
                            $idAspiranteFK,
                            $request,
                            $nivelIdioma
                        );
                        if (!empty($idiomaAspirante)) {
                            $arrResponse = ['status' => true, 'msg' => 'Idioma almacenado correctamente :)', 'id' => $request];
                        } else {
                            $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error interno y no se ha podido asociar el idioma al aspirante.'];
                        }
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
            $idIdioma = intval($_POST['idIdioma']);
            $idIdiomaFK = intval(limpiarCadena($_POST['idSelectIdioma']));
            $idAspiranteFK = intval($_SESSION['data-aspirante']['idAspirante']);
            $nivelIdioma = intval(limpiarCadena($_POST['nivelIdioma']));

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
                if ($option == 1) {
                    $arrResponse = ['status' => true, 'msg' => 'Idioma almacenado correctamente :)'];
                } else {
                    $arrResponse = ['status' => true, 'msg' => 'Idioma actualizado correctamente :)'];
                }
            } elseif ($request == 'exists') {
                $arrResponse = ['status' => false, 'msg' => 'El aspirante ya tiene ese idioma asociado. Seleccionalo en la lista !!'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Por favor intenta más tarde :('];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    //Método para insertar una habilidad
    public function setHabilidad()
    {
        if ($_POST) {
            if (empty($_POST['txtHabilidad']) || empty($_POST['txtNivelHabilidades'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios !!'];
            } else {
                $idHabilidad = intval($_POST['idHabilidad']);
                $nameHabilidad = limpiarCadena(ucfirst(strtolower($_POST['txtHabilidad'])));
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
                    if ($option == 1) {
                        $habilidadAspirante = $this->model->insertNewHabilidad(
                            $idAspiranteFK,
                            $request,
                            $nivelHabilidad
                        );
                        if (!empty($habilidadAspirante)) {
                            $arrResponse = ['status' => true, 'msg' => 'Habilidad almacenado correctamente :)', 'id' => $request];
                        } else {
                            $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error interno y no se ha podido asociar la habilidad al aspirante.'];
                        }
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

    public function setHabilidadAspirante()
    {
        if ($_POST) {
            $idHabilidad = intval($_POST['idHabilidad']);
            $idHabilidadFK = intval(limpiarCadena($_POST['idSelectHabilidad']));
            $idAspiranteFK = intval($_SESSION['data-aspirante']['idAspirante']);
            $nivelHabilidad = intval(limpiarCadena($_POST['nivelHabilidad']));

            if ($idHabilidad == 0) {
                $option = 1;
                $request = $this->model->insertNewHabilidad(
                    $idAspiranteFK,
                    $idHabilidadFK,
                    $nivelHabilidad
                );
            } else {
                $option = 2;
                $request = $this->model->updateHabilidadAspirante(
                    $idHabilidad,
                    $idHabilidadFK,
                    $idAspiranteFK,
                    $nivelHabilidad
                );
            }

            if ($request > 0 && is_numeric($request)) {
                if ($option == 1) {
                    $arrResponse = ['status' => true, 'msg' => 'Habilidad almacenada correctamente :)'];
                } else {
                    $arrResponse = ['status' => true, 'msg' => 'Habilidad actualizada correctamente :)'];
                }
            } elseif ($request == 'exists') {
                $arrResponse = ['status' => false, 'msg' => 'El aspirante ya tiene esa habilidad asociada. Seleccionalo en la lista !!'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Por favor intenta más tarde :('];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getAllHabilidades()
    {
        $request = $this->model->getAllHabilidades();
        if (!empty($request)) {
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'Ha ocurrido un error en el servidor.'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    //método para traer toda la lista de idiomas seleccionados por el usuario
    public function getHabilidadesSelected()
    {
        $request = $this->model->getHabilidadesSelected(intval($_SESSION['data-aspirante']['idAspirante']));
        if (!empty($request)) {
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'no'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * Método que sirve para cargar la información del aspirante cada vez que ingresa (inica sesión)
     */
    public function getDataAspirante()
    {
        $request = $this->model->routesAspirante(intval($_SESSION['id']));
        if (!empty($request)) {
            $_SESSION['data-aspirante'] = $request;
            $arrResponse = ['status' => true, 'data' =>  $_SESSION['data-aspirante'], 'sesion' => $_SESSION['id']];
        } else {
            $arrResponse = ['status' => false, 'data' => 'no'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    /*============================================================================
                            Estudios
    ==============================================================================*/
    public function insertEstudios()
    {
        if ($_POST) {
            if (
                empty($_POST['txtInstitucion']) || empty($_POST['txtTitulo'])
            ) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios.'];
            } else {
                $nombreInstitucion = limpiarCadena($_POST['txtInstitucion']);
                $tituloObtenido = ucfirst(limpiarCadena($_POST['txtTitulo']));
                $ciudad = intval(limpiarCadena($_POST['txtCiudad']));
                $sector = intval(limpiarCadena($_POST['txtSector']));
                $anioInicio = limpiarCadena($_POST['txtAnioIni']);
                $mesInicio = limpiarCadena($_POST['txtMesIni']);
                $anioFin = limpiarCadena($_POST['txtAnioFin']);
                $mesFin = limpiarCadena($_POST['txtMesFin']);
                $idAspirante =intval($_SESSION['data-aspirante']['idAspirante']);
                $gradoEstudio = intval(limpiarCadena($_POST['txtGradoEst']));

                $request = $this->model->insertEstudio(
                    $nombreInstitucion,
                    $tituloObtenido,
                    $ciudad,
                    $sector,
                    $anioInicio,
                    $mesInicio,
                    $anioFin,
                    $mesFin,
                    $idAspirante,
                    $gradoEstudio,
                );

                if ($request > 0 && is_numeric($request)) {
                    $arrResponse = ['status' => true, 'msg' => 'Estudios registrados correctamente :)'];
                } elseif ($request === 'exists') {
                    $arrResponse = ['status' => false, 'msg' => 'El usuario ya tiene esos estudios asocidados. Registra otros...'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Por favor intenta más tarde.'];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    //método para traer toda la lista de estudios registrados por el usuario
    public function getEstudiosAspirante()
    {
        $request = $this->model->getEstudiosAspirante(intval($_SESSION['data-aspirante']['idAspirante']));
        if (!empty($request)) {
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'no'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
    /*============================================================================
                            Experiencia laboral
    ==============================================================================*/
    //Mètodo para insertar las experiencias
    public function insertExperiencia()
    {
        if ($_POST) {
            if (empty($_POST['txtEmpresa']) || empty($_POST['txtPuesto'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios.'];
            } else {
                $empresa = ucfirst(strtolower(limpiarCadena($_POST['txtEmpresa'])));
                $sectorLaboro = intval(limpiarCadena($_POST['txtSectorExp']));
                $ciudad = intval(limpiarCadena($_POST['txtCiudadLab']));
                $tipoExperiencia = intval(limpiarCadena($_POST['txtTipoExp']));
                $puestoDesempeño = ucfirst(strtolower(limpiarCadena($_POST['txtPuesto'])));
                $anioInicio = limpiarCadena($_POST['txtAnioIniExp']);
                $mesInicio = limpiarCadena($_POST['txtMesIniExp']);
                $anioFin = limpiarCadena($_POST['txtAnioFinExp']);
                $mesFin = limpiarCadena($_POST['txtMesFinExp']);
                $funcion = $_POST['textFunciones'];
                $idAspirante = intval($_SESSION['data-aspirante']['idAspirante']);

                $request = $this->model->insertExperienciaLaboral(
                    $empresa,
                    $sectorLaboro,
                    $ciudad,
                    $tipoExperiencia,
                    $puestoDesempeño,
                    $anioInicio,
                    $mesInicio,
                    $anioFin,
                    $mesFin,
                    $funcion,
                    $idAspirante
                );

                if ($request > 0 && is_numeric($request)) {
                    $arrResponse = ['status' => true, 'msg' => 'Experiencia laboral registrada correctamente :)'];
                } elseif ($request === 'exists') {
                    $arrResponse = ['status' => false, 'msg' => 'El usuario ya tiene esa experiencia laboral asocidada. Registra otros...'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Por favor intenta más tarde.'];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    //método para traer toda la lista de estudios registrados por el usuario
    public function getExperienciaAspirante()
    {
        $request = $this->model->getExperienciaAspirante(intval($_SESSION['data-aspirante']['idAspirante']));
        if (!empty($request)) {
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'no'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
}
