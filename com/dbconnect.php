<?php
require_once "config.php";

function db() : PDO{
    static $pdo;
    if(!$pdo){
        $dsn ="mysql:host=" .DB_HOST. ";port=" .DB_PORT. ";dbname=" .DB_NAME. ";chartset=UTF8";
        $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
        $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;
}


?>