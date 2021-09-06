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

    //atributos de la clase - Tabla Idioma
    private int $idIdioma;
    private string $nombreIdioma;

    //atributos de la clase - Tabla Idioma_Aspirante
    private int $idIdiomaAspirante;
    private string $nivelIdioma;

    //atributos de la clase - Tabla Habilidad
    private int $idHabilidad;
    private string $nameHabilidad;
    private string $nivelHabilidad;

    public function __construct()
    {
        parent::__construct();
    }

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

    //Método para obtener todos los aspirantes registrados
    public function selectAllAspirantes()
    {
        $sql = "SELECT idAspirante, descripcionPersonalAspirante, idUsuarioFK, idEstadoLaboralAspiranteFK, nombreEstado,
                nombreUsuario, imagenUsuario
                FROM ASPIRANTE AS a INNER JOIN USUARIO AS u 
                ON u.idUsuario = a.idUsuarioFK INNER JOIN ESTADOLABORALASPIRANTE AS el
                ON el.idEstadoLaboral = a.idEstadoLaboralAspiranteFK";
        return $this->selectAll($sql);
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

    //método para traer todos los idiomas
    public function getAllIdiomas()
    {
        $sql = "SELECT idIdioma, nombreIdioma
                FROM IDIOMA";
        return $this->selectAll($sql);
    }

    public function getAllHabilidades()
    {
        $sql = "SELECT idHabilidad, nombreHabilidad	
                FROM HABILIDAD";
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
        //consultar en la base de datos para verificar si existe o no ese puesto de interés
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

    //Método para insertar un puesto de Interes Aspirante
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

    //Método para insertar un nuevo idioma
    public function insertNewIdioma(
        string $nombre
    ) {
        $this->nombreIdioma = $nombre;
        $sql = "SELECT idIdioma, nombreIdioma
                FROM IDIOMA 
                WHERE nombreIdioma = '{$this->nombreIdioma}'";
        $request  = $this->selectAll($sql);

        if (empty($request)) {
            $sql = "INSERT INTO IDIOMA(nombreIdioma)
                    VALUES(?)";
            $arrData = [
                $this->nombreIdioma
            ];
            return $this->insert($sql, $arrData);
        } else {
            return 'exists';
        }
    }

    public function insertIdiomaAspirante(
        int $idIdiomaFK,
        int $idAspiranteFK,
        string $nivelIdioma
    ) {
        $this->idIdioma = $idIdiomaFK;
        $this->Id = $idAspiranteFK;
        $this->nivelIdioma = $nivelIdioma;

        $sql = "SELECT idIdiomaAspirante, idAspiranteFK, idIdiomaFK, nivelIdioma
                FROM IDIOMA_ASPIRANTE 
                WHERE idAspiranteFK = {$this->Id} AND idIdiomaFK = {$this->idIdioma}";
        $request = $this->selectAll($sql);

        if (empty($request)) {
            $sql = "INSERT INTO IDIOMA_ASPIRANTE(idAspiranteFK, idIdiomaFK, nivelIdioma)
                    VALUES(?,?,?)";
            $arrData = [
                $this->idIdioma,
                $this->Id,
                $this->nivelIdioma
            ];
            return $this->insert($sql, $arrData);
        } else {
            return 'exists';
        }
    }

    public function updateIdioma(
        int $idIdioma,
        string $nameIdioma
    ) {
        $this->idIdioma = $idIdioma;
        $this->nombreIdioma = $nameIdioma;

        $sql = "UPDATE IDIOMA SET 
                nombreIdioma = ? 
                WHERE idIdioma = {$this->idIdioma}";
        $arrData = [$this->nombreIdioma];
        return $this->edit($sql, $arrData);
    }

    public function insertHabilidad(
        string $nombreHab
    ) {
        $this->nameHabilidad = $nombreHab;

        $sql = "SELECT idHabilidad, nombreHabilidad
                FROM HABILIDAD
                WHERE nombreHabilidad = '{$this->nameHabilidad}'";
        $request = $this->selectAll($sql);

        if (empty($request)) {
            $sql = "INSERT INTO HABILIDAD(nombreHabilidad)
                    VALUES(?)";
            $arrData = [
                $this->nameHabilidad
            ];
            return $this->insert($sql, $arrData);
        } else {
            return 'exists';
        }
    }

    public function insertNewHabilidad(
        int $idAspiranteFK,
        int $idHabilidadFK,
        int $nivelHabilidad
    ) {
        $this->Id = $idAspiranteFK;
        $this->idHabilidad = $idHabilidadFK;
        $this->nivelHabilidad = $nivelHabilidad;

        $sql = "SELECT idHabilidadAspirante, idAspiranteFK, idHabilidadFK
                FROM HABILIDAD_ASPIRANTE
                WHERE idAspiranteFK = {$this->Id} AND idHabilidadFK = {$this->idHabilidad}";
        $request = $this->selectAll($sql);

        if (empty($request)) {
            $sql = "INSERT INTO HABILIDAD_ASPIRANTE(idAspiranteFK, idHabilidadFK, nivelHabilidad)
                    VALUES(?,?,?)";
            $arrData = [
                $this->Id,
                $this->idHabilidad,
                $this->nivelHabilidad
            ];
            return $this->insert($sql, $arrData);
        } else {
            return 'exists';
        }
    }

    public function routesAspirante(int $idUsuario)
    {
        $this->idUsuarioFK = $idUsuario;
        $sql = "SELECT idAspirante, idUsuarioFK
                FROM ASPIRANTE
                WHERE idUsuarioFK = {$this->idUsuarioFK}";
        return $this->selectAll($sql);
    }
}
