<?php

class EstudiosModel extends GestionCRUD
{
    //atributos
    private int $idEstudio;
    private string $nombreInstitucion;
    private string $tituloObtenido;
    private int $idCuidad;
    private string $anioInicio;
    private string $mesInicio;
    private string $anioFin;
    private string $mesFin;
    private int $idAspirante;
    private int $idGradoEstudio;
    private int $idSector;

    //constructor
    public function __construct()
    {
        parent::__construct();
    }

    //método para traer todos los sectores
    public function getAllSectores()
    {
        $sql = "SELECT idSector, nombreSector
                FROM SECTOR";
        return $this->selectAll($sql);
    }

    //método para traer todos los sectores
    public function getAllGradoEstudio()
    {
        $sql = "SELECT idGrado, nombreGrado
                FROM GRADOESTUDIO";
        return $this->selectAll($sql);
    }

    //método para insertar un nuevo estudio
    public function insertEstudio(
        string $nombreInstitucion,
        string $tituloObtenido,
        int $idCuidad,
        int $idSector,
        string $anioInicio,
        string $mesInicio,
        string $anioFin,
        string $mesFin,
        int $idAspirante,
        int $idGradoEstudio
    ) {
        $this->nombreInstitucion = $nombreInstitucion;
        $this->tituloObtenido = $tituloObtenido;
        $this->idCuidad = $idCuidad;
        $this->idSector = $idSector;
        $this->anioInicio = $anioInicio;
        $this->mesInicio = $mesInicio;
        $this->anioFin = $anioFin;
        $this->mesFin = $mesFin;
        $this->idAspirante = $idAspirante;
        $this->idGradoEstudio = $idGradoEstudio;

        $sql = "SELECT idEstudio, nombreInstitucion, tituloObtenido, idAspiranteFK
                FROM ESTUDIO 
                WHERE nombreInstitucion = '{$this->nombreInstitucion}' 
                AND tituloObtenido = '{$this->tituloObtenido}' AND
                idAspiranteFK = {$this->idAspirante}";
        $request = $this->selectAll($sql);

        if (empty($request)) {
            $sql = "INSERT INTO ESTUDIO(nombreInstitucion, tituloObtenido, idCiudadEstudio, idSectorFK, 
                    añoInicio, mesInicio, añoFin, mesFin, idAspiranteFK, idGradoFK) 
                    VALUES(?,?,?,?,?,?,?,?,?,?)";
            $arrData = [
                $this->nombreInstitucion,
                $this->tituloObtenido,
                $this->idCuidad,
                $this->idSector,
                $this->anioInicio,
                $this->mesInicio,
                $this->anioFin,
                $this->mesFin,
                $this->idAspirante,
                $this->idGradoEstudio
            ];
            return $this->insert($sql, $arrData);
        } else {
            return 'exists';
        }
    }
}
