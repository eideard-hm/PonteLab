<?php


	class Perfil_AspiranteModel extends GestionCRUD
	{
		private $idUsuario;
	private $nombreUsuario;
    private $idTipoDocumentoFK;
	private $numTelUsuario;
	private $numTelFijo;
    private $numDocUsuario;
	private $direccionUsuario;
    private $idBarrioFK;
	private $nombreTipoDocumento;
	private $estadoUsuario;

	public function __construct()
    {
        parent::__construct();
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



/*public function selectOneUser(int $id)
    {
        $this->idUsuario = $id;
        //consulta para extraerlo
        $sql = "SELECT u.nombreUsuario, u.numTelUsuario, u.direccionUsuario, u.imagenUsuario, 
		c.nombreCiudad, e.tituloObtenido, e.nombreInstitucion, ilaboral.nombrePuestoDesempeño,
		 i.nombreIdioma from USUARIO as u join CIUDAD as c join ESTUDIO as e join INFOLABORAL as ilaboral join 
		 IDIOMA as i join IDIOMA_ASPIRANTE as ia join ASPIRANTE as a join BARRIO as b on a.idUsuarioFK = u.idUsuario 
		 and b.idCiudadFK= c.idCiudad and u.idBarrioFK = b.idBarrio and e.idAspiranteFK = a.idAspirante 
		 and ilaboral.idAspiranteFK
		 = a.idAspirante and ia.idAspiranteFK = a.idAspirante and ia.idIdiomaFK = i.idIdioma
        WHERE idUsuario = {$this->idUsuario}";

        return $this->select($sql);
    }*/

        //Método para extraer un unico usuario de la base de datos por el id
    public function selectOneUser(int $idUsuario)
    {
        $this->idUsuario = $idUsuario;
        //consulta para extraerlo
        $sql = "SELECT idUsuario, nombreUsuario, correoUsuario, nombreTipoDocumento, 
        numDocUsuario, numTelUsuario, numTelFijo, estadoUsuario, nombreRol, 
        nombreBarrio, direccionUsuario, idTipoDocumentoFK, idBarrioFK
        FROM USUARIO AS u INNER JOIN TIPODOCUMENTO AS td
        ON td.idTipoDocumento = u.idTipoDocumentoFK INNER JOIN ROL AS r
        ON r.idRol = u.idRolFK INNER JOIN BARRIO AS b
        ON b.idBarrio = u.idBarrioFK
        WHERE idUsuario = {$this->idUsuario}";

        return $this->select($sql);
    }

	public function updateState(int $idUsuario,int $estadoUsuario)
	{
		$this->idUsuario=$idUsuario;
		$this->estadoUsuario=$estadoUsuario;
		$sql="UPDATE USUARIO SET estadoUsuario =? WHERE idUsuario = {$this->idUsuario}";

		$arrData = array(
			$this->estadoUsuario);
		return $this->edit($sql, $arrData);

	}

	public function selectTipoDoc()
    {
        $sql = "SELECT idTipoDocumento, nombreTipoDocumento FROM TIPODOCUMENTO";
        $request = $this->selectAll($sql);
        return $request;
    }

	public function selectBarrio()
    {
        $sql = "SELECT idBarrio, nombreBarrio FROM BARRIO";
        $request = $this->selectAll($sql);
        return $request;
    }

	}




?>