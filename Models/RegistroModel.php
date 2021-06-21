<?php

class RegistroModel extends GestionCRUD
{
    //atributos de la clase
    private $idUsuario;
    private $correoUsuario;
    private $passUsuario;
    private $idTipoDocumentoFK;
    private $numDocUsuario;
    private $numTelUsuario;
    private $numTelFijo;
    private $estadoUsuario;
    private $idRolFK;
    private $idBarrioFK;
    private $direccionUsuario;
    private $imagenUsuario;

    public function __construct()
    {
        parent::__construct();
    }

    //Método para insertar un usuario
    public function insertUser(
        string $email,
        string $pass,
        string $tipoDoc,
        int $numDoc,
        int $tel,
        int $telFijo,
        string $estado,
        int $rol,
        int $barrio,
        string $direccion,
        $imagen
    ) {
        $this->strEmail = $email;
        $this->strPass = $pass;
        $this->strTipoDoc = $tipoDoc;
        $this->intNumDoc = $numDoc;
        $this->intTel = $tel;
        $this->numTelFijo = $telFijo;
        $this->strEstado = $estado;
        $this->idRolFK = $rol;
        $this->idBarrioFK = $barrio;
        $this->direccionUsuario = $direccion;
        $this->imagenUsuario = $imagen;
        $return = 0;

        //consutar si ya existe ese administrador
        $sql = "SELECT * FROM usuario WHERE correoUsuario = '{$this->correoUsuario}' or 
        numDocUsuario = '{$this->numDocUsuario}'";
        $request = $this->selectAll($sql);

        //validar si ya existe ese administrador
        //si esta vacio lo que trae request, es decir que si podemos alamcenar ese administrador
        if (empty($request)) {
            $sql = "INSERT INTO USUARIO(correoUsuario, passUsuario, idTipoDocumentoFK, numDocUsuario, numTelUsuario,
            numTelFijo, estadoUsuario, idRolFK, idBarrioFK, direccionUsuario, imagenUsuario)
            VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            //almacena los valores en un arreglo
            $arrData = array(
                $this->strEmail,
                $this->strPass,
                $this->strTipoDoc,
                $this->intNumDoc,
                $this->intTel,
                $this->numTelFijo,
                $this->strEstado,
                $this->idRolFK,
                $this->idBarrioFK,
                $this->direccionUsuario,
                $this->imagenUsuario
            );
            $requestInsert = $this->insert($sql, $arrData);
            $return = $requestInsert;
        } else {
            $return = "exits";
        }
        return $return;
    }
}
