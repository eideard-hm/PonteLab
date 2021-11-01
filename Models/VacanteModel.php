<?php

class VacanteModel extends GestionCRUD
{
    //atributos
    //Tabla CONTRATANTE
    private int $idUsuarioFK;
    //Tabla Vacante
    private int $idVacante;
    private string $nombreVacante;
    private int $cantidadVacante;
    private string $descripcionVacante;
    private string $perfilAspirante;
    private string $tipoContratoVacante;
    private float $sueldoVacante;
    private string $fechaHoraPublicacion;
    private string $fechaHoraCierre;
    private string $direccionVacante;
    private int $estadoVacante;
    private int $idContratanteFK;
    private int $idSectorFK;
    //Tabla Requisitos
    private int $idVacanteFK;
    private int $idRequisitosFK;
    private string $especficacionRequisitos;

    //campos de la tabla sector
    private array $nombreSector;

    //constructor
    public function __construct()
    {
        parent::__construct();
    }

    //metodo para traer todas las vacantes
    public function selectAllVacantes(int $iniciar, int $vacantes_por_pagina)
    {
        $sql = "SELECT * FROM vacanteView
                LIMIT {$iniciar}, {$vacantes_por_pagina}";
        return $this->selectAll($sql);
    }

    public function selectOneContractor($idUsuarioFK)
    {
        $this->idUsuarioFK = $idUsuarioFK;
        //consulta
        $sql = "SELECT idContratante, descripcionContratante
        FROM CONTRATANTE WHERE idUsuarioFK ={$this->idUsuarioFK}";

        return $this->select($sql);
    }

    //metodo de consulta una sola vacante por id 
    public function selectOneVacancy(int $id)
    {
        $this->idVacante = $id;
        //consulta de extraccion
        $sql = "SELECT idVacante, nombreVacante, cantidadVacante, descripcionVacante,
        perfilAspirante, tipoContratoVacante, sueldoVacante, fechaHoraPublicacion, direccionVacante,
        estadoVacante, idContratanteFK
        FROM VACANTE AS u
        INNER JOIN CONTRATANTE AS c
        ON c.idContratante = u.idContratanteFK
        WHERE idVacante = {$this->idVacante}";

        return $this->select($sql);
    }

