<?php

class ExperienciaModel extends GestionCRUD
{
    //atributos
    private int $idExperiencia;
    private string $empresaLaboro;
    private int $idSector;
    private string $idCiudadLaboro;
    private int $idTipoExperiencia;
    private string $puestoDesempeño;
    private string $anioInicio;
    private string $mesInicio;
    private string $anioFin;
    private string $mesFin;
    private string $funcion;
    private int $idAspirante;

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

    //Mètodo para traer todos los tipos de experiencias laborales
    public function getAllListExperiencia()
    {
        $sql = "SELECT idTipoExperiencia, nombreTipoExperiencia
            FROM TIPOEXPERIENCIA";
        return $this->selectAll($sql);
    }

    //método para insertar un nuevo estudio
    public function insertExperienciaLaboral(
        string  $empresa,
        int $sectorLaboro,
        int $ciudad,
        int $tipoExperiencia,
        string $puestoDesempeño,
        string $anioInicio,
        string $mesInicio,
        string $anioFin,
        string   $mesFin,
        string $funcion,
        int $idAspirante
    ) {
        $this->empresaLaboro = $empresa;
        $this->idSector = $sectorLaboro;
        $this->idCiudadLaboro = $ciudad;
        $this->idTipoExperiencia = $tipoExperiencia;
        $this->puestoDesempeño = $puestoDesempeño;
        $this->anioInicio = $anioInicio;
        $this->mesInicio = $mesInicio;
        $this->anioFin = $anioFin;
        $this->mesFin = $mesFin;
        $this->funcion = $funcion;
        $this->idAspirante = $idAspirante;

        $sql = "SELECT idInfoLaboral, empresaLaboro, idSectorFK, nombrePuestoDesempeño, 
                añoInicio, mesInicio, añoFin, mesFin, idAspiranteFK
                FROM INFOLABORAL 
                WHERE empresaLaboro = '{$this->empresaLaboro}' 
                AND nombrePuestoDesempeño = '{$this->puestoDesempeño}' 
                AND  idSectorFK = {$this->idSector}
                AND añoInicio = '{$this->anioInicio}' AND añoFin = '{$this->anioFin}' 
                AND mesInicio = '{$this->mesInicio}' AND mesFin = '{$this->mesFin}' AND 
                idAspiranteFK = {$this->idAspirante}";
        $request = $this->selectAll($sql);

        if (empty($request)) {
            $sql = "INSERT INTO INFOLABORAL(empresaLaboro, idSectorFK, idCiudadLaboroFK, idTipoExperienciaFK, 
                    nombrePuestoDesempeño, añoInicio, mesInicio, añoFin, mesFin, funcionDesempeño, 
                    idAspiranteFK) 
                    VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            $arrData = [
                $this->empresaLaboro,
                $this->idSector,
                $this->idCiudadLaboro,
                $this->idTipoExperiencia,
                $this->puestoDesempeño,
                $this->anioInicio,
                $this->mesInicio,
                $this->anioFin,
                $this->mesFin,
                $this->funcion,
                $this->idAspirante
            ];
            return $this->insert($sql, $arrData);
        } else {
            return 'exists';
        }
    }
}
