<?php

class RegistroModel extends GestionCRUD
{
    //atributos de la clase
    private int $idUsuario;
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
    private $imagenUsuario;

    public function __construct()
    {
        parent::__construct();
    }

    //método para extraer todos los datos de la base de datos
    public function selectAllUsers()
    {
        //extraer los administradores        
        $sql = "SELECT idUsuario, correoUsuario, passUsuario, nombreTipoDocumento, 
        numDocUsuario, numTelUsuario, numTelFijo, estadoUsuario, nombreRol, nombreBarrio,
        direccionUsuario, imagenUsuario 
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
        $sql = "SELECT idUsuario, correoUsuario, passUsuario, idTipoDocumentoFK, 
        numDocUsuario, numTelUsuario, numTelFijo, estadoUsuario, idRolFK, idBarrioFK, 
        direccionUsuario, imagenUsuario 
        FROM USUARIO
        WHERE idUsuario = " . $this->idUsuario;

        $request = $this->select($sql);
        return $request;
    }

    //Método para insertar un usuario
    public function insertUser(
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
        $sql = "SELECT * FROM usuario WHERE correoUsuario = '{$this->correoUsuario}' or 
        numDocUsuario = '{$this->numDocUsuario}'";
        $request = $this->selectAll($sql);

        //validar si ya existe el usuario
        //si esta vacio lo que trae request, es decir que si podemos alamcenar ese usuario
        if (empty($request)) {
            $sql = "INSERT INTO USUARIO(correoUsuario, passUsuario, idTipoDocumentoFK, 
            numDocUsuario, numTelUsuario, numTelFijo, estadoUsuario, idRolFK, idBarrioFK, 
            direccionUsuario, imagenUsuario)
            VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            //almacena los valores en un arreglo
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
            $requestInsert = $this->insert($sql, $arrData);
            $return = $requestInsert;
        } else {
            $return = "exits";
        }
        return $return;
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
        if (empty($request)) {
            $query = "UPDATE USUARIO 
            SET correoUsuario=?, passUsuario=?, idTipoDocumentoFK=?, numDocUsuario=?, 
            numTelUsuario=?, numTelFijo=?, estadoUsuario=?, idRolFK=?, idBarrioFK=?, 
            direccionUsuario=?, imagenUsuario =?
            WHERE idUsuario='{$this->idUsuario}'";

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
}
