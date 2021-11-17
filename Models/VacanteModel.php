<?php

/** 
 * Modelo asociado a la tabla de Vacante en la base de datos; y además el encargado
 * de procesar las solicitudes del controlador de vacante
 */
class VacanteModel extends Mysql
{
    /**
     * Atributos de la clase que mapean un campo en la base de datos.
     */
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

    /**
     * Constructor de la clase VacanteModel, que inicializar el método constructor 
     * de la clase padre GestionCRUD.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Método para traer todas las vacantes registradas, respetando el LIMIT. 
     * Este método es llamado por el controlador VacanteController y sirve para hacer
     * la paginación de las vacantes.
     * @param int $inicar desde donde se inicia la consulta.
     * @param int $vacantes_por_pagina cantidad de vacantes por página.
     * @return array $vacantes
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function selectAllVacantes(int $iniciar, int $vacantes_por_pagina)
    {
        $sql = "SELECT * 
                FROM vacanteView
                WHERE estadoVacante = 1
                LIMIT {$iniciar}, {$vacantes_por_pagina}";
        return $this->selectAll($sql);
    }

    /** 
     * Método para traer la información de un usuario contratante en específico.
     * @param int $idUsuarioFK id del usuario contratante.
     * @return array $usuario datos del usuario contratante.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function selectOneContractor($idUsuarioFK)
    {
        $this->idUsuarioFK = $idUsuarioFK;
        //consulta
        $sql = "SELECT idContratante, descripcionContratante
        FROM CONTRATANTE WHERE idUsuarioFK ={$this->idUsuarioFK}";

        return $this->select($sql);
    }

    /**
     * Método que consulta una sola vacante por id.
     * @param int $id id de la vacante a consultar.
     * @return array $vacante vacante consultada.
     * @author Edier Heraldo Hernández Molano @eideard-hm 
     */
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

