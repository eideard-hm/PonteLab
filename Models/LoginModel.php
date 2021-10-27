<?php

class LoginModel extends gestionCRUD
{
    private int $intId;
    private string $strUsuario;
    private string $strPassword;
    private string $strToken;

    public function __construct()
    {
        parent::__construct();
    }

    public function validatePassword(
        string $usuario,
        string $password
    ) {
        $this->strUsuario = $usuario;
        $this->strPassword = $password;

        //verificar las contraseñas mediante password_verify()
        $sql = "SELECT idUsuario, correoUsuario, passUsuario, estadoUsuario
        FROM USUARIO 
        WHERE correoUsuario = '{$this->strUsuario}' AND estadoUsuario != 1";
        $res = $this->select($sql);

        if (!empty($res)) {
            return password_verify($this->strPassword, $res['passUsuario']);
        } else {
            return "error";
        };
    }

    public function loginUser(
        string $usuario,
        string $password
    ) {
        $this->strUsuario = $usuario;
        $this->strPassword = $password;

        $sql = "SELECT idUsuario, nombreUsuario, correoUsuario, nombreTipoDocumento, 
        numDocUsuario, numTelUsuario, numTelFijo, estadoUsuario, nombreRol, 
        nombreBarrio, direccionUsuario, idTipoDocumentoFK, idBarrioFK
        FROM USUARIO AS u INNER JOIN TIPODOCUMENTO AS td
        ON td.idTipoDocumento = u.idTipoDocumentoFK INNER JOIN ROL AS r
        ON r.idRol = u.idRolFK INNER JOIN BARRIO AS b
        ON b.idBarrio = u.idBarrioFK
        WHERE correoUsuario = '{$this->strUsuario}' AND estadoUsuario != 1";
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

    public function getUserEmail(string $strEmail)
    {
        $this->strUsuario = $strEmail;
        $sql = "SELECT idUsuario, nombreUsuario, estadoUsuario
                FROM usuario 
                WHERE correoUsuario ='{$this->strUsuario}' AND estadoUsuario = 0";
        $request = $this->select($sql);
        return $request;
    }

    public function setTokenUser(int $idUsuario, string $token)
    {
        $this->intId = $idUsuario;
        $this->strToken = $token;
        $sql = "UPDATE usuario 
                SET token = ? WHERE 
                idUsuario = {$this->intId}";
        $arrData = array($this->strToken);
        return $this->edit($sql, $arrData);
    }

    public function getUsuario(string $email, string $token)
    {
        $this->strUsuario = $email;
        $this->strToken = $token;
        $sql = "SELECT idUsuario, correoUsuario 
                FROM USUARIO WHERE
                correoUsuario= '$this->strUsuario' AND token = '$this->strToken' AND estadoUsuario = 0";
        return $this->select($sql);
    }

    public function insertPassword(int $idUsuario, string $password)
    {
        $this->intId = $idUsuario;
        $this->strPassword = $password;
        $sql = "UPDATE usuario 
                SET passUsuario = ?, token =  ?
                WHERE idUsuario = {$this->intId}";
        $arrData = array($this->strPassword, "");
        return $this->edit($sql, $arrData);
    }
}
