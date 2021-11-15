<?php

class Mysql extends Conexion
{
    //atributos de la clase
    private string $strquery;
    private array $arrValues;
    //private int $arrValues;
    private $conexion;

    /** 
     * Constructor de la clase, el cual inicializa la conexion a la base de datos.
     */
    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->Connect();
    }

    /** 
     * Método para insertar registros en la base de datos.
     * @param string $sql Consulta que se va a ejecutar.
     * @param array $arrValues Valores que se van a insertar en la consulta.
     * @return int $result Si la inserción fue correcta retorna el id del registro insertado, de lo contrario retorna 0,
     * de los contrario retorna 0.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
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

    /**
     * Método para traer un solo elemento de la base de datos.
     * @param string $sql Consulta que se va a ejecutar.
     * @return array $result Resultado de la consulta.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function select(string $sql)
    {
        $this->strquery = $sql;

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    /** 
     * Método para seleccionar todos los elementos de la base de datos.
     * @param string $sql Consulta que se va a ejecutar.
     * @return array $data Arreglo con los datos de la consulta.
     */
    public function selectAll(String $sql)
    {
        $this->strquery = $sql;

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    /** 
     * Método para editar un registro de la base de datos.
     * @param string $sql Consulta a la base que se va a ejecutar.
     * @param array $arrValues Arreglo con los valores que se van a actualizar.
     * @author Edier Heraldo Hernández Molano
     */
    public function edit(string $sql, array $arrValues)
    {
        $this->strquery = $sql;
        $this->arrValues = $arrValues;

        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute($this->arrValues);
    }

    /** 
     * Método para eliminar un elemento de la base de datos.
     * @param string $sql Consulta a la base de datos que se va a ejecutar.
     * @return boolean Retorna true si se ejecuta la consulta correctamente.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function delete(string $sql)
    {
        $this->strquery = $sql;

        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute();
    }

    /**
     * Método para cerrar la conexión a la base de datos, cuando se terminan
     * los procesos
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function __destruct()
    {
        $this->conexion = null;
    }
}
