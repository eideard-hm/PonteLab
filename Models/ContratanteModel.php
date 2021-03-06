<?php

class ContratanteModel extends Mysql
{
    //atributos de la clase
    private int $id;
    private string $descripcionContratante;
    private int $idUsuarioFK;
    private string $imagenUsuario;

    public function __construct()
    {
        parent::__construct();
    }

    //Método para insertar un usuario
    public function insertContractor(
        string $especificaciones,
        int $idusuario
    ) {
        $this->descripcionContratante = $especificaciones;
        $this->idUsuarioFK = $idusuario;

        //validar si ya existe el usuario
        //si esta vacio lo que trae request, es decir que si podemos alamcenar ese usuario

        $sql = "INSERT INTO CONTRATANTE(descripcionContratante, idUsuarioFK)
            VALUES(?,?)";
        //almacena los valores en un arreglo
        $arrData = array(
            $this->descripcionContratante,
            $this->idUsuarioFK
        );
        $return = $this->insert($sql, $arrData);

        return $return;
    }

    //Método para actualizar usuarios
    public function updateContractor(
        int $id,
        string $descripcion
    ) {
        $this->id = $id;
        $this->descripcionContratante = $descripcion;

        $query = "UPDATE CONTRATANTE 
                      SET descripcionContratante = ?
                      WHERE idContratante = ?";

        $arrData = array(
            $this->descripcionContratante,
            $this->id
        );
        return $this->edit($query, $arrData);
    }
    //Método para traer los tipos de documentos registrados
    public function selectTipoDoc()
    {
        $sql = "SELECT idTipoDocumento, nombreTipoDocumento FROM TIPODOCUMENTO";
        $request = $this->selectAll($sql);
        return $request;
    }
    //Método para seleccionar todos los barrios registrador en la base de datos
    public function selectBarrio()
    {
        $sql = "SELECT idBarrio, nombreBarrio FROM BARRIO";
        $request = $this->selectAll($sql);
        return $request;
    }
    // Editar perfil
    public function updateUser(
        int $idUsuario,
        string $nombreUsuario,
        int $idTipoDocumentoFK,
        string $numDocUsuario,
        string $numTelUsuario,
        string $numTelFijo,
        int $idBarrioFK,
        string $direccionUsuario,
        $imagenUsuario
    ) {
        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->numDocUsuario = $numDocUsuario;
        $this->idTipoDocumentoFK = $idTipoDocumentoFK;
        $this->numTelUsuario = $numTelUsuario;
        $this->numTelFijo = $numTelFijo;
        $this->idBarrioFK = $idBarrioFK;
        $this->direccionUsuario = $direccionUsuario;
        $this->imagenUsuario = $imagenUsuario;

        $sql = "SELECT * FROM USUARIO 
                WHERE (numDocUsuario ='{$this->numDocUsuario}' AND idUsuario != {$this->idUsuario})
                OR (numTelUsuario ='{$this->numTelUsuario}' AND idUsuario != {$this->idUsuario})";
        $request = $this->selectAll($sql);

        if (empty($request)) {
            $sql = "UPDATE USUARIO SET 
                nombreUsuario= ?, numDocUsuario= ?,idTipoDocumentoFK= ?,
                numTelUsuario= ?, numTelFijo= ?, 
                idBarrioFK= ?, direccionUsuario= ?, imagenUsuario= ?
                WHERE idUsuario= ?";
            $arrData = array(
                $this->nombreUsuario,
                $this->numDocUsuario,
                $this->idTipoDocumentoFK,
                $this->numTelUsuario,
                $this->numTelFijo,
                $this->idBarrioFK,
                $this->direccionUsuario,
                $this->imagenUsuario,
                $this->idUsuario
            );
            return $this->edit($sql, $arrData);
        } else {
            return 'exists';
        }
    }
    public function updateContraseña(int $idUsuario, string $password)
    {
        $this->intId = $idUsuario;
        $this->strPassword = $password;
        $sql = "UPDATE USUARIO 
                SET passUsuario = ?, token =  ?
                WHERE idUsuario = {$this->intId}";
        $arrData = array($this->strPassword, "");
        return $this->edit($sql, $arrData);
    }

    //Método para extraer un unico USUARIO de la base de datos por el id
    public function selectOneUser(int $idUsuario)
    {
        $this->idUsuario = $idUsuario;
        //consulta para extraerlo
        $sql = "SELECT idUsuario, nombreUsuario, correoUsuario, nombreTipoDocumento, 
        numDocUsuario, numTelUsuario, numTelFijo, estadoUsuario, nombreRol, 
        nombreBarrio, direccionUsuario, idTipoDocumentoFK, idBarrioFK, imagenUsuario
        FROM USUARIO AS u INNER JOIN TIPODOCUMENTO AS td
        ON td.idTipoDocumento = u.idTipoDocumentoFK INNER JOIN ROL AS r
        ON r.idRol = u.idRolFK INNER JOIN BARRIO AS b
        ON b.idBarrio = u.idBarrioFK
        WHERE idUsuario = {$this->idUsuario}";

        return $this->select($sql);
    }

    public function selectImgProfile(int $id)
    {
        $this->intId = $id;
        $sql = "SELECT idUsuario, imagenUsuario
        FROM USUARIO 
        WHERE idUsuario = {$this->intId}";
        return $this->select($sql);
    }

    public function inactivarCuenta(int $idUsuario, int $estadoUsuario)
    {
        $this->idUsuario = $idUsuario;
        $this->estadoUsuario = $estadoUsuario;

        $sql = "UPDATE USUARIO 
                SET estadoUsuario = ?
                WHERE idUsuario = ?";
        $arrData = array(
            $this->estadoUsuario,
            $this->idUsuario
        );
        return $this->edit($sql, $arrData);
    }

    public function currentPassword(int $idUsuario)
    {
        $sql = "SELECT idUsuario, passUsuario
                FROM USUARIO
                WHERE idUsuario = {$idUsuario}";
        return $this->select($sql);
    }

    public function getProfilesAspirantes()
    {
        $sql = "SELECT *
                FROM selectAspirante";
        return $this->selectAll($sql);
    }

    public function getInfoPerfilAspirante(int $id)
    {
        $sql = "SELECT *
                FROM detailAspiranteView
                WHERE idAspirante = {$id}";
        return $this->select($sql);
    }

    public function searchProfilesAspirantes(string $search)
    {
        $sql = "SELECT idAspirante, descripcionPersonalAspirante, 
                nombreEstado, nombreUsuario, imagenUsuario, u.created_at
                FROM ASPIRANTE AS a INNER JOIN USUARIO AS u 
                ON u.idUsuario = a.idUsuarioFK INNER JOIN ESTADOLABORALASPIRANTE AS el
                ON el.idEstadoLaboral = a.idEstadoLaboralAspiranteFK
                WHERE idAspirante LIKE '%{$search}%' OR descripcionPersonalAspirante LIKE '%{$search}%' 
                OR nombreEstado LIKE '%{$search}%' OR nombreUsuario LIKE '%{$search}%'";
        return $this->selectAll($sql);
    }

    public function getDataContractor(int $id)
    {
        $sql = "SELECT idContratante, descripcionContratante
                FROM CONTRATANTE
                WHERE idUsuarioFK = {$id}";
        return $this->select($sql);
    }
}
