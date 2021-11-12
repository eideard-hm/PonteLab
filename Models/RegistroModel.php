<?php

class RegistroModel extends Mysql
{
    //atributos de la clase
    private int $idUsuario;
    private string $nombre;
    private string $correoUsuario;
    private string $passUsuario;
    private int $idTipoDocumentoFK;
    private string $numDocUsuario;
    private string $numTelUsuario;
    private string $numTelFijo;
    private int $estadoUsuario;
    private int $idRolFK;
    private int $idBarrioFK;
    private string $direccionUsuario;
    private string $imagenUsuario;

    //sector usuario
    private int $idSector;

    public function __construct()
    {
        parent::__construct();
    }

    //método para extraer todos los datos de la base de datos
    public function selectAllUsers()
    {
        //extraer los administradores        
        $sql = "SELECT idUsuario, nombreUsuario, correoUsuario, nombreTipoDocumento, 
        numDocUsuario, numTelUsuario, numTelFijo, estadoUsuario, nombreRol, nombreBarrio,
        direccionUsuario 
        FROM USUARIO AS u INNER JOIN TIPODOCUMENTO AS td
        ON td.idTipoDocumento = u.idTipoDocumentoFK INNER JOIN ROL AS r
        ON r.idRol = u.idRolFK INNER JOIN BARRIO AS b
        ON b.idBarrio = u.idBarrioFK";
        $request = $this->selectAll($sql);
        return $request;
    }

    //Método para extraer un unico usuario de la base de datos por el id
    public function selectOneUser(int $id)
    {
        $this->idUsuario = $id;
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

    //Método para insertar un usuario
    public function insertUser(
        string $nombre,
        string $email,
        string $pass,
        int $tipoDoc,
        string $numDoc,
        string $tel,
        string $telFijo,
        int $estado,
        int $rol,
        int $barrio,
        string $direccion,
        string $imagen,
        $created_at,
        $updated_at
    ) {
        $this->nombre = $nombre;
        $this->correoUsuario = $email;
        $this->passUsuario = $pass;
        $this->idTipoDocumentoFK = $tipoDoc;
        $this->numDocUsuario = $numDoc;
        $this->numTelUsuario = $tel;
        $this->numTelFijo = $telFijo;
        $this->estadoUsuario = $estado;
        $this->idRolFK = $rol;
        $this->idBarrioFK = $barrio;
        $this->direccionUsuario = $direccion;
        $this->imagenUsuario = $imagen;
        $return = 0;

        //consutar si ya existe ese usuario
        $sql = "SELECT idUsuario, nombreUsuario, correoUsuario, passUsuario, idTipoDocumentoFK, 
        numDocUsuario, numTelUsuario, numTelFijo, estadoUsuario, idRolFK, idBarrioFK, 
        direccionUsuario
        FROM USUARIO 
        WHERE correoUsuario = '{$this->correoUsuario}' OR 
        numDocUsuario = '{$this->numDocUsuario}' OR numTelUsuario = '{$this->numTelUsuario}'";
        $request = $this->selectAll($sql);

        //validar si ya existe el usuario
        //si esta vacio lo que trae request, es decir que si podemos alamcenar ese usuario
        if (empty($request) || $request === '' || $request === null) {
            $sql = "INSERT INTO USUARIO(nombreUsuario, correoUsuario, passUsuario, idTipoDocumentoFK, 
            numDocUsuario, numTelUsuario, numTelFijo, estadoUsuario, idRolFK, idBarrioFK, 
            direccionUsuario, imagenUsuario, created_at, updated_at)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            //almacena los valores en un arreglo
            $arrData = array(
                $this->nombre,
                $this->correoUsuario,
                $this->passUsuario,
                $this->idTipoDocumentoFK,
                $this->numDocUsuario,
                $this->numTelUsuario,
                $this->numTelFijo,
                $this->estadoUsuario,
                $this->idRolFK,
                $this->idBarrioFK,
                $this->direccionUsuario,
                $this->imagenUsuario,
                $created_at,
                $updated_at
            );
            $return = $this->insert($sql, $arrData);
        } else {
            $return = 'exits';
        }
        return $return;
    }

