<?php

class GestionCRUD extends Conexion
{
    //atributos de la clase
    private $conexion;
    private $strquery;
    private $arrValues;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->Connect();
    }
}
