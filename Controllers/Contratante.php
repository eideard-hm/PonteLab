<?php

class Contratante extends Controllers
{
    public function __construct()
    {
        session_start();
        parent::__construct();
        // //isset : verifica que la varible de sesion si exista
        if (!isset($_SESSION['login'])) {
            header('Location:' . URL . 'Login');
        }
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    /**
     * Método que sirve para cargar la vista del perfil del aspirante
     */
    public function Perfil_Contratante()
    {
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            $data['titulo_pagina'] = 'Perfil Contratante | ' . NOMBRE_EMPRESA . '.';
            $this->views->getView($this, 'Perfil_Contratante', $data);
        } elseif (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Aspirante') {
            header('Location:' . URL . 'Menu/Menu_Contratante');
        } else {
            header('Location: ' . URL . 'Login');
        }
    }

    /**
     * Método para cargar la vista  de editar perfil del aspirante
     */
    public function Edit_Perfil_Contratante()
    {
        $data['titulo_pagina'] = 'Editar Perfil Contratante | ' . NOMBRE_EMPRESA . '.';
        $data['list_tipodoc'] = $this->model->selectTipoDoc();
        $data['list_barrio'] = $this->model->selectBarrio();
        $this->views->getView($this, 'Edit_Perfil_Contratante', $data);
    }

    public function Contratante()
    {
        $data['titulo_pagina'] = 'Contratante | ' . NOMBRE_EMPRESA . '.';
        $this->views->getView($this, 'Contratante', $data);
    }

    public function Detail_Perfil_Aspirante()
    {
        $url = explode('/', $_GET['url']);
        if (isset($url[2]) && !empty($url[2])) {
            $idAspirante = intval($url[2]);
            if ($idAspirante > 0) {
                $data['perfil'] = $this->model->getInfoPerfilAspirante($idAspirante);
            } else {
                header('Location: ' . URL . 'Menu/Menu_Contratante');
            }
        } else {
            header('Location: ' . URL . 'Menu/Menu_Contratante');
        }
        $data['titulo_pagina'] = 'Detalle perfil aspirante | ' . NOMBRE_EMPRESA . '.';
        $this->views->getView($this, 'Detail_Perfil_Aspirante', $data);
    }

    //Método controlador para insertar y/o editar usuarios
    public function setContractor()
    {
        if ($_POST) {
            //verificar que los campos no vengan vacios
            if (empty($_POST['especificaciones'])) {
                $arrResponse = ['statusUser' => false, 'msg' => 'Todos los campos son obligatorios, completelos correctamente e intente nuevamente!!'];
            }
            /*
            1. Se crean variables para almacenar los datos enviados en la petición
            2. Se va hacer el proceso de insertar, y lo comprobamos si el id del usuario viene vacio 
            */
            $intId = intval($_POST['idContractor']);
            $strDescripcion = limpiarCadena($_POST['especificaciones']);
            $intIdUserFk = intval($_SESSION['id']);

            /*================== INSERTAR USUARIO =======================*/
            if ($intId === 0 || empty($intId)) {
                $option = 1;
                $request = $this->model->insertContractor(
                    $strDescripcion,
                    $intIdUserFk
                );
            } else {
                /*================== EDITAR USUARIO =======================*/
                $option = 2;
                $request = $this->model->updateContractor(
                    $intId,
                    $strDescripcion
                );
            }

            if ($request > 0 && is_numeric($request)) {
                if ($option === 1) {
                    $_SESSION['idContractorFK'] = intval($request);

                    $arrResponse = ['statusUser' => true, 'msg' => 'El registro del contrante ha sido exitoso :)', 'value' => $request];
                } elseif ($option === 2) {
                    $arrResponse = ['statusUser' => true, 'msg' => 'Los datos del contratante han sido modificado existosamente :)', 'value' => $request];
                }
            } elseif ($request === 'exits') {
                $arrResponse = array('statusUser' => false, 'msg' => '!Atención! el contratante ya se encuentra registrado!!. Intenta con otro', 'value' => $request);
            } else {
                $arrResponse = array('statusUser' => false, 'msg' => 'No es posible almacenar los datos :(', 'value' => $request);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    //editar perfil
    public function updatePerfilContratante()
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
                        $_SESSION['imgProfile'] = URL . "Assets/img/uploads/{$imgProfile['imagenUsuario']}";
                        $arrResponse = ['statusUser' => true, 'msg' => 'Los datos se actualizarón correctamente !!', 'session' => $_SESSION['user-data']];
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

    public function changePassword()
    {
        if ($_POST) {
            if (
                empty($_POST['actual']) || empty($_POST['nueva'])
                || empty($_POST['verificar'])
            ) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios !!'];
            } else {
                $idUsuario = intval(limpiarCadena($_SESSION['user-data']['idUsuario']));
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
        die();
    }

    public function getProfilesAspirantes()
    {
        $request = $this->model->getProfilesAspirantes();
        if (!empty($request)) {
            $arrResponse = ['status' => true, 'profiles' => $request];
        } else {
            $arrResponse = ['status' => false, 'msg' => 'No se encontraron registros.'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function searchProfilesAspirantes()
    {
        if ($_POST) {
            $search = strtolower(limpiarCadena($_POST['txtSearchVacantes']));
            $request = $this->model->searchProfilesAspirantes($search);
            if (!empty($request)) {
                $arrResponse = ['status' => true, 'profiles' => $request];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'No se encontraron registros.'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
