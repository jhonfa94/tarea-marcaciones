<?php

class Conexion
{

    public static  function conectar()
    {
        $ip = 'localhost';
        $db = 'marcaciones';
        $user_db = 'root';
        $passwod_db = '';

        try {
            $conexion = new PDO("mysql:host=$ip;dbname=$db", $user_db, $passwod_db, [
                PDO::ATTR_PERSISTENT => true,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ]);
            return $conexion;
        } catch (\Throwable $e) {
            print $e->getMessage();
            die(); 
        }
    }
}
