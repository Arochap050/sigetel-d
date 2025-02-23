<?php

class conexion {

    public $host = "localhost";
    public $bd = "sigetel_vtv";
    public $usuario = "root";
    public $password = "d3s4rr0ll0";
    public $port = "3306";
    public $driver = "mysql";
    public $connect;

    public static function consultar(){
        try {
            $conexion = new conexion();
            $conexion->connect = new PDO("{$conexion->driver}:host={$conexion->host};dbname={$conexion->bd}",$conexion->usuario, $conexion->password);
            $conexion->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion->connect;
            
        } catch (PDOException $th) {

            echo $th->getMessage();
        }
    }
}

$consulta = new conexion();
$consulta->consultar();
$conectado = conexion::consultar();