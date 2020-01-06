<?php
//Plantilla para los menus secundarios

//Conexion a base de datos
$con = mysqli_connect('localhost', 'root', '', 'fenixx');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fenixcell</title>
	<!-- Conexion al css-->
	<link rel="stylesheet" type="text/css" href="../diseño/css/fenixcel.css">
	<link rel="icon" type="image/png" href="../Diseño/imagenes/logo-beta.png" sizes="32px">
</head>
<body>
	<!--Banner-->
	<div>
		<table>
			<tr>
				<!--Logo-->
				<td><img src="../diseño/imagenes/logo-beta.png" style="size: 300px" ; width="300"></td>
				<td class="busqueda"><input type="text" style="width: 640px; height: 32px;"></td>
				<td><img src="../diseño/imagenes/lupita.png" style="width: 40px; height: 40px;"></td>
			</tr>
		</table>
	</div>