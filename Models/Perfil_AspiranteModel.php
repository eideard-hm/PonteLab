<?php


	class Perfil_AspiranteModel extends GestionCRUD
	{
		private $idUsuario;
	private $nombreUsuario;
	private $numTelUsuario;
	private $numTelFijo;
	private $direccionUsuario;
	private $nombreTipoDocumento;
	private $estadoUsuario;

	public function __construct()
    {
        parent::__construct();
    }


	  //======================================EDITAR DATOS=====================================
    
public function updateUser (
	int $idUsuario,
	String $nombreApellido,
	String $titulo,
	String $posicion,
	String $idioma
	){
 
    $this->idUsuario = $idUsuario;
    $this->nombreApellido = $nombreApellido;
    $this->titulo = $titulo;
    $this->posicion =$posicion; 
    $this->idioma =$idioma; 


    $sql=" UPDATE USUARIO SET 
    nombreUsuario=?,
    numTelUsuario=?, numTelFijo=?, nombreTipoDocumento=?
    WHERE idUsuario  = {$this->idUsuario}";


    $arrData = array(
        $this->nombreApellido,  
        $this->titulo, 
        $this->posicion,
		$this->idioma
	);

   return $this->edit($sql, $arrData);
}


public function selectOneUser(int $id)
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
        $sql = "SELECT idTipoDocumento FROM TIPODOCUMENTO";
        $request = $this->selectAll($sql);
        return $request;
    }

	}




?>