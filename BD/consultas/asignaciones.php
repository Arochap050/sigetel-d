<?php

/* --------------------------- consultas a las tablas del modulo de asignaciones de equipos -----------------------------------*/

/* equipos asignados */
$tabla_equipo_asg = $connect->query("SELECT * FROM equipo_asig AS EA 
JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
JOIN Empleados AS EM ON EM.ID_empleado = Solicitante
JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
JOIN Estado_equipo AS ESS ON ESS.ID_Estado = DE.FK_Estado 
WHERE status = 1;");
/* equipos disponibles */
$tabla_equipo_dis = $connect->query("SELECT ID_Detalle_Equipo,Bien_nacional,serial,N_Equipo,N_Marca,N_Modelo,Estado,N_division,img_equipo,'x' as acciones, id_Marca, ID_Equipo, ID_Modelo
FROM detalle_equipo
JOIN Equipos ON Equipos.ID_Equipo = detalle_equipo.FK_Equipo
JOIN Marcas  ON Marcas.id_Marca = detalle_equipo.FK_Marca
JOIN Modelo ON Modelo.ID_Modelo = detalle_equipo.FK_Modelo
JOIN Divisiones ON Divisiones.ID_division = detalle_equipo.FK_Ubicacion
JOIN Estado_equipo ON Estado_equipo.ID_Estado = detalle_equipo.FK_ESTADO
WHERE FK_Estado = 2; ");
/* equipos reincorporados */
$tabla_equipo_recp = $connect->query("SELECT * FROM equipo_asig AS EA 
JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
JOIN Empleados AS EM ON EM.ID_empleado = Solicitante
JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
JOIN Estado_equipo AS ESS ON ESS.ID_Estado = A.status_eq_asg
JOIN tipo_asignacion AS TPASG ON TPASG.ID_tipo_asig = A.tipo_asg
WHERE status = 2; ");


/* --------------------------------consultas para las tablas del modulo de lineas -----------------------------------------*/

/* LINEAS ASIGNADAS */
$tabla_lineas_asg = $connect->query("SELECT * FROM Lineas_asignadas AS LA
JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
JOIN Empleados AS EM ON EM.ID_empleado = AL.solicitante
JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
WHERE status = 1; ");
/* LINEAS DISPONIBLES */
$tabla_lineas_dis = $connect->query("SELECT * FROM Lineas 
JOIN tipo_linea AS tl ON tl.ID_tipolinea = Lineas.FKEY_Linea
JOIN Operadoras AS o ON o.ID_Operadora = Lineas.FKEY_Operadora
JOIN estado_linea AS e ON e.ID_Estado_linea = Lineas.FKEY_Estado
WHERE FKEY_Estado = 1; ");
/* LINEAS DEVUELTAS */
$tabla_lineas_dev = $connect->query("SELECT * FROM Lineas_asignadas AS LA
JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
JOIN Empleados AS EM ON EM.ID_empleado = AL.solicitante
JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
JOIN tipo_asignacion AS TPASG ON TPASG.ID_tipo_asig = AL.tipo_asg
WHERE status = 2; ");