<?php

class ContratanteModel extends GestionCRUD
{
    //atributos de la clase
    private string $descripcionContratante;
    private int $idUsuarioFK;
    private string $imagenUsuario;

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
        $this->descripcionContratante = $descrpcion;
        $this->idUsuarioFK = $direccion;

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
        string $direccionUsuario,
        $imagenUsuario
    ) {
        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->numDocUsuario = $numDocUsuario;
        $this->idTipoDocumentoFK = $idTipoDocumentoFK;
        $this->numTelUsuario = $numTelUsuario;
        $this->numTelFijo = $numTelFijo;
        $this->idBarrioFK = $idBarrioFK;
        $this->direccionUsuario = $direccionUsuario;
        $this->imagenUsuario = $imagenUsuario;

        $sql = "SELECT * FROM USUARIO 
                WHERE (numDocUsuario ='{$this->numDocUsuario}' AND idUsuario != {$this->idUsuario})
                OR (numTelUsuario ='{$this->numTelUsuario}' AND idUsuario != {$this->idUsuario})";
        $request = $this->selectAll($sql);

        if (empty($request)) {
            $sql = "UPDATE USUARIO SET 
                nombreUsuario= ?, numDocUsuario= ?,idTipoDocumentoFK= ?,
                numTelUsuario= ?, numTelFijo= ?, 
                idBarrioFK= ?, direccionUsuario= ?, imagenUsuario= ?
                WHERE idUsuario= ?";
            $arrData = array(
                $this->nombreUsuario,
                $this->numDocUsuario,
                $this->idTipoDocumentoFK,
                $this->numTelUsuario,
                $this->numTelFijo,
                $this->idBarrioFK,
                $this->direccionUsuario,
                $this->imagenUsuario,
                $this->idUsuario
            );
            return $this->edit($sql, $arrData);
        } else {
            return 'exists';
        }
    }
    public function updateContraseña(int $idUsuario, string $password)
    {
        $this->intId = $idUsuario;
        $this->strPassword = $password;
        $sql = "UPDATE usuario 
                SET passUsuario = ?, token =  ?
                WHERE idUsuario = {$this->intId}";
        $arrData = array($this->strPassword, "");
        return $this->edit($sql, $arrData);
    }

    //Método para extraer un unico usuario de la base de datos por el id
    public function selectOneUser(int $idUsuario)
    {
        $this->idUsuario = $idUsuario;
        //consulta para extraerlo
        $sql = "SELECT idUsuario, nombreUsuario, correoUsuario, nombreTipoDocumento, 
        numDocUsuario, numTelUsuario, numTelFijo, estadoUsuario, nombreRol, 
        nombreBarrio, direccionUsuario, idTipoDocumentoFK, idBarrioFK, imagenUsuario
        FROM USUARIO AS u INNER JOIN TIPODOCUMENTO AS td
        ON td.idTipoDocumento = u.idTipoDocumentoFK INNER JOIN ROL AS r
        ON r.idRol = u.idRolFK INNER JOIN BARRIO AS b
        ON b.idBarrio = u.idBarrioFK
        WHERE idUsuario = {$this->idUsuario}";

        return $this->select($sql);
    }

    public function selectImgProfile(int $id)
    {
        $this->intId = $id;
        $sql = "SELECT idUsuario, imagenUsuario
        FROM USUARIO 
        WHERE idUsuario = {$this->intId}";
        return $this->select($sql);
    }

    public function inactivarCuenta(int $idUsuario, int $estadoUsuario)
    {
        $this->idUsuario = $idUsuario;
        $this->estadoUsuario = $estadoUsuario;

        $sql = "UPDATE USUARIO 
                SET estadoUsuario = ?
                WHERE idUsuario = ?";
        $arrData = array(
            $this->estadoUsuario,
            $this->idUsuario
        );
        return $this->edit($sql, $arrData);
    }
}
