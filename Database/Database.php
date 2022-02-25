<?php

namespace app\database;


use PDO;

class Database
{
    static public function connect()
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=cinemaster",
                "root",
                "");
            $db->exec("set names utf8");
            $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            return $db;
        }catch (\PDOException $exception){
            echo $exception->getMessage();
        }

    }
}