<?php

/**
 * Clase que controla las acciones de las vacantes, aqui se carga la vistas, se reciben
 * las peticiones de los usuarios y se devuelven los resultados.
 */
class Vacante extends Controllers
{
    /**
     * Método constructor de la clase. Se ejecuta cuando se crea el objeto.
     */
    public function __construct()
    {
        parent::__construct();
        session_start();
        // //isset : verifica que la varible de sesion si exista
        if (!isset($_SESSION['login'])) {
            header('Location: ' . URL . 'Login');
        }
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    /**
     * Método que muestra la vista de vacante
     * @return void
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function Vacante()
    {
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            $data['titulo_pagina'] = 'Vacante | ' . NOMBRE_EMPRESA . '.';
            $data['list_vacante'] = $this->model->selectAllVacancy();
            $data['list_requisitos'] = $this->model->selectAllReqs();
            $data['list_sector'] = $this->model->selectAllSector();
            $this->views->getView($this, 'Vacante', $data);
        } elseif (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Aspirante') {
            header('Location:' . URL . 'Menu');
        } else {
            header('Location: ' . URL . 'Login');
        }
    }

    /**
     * Método que muestra la vista de lista de empleos o vacantes, además que contiene
     * la paginación de los registros.
     * @return void
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function ListaEmpleos()
    {
        $vacantes_por_pagina = 6;
        $data['titulo_pagina'] = 'Lista vacantes | ' . NOMBRE_EMPRESA . '.';
        $data['count-rows'] = $this->pagination($vacantes_por_pagina);
        $pagina = explode('/', $_GET['url']);
        if (isset($pagina[2]) && !empty($pagina[2])) {
            if ($pagina[2] > $data['count-rows']) {
                header('Location: ' . URL . 'Vacante/ListaEmpleos/1');
            }
            $pagina = $pagina[2];
        } else {
            $pagina = 1;
        }
        $data['numero_vacante'] = $pagina;
        $iniciar = ($pagina - 1) * $vacantes_por_pagina;
        $data['vacantes_pagination'] =  $this->model->selectAllVacantes(intval($iniciar), intval($vacantes_por_pagina));
        $arrSectores = $this->model->loadSectorUser(intval($_SESSION['user-data']['idUsuario']));
        if (!empty($arrSectores)) {
            foreach ($arrSectores as $sector) {
                $request = $this->model->getVacantesSector(intval($sector['idSectorFK']));
                if (!empty($request)) {
                    $data['recomendados'] = $request;
                }
            }
        } else {
            $data['recomendados'] = "";
        }
        // $data['recomendados'] = $this->model->getVacantesSector($arrSectores);
        $this->views->getView($this, 'ListaEmpleos', $data);
    }

    /**
     * Método que muestra la vista de detalle de vacante y sus requisitos.
     * @return void
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function DetallesVacante()
    {
        $idVacante = explode('/', $_GET['url']);
        if (isset($idVacante[2]) && !empty($idVacante[2])) {
            $idVacante = intval($idVacante[2]);
            if ($idVacante > 0) {
                $data['detail_vacante'] = $this->model->detailVacante($idVacante);
                if (!empty($data['detail_vacante'])) {
                    if (isset($_SESSION['data-aspirante']['idAspirante'])) {
                        $data['aspiranteApplyVacancy'] = $this->model->aspiranteApplyVacancy($idVacante, $_SESSION['data-aspirante']['idAspirante']);
                        $data['sugerencias'] = $this->model->sugerencias(intval($data['detail_vacante']['idSector']));
                    } else {
                        $data['aspiranteApplyVacancy'] = '';
                    }
                    $data['titulo_pagina'] = 'Detalles vacante | ' . NOMBRE_EMPRESA;
                    $this->views->getView($this, 'DetallesVacante', $data);
                } else {
                    header('Location: ' . URL . 'Vacante/ListaEmpleos');
                }
            } else {
                header('Location: ' . URL . 'Vacante/ListaEmpleos');
            }
        } else {
            header('Location: ' . URL . 'Vacante/ListaEmpleos');
        }
    }

    /** 
     * Método controlador para insertar y/o editar vacantes, esto de acuerdo al
     * valor que traiga el idVacante, si es mayor a 0, entonces se edita, si es 0
     * se inserta.
     * @return void
     * @author Santiago Andres Becerra Espitia @S4NT1A6O
     */
    public function setVacante()
    {
        if ($_POST) {
            //verificar que los campos no vengan vacios
            if (
                empty($_POST['idVacancy']) || empty($_POST['nombre']) || empty($_POST['cantidad']) ||
                empty($_POST['especificaciones']) || empty($_POST['perfil']) ||
                empty($_POST['tipoContrato']) || empty($_POST['sueldo']) || empty($_POST['fechapublicacion']) ||
                empty($_POST['fechacierre']) || empty($_POST['direccion']) || empty($_POST['estado']) ||
                empty($_POST['idSectorFK'])
            ) {
                $arrResponse = ['statusUser' => false, 'msg' => 'Todos los campos son obligatorios, Legamos al controller!!'];
            }
            /*Se realiza la consulta del idContratante por medio del id del usuario en
            las cariables de session*/
            $intIdUsuarioFK = intval($_SESSION['id']);
            $arrData = $this->model->selectOneContractor($intIdUsuarioFK);
            if (!empty($arrData)) {
                $_SESSION['contractor-data'] = $arrData;
            }
            /*
            1. Se crean variables para almacenar los datos enviados en la petición
            2. Se va hacer el proceso de insertar, y lo comprobamos si el id del usuario viene vacio 
            */


            $intidVacancy = intval($_POST['idVacancy']);
            $strNombre = limpiarCadena($_POST['nombre']);
            $intCantidad = intval($_POST['cantidad']);
            $strEspecificaciones = limpiarCadena($_POST['especificaciones']);
            $strPerfil = limpiarCadena($_POST['perfil']);
            $strTipoContrato = limpiarCadena($_POST['tipoContrato']);
            $floSueldo = floatval($_POST['sueldo']);
            $strFechaPublicacion = limpiarCadena($_POST['fechapublicacion']);
            $strFechacierre = limpiarCadena($_POST['fechacierre']);
            $strDireccion = limpiarCadena($_POST['direccion']);
            $intEstado = boolval($_POST['estado']);
            $intIdContratanteFK = intval($_SESSION['contractor-data']['idContratante']);
            $intIdsectorFK = intval($_POST['idSectorFK']);
            $time = new DateTime();
            $time->setTimezone(new DateTimeZone('America/Bogota'));
            $created_at = $time->format("Y-m-d h:i:s");
            $updated_at = $time->format("Y-m-d h:i:s");
            /*================== INSERTAR VACANTE =======================*/
            if ($intidVacancy === 0 || empty($intidVacancy)) {
                $option = 1;
                $request = $this->model->insertVacancy(
                    $strNombre,
                    $intCantidad,
                    $strEspecificaciones,
                    $strPerfil,
                    $strTipoContrato,
                    $floSueldo,
                    $strFechaPublicacion,
                    $strFechacierre,
                    $strDireccion,
                    $intEstado,
                    $intIdContratanteFK,
                    $intIdsectorFK,
                    $created_at,
                    $updated_at
                );
            }
            // else {
            //     /*================== EDITAR VACANTE =======================*/
            //     $option = 2;
            //     $request = $this->model->updateVacancy(
            //         $strNombre,
            //         $strCantidad,
            //         $strEspecificaciones,
            //         $intPerfil,
            //         $strTipoContrato,
            //         $strSueldo,
            //         $strFechaPublicacion,
            //         $intFechacierre,
            //         $intDireccion,
            //         $intEstado,
            //         $intIdContractFK
            //     );
            // }

            if ($request > 0 && is_numeric($request)) {
                if ($option === 1) {
                    $arrResponse = ['statusUser' => true, 'msg' => 'El registro de la vacante ha sido exitoso :)', 'value' => $request];
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

    /** 
     * Método para registrar los requerimientos de las vacantes.
     * @return void
     * @author Santiago Andres Becerra Espitia @S4NT1A6O
     */
    public function setRequirement()
    {
        if ($_POST) {
            if (
                empty($_POST['idVacanteFK']) || empty($_POST['idRequisitosFK'])
                || empty($_POST['especficacionRequisitos'])
            ) {
                $arrResponse = ['statusUser' => false, 'msg' => 'Todos los campos son obligatorios, ctrl!!'];
            }
            //DEFINICION DE VARIABLES DE RECEPCION
            $intidRequisitosVacante = intval($_POST['idRequisitosVacante']);
            $intidVacanteFK = intval($_POST['idVacanteFK']);
            $intidRequisitosFK = intval($_POST['idRequisitosFK']);
            $strEspecificaciones = limpiarCadena($_POST['especficacionRequisitos']);
            /*================== INSERTAR USUARIO =======================*/
            if ($intidRequisitosVacante === 0 || empty($intidRequisitosVacante)) {
                $option = 1;
                $request = $this->model->insertRequirement(
                    $intidVacanteFK,
                    $intidRequisitosFK,
                    $strEspecificaciones
                );
            } else {
                /*================== EDITAR USUARIO =======================*/
                $option = 2;
                $request = $this->model->updateRequirement(
                    $intidRequisitosVacante,
                    $intidVacanteFK,
                    $intidRequisitosFK,
                    $strEspecificaciones
                );
            }

            if ($request > 0 && is_numeric($request)) {
                if ($option === 1) {
                    $arrResponse = ['statusUser' => true, 'msg' => 'El registro ha sido exitoso :)', 'value' => $request];
                } elseif ($option === 2) {
                    $arrResponse = ['statusUser' => true, 'msg' => 'Los datos de los requisitos han sido modificado existosamente :)', 'value' => $request];
                }
            } elseif ($request === 'exits') {
                $arrResponse = array('statusUser' => false, 'msg' => '!Atención! los requisitos ya se encuentra registrado!!. Intenta con otro', 'value' => $request);
            } else {
                $arrResponse = array('statusUser' => false, 'msg' => 'No es posible almacenar los datos :(', 'value' => $request);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * Método para mostrar las vacantes relacionadas con los sectores que el 
     * usuario registro.
     * @return void
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function getVacantesSector()
    {
        if (isset($_SESSION['data-sector-user'])) {
            $sectorUsuario = explode(',', $_SESSION['data-sector-user']);
            $request =  $this->model->getVacantesSector(
                $sectorUsuario,
            );
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'no'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * Método que retorna el arreglo con las vacantes para mostrarlas en la vista.
     * @return void
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function getArregloVacantes()
    {
        $busqueda = $_POST['txtSearchVacantes'];
        $request = $this->model->getFiltroVacantes($busqueda);
        if (!empty($request)) {
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'no'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Método para cargar el sector o los sectores que el usuario tiene asociado.
     * @return void
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function getUserVacanteSector()
    {
        $idUsuario = intval($_SESSION['id']);
        $request = $this->model->loadSectorUser($idUsuario);

        if (!empty($request)) {
            $sectores = '';
            foreach ($request as $sector) {
                if (!empty($sector['idSectorFK'])) {
                    $sectores .= $sector['idSectorFK'] . ',';
                }
            }
            $_SESSION['data-sector-user'] = $sectores;
            $arrResponse = ['status' => true, 'msg' => 'ok'];
        } else {
            $arrResponse = ['status' => false, 'msg' => 'no'];
        }

        echo  json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    /** 
     * Método para que un usuario aspirante pueda aplicar a una vacante, y también
     * controla el envió de correo electrónico al usuario que creó la vacante y que
     * aplico.
     * @return void
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function applyVacancy()
    {
        if ($_POST) {
            if (empty($_POST['idVacante']) || empty($_POST['idAspirante'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios!!'];
            } else {
                $idAspirante = intval(limpiarCadena($_POST['idAspirante']));
                $idVacante = intval(limpiarCadena($_POST['idVacante']));
                //Códigos de estado de aplicación a la vacante
                // 0: Aplicado
                // 1: Continuar proceso
                // 2: Cancelar proceso
                $estadoAplicacion = 0;

                $request = $this->model->applyVacancy($idAspirante, $idVacante, $estadoAplicacion);

                if (intval($request) > 0) {
                    //traer los datos de la aplicación a la vacante, para posteriormente enviar el correo
                    //trae la información del aspirante que aplicó a la vacante
                    $dataAspiranteApplicationVacancy = $this->model->dataAspiranteApplicationVacancy(
                        intval($request)
                    );

                    //trae la información del contratante que registro la vacante
                    $dataVacanteApplicationVacany = $this->model->dataVacanteApplicationVacancy(
                        intval($request)
                    );
                    $asunto = "Has solicitado el siguiente empleo: {$dataVacanteApplicationVacany['nombreVacante']} en {$dataVacanteApplicationVacany['nombreUsuario']}";
                    $emailAspirante = $this->sendEmailAspirante($dataAspiranteApplicationVacancy, $dataVacanteApplicationVacany, $asunto, 'aplicacionVacanteAspirante');
                    if ($emailAspirante) {
                        $asunto = "Solicitud de aplicación a la vacante {$dataVacanteApplicationVacany['nombreVacante']} del usuario {$dataAspiranteApplicationVacancy['nombreUsuario']}";
                        $emailContratante = $this->sendEmailContratanteVacante($dataAspiranteApplicationVacancy, $dataVacanteApplicationVacany, $asunto);
                        if ($emailContratante) {
                            $arrResponse = ['status' => true, 'msg' => 'Se ha aplicado correctamente la vacante!!'];
                        } else {
                            $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error al enviar el correo electrónico al contratante.'];
                        }
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error al enviar el correo electrónico al aspirante.'];
                    }
                } elseif ($request === 'exists') {
                    $arrResponse = ['status' => false, 'msg' => 'El usuario ya aplico a esta vacante.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error. Por favor intenta nuevamente!!'];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * Método para el envió de correo electrónico al aspirante luego de aplicar a una
     * vacante.
     * @return boolean verdadero si el correo se envió correctamente, de lo 
     * contrario falso.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    private function sendEmailAspirante(array $dataAspirante, array $dataVacante, string $asunto, string $view)
    {
        $token = token();
        $url_recovery = URL . "Vacante/resultApplyVacancy/{$token}/{$dataVacante['idAspiranteFK']}";
        //arreglo con los datos para el envió del correo electronico al aspirante
        $dataAspirante = [
            'idAspirante' => $dataVacante['idAspiranteFK'],
            'nombreUsuario' => $dataAspirante['nombreUsuario'],
            'email' => $dataAspirante['correoUsuario'],
            'asunto' => $asunto,
            'url_recovery' => $url_recovery,
            'nombreVacante' => $dataVacante['nombreVacante'],
            'nombreContratante' => $dataVacante['nombreUsuario']
        ];
        return sendEmail($dataAspirante, $view);
    }

    /**
     * Método para el envió de correo electrónico al contratante luego de que un 
     * aspirante aplique a una vacante que él ha publicado.
     * @return boolean Verdadero si el correo se envió correctamente, falso de lo
     * contrario.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    private function sendEmailContratanteVacante(array $dataAspirante, array $dataVacante, string $asunto)
    {
        $token = token();
        $url_recovery_1 = URL . "Vacante/resultApplyVacancy/{$token}/1/{$dataVacante['idAplicacionVacante']}/{$dataVacante['idVacanteFK']}";
        $url_recovery_2 = URL . "Vacante/resultApplyVacancy/{$token}/2/{$dataVacante['idAplicacionVacante']}/{$dataVacante['idVacanteFK']}";
        //Datos de la vacante al contratante
        $dataVacante = [
            'idVacante' => $dataVacante['idVacanteFK'],
            'nombreUsuario' => $dataVacante['nombreUsuario'],
            'email' => $dataVacante['correoUsuario'],
            'asunto' => $asunto,
            'url_recovery_1' => $url_recovery_1,
            'url_recovery_2' => $url_recovery_2,
            'nombreVacante' => $dataVacante['nombreVacante'],
            'nombreAspirante' => $dataAspirante['nombreUsuario'],
        ];
        return sendEmail($dataVacante, 'aplicacionVacanteContratante');
    }

    /** 
     * Método para procesar la solicitud de un contratante, y dar el resultado a los 
     * aspirante, si continuan el proceso de seleccion o lo cancelan.
     * @return void
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function resultApplyVacancy()
    {
        $urlResult = explode('/', $_GET['url']);
        var_dump($urlResult[3]);
        if (isset($urlResult[3]) && isset($urlResult[4])) {
            $codigoEstadoAplicacion = $urlResult[3];
            $idAplicacionVacante = $urlResult[4];
            $request = $this->model->setStatusApplicationVacancy($idAplicacionVacante, $codigoEstadoAplicacion);

            if (!empty($request)) {
                $dataAspiranteApplicationVacancy = $this->model->dataAspiranteApplicationVacancy(
                    intval($idAplicacionVacante)
                );

                //trae la información del contratante que registro la vacante
                $dataVacanteApplicationVacany = $this->model->dataVacanteApplicationVacancy(
                    intval($idAplicacionVacante)
                );

                $asunto = "Tu solicitud para el puesto de {$dataVacanteApplicationVacany['nombreVacante']} en {$dataVacanteApplicationVacany['nombreUsuario']}";
                if ($codigoEstadoAplicacion == '1') {
                    $emailConfirmationAspirante = $this->sendEmailAspirante($dataAspiranteApplicationVacancy, $dataVacanteApplicationVacany, $asunto, 'confirmacionContinuarProceso');
                    if ($emailConfirmationAspirante) {
                        $arrResponse = ['status' => true, 'msg' => 'Se ha aplicado enviado correctamente el correo de confirmación de continuación.!!'];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error al enviar el correo electrónico al aspirante de confirmación.'];
                    }
                } else {
                    $emailConfirmationAspirante = $this->sendEmailAspirante($dataAspiranteApplicationVacancy, $dataVacanteApplicationVacany, $asunto, 'confirmacionAplicacionVacante');
                    if ($emailConfirmationAspirante) {
                        $arrResponse = ['status' => true, 'msg' => 'Se ha aplicado enviado correctamente el correo de cancelación.!!'];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error al enviar el correo electrónico al aspirante de cancelación.'];
                    }
                }
            }
        } else {
            header('Location: ' . URL . 'Login');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * Método que trae el número de vacantes registradas y hace el calculo para 
     * la paginación.
     * @param int $num_vacantes_por_pagina Número de vacantes a mostrar por página.
     * @return int $paginas Número de páginas que va a tener la paginación.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    private function pagination($num_vacantes_por_pagina)
    {
        $vacantes_por_pagina = $num_vacantes_por_pagina;
        $numeroVacantes = $this->model->countRows();
        $paginas = ceil($numeroVacantes['total'] / $vacantes_por_pagina);
        return $paginas;
    }

    /**
     * Método que retorna la información de las vacantes a las cuales ha aplicado un aspirante.
     * @return int $data Vacantes a las cuales ha aplicado un aspirante.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function getApplyVacancys()
    {
        if (isset($_SESSION['data-aspirante']['idAspirante'])) {
            $idUsuario = intval($_SESSION['data-aspirante']['idAspirante']);
            $data = $this->model->getApplyVacancys($idUsuario);
            if (!empty($data)) {
                if ($data[0]['estadoAplicacionVacante'] == '0') {
                    $data[0]['estadoAplicacionVacante'] = '<span class="badge badge-info">Solicitud enviada</span>';
                } elseif ($data[0]['estadoAplicacionVacante'] == '1') {
                    $data[0]['estadoAplicacionVacante'] = '<span class="badge badge-success">Aceptado</span>';
                } elseif ($data[0]['estadoAplicacionVacante'] == '2') {
                    $data[0]['estadoAplicacionVacante'] = '<span class="badge badge-danger">Rechazado</span>';
                } else {
                    $data[0]['estadoAplicacionVacante'] = '<span class="badge badge-warning">En proceso</span>';
                }
            }

            $arrResponse = ['status' => true, 'data' => $data];
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