    /**
     * Método para la insercion de una vacante.
     * @param string $nombreVacante nombre de la vacante.
     * @param int $cantidadVacante cantidad de vacantes.
     * @param string $descripcionVacante descripción de la vacante.
     * @param string $perfilAspirante perfil de los aspirantes.
     * @param string $tipoContratoVacante tipo de contrato.
     * @param float $sueldoVacante sueldo de la vacante.
     * @param string $fechaHoraPublicacion fecha y hora de publicación.
     * @param string $fechaHoraCierre fecha y hora de cierre.
     * @param string $direccionVacante dirección de la vacante.
     * @param int $estadoVacante estado de la vacante.
     * @param int $idContratanteFK id del contratante que la creó.
     * @param int $idSectorFK id del sector.
     * @return int Si se inserto correctamente retorna el id del registro,
     * de los contrario retorna 0.
     * @author Santiago Andres Becerra Espitia @sabecerrae
     */
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
        int $idSectorFK,
        $created_at,
        $updated_at
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
        fechaHoraCierre, direccionVacante, estadoVacante, idContratanteFK, idSectorFK,
        created_at, updated_at)
        values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
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
            $this->idSectorFK,
            $created_at,
            $updated_at
        );
        $return = $this->insert($sql, $arrData);
        return $return;
    }

    /**
     * Método para la insercion de los requisitos asociados a una vacante.
     * @param int $idVacanteFK id de la vacante.
     * @param int $idRequisitoFK id del requisito.
     * @param string especficacionRequisitos especificación del requisito.
     * @return int Si se inserto correctamente retorna el id del registro, 
     * de los contrario retorna 0.
     * @author Santiago Andres Becerra Espitia @sabecerrae
     */
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

    /**
     * Método para implementar el buscador de vacantes. Recibe la cadena de texto
     * que se desea buscar o comparar con los registros de la tabla. 
     * @param string $busqueda cadena de texto a buscar.
     * @return array Retorna un arreglo con los registros que coinciden con la busqueda.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
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

    /** 
     * Método para obtener todas las vacantes registradas sin ninguna restricción.
     * @return array Retorna un arreglo con todas las vacantes registradas.
     * @author Santiago Andres Becerra Espitia @sabecerrae
     */
    public function selectAllVacancy()
    {
        $sql = "SELECT idVacante, nombreVacante FROM VACANTE";
        $request = $this->selectAll($sql);
        return $request;
    }

    /**
     * Método para obtener todos los requisitos registrados sin ninguna restricción.
     * @return array Retorna un arreglo con todos los requisitos registrados.
     * @author Santiago Andres Becerra Espitia @sabecerrae
     */
    public function selectAllReqs()
    {
        $sql = "SELECT idRequisitos, nombreRequisitos FROM REQUISITOS";
        $request = $this->selectAll($sql);
        return $request;
    }

    /**
     * Método para seleccionar todos los sectores registrados en la base de datos.
     * @return array Retorna un arreglo con todos los sectores registrados.
     * @author Santiago Andres Becerra Espitia @sabecerrae
     */
    public function selectAllSector()
    {
        $sql = "SELECT idSector, nombreSector
                FROM SECTOR";
        return $this->selectAll($sql);
    }

    /**
     * Método para obtener las vacantes que se encuentran asociadas a un determinado
     * sector y además que se encuentran activas.
     * @param int $sector id del sector por el cual se va a filtrar.
     * @return array Retorna un arreglo con las vacantes que coinciden con el filtro.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function getVacantesSector(int $sector)
    {
        $sql = "SELECT *
                FROM detailVacanteView 
                WHERE idSector = {$sector} AND estadoVacante != 0";
        return $this->select($sql);
    }

    /**
     * Método para obtener el id o los ids de los sectores asociados a un usuario.
     * @param int $idUsuario id del usuario por el cual se va hacer el filtro.
     * @return array Retorna un arreglo con los ids de los sectores asociados al usuario.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function loadSectorUser(
        int $idUsuario
    ) {
        $this->idUsuario = $idUsuario;

        $sql = "SELECT idSectorFK
                FROM SECTOR_USUARIO
                WHERE idUsuarioFK = {$this->idUsuario}";
        return $this->selectAll($sql);
    }

    /**
     * Método para obtener el detalle de una vacante de acuero a su id.
     * @param int $id id de la vacante por el cual se va a filtrar.
     * @return array Retorna un arreglo con el detalle de la vacante.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function detailVacante(int $id)
    {
        $this->idVacante = $id;
        $sql = "SELECT * FROM detailVacanteView 
                WHERE idVacante = {$this->idVacante}";
        return $this->select($sql);
    }

    /**
     * Método para registrar la aplicación a una vacante por parte del usuario
     * aspirante.
     * @param int $idAspiranteFK id del aspirante que aplica a la vacante.
     * @param int $idVacanteFK id de la vacante a la cual se aplica.
     * @param int $estado estado de la aplicación en ese momento.
     * @return string|int Retorna un string si se encuentra registrada la aplicación, o 
     * un entero con el id del registro insertado.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
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

    /**
     * Método para obtener los datos del aspirante luego de haber aplicado a una 
     * vacante; para posteriormente enviar un correo con los datos del aspirante.
     * @param int $idApplicationVacancy id de la aplicación a la vacante.
     * @author Edier Heraldo Hernández Molano @eideard-hm 
     */
    public function dataAspiranteApplicationVacancy(int $idApplicationVacancy)
    {
        $this->idVacante = $idApplicationVacancy;
        $sql = "SELECT * 
                FROM dataAspiranteApplicationVacancyView
                WHERE idAplicacionVacante = {$idApplicationVacancy}";
        return $this->select($sql);
    }

    /**
     * Método para obtener los datos del contratante luego de haber aplicado a una 
     * vacante; para posteriormente enviar un correo con los datos del contratante.
     * @param int $idApplicationVacancy id de la aplicación a la vacante.
     * @author Edier Heraldo Hernández Molano @eideard-hm 
     */
    public function dataVacanteApplicationVacancy(int $idApplicationVacancy)
    {
        $this->idVacante = $idApplicationVacancy;
        $sql = "SELECT * 
                FROM dataVacanteApplicationVacancyView
                WHERE idAplicacionVacante = {$idApplicationVacancy}";
        return $this->select($sql);
    }

    /**
     * Método que retorna el detalle de la aplicación a una vacante por parte de un
     * aspirante.
     * @param int $idVacante id de la vacante a la cual aplico.
     * @param int $idAspirante id del aspirante que aplica a la vacante.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function aspiranteApplyVacancy($idVacante, $idAspirante)
    {
        $sql = "SELECT * 
        FROM dataVacanteApplicationVacancyView
        WHERE idVacanteFK  = {$idVacante} AND idAspiranteFK = {$idAspirante}";
        return $this->select($sql);
    }

    /**
     * Método para cambiar el estado de la aplicación de una vacante. Se ejecuta cuando
     * un usuario contratante acepta o rechaza una aplicación de un aspirante.
     * @param string $idAplicacion id de la aplicación de la vacante.
     * @param string $estado el nuevo estado de la aplicación.
     * @return bool Retorna true si se cambió el estado de la aplicación.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
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

    /**
     * Método para obtener el número de registros que hay en la tabla de vacante, y 
     * además que esten activas.
     * @return int Retorna el número de registros que hay en la tabla de vacante.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function countRows()
    {
        $sql = "SELECT COUNT(*) AS total 
        FROM VACANTE
        WHERE estadoVacante != 0";
        return $this->select($sql);
    }

    /**
     * Método para obtener el detalle de las vacantes que se encuentran asociadas a un
     * determinado sector y además que se encuentran activas. Este método es utilizado 
     * para hacerle las sugerencias de nuevos empleos al usuario.
     * @param int $idSector id del sector por el cual se va a filtrar.
     * @return array Retorna un arreglo con las vacantes que coinciden con el filtro.
     * @author Edier Heraldo Hernández Molano @eideard-hm
     */
    public function sugerencias(int $idSector)
    {
        $sql = "SELECT *
                FROM detailVacanteView
                WHERE idSector = {$idSector} AND estadoVacante != 0";
        return $this->selectAll($sql);
    }

    /**
     * Método para obtener los datos de la vacante a la cual aplico un aspirante.
     * @param int $idApplicationVacancy id de la aplicación a la vacante.
     * @return array Retorna un arreglo con los datos de la vacante.
     * @author Edier Heraldo Hernández Molano @eideard-hm 
     */
    public function getApplyVacancys($idUsuario)
    {
        $sql = "SELECT *
                FROM dataVacanteApplicationVacancyView
                WHERE idAspiranteFK = {$idUsuario}";
        return $this->selectAll($sql);
    }
}
