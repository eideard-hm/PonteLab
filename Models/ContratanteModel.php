<?php

class ContratanteModel extends GestionCRUD
{
    //atributos de la clase
    private string $descripcionContratante;
    private int $idUsuarioFK;

    public function __construct()
    {
        parent::__construct();
    }

    //Método para insertar un usuario
    public function insertContractor(
        string $especificaciones,
        int $idusuario
    ) {
        $this->descripcionContratante = $especificaciones;
        $this->idUsuarioFK = $idusuario;

        //validar si ya existe el usuario
        //si esta vacio lo que trae request, es decir que si podemos alamcenar ese usuario

        $sql = "INSERT INTO contratante(descripcionContratante, idUsuarioFK)
            VALUES(?,?)";
        //almacena los valores en un arreglo
        $arrData = array(
            $this->descripcionContratante,
            $this->idUsuarioFK
        );
        $return = $this->insert($sql, $arrData);

        return $return;
    }

    //Método para actualizar usuarios
    public function updateContractor(
        int $id,
        string $descrpcion,
        string $direccion
    ) {
        $this->descripcionContratante = $especificaciones;
        $this->idUsuarioFK = $idusuario;

        //verificar si existe el usuario
        $sql = "SELECT * FROM USUARIO WHERE (correoUsuario = '{$this->correoUsuario}' 
        AND idUsuario != '{$this->idUsuario}')
        OR (numDocUsuario = '{$this->numDocUsuario}' AND idUsuario !='{$this->idUsuario}')";
        $request = $this->selectAll($sql);

        //comprobar si existe para pasar a actualizar el registro
        if (empty($request) || $request === '' || $request === null) {
            $query = "UPDATE USUARIO 
            SET correoUsuario=?, passUsuario=?, idTipoDocumentoFK=?, numDocUsuario=?, 
            numTelUsuario=?, numTelFijo=?, estadoUsuario=?, idRolFK=?, idBarrioFK=?, 
            direccionUsuario=?, imagenUsuario =?
            WHERE idUsuario={$this->idUsuario}";

            $arrData = array(
                $this->strEmail,
                $this->passUsuario,
                $this->idTipoDocumentoFK,
                $this->intNumDoc,
                $this->numTelUsuario,
                $this->numTelFijo,
                $this->estadoUsuario,
                $this->idRolFK,
                $this->idBarrioFK,
                $this->direccionUsuario,
                $this->imagenUsuario
            );
            $request = $this->edit($query, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
    }
    //Método para traer los tipos de documentos registrados
    public function selectTipoDoc()
    {
        $sql = "SELECT idTipoDocumento, nombreTipoDocumento FROM TIPODOCUMENTO";
        $request = $this->selectAll($sql);
        return $request;
    }
    //Método para seleccionar todos los barrios registrador en la base de datos
    public function selectBarrio()
    {
        $sql = "SELECT idBarrio, nombreBarrio FROM BARRIO";
        $request = $this->selectAll($sql);
        return $request;
    }
    // Editar perfil
    public function updateUser(
        int $idUsuario,
        string $nombreUsuario,
        int $idTipoDocumentoFK,
        string $numDocUsuario,
        string $numTelUsuario,
        string $numTelFijo,
        int $idBarrioFK,
        string $direccionUsuario
    ) {

        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->numDocUsuario = $numDocUsuario;
        $this->idTipoDocumentoFK = $idTipoDocumentoFK;
        $this->numTelUsuario = $numTelUsuario;
        $this->numTelFijo = $numTelFijo;
        $this->idBarrioFK = $idBarrioFK;
        $this->direccionUsuario = $direccionUsuario;

        $sql = "SELECT * FROM USUARIO 
                WHERE (numDocUsuario ='{$this->numDocUsuario}' AND idUsuario != {$this->idUsuario})
                OR (numTelUsuario ='{$this->numTelUsuario}' AND idUsuario != {$this->idUsuario})";
        $request = $this->selectAll($sql);

        if (!empty($request)) {
            $sql = "UPDATE USUARIO SET 
                nombreUsuario=?, numDocUsuario=?,idTipoDocumentoFK=?,
                numTelUsuario=?, numTelFijo=?, 
                idBarrioFK=?, direccionUsuario=? 
                WHERE idUsuario  = {$this->idUsuario}";
            $arrData = array(
                $this->nombreUsuario,
                $this->numDocUsuario,
                $this->idTipoDocumentoFK,
                $this->numTelUsuario,
                $this->numTelFijo,
                $this->idBarrioFK,
                $this->direccionUsuario
            );
            return $this->edit($sql, $arrData);
        } else {
            return 'exists';
        }
    }
}
