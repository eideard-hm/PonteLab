<?php

class Conexion
{
    //declarar los atributos de la clase
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        );
        //Crear una instancia de PDO
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function Connect()
    {
        return $this->dbh;
    }
}
