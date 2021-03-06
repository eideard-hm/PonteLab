<?php

/**
 * Controlador de Aspirantes, aqui se cargan las vistas y se ejecutan las acciones, 
 * tambien se encarga de de recibir las peticiones de los formularios y de enviar 
 * los datos a la base de datos.
 */
class Aspirante extends Controllers
{
    /**
     * Contructor de la clase, aquí se inicializan el contructor de la clase
     * padre, además se inicializa la libreria de sesiones y se valida si se 
     * inició o no sesión, de lo contrario se redirecciona al login de la aplicación.
     */
    public function __construct()
    {
        session_start();
        parent::__construct();
        //isset : verifica que la varible de sesion si exista
        if (!isset($_SESSION['login'])) {
            header('Location:' . URL . 'Login');
        } elseif (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            header('Location:' . URL . 'Menu/Menu_Contratante');
        }
    }

    /*======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================*/

    /**
     * Método que sirve para cargar la vista del perfil del aspirante. Además que enviá información a la vista
     * en formato de arreglos para que la vista los procese y los muestre.
     * @return void
     * @author Edier Heraldo Hernández Molano @eideard-hm 
     */
    public function Perfil_Aspirante()
    {
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Aspirante') {
            $data['titulo_pagina'] = 'Perfil Aspirante | ' . NOMBRE_EMPRESA . '.';
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
     * Método para cargar la vista  de editar perfil del aspirante. Además que enviá información a la vista.
     * @return view Perfil_Aspirante
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function Edit_Profile_Aspirante()
    {
        $data['titulo_pagina'] = 'Editar Perfil Aspirante | ' . NOMBRE_EMPRESA . '.';
        $data['list_tipodoc'] = $this->model->selectTipoDoc();
        $data['list_barrio'] = $this->model->selectBarrio();
        $this->views->getView($this, 'Edit_Profile_Aspirante', $data);
    }

    /**
     * Método que se encarga de mostrar la vista de hoja de vida y además pasarle
     * alguna información a dicha vista y hacer peticiones a los modelos.
     * @return View Retorna una vista y además una data con información que se le va 
     * a pasar a dicha vista.
     * @author Edier Heraldo Hernandez Molano
     */
    public function HojaVida()
    {
        $data['info_aspirante'] = $this->model->routesAspirante(intval($_SESSION['id']));
        $data['puestos_interes'] = $this->model->getOnePuestoInteres(intval($_SESSION['data-aspirante']['idAspirante']));
        $data['estudios'] = $this->model->getIdiomasSelected(intval($_SESSION['data-aspirante']['idAspirante']));
        $data['idiomas'] = $this->model->getIdiomasSelected(intval($_SESSION['data-aspirante']['idAspirante']));
        $data['habilidades'] = $this->model->getHabilidadesSelected(intval($_SESSION['data-aspirante']['idAspirante']));
        $data['estudios'] =  $this->model->getEstudiosAspirante(intval($_SESSION['data-aspirante']['idAspirante']));
        $data['experiencias'] = $this->model->getExperienciaAspirante(intval($_SESSION['data-aspirante']['idAspirante']));
        $data['titulo_pagina'] = 'Hoja de Vida | ' . NOMBRE_EMPRESA . '.';
        if (
            $data['info_aspirante'] && count($data['puestos_interes']) > 0 && count($data['estudios']) > 0
            && count($data['habilidades']) > 0 && count($data['idiomas']) > 0 && count($data['estudios']) > 0
            && count($data['experiencias']) > 0
        ) {
            $this->views->getView($this, 'HojaVida', $data);
        } else {
            header('Location: ' . URL . 'Menu');
        }
    }

    /**
     * Método que se encarga de mostrar la vista de configuracion de la cuenta y además pasarle
     * alguna información a dicha vista y hacer peticiones a los modelos.
     * @return View Retorna una vista y además una data con información que se le va 
     * a pasar a dicha vista.
     * @author Edier Heraldo Hernandez Molano
     */
    public function Account_Seetings()
    {
        $data['titulo_pagina'] = 'Configuración de Cuenta | ' . NOMBRE_EMPRESA . '.';
        $this->views->getView($this, 'Account_Seetings', $data);
    }

    /**
     * Método que se encarga de mostrar la vista de aplicaciones a vacantes y además pasarle
     * alguna información a dicha vista y hacer peticiones a los modelos.
     * @return View Retorna una vista y además una data con información que se le va 
     * a pasar a dicha vista.
     * @author Edier Heraldo Hernandez Molano
     */
    public function Aplicaciones_Vacante()
    {
        $data['titulo_pagina'] = 'Aplicaciones a Vacantes | ' . NOMBRE_EMPRESA . '.';
        $this->views->getView($this, 'Aplicaciones_Vacante', $data);
    }

    public function inhabilitarA()
    {
        $idUsuario = intval($_SESSION['user-data']['idUsuario']);
        $estadoUsuario = 1;
        $request = $this->model->updateState($idUsuario, $estadoUsuario);

        if ($request > 0) {
            $arrResponse = ['statusUser' => true, 'msg' => 'Usuario inactivado correctamente.'];
        } else {
            $arrResponse = ['statusUser' => false, 'msg' => 'Ha ocurrido un error en el servidor'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }


    public function updatePerfilAspirante()
    {
        if ($_POST) {
            if (
                empty($_POST['txtNombre']) || empty($_POST['tipoDoc']) || empty($_POST['numDoc'])
                || empty($_POST['mobile']) || empty($_POST['phone']) || empty($_POST['Barrio'])
                || empty($_POST['Direccion'])
            ) {
                $arrResponse = ['statusUser' => false, 'msg' => 'Atención, Todos los campos son obligatorios.'];
            } else {
                $idUsuario = intval(limpiarCadena($_POST['idUsuario']));
                $nombreUsuario = limpiarCadena($_POST['txtNombre']);
                $TipoDoc = intval(limpiarCadena($_POST['tipoDoc']));
                $numDoc = limpiarCadena($_POST['numDoc']);
                $numMobil = limpiarCadena($_POST['mobile']);
                $numPhone = limpiarCadena($_POST['phone']);
                $Barrio = intval(limpiarCadena($_POST['Barrio']));
                $direccion = limpiarCadena($_POST['Direccion']);

                $photo = $_FILES['foto'];
                $namePhoto = $photo['name'];
                $imgPerfil = 'upload.svg';

                if (!empty($namePhoto)) {
                    $imgPerfil = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
                }

                if (empty($nameFoto)) {
                    if ($_POST['foto_actual'] != 'upload.svg' && $_POST['foto_remove'] == 0) {
                        $imgPerfil = $_POST['foto_actual'];
                    }
                }

                $request = $this->model->updateUser(
                    $idUsuario,
                    $nombreUsuario,
                    $TipoDoc,
                    $numDoc,
                    $numMobil,
                    $numPhone,
                    $Barrio,
                    $direccion,
                    $imgPerfil
                );

                if ($request > 0) {
                    if (!empty($namePhoto)) {
                        uploadImages($photo, $imgPerfil);
                    }

                    if (($namePhoto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'upload.svg')
                        || ($namePhoto != '' && $_POST['foto_actual'] != 'upload.svg')
                    ) {
                        deleteImage($_POST['foto_actual']);
                    }

                    $arrData = $this->model->selectOneUser($idUsuario);
                    //petición para cargar la imagen del usuario
                    $imgProfile = $this->model->selectImgProfile($idUsuario);
                    if (!empty($arrData)) {
                        $_SESSION['user-data'] = $arrData;
                        $_SESSION['imgProfile'] = assets_url_img() . "uploads/{$imgProfile['imagenUsuario']}";
                        $arrResponse = ['statusUser' => true, 'msg' => 'Los datos se actualizarón correctamente !!'];
                    }
                } elseif ($request === 'exists') {
                    $arrResponse = ['statusUser' => false, 'msg' => 'Atención, los datos ya existen'];
                } else {
                    $arrResponse = ['statusUser' => false, 'msg' => 'Atención, los datos no se actualizaron correctamente'];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * Método para traer toda la lista de puestos de interés asociados al aspirante. Estos seran mostrados en la vista
     * cuando cargue la página de perfil del aspirante, a través de JavaScript.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
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

    /**
     * Método para traer toda la lista de puestos de interés asociados al aspirante. Estos seran mostrados en la vista
     * cuando cargue la vista de perfil del aspirante, a través de JavaScript.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
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
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
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

            if ($idAspirante == 0) {
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
                if ($option == 1) {
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

    /**
     * Método para obtener los datos de un aspirante. Para ello se recoge el idAspirante que es pasado por la url.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
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

    /**
     * Método para insertar un puesto de interés proveniente desde el input. Dichas peticiones son realizadas desde 
     * JavaScript a través de la API de Fetch.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
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

    /**
     * Método para insertar un puesto de interés proveniente desde el select. Dichas peticiones son realizadas desde 
     * JavaScript a través de la API de Fetch.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
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
                        intval($puesto)
                    );
                }

                if (intval($request) > 0) {
                    $_SESSION['puestoInteres-aspirante'] = $sesionPuestoInteres;
                    $arrResponse = ['status' => true, 'msg' => 'Puesto de interés almacenado exitosamente :)', 'sesiones' => $_SESSION['puestoInteres-aspirante']];
                } elseif ($request === 'exists') {
                    $arrResponse = ['status' => false, 'msg' => 'El puesto ya se encuentra registrado. Puedes registrar otro.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Intenta más tarde :('];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * Método que retorna el arreglo con los perfiles de los aspirantes, dicho valor de busqueda es pasado por 
     * la URL.
     * @return void
     * @author Santiago Andres Becerra Espitia @S4NT1A6O
     */
    public function getArregloPerfiles()
    {
        $arrUrl = explode('/', implode($_GET));
        $busqueda = limpiarCadena(strtolower($arrUrl[2]));

        $request = $this->model->getFiltroPerfiles($busqueda);
        $arrResponse = ['status' => true, 'data' => $request];
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    /** 
     * Método para traer todas los perfiles de los aspirantes, para posteriormente renderizarlos en la vista.
     * @return void
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
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

    /**
     * Método para obtener todos los idiomas registrados en la base de datos. Luego son enviados a la vista
     * donde son renderizados y el usuario los va a poder seleccionar y asociar.
     * @return void
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
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

    /**
     * Método para traer toda la lista de idiomas seleccionados por el usuario que se encuentra logueado
     * actualmente.
     * @return void
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
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

    /**
     * Método para insertar o editar un idioma proveniente desde el input. Si el idIdioma proveniente
     * de la vista es cero, entonces quiere decir que queremos insertar el idioma, de lo contrario
     * significa que se va hacer una actualización.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
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

                if (intval($request) > 0) {
                    if ($option == 1) {
                        $idiomaAspirante = $this->model->insertIdiomaAspirante(
                            $request,
                            $idAspiranteFK,
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

    /**
     * Método para insertar o editar un idioma proveniente desde el select. Si el idIdioma proveniente
     * de la vista es cero, entonces quiere decir que queremos insertar el idioma, de lo contrario
     * significa que se va hacer una actualización.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
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
                    $idIdiomaFK,
                    $idAspiranteFK,
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

            if (intval($request) > 0) {
                if ($option == 1) {
                    $arrResponse = ['status' => true, 'msg' => 'Idioma almacenado correctamente :)'];
                } else {
                    $arrResponse = ['status' => true, 'msg' => 'Idioma actualizado correctamente :)'];
                }
            } elseif ($request == 'exists') {
                $arrResponse = ['status' => false, 'msg' => 'El aspirante ya tiene ese idioma asociado. Seleccione otro !!'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Por favor intenta más tarde :('];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * Método para insertar o editar una habilidad proveniente desde el input. Si el idHabilidad proveniente
     * de la vista es cero, entonces quiere decir que queremos insertar el habilidad, de lo contrario
     * significa que se va hacer una actualización.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
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

    /**
     * Método para insertar o editar una habilidad proveniente desde el select. Si el idHabilidad proveniente
     * de la vista es cero, entonces quiere decir que queremos insertar el habilidad, de lo contrario
     * significa que se va hacer una actualización.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
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

    /**
     * Método para obtener todas las habilidades registradas en la base de datos. Se utiliza para mostrarlas 
     * en la vista y para el select de habilidades.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
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

    /**
     * Método para traer toda la lista de idiomas seleccionados por el usuario, para mostrarselo
     * al usuario cuando iniciar sesión.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
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
     * Método que sirve para cargar la información del aspirante cada vez que ingresa (inicia sesión).
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
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
    /**
     * Método para insertar un nuevo estudio al aspirante. 
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
    public function insertEstudios()
    {
        if ($_POST) {
            if (
                empty($_POST['txtInstitucion']) || empty($_POST['txtTitulo'])
            ) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios.'];
            } else {
                $idEstudio = intval(limpiarCadena($_POST['idEducacion']));
                $nombreInstitucion = limpiarCadena($_POST['txtInstitucion']);
                $tituloObtenido = ucfirst(limpiarCadena($_POST['txtTitulo']));
                $ciudad = intval(limpiarCadena($_POST['txtCiudad']));
                $sector = intval(limpiarCadena($_POST['txtSector']));
                $anioInicio = limpiarCadena($_POST['txtAnioIni']);
                $mesInicio = limpiarCadena($_POST['txtMesIni']);
                $anioFin = limpiarCadena($_POST['txtAnioFin']);
                $mesFin = limpiarCadena($_POST['txtMesFin']);
                $idAspirante = intval($_SESSION['data-aspirante']['idAspirante']);
                $gradoEstudio = intval(limpiarCadena($_POST['txtGradoEst']));

                if ($idEstudio == 0) {
                    $option = 1;
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
                        $gradoEstudio
                    );
                } else {
                    $option = 2;
                    $request = $this->model->updateEstudio(
                        $idEstudio,
                        $nombreInstitucion,
                        $tituloObtenido,
                        $ciudad,
                        $sector,
                        $anioInicio,
                        $mesInicio,
                        $anioFin,
                        $mesFin,
                        $gradoEstudio,
                    );
                }

                if (intval($request) > 0) {
                    if ($option == 1) {
                        $arrResponse = ['status' => true, 'msg' => 'Estudios registrados correctamente :)'];
                    } else {
                        $arrResponse = ['status' => true, 'msg' => 'Datos de estudios modificados correctamente :)'];
                    }
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

    /**
     * Método para traer toda la lista de estudios registrados por el usuario. Para mostrarlo en la vista y que
     * los pueda seleccionar.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
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

    /**
     * Método para traer toda la lista de estudios registrados por el usuario para luego poderlos editar.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
    public function getEstudiosAspiranteEdit()
    {
        $idEstudio = explode('/', $_GET['url']);
        if (isset($idEstudio[2])) {
            $idEstudio = intval($idEstudio[2]);
            $request = $this->model->getEstudiosAspiranteEdit($idEstudio);
            if (!empty($request)) {
                $arrResponse = ['status' => true, 'data' => $request];
            } else {
                $arrResponse = ['status' => false, 'data' => 'no'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /*============================================================================
                            Experiencia laboral
    ==============================================================================*/
    /** 
     * Método para insertar o registrar una nueva experiencia laboral.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
    public function insertExperiencia()
    {
        if ($_POST) {
            if (empty($_POST['txtEmpresa']) || empty($_POST['txtPuesto'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios.'];
            } else {
                $idExperiencia = intval(limpiarCadena($_POST['idExperiencia']));
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

                if ($idExperiencia == 0) {
                    $option = 1;
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
                } else {
                    $option = 2;
                    $request = $this->model->updateExperienciaLaboral(
                        $idExperiencia,
                        $empresa,
                        $sectorLaboro,
                        $ciudad,
                        $tipoExperiencia,
                        $puestoDesempeño,
                        $anioInicio,
                        $mesInicio,
                        $anioFin,
                        $mesFin,
                        $funcion
                    );
                }

                if (intval($request) > 0) {
                    if ($option == 1) {
                        $arrResponse = ['status' => true, 'msg' => 'Experiencia laboral registrada correctamente :)'];
                    } else {
                        $arrResponse = ['status' => true, 'msg' => 'Experiencia laboral modificada correctamente :)'];
                    }
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

    /**
     * Método para traer toda la lista de experiencia laboral registrados por el usuario. Estas se cargan
     * cuando el usuario a iniciado sesión.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
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

    /** 
     * Método para obtener la información de una experiencia laboral para luego poderla editar.
     * @return void
     * @author Edier Heraldo Hernandez Molano @eideard-hm
     */
    public function getExperienciaAspiranteEdit()
    {
        $idExperiencia = explode('/', $_GET['url']);
        if (isset($idExperiencia[2])) {
            $idExperiencia = intval($idExperiencia[2]);
            $request = $this->model->getExperienciaAspiranteEdit($idExperiencia);
            if (!empty($request)) {
                $arrResponse = ['status' => true, 'data' => $request];
            } else {
                $arrResponse = ['status' => false, 'data' => 'no'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function changePassword()
    {
        if (
            empty($_POST['actual']) || empty($_POST['nueva'])
            || empty($_POST['verificar'])
        ) {
            $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios !!'];
        } else {
            $idUsuario = intval($_SESSION['user-data']['idUsuario']);
            $currentPass = limpiarCadena($_POST['actual']);
            $newPass = limpiarCadena($_POST['nueva']);
            $newPass = encriptarPassword($newPass);

            $request = $this->model->currentPassword($idUsuario);
            if (!empty($request)) {
                if (password_verify($currentPass, $request['passUsuario'])) {
                    if ($this->model->updateContraseña($idUsuario, $newPass)) {
                        $arrResponse = ['status' => true, 'msg' => 'Se ha modificado exitosamente la contraseña.'];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error al intentar actualizar la contraseña.'];
                    }
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'La contraseña actual ingresada no coincide con la registrada.'];
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'No se encontro el usuario con esa identificación.'];
            }
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
