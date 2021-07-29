<?php

class MenuModel extends gestionCRUD
{
    private int $intId;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectImgProfile(int $id)
    {
        $this->intId = $id;
        $sql = "SELECT idUsuario, imagenUsuario
        FROM USUARIO 
        WHERE idUsuario = {$this->intId}";
        return $this->select($sql);
    }
}