    public function setEstadoUser(int $id, int $estadoUsuario)
    {
        $this->idUsuario = $id;
        $this->estadoUsuario = $estadoUsuario;
        $sql = "UPDATE USUARIO 
                SET estadoUsuario=?
                WHERE idUsuario = {$this->idUsuario}";
        $arrData = [$this->estadoUsuario];
        return $this->edit($sql, $arrData);
    }

    //Método para actualizar usuarios
    public function updateUser(
        int $id,
        string $email,
        string $pass,
        int $tipoDoc,
        string $numDoc,
        string $tel,
        string $telFijo,
        int $estado,
        int $rol,
        int $barrio,
        string $direccion,
        $imagen
    ) {
        $this->idUsuario = $id;
        $this->correoUsuario = $email;
        $this->passUsuario = $pass;
        $this->idTipoDocumentoFK = $tipoDoc;
        $this->numDocUsuario = $numDoc;
        $this->numTelUsuario = $tel;
        $this->numTelFijo = $telFijo;
        $this->estadoUsuario = $estado;
        $this->idRolFK = $rol;
        $this->idBarrioFK = $barrio;
        $this->direccionUsuario = $direccion;
        $this->imagenUsuario = $imagen;

        //verificar si existe el usuario
        $sql = "SELECT * FROM USUARIO WHERE (correoUsuario = '{$this->correoUsuario}' 
        AND idUsuario != '{$this->idUsuario}')
        OR (numDocUsuario = '{$this->numDocUsuario}' AND idUsuario !='{$this->idUsuario}')";
        $request = $this->selectAll($sql);

        //comprobar si existe para pasar a actualizar el registro
        if (empty($request) || $request === '' || $request === null) {
            $query = "UPDATE USUARIO 
            SET correoUsuario=?, passUsuario=?, idTipoDocumentoFK=?, numDocUsuario=?, 
            numTelUsuario=?, numTelFijo=?, estadoUsuario=?, idRolFK=?, idBarrioFK=?, 
            direccionUsuario=?, imagenUsuario =?
            WHERE idUsuario={$this->idUsuario}";

            $arrData = array(
                $this->strEmail,
                $this->passUsuario,
                $this->idTipoDocumentoFK,
                $this->intNumDoc,
                $this->numTelUsuario,
                $this->numTelFijo,
                $this->estadoUsuario,
                $this->idRolFK,
                $this->idBarrioFK,
                $this->direccionUsuario,
                $this->imagenUsuario
            );
            $request = $this->edit($query, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
    }

    //Método para seleccionar la imagen de perfil
    public function selectImgProfile(int $id)
    {
        $this->intId = $id;
        $sql = "SELECT idUsuario, imagenUsuario
        FROM USUARIO 
        WHERE idUsuario = {$this->intId}";
        return $this->select($sql);
    }

    //Método para traer los tipos de documentos registrados
    public function selectTipoDoc()
    {
        $sql = "SELECT idTipoDocumento, nombreTipoDocumento FROM TIPODOCUMENTO";
        $request = $this->selectAll($sql);
        return $request;
    }

    //Método para traer todos los roles registrador
    public function selectRol()
    {
        $sql = "SELECT idRol, nombreRol FROM ROL";
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

    //Método para seleccionar los sectores
    public function selectAllSector()
    {
        $sql = "SELECT idSector, nombreSector
                FROM SECTOR";
        return $this->selectAll($sql);
    }

    //Método para insertar los sectores a los cuales pertenece un usuario
    public function insertSectorUser(
        int $idUsuario,
        int $idSector
    ) {
        $this->idUsuario = $idUsuario;
        $this->idSector = $idSector;

        $sql = "SELECT idSectorUsuario, idUsuarioFK, idSectorFK
                FROM SECTOR_USUARIO
                WHERE idUsuarioFK = {$this->idUsuario} AND idSectorFK = {$this->idSector}";
        $request = $this->selectAll($sql);
        if (empty($request)) {
            $sql = "INSERT INTO SECTOR_USUARIO(idUsuarioFK, idSectorFK)
            VALUES(?,?)";
            $arrData = [$this->idUsuario, $this->idSector];
            return $this->insert($sql, $arrData);
        }else{
            return 'exists';
        }
    }
}
