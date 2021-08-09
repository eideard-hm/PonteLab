<?php
// creamos la clase
class Conexion
{
    //declarar los atributos de la clase
    private $host = DB_HOST; //nombre de nuestro servidor
    private $user = DB_USER; // nombre del usuario del servidor 
    private $password = DB_PASS; // contraseña del servidor
    private $db_name = DB_NAME; //nombre de la base de datos

    private $dbh; // instrucción sql - database handler

    // creamos nuestro método constructor
    public function __construct()
    {
        // variable para concatenar nombre del servidor, y name de la base de datos
        //dsn - datasource name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        // array de opciones para identicar errores
        $options = array(
       //parametro para detectar errores posibles
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        );
        //Crear una instancia de PDO - Object Data PHP - Objecto de Datos de PHP
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            echo $e->getMessage();  //si hay una excepción que me imprima mensaje de error
        }
    }

    //Método que retorna el resultado de la conexión
    public function Connect()
    {
        return $this->dbh;
    }
}
