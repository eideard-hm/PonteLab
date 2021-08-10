<?php

class ContratanteModel extends GestionCRUD
{
    //atributos de la clase
    private string $descripcionContratante;
    private int $idUsuarioFK ;

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
    public function updateUser(
        int $id,
        string $descrpcion,
        string $direccion
    ) {
        $this->idUsuario = $id;
        $this->correoUsuario = $email;
        $this->passUsuario = $pass;
        $this->idTipoDocumentoFK = $tipoDoc;
        $this->numDocUsuario = $numDoc;
        $this->numTelUsuario = $tel;
        $this->numTelFijo = $telFijo;
        $this->estadoUsuario = $estado;
        $this->idRolFK = $rol;
        $this->idBarrioFK = $barrio;
        $this->direccionUsuario = $direccion;
        $this->imagenUsuario = $imagen;

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

}