    //metodo para la insercion de una vacante
    public function insertVacancy(
        string $nombreVacante,
        int $cantidadVacante,
        string $descripcionVacante,
        string $perfilAspirante,
        string $tipoContratoVacante,
        float $sueldoVacante,
        string $fechaHoraPublicacion,
        string $fechaHoraCierre,
        string $direccionVacante,
        int $estadoVacante,
        int $idContratante,
        int $idSectorFK
    ) {
        $this->nombreVacante = $nombreVacante;
        $this->cantidadVacante = $cantidadVacante;
        $this->descripcionVacante = $descripcionVacante;
        $this->perfilAspirante = $perfilAspirante;
        $this->tipoContratoVacante = $tipoContratoVacante;
        $this->sueldoVacante = $sueldoVacante;
        $this->fechaHoraPublicacion = $fechaHoraPublicacion;
        $this->fechaHoraCierre = $fechaHoraCierre;
        $this->direccionVacante = $direccionVacante;
        $this->estadoVacante = $estadoVacante;
        $this->idContratanteFK = $idContratante;
        $this->idSectorFK = $idSectorFK;

        $return = 0;

        $sql = "INSERT INTO VACANTE (nombreVacante, cantidadVacante, descripcionVacante,
        perfilAspirante, tipoContratoVacante, sueldoVacante, fechaHoraPublicacion,
        fechaHoraCierre, direccionVacante, estadoVacante, idContratanteFK, idSectorFK)
        values (?,?,?,?,?,?,?,?,?,?,?,?)";
        //almacena los valores en un arreglo
        $arrData = array(
            $this->nombreVacante,
            $this->cantidadVacante,
            $this->descripcionVacante,
            $this->perfilAspirante,
            $this->tipoContratoVacante,
            $this->sueldoVacante,
            $this->fechaHoraPublicacion,
            $this->fechaHoraCierre,
            $this->direccionVacante,
            $this->estadoVacante,
            $this->idContratanteFK,
            $this->idSectorFK
        );
        $return = $this->insert($sql, $arrData);
        return $return;
    }

    //metodo para la insercion de una vacante
    public function insertRequirement(
        int $idVacanteFK,
        int $idRequisitosFK,
        string $especficacionRequisitos
    ) {
        $this->idVacanteFK = $idVacanteFK;
        $this->idRequisitosFK = $idRequisitosFK;
        $this->especficacionRequisitos = $especficacionRequisitos;

        $return = 0;

        $sql = "INSERT INTO REQUISITOS_VACANTE
        (idVacanteFK, idRequisitosFK, especficacionRequisitos)
        VALUES (?,?,?)";
        $arrData = array(
            $this->idVacanteFK,
            $this->idRequisitosFK,
            $this->especficacionRequisitos
        );

        $return = $this->insert($sql, $arrData);

        return $return;
    }

    public function getFiltroVacantes($busqueda)
    {
        $sql = "SELECT idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, 
                tipoContratoVacante, sueldoVacante, direccionVacante, estadoVacante, 
                fechaHoraPublicacion, fechaHoraCierre, v.idContratanteFK,
                u.nombreUsuario, u.imagenUsuario 
                FROM VACANTE AS v INNER JOIN CONTRATANTE AS c 
                ON c.idContratante = v.idContratanteFK INNER JOIN USUARIO AS u
                ON u.idUsuario = c.idUsuarioFK
                WHERE idVacante LIKE '%{$busqueda}%' OR nombreVacante LIKE '%{$busqueda}%' 
                OR cantidadVacante LIKE '%{$busqueda}%' OR descripcionVacante LIKE '%{$busqueda}%'
                OR perfilAspirante LIKE'%{$busqueda}%' OR tipoContratoVacante LIKE'%{$busqueda}%'
                OR sueldoVacante LIKE '%{$busqueda}%' OR direccionVacante LIKE '%{$busqueda}%'
                OR estadoVacante LIKE '%{$busqueda}%' OR nombreUsuario LIKE '%{$busqueda}%'";
        return $this->selectAll($sql);
    }

    public function selectAllVacancy()
    {
        $sql = "SELECT idVacante, nombreVacante FROM VACANTE";
        $request = $this->selectAll($sql);
        return $request;
    }

    public function selectAllReqs()
    {
        $sql = "SELECT idRequisitos, nombreRequisitos FROM REQUISITOS";
        $request = $this->selectAll($sql);
        return $request;
    }

    //Método para seleccionar los sectores
    public function selectAllSector()
    {
        $sql = "SELECT idSector, nombreSector
                FROM SECTOR";
        return $this->selectAll($sql);
    }

    public function getVacantesSector(array $sector)
    {
        $this->nombreSector = $sector;
        $return = '';
        $operadorOr = 'OR';
        for ($i = 0; $i < count($this->nombreSector); $i++) {
            if (!empty($this->nombreSector[$i])) {
                if ($this->nombreSector[$i] === $this->nombreSector[count($this->nombreSector) - 2]) {
                    $return .= "idSectorFK = {$this->nombreSector[$i]}";
                    break;
                }
                $return .= "idSectorFK = {$this->nombreSector[$i]} {$operadorOr} ";
            }
        }

        $sql = "SELECT idVacante, nombreVacante, cantidadVacante,   
                descripcionVacante, perfilAspirante, tipoContratoVacante, 
                sueldoVacante, fechaHoraPublicacion, fechaHoraCierre, 
                direccionVacante, estadoVacante, idSectorFK
                FROM VACANTE 
                WHERE {$return}";
        return $this->selectAll($sql);
    }

    public function loadSectorUser(
        int $idUsuario
    ) {
        $this->idUsuario = $idUsuario;

        $sql = "SELECT idSectorFK
                FROM SECTOR_USUARIO
                WHERE idUsuarioFK = {$this->idUsuario}";
        return $this->selectAll($sql);
    }

    public function detailVacante(int $id)
    {
        $this->idVacante = $id;
        $sql = "SELECT * FROM detailVacanteView 
                WHERE idVacante = {$this->idVacante}";
        return $this->select($sql);
    }

    public function applyVacancy(
        int $idAspiranteFK,
        int $idVacanteFK,
        int $estadoVacante
    ) {
        $this->idUsuarioFK = $idAspiranteFK;
        $this->idVacanteFK = $idVacanteFK;
        $this->estadoVacante = $estadoVacante;
        $sql = "SELECT idAplicacionVacante, idAspiranteFK, idVacanteFK, estadoAplicacionVacante
                FROM APLICACION_VACANTE
                WHERE idAspiranteFK = {$this->idUsuarioFK} AND idVacanteFK = {$this->idVacanteFK}";
        $request = $this->selectAll($sql);
        if (empty($request)) {
            $sql = "INSERT INTO APLICACION_VACANTE(idAspiranteFK, idVacanteFK, estadoAplicacionVacante)
                    VALUES(?,?,?)";
            $arrData = [
                $this->idUsuarioFK,
                $this->idVacanteFK,
                $this->estadoVacante
            ];
            return $this->insert($sql, $arrData);
        } else {
            return 'exists';
        }
    }

    public function dataAspiranteApplicationVacancy(int $idApplicationVacancy)
    {
        $this->idVacante = $idApplicationVacancy;
        $sql = "SELECT * 
                FROM dataAspiranteApplicationVacancyView
                WHERE idAplicacionVacante = {$idApplicationVacancy}";
        return $this->select($sql);
    }

    public function dataVacanteApplicationVacancy(int $idApplicationVacancy)
    {
        $this->idVacante = $idApplicationVacancy;
        $sql = "SELECT * 
                FROM dataVacanteApplicationVacancyView
                WHERE idAplicacionVacante = {$idApplicationVacancy}";
        return $this->select($sql);
    }

    public function aspiranteApplyVacancy($idVacante, $idAspirante)
    {
        $sql = "SELECT * 
        FROM dataVacanteApplicationVacancyView
        WHERE idVacanteFK  = {$idVacante} AND idAspiranteFK = {$idAspirante}";
        return $this->select($sql);
    }

    public function setStatusApplicationVacancy(string $idAplicacion, string $estado)
    {
        $this->idVacante = $idAplicacion;
        $this->estadoVacante = $estado;
        $sql = "UPDATE aplicacion_vacante
                SET estadoAplicacionVacante = ?
                WHERE idAplicacionVacante  = {$this->idVacante}";
        $arrData = [
            $this->estadoVacante
        ];
        return $this->edit($sql, $arrData);
    }

    public function countRows()
    {
        $sql = "SELECT COUNT(*) AS total FROM VACANTE";
        return $this->select($sql);
    }
}
