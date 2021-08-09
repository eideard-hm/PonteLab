<?php

class GestionCRUD extends Conexion
{
    //atributos de la clase
    private string $strquery;
    private array $arrValues;
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->Connect();
    }

    /**
     * Métodos para realizar la crud a la base de datos
     */

    //Método para insertar
    public function insert(string $sql, array $arrValues)
    {
        $this->strquery = $sql;
        $this->arrValues = $arrValues;

        $stmt = $this->conexion->prepare($sql);
        if ($stmt->execute($arrValues)) {
            $result = $this->conexion->lastInsertId();
        } else {
            $result = 0;
        }
        return $result;
    }

    //Método para traer un solo elemento de la base de datos
    public function select(string $sql)
    {
        $this->strquery = $sql;

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    //Método para seleccionar todos los elementos de la base de datos
    public function selectAll(String $sql)
    {
        $this->strquery = $sql;

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //Método para editar
    public function edit(string $sql, array $arrValues)
    {
        $this->strquery = $sql;
        $this->arrValues = $arrValues;

        $stmt = $this->conexion->prepare($sql);
        $resUpdate = $stmt->execute($arrValues);
        return $resUpdate;
    }

    //Metodo para eliminar
    public function delete(string $sql)
    {
        $this->strquery = $sql;

        $stmt = $this->conexion->prepare($sql);
        $resDelete =  $stmt->execute();
        return $resDelete;
    }
}
