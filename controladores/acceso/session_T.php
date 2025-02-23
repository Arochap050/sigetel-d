<?php

include "../../BD/bd.php";

session_start();
define('MAX_INACTIVIDAD', 600);

if (!empty($_SESSION)) {

    if (isset($_SESSION['ULTIMA_ACTIVIDAD']) && (time() - $_SESSION['ULTIMA_ACTIVIDAD'] > MAX_INACTIVIDAD)) {
        session_unset();
        session_destroy();
        header("Location: ../../index.php");
        exit();
    }

    $_SESSION['ULTIMA_ACTIVIDAD'] = time();
    $user = $_SESSION['usuario'];
    $rol =  $_SESSION['rol'];
    $estado = $_SESSION['status'];

    if ($estado == 'Bloqueado') {

        header("location: ../../controladores/acceso/cerrar_sesion.php");
    }
} else {
    header("location: ../../index.php");
}