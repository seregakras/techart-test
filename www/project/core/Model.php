<?php
/**
 * Класс Model, предназначен для соединения с базой данных.
 * Параметры соединения с БД хранятся в виде констант в файле конфигурации /project/config/connect.php.
 */
namespace project\core;

use PDO;
use PDOException;

class Model
{
    protected $connect;

    public function __construct()
    {
        if (!$this->connect) {
            try {
                $this->connect = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, array(
                    PDO::ATTR_PERSISTENT => true
                ));
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage();
                die();
            }
        }
    }

    public function __get($property)
    {
        return $this->$property;
    }


}