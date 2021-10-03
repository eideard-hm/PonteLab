<?php

class AspiranteModel extends GestionCRUD
{
    //atributos de la clase - Tabla Aspirante
    private int $Id;
    private string $descripcion;
    private int $idUsuarioFK;
    private int $idEstadoLaboralAspiranteFK;
    private $created_at;
    private $updated_at;

    //atributos de la clase - Tabla Puesto interes
    private int $idPuesto;
    private string $namePuesto;

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

    //atributos de la clase - Tabla Estudios
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

    //atributos de la clase - Tabla Experiencia
    private string $empresaLaboro;
    private string $idCiudadLaboro;
    private int $idTipoExperiencia;
    private string $puestoDesempeño;
    private string $funcion;

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

    //metodo para traer todas los perfiles
    public function selectAllPerfiles()
    {
        $sql = "SELECT idAspirante, descripcionPersonalAspirante, idUsuarioFK, 
                idEstadoLaboralAspiranteFK, nombreEstado,
                nombreUsuario, token, imagenUsuario
                FROM ASPIRANTE AS a INNER JOIN USUARIO AS u 
                ON u.idUsuario = a.idUsuarioFK INNER JOIN ESTADOLABORALASPIRANTE AS el
                ON el.idEstadoLaboral = a.idEstadoLaboralAspiranteFK";
        return $this->selectAll($sql);
    }

    public function getFiltroPerfiles($busqueda)
    {
        $sql = "SELECT idAspirante, descripcionPersonalAspirante, idUsuarioFK, 
                idEstadoLaboralAspiranteFK, nombreEstado, nombreUsuario
                FROM ASPIRANTE AS a INNER JOIN USUARIO AS u 
                ON u.idUsuario = a.idUsuarioFK INNER JOIN ESTADOLABORALASPIRANTE AS el
                ON el.idEstadoLaboral = a.idEstadoLaboralAspiranteFK              
                WHERE idAspirante LIKE '%{$busqueda}%'
                OR descripcionPersonalAspirante LIKE '%{$busqueda}%' 
                OR idUsuarioFK LIKE '%{$busqueda}%'
                OR idEstadoLaboralAspiranteFK LIKE '%{$busqueda}%'
                OR nombreEstado LIKE '%{$busqueda}%'
                OR nombreUsuario LIKE '%{$busqueda}%'";

        // -- WHERE descripcionPersonalAspirante LIKE '%{$busqueda}%' 
        // -- OR nombreEstado LIKE '%{$busqueda}%'
        // -- OR nombreUsuario LIKE '%{$busqueda}%'"                  

        return $this->selectAll($sql);
    }

    //Método para registrar aspirantes
    public function insertAspirante(
        string $descripcion,
        int $idUsuario,
        int $idEstadoLaboral,
        $created_at,
        $updated_at
    ) {
        $this->descripcion = $descripcion;
        $this->idUsuarioFK = $idUsuario;
        $this->idEstadoLaboralAspiranteFK = $idEstadoLaboral;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;

        $sql = "INSERT INTO ASPIRANTE(descripcionPersonalAspirante, idUsuarioFK, idEstadoLaboralAspiranteFK,
                created_at, updated_at)
                VALUES(?,?,?,?,?)";
        $arrData = [
            $this->descripcion,
            $this->idUsuarioFK,
            $this->idEstadoLaboralAspiranteFK,
            $this->created_at,
            $this->updated_at
        ];

