<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=listaReporte.php">

<?php
	$conexion=mysqli_connect('localhost','root','','fenixx');
	$id_rep= $_GET['id_rep'];
	$mysqli="DELETE FROM `reporte` WHERE `reporte`.`id_rep` = $id_rep";
	$resultado=mysqli_query($conexion,$mysqli) or die("gg");

?>
