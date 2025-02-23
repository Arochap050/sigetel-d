<?php

require_once "../../controladores/acceso/usuario.php";
require_once "../../modelos/acceso/usuario.php";

class usuariolog {
    public $usuario, $password;

    public function logusuario(){
        $logueo = controlusuariolog::conUsuario($this->usuario, $this->password);
        echo json_encode($logueo);
    }
}

if(!empty($_POST["usuario"]) and !empty($_POST["contraseña"])){

    $loguear = new usuariolog;
    $loguear->usuario = $_POST["usuario"];
    $loguear->password = $_POST["contraseña"];
    $loguear->logusuario();
}