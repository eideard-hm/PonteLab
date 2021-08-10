<?php

class Perfil_ContratanteModel extends gestionCRUD
{

   private $idUsuario;
   //private $correoUsuario ;
   private $nombreUsuario ;
   //private $passUsuario ;
   private $idTipoDocumentoFK; 
   private $numDocUsuario ;
   private $numTelUsuario ;
   private $numTelFijo;
   //private $estadoUsuario; 
   //private $idRolFK ;
   private $idBarrioFK;
   private $direccionUsuario; 
    
   
   public function __construct()
    {
        parent::__construct();
    }

    //======================================EDITAR DATOS=====================================
    
public function Update (
    int $idUsuario, 
    string $nombreUsuario,
    string $numDoc,
    int $idTipoDocumentoFK, 
    string $numTelUsuario, 
    string $numTelFijo, 
    int $idBarrioFK,
    string $direccionUsuario ){
 
    $this->idUsuario = $idUsuario;
    $this->nombreUsuario = $nombreUsuario;
    $this->numDocUsuario = $numDoc;
    $this->idTipoDocumentoFK =$idTipoDocumentoFK; 
    $this->numTelUsuario = $numTelUsuario;
    $this->numTelFijo =$numTelFijo; 
    $this->idBarrioFK =$idBarrioFK; 
    $this->direccionUsuario =$direccionUsuario; 

    $sql="UPDATE USUARIO SET 
    idUsuario=?, nombreUsuario=?, idTipoDocumentoFK=?, numTelUsuario=?, numTelFijo=?, 
    idBarrioFK=?, direccionUsuario=? 
    WHERE idUsuario  = {$this->idUsuario}";
    $arrData = array(
        $this->nombreUsuario,  
        $this->numDocUsuario, 
        $this->idTipoDocumentoFK, 
        $this->numTelUsuario, 
        $this->numTelFijo, 
        $this->idBarrioFK,
        $this-> direccionUsuario);

   return $this->edit($sql, $arrData);
}
}