<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 21.08.2017
 * Time: 15:05
 */

namespace App\Config;


class MySQLConnector
{
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=192.168.100.123;dbname=FirstAppDB';
        $username = 'root';
        $password = 'root';
        try {
            $this->pdo = new \PDO($dsn, $username, $password);
        } catch(\PDOException $ex) {
            die("Could not establish database connection.\n".$ex->getMessage());
        }
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}