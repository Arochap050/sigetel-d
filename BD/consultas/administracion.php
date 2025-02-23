<?php
// se realizan las consultas para las paginas del modulos de administracion
//gerencias
$tabla_gerencias = $connect->query("SELECT * FROM Gerencia");
//divisiones
$tabla_divisiones = $connect->query("SELECT * FROM Divisiones AS D
JOIN Gerencia AS G ON G.ID_gerencia = D.FKEY_gerencia");
//cargos
$tabla_cargos = $connect->query("SELECT * FROM Cargos AS C JOIN Divisiones AS D ON D.ID_division = C.FKEY_division");