<?php

class LoginModel extends gestionCRUD
{
    private int $intId;
    private string $strUsuario;
    private string $strPassword;

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

        $sql = "SELECT idUsuario, correoUsuario, nombreTipoDocumento, 
        numDocUsuario, numTelUsuario, numTelFijo, estadoUsuario, nombreRol, 
        nombreBarrio, direccionUsuario 
        FROM USUARIO AS u INNER JOIN TIPODOCUMENTO AS td
        ON td.idTipoDocumento = u.idTipoDocumentoFK INNER JOIN ROL AS r
        ON r.idRol = u.idRolFK INNER JOIN BARRIO AS b
        ON b.idBarrio = u.idBarrioFK
        WHERE correoUsuario = '{$this->strUsuario}' AND estadoUsuario != 1";
        return $this->select($sql);
    }
}
