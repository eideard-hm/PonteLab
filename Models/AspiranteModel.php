<?php

class AspiranteModel extends GestionCRUD
{
    //atributos de la clase - Tabla Aspirante
    private int $Id;
    private string $descripcion;
    private int $idUsuarioFK;
    private int $idEstadoLaboralAspiranteFK;

    //atributos de la clase - Tabla Puesto interes
    private int $idPuesto;
    private string $namePuesto;

    //atributos de la clase - Tabla aspirantePuestoInteres
    private int $idAspirantePuestoInteres;

    // Método para traer un unico aspirante por su id
    public function selectOneAspirante(int $id)
    {
        $this->Id = $id;
        $sql = "SELECT idAspirante, descripcionPersonalAspirante, idUsuarioFK, idEstadoLaboralAspiranteFK, 
                nombreEstado, nombreUsuario
                FROM ASPIRANTE AS a INNER JOIN USUARIO AS u 
                ON u.idUsuario = a.idUsuarioFK INNER JOIN ESTADOLABORALASPIRANTE AS el
                ON el.idEstadoLaboral = a.idEstadoLaboralAspiranteFK
                WHERE idAspirante = {$this->Id}";
        return $this->select($sql);
    }

    //Método para registrar aspirantes
    public function insertAspirante(
        string $descripcion,
        int $idUsuario,
        int $idEstadoLaboral
    ) {
        $this->descripcion = $descripcion;
        $this->idUsuarioFK = $idUsuario;
        $this->idEstadoLaboralAspiranteFK = $idEstadoLaboral;

        $sql = "INSERT INTO ASPIRANTE(descripcionPersonalAspirante, idUsuarioFK, idEstadoLaboralAspiranteFK)
                VALUES(?,?,?)";
        $arrData = [
            $this->descripcion,
            $this->idUsuarioFK,
            $this->idEstadoLaboralAspiranteFK
        ];

        return $this->insert($sql, $arrData);
    }

    //Método para insertar 

    //Método para traer todos los estados laborales
    public function getAllWorkStatus()
    {
        $sql = "SELECT idEstadoLaboral, nombreEstado
                FROM ESTADOLABORALASPIRANTE";
        return $this->selectAll($sql);
    }

    //Método para traer los puestos de interes
    public function getAllPuestoInteres()
    {
        $sql = "SELECT idPuestoInteres, nombrePuesto
                FROM PUESTOINTERES";
        return $this->selectAll($sql);
    }

    public function getOnePuestoInteres(int $id)
    {
        $this->idAspirantePuestoInteres = $id;
        $sql = "SELECT idAspirantePuestoInteres, idAspiranteFK, idPuestoInteresFK, nombrePuesto, 
                nombreUsuario
                FROM PUESTOINTERES AS pi INNER JOIN ASPIRANTE_PUESTOINTERES api 
                ON pi.idPuestoInteres = api.idPuestoInteresFK INNER JOIN ASPIRANTE AS a
                ON a.idAspirante = api.idAspiranteFK INNER JOIN USUARIO  AS u
                ON u.idusuario = a.idUsuarioFK
                WHERE idAspirantePuestoInteres = {$this->idAspirantePuestoInteres}";
        return $this->select($sql);
    }

    //método para insertar un puesto de interes
    public function insertOtroPuestoInteres(
        string $nombrePuesto
    ) {
        $this->namePuesto = $nombrePuesto;
        //consultar en la base de datos para verificar si existe o no ese puestp de interés
        $sql = "SELECT nombrePuesto 
                FROM PUESTOINTERES
                WHERE nombrePuesto = '{$this->namePuesto}'";
        $request = $this->selectAll($sql);

        //verificamos si la variable $request trae algo como resultado.
        // Si viene vacio entonces podemos insertar el puesto
        if (empty($request)) {
            $sql = "INSERT INTO PUESTOINTERES(nombrePuesto)
                    VALUES(?)";
            $arrData = [
                $this->namePuesto
            ];

            return $this->insert($sql, $arrData);
        } else {
            return "exists";
        }
    }

    public function puestoInteresAspirante(
        int $idAspirante,
        int $idPuesto
    ) {
        $this->Id = $idAspirante;
        $this->idPuesto = $idPuesto;

        $sql = "INSERT INTO ASPIRANTE_PUESTOINTERES(idAspiranteFK, idPuestoInteresFK)
                VALUES(?,?)";
        $arrData = [
            $this->Id,
            $this->idPuesto
        ];
        return $this->insert($sql, $arrData);
    }
}
