<?php

$tabla_operadoras = $conectado->prepare("SELECT * FROM Operadoras");

$tabla_tipoLinea = $conectado->prepare("SELECT * FROM tipo_linea AS TL JOIN Operadoras AS O ON O.ID_Operadora = TL.FK_operadora");

$tabla_estadolineas = $conectado->prepare("SELECT * FROM estado_linea");