        return $this->insert($sql, $arrData);
    }

    //Método para actualizar aspirantes
    public function updateAspirante(
        int $id,
        string $descripcion,
        int $idEstadoLaboral,
        $updated_at
    ) {
        $this->Id = $id;
        $this->descripcion = $descripcion;
        $this->idEstadoLaboralAspiranteFK = $idEstadoLaboral;
        $this->updated_at = $updated_at;

        $sql = "UPDATE ASPIRANTE SET descripcionPersonalAspirante = ?, idEstadoLaboralAspiranteFK = ?,
                updated_at = ?
                WHERE idAspirante = {$this->Id}";
        $arrData = [
            $this->descripcion,
            $this->idEstadoLaboralAspiranteFK,
            $this->updated_at
        ];
        return $this->edit($sql, $arrData);
    }

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
        $this->Id = $id;
        $sql = "SELECT idAspirantePuestoInteres, idAspiranteFK, idPuestoInteresFK, nombrePuesto, 
                nombreUsuario
                FROM PUESTOINTERES AS pi INNER JOIN ASPIRANTE_PUESTOINTERES api 
                ON pi.idPuestoInteres = api.idPuestoInteresFK INNER JOIN ASPIRANTE AS a
                ON a.idAspirante = api.idAspiranteFK INNER JOIN USUARIO  AS u
                ON u.idusuario = a.idUsuarioFK
                WHERE idAspiranteFK = {$this->Id}";
        return $this->selectAll($sql);
    }

    public function getIdiomasSelected(int $id)
    {
        $this->Id = $id;
        $sql = "SELECT * 
                FROM idiomasSeleccionadosView 
                WHERE idAspiranteFK = {$this->Id}";
        return $this->selectAll($sql);
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

    public function getHabilidadesSelected(int $id)
    {
        $this->Id = $id;
        $sql = "SELECT * 
                FROM habilidadesSeleccionadasView 
                WHERE idAspiranteFK = {$this->Id}";
        return $this->selectAll($sql);
    }

    public function routesAspirante(int $idUsuario)
    {
        $this->idUsuarioFK = $idUsuario;
        $sql = "SELECT idAspirante, descripcionPersonalAspirante, idUsuarioFK, idEstadoLaboral, nombreEstado
                FROM ASPIRANTE AS a INNER JOIN ESTADOLABORALASPIRANTE AS ela
                ON ela.idEstadoLaboral = a.idEstadoLaboralAspiranteFK
                WHERE idUsuarioFK = {$this->idUsuarioFK}";
        return $this->select($sql);
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

    //método para insertar un nuevo estudio
    public function updateEstudio(
        int $idEstudio,
        string $nombreInstitucion,
        string $tituloObtenido,
        int $idCuidad,
        int $idSector,
        string $anioInicio,
        string $mesInicio,
        string $anioFin,
        string $mesFin,
        int $idGradoEstudio
    ) {
        $this->Id = $idEstudio;
        $this->nombreInstitucion = $nombreInstitucion;
        $this->tituloObtenido = $tituloObtenido;
        $this->idCuidad = $idCuidad;
        $this->idSector = $idSector;
        $this->anioInicio = $anioInicio;
        $this->mesInicio = $mesInicio;
        $this->anioFin = $anioFin;
        $this->mesFin = $mesFin;
        $this->idGradoEstudio = $idGradoEstudio;
        $sql = "UPDATE ESTUDIO
                    SET nombreInstitucion = ?, tituloObtenido = ?, idCiudadEstudio = ?, idSectorFK = ?, 
                    añoInicio = ?, mesInicio = ?, añoFin = ?, mesFin = ?, idGradoFK = ?
                    WHERE idEstudio = {$this->Id}";
        $arrData = [
            $this->nombreInstitucion,
            $this->tituloObtenido,
            $this->idCuidad,
            $this->idSector,
            $this->anioInicio,
            $this->mesInicio,
            $this->anioFin,
            $this->mesFin,
            $this->idGradoEstudio
        ];
        return $this->edit($sql, $arrData);
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

    public function getEstudiosAspirante(int $id)
    {
        $this->Id = $id;
        $sql = "SELECT * 
                FROM estudiosAspiranteView 
                WHERE idAspiranteFK = {$this->Id}";
        return $this->selectAll($sql);
    }

    public function getEstudiosAspiranteEdit(int $id)
    {
        $this->Id = $id;
        $sql = "SELECT * 
                FROM estudiosAspiranteView 
                WHERE idEstudio = {$this->Id}";
        return $this->select($sql);
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

    /**
     * Método que sirve para actualizar la información de la experiencia laboral de un aspirante
     */
    public function updateExperienciaLaboral(
        int $idExperiencia,
        string  $empresa,
        int $sectorLaboro,
        int $ciudad,
        int $tipoExperiencia,
        string $puestoDesempeño,
        string $anioInicio,
        string $mesInicio,
        string $anioFin,
        string   $mesFin,
        string $funcion
    ) {
        $this->Id = $idExperiencia;
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
        $sql = "UPDATE INFOLABORAL
                SET empresaLaboro = ?, idSectorFK = ?, idCiudadLaboroFK = ?, idTipoExperienciaFK = ?, 
                nombrePuestoDesempeño = ?, añoInicio = ?, mesInicio = ?, añoFin = ?, mesFin = ?, funcionDesempeño = ? 
                WHERE idInfoLaboral = {$this->Id}";
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
            $this->funcion
        ];
        return $this->edit($sql, $arrData);
    }

    public function getExperienciaAspirante(int $id)
    {
        $this->Id = $id;
        $sql = "SELECT * 
                FROM experienciaAspiranteView 
                WHERE idAspiranteFK = {$this->Id}";
        return $this->selectAll($sql);
    }

    public function getExperienciaAspiranteEdit(int $id)
    {
        $this->Id = $id;
        $sql = "SELECT * 
                FROM experienciaAspiranteView 
                WHERE idInfoLaboral = {$this->Id}";
        return $this->select($sql);
    }

    //======================================EDITAR DATOS=====================================

    public function updateUser(
        int $idUsuario,
        string $nombreUsuario,
        int $idTipoDocumentoFK,
        string $numTelUsuario,
        string $numTelFijo,
        string $numDocUsuario,
        string $direccionUsuario,
        int $idBarrioFK
    ) {

        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->idTipoDocumentoFK = $idTipoDocumentoFK;
        $this->numTelUsuario = $numTelUsuario;
        $this->numTelFijo = $numTelFijo;
        $this->numDocUsuario = $numDocUsuario;
        $this->direccionUsuario = $direccionUsuario;
        $this->idBarrioFK = $idBarrioFK;

        $sql = "UPDATE USUARIO SET 
                nombreUsuario=?, idTipoDocumentoFK=?, numTelUsuario=?,
                numTelFijo=?, numDocUsuario=?,  
                direccionUsuario=?, idBarrioFK=? 
                WHERE idUsuario  = {$this->idUsuario}";
        $arrData = array(
            $this->nombreUsuario,
            $this->idTipoDocumentoFK,
            $this->numTelUsuario,
            $this->numTelFijo,
            $this->numDocUsuario,
            $this->direccionUsuario,
            $this->idBarrioFK
        );

        return $this->edit($sql, $arrData);

        /*$sql = "SELECT idUsuario, nombreUsuario, correoUsuario, nombreTipoDocumento, 
        numDocUsuario, numTelUsuario, numTelFijo, estadoUsuario, nombreRol, 
        nombreBarrio, direccionUsuario, idTipoDocumentoFK, idBarrioFK
        FROM USUARIO AS u INNER JOIN TIPODOCUMENTO AS td
        ON td.idTipoDocumento = u.idTipoDocumentoFK INNER JOIN ROL AS r
        ON r.idRol = u.idRolFK INNER JOIN BARRIO AS b
        ON b.idBarrio = u.idBarrioFK
        WHERE correoUsuario = '{$this->strUsuario}' AND estadoUsuario != 1";
        return $this->select($sql);  POR IMPLEMENTAR CUANDO SE REALICE COMPLETAMENTE LA ACTUALIZACION Y RECARGAR LA VARIABLE DE SESION*/
    }

    public function updateState(int $idUsuario, int $estadoUsuario)
    {
        $this->idUsuario = $idUsuario;
        $this->estadoUsuario = $estadoUsuario;
        $sql = "UPDATE USUARIO SET estadoUsuario =? WHERE idUsuario = {$this->idUsuario}";

        $arrData = array(
            $this->estadoUsuario
        );
        return $this->edit($sql, $arrData);
    }
}
