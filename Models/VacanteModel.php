<?php

class VacanteModel extends GestionCRUD
{
    //atributos
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
    //Tabla Requisitos
    private int $idVacanteFK;
    private int $idRequisitosFK;
    private string $especficacionRequisitos;

    //constructor
    public function __construct()
    {
        parent::__construct();
    }

    //metodo para traer todas las vacantes
    public function selectAllVacantes()
    {
        $sql = "SELECT idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, 
                tipoContratoVacante, sueldoVacante, fechaHoraPublicacion, fechaHoraCierre, direccionVacante, 
                estadoVacante, idContratanteFK, nombreUsuario
                FROM VACANTE AS v INNER JOIN CONTRATANTE AS c 
                ON c.idContratante = v.idContratanteFK INNER JOIN USUARIO AS u
                ON u.idUsuario = c.idUsuarioFK";
        return $this->selectAll($sql);
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

        $return = 0;

        $sql = "INSERT INTO VACANTE (idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, tipoContratoVacante, sueldoVacante, fechaHoraPublicacion, fechaHoraCierre, direccionVacante, estadoVacante, idContratanteFK, idSectorFK)
        values (?,?,?,?,?,?,?,?,?,?,?)";
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
                $this->idContratanteFK
            );
            $return = $this->insert($sql, $arrData);
        } else {
            $return = 'exits';
        }
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
        $this->descripcionVacante = $descripcionVacante;
        $return = 0;

        //validacion de la vacante
        //sí esta vacio lo que trae request, es decir que si podemos alamcenar ese usuario
        if (empty($request) || $request === '' || $request === null) {
            $sql = "INSERT INTO VACANTE(nombreVacante, cantidadVacante, descripcionVacante, 
            perfilAspirante, tipoContratoVacante, sueldoVacante, fechaHoraPublicacion, 
            fechaHoraCierre, direccionVacante, estadoVacante, idContratanteFK)
            VALUES(?,?,?,?,?,?,?,?,?,?,?)";
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
                $this->idContratanteFK
            );
            $return = $this->insert($sql, $arrData);
        } else {
            $return = 'exits';
        }
        return $return;
    }

    public function getFiltroVacantes($busqueda)
    {
        $sql = "SELECT idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, 
                tipoContratoVacante, sueldoVacante, direccionVacante, estadoVacante, 
                fechaHoraPublicacion, fechaHoraCierre
                FROM VACANTE
                WHERE idVacante LIKE '%{$busqueda}%' OR nombreVacante LIKE '%{$busqueda}%' 
                OR cantidadVacante LIKE '%{$busqueda}%' OR descripcionVacante LIKE '%{$busqueda}%'
                OR perfilAspirante LIKE'%{$busqueda}%' OR tipoContratoVacante LIKE'%{$busqueda}%'
                OR sueldoVacante LIKE '%{$busqueda}%' OR direccionVacante LIKE '%{$busqueda}%'
                OR estadoVacante LIKE '%{$busqueda}%'";
        return $this->selectAll($sql);
    }

    public function selectVacancy()
    {
        $sql = "SELECT idVacante FROM VACANTE
        WHERE idUsuario = {$this->idUsuario}";
        $request = $this->select($sql);
        return $request;
    }
    public function selectRequirement()
    {
        $sql = "SELECT idTipoDocumento FROM TIPODOCUMENTO";
        $request = $this->select($sql);
        return $request;
    }
}
