<?php

class Perfil_ContratanteModel extends gestionCRUD
{

    private $idUsuario;
    //private $correoUsuario ;
    private $nombreUsuario;
    //private $passUsuario ;
    private $idTipoDocumentoFK;
    private $numDocUsuario;
    private $numTelUsuario;
    private $numTelFijo;
    //private $estadoUsuario; 
    //private $idRolFK ;
    private $idBarrioFK;
    private $direccionUsuario;


    public function __construct()
    {
        parent::__construct();
    }

    //======================================EDITAR DATOS=====================================

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
    }
    //Método para traer los tipos de documentos registrados
    public function selectTipoDoc()
    {
        $sql = "SELECT idTipoDocumento, nombreTipoDocumento FROM TIPODOCUMENTO";
        $request = $this->selectAll($sql);
        return $request;
    }

    //Método para traer todos los roles registrador
    public function selectRol()
    {
        $sql = "SELECT idRol, nombreRol FROM ROL";
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
}
