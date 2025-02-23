<?php

class controlusuariolog {
    public static function conUsuario($usuario, $password){
        $respuesta = usuarioLogin::consultar_usuario($usuario, $password);
        return $respuesta;
    }